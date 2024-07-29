<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;
use App\Models\Food\Food;
use App\Models\Food\Checkout;
use App\Models\Food\OrderDetail;

class AdminsController extends Controller
{
    public function viewLogin(){
        return view("admins.login");
    }

    public function checkLogin(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {

            return redirect()->route('admins.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
    }

    public function index()
    {
        return view('admins.index');
        
    }

    public function allFoods(){
        $foods = Food::select()->orderBy('id','desc')->get();

        return view('admins.allfoods', compact('foods'));
    }

    public function createFood()
    {
        return view('admins.createfoods');
    }

    public function storeFood(Request $request)
    {
        $destinationPath = 'assets/images/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);

        $foods = Food::create([
            "name" => $request->name,
            "price" => $request->price,
            "des" => $request->des,
            "category" => $request->category,
            "image" => $myimage
        ]);


        if ($foods) {
            return redirect()->route('all.foods')->with(['success' => 'Thêm món thành công']);
        }
    }

    public function deleteFood($id)
    {

        $food = Food::find($id);
        if(File::exists(public_path('assets/img/' .$food->image))) {
            File::delete(public_path('assets/img/'.$food->image));
        }
        $food->delete();

        if ($food) {
            return redirect()->route('all.foods')->with(['delete' => 'Xoá món thành công']);
        }
    }

    public function allOrders()
    {

        $orders = Checkout::select()->orderBy('id', 'desc')->get();

        $startDate = '2023-12-01'; 
        $endDate = '2023-12-08';   
        $revenue = Checkout::select(Checkout::raw('SUM(price) as total_revenue'))
            ->whereRaw('DAY(created_at) = DAY(NOW())')
            // ->whereBetween('created_at', [$startDate . '00:00:00', $endDate . '23:59:59'])
            ->where('status','Đã giao')
            ->first();

        return view('admins.allorders', compact('orders', 'revenue'));

        
    }
    public function editOrders($id)
    {
 
        $order = Checkout::find($id);
        return view('admins.editorders', compact('order'));
    }
    public function orderDetail($id)
    {
        $orderItems = OrderDetail::where('checkout_id', $id)->orderBy('id', 'desc')->get();
        return view('admins.orderdetail', compact('orderItems'));
    }

    public function updateOrders(Request $request,$id)
    {

        $order = Checkout::find($id);
        $order->update( $request->all() );
        if ($order) {
            return redirect()->route('orders.all')->with(['success' => 'Cập nhật thành công']);
        }
    }

    // "status" => $request->status

    
}
