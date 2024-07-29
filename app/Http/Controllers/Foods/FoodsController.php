<?php

namespace App\Http\Controllers\Foods;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food\Food;
use App\Models\Food\Cart;
use App\Models\Food\OrderDetail;
use Auth;
use Session;
use App\Models\Food\Checkout;
use App\Models\User;

class FoodsController extends Controller
{
    public function foodDetails($id)
    {
        $foodItem = Food::find($id);

        $cartVerifing = Cart::where('food_id', $id)->where('user_id', Auth::user()->id)->count();

        return view('foods.food-details', compact('foodItem'));
    }

    public function cart(Request $request, $id)
    {

        $cart = Cart::Create([
            "user_id" => $request->user_id,
            "food_id" => $request->food_id,
            "name" => $request->name,
            "image" => $request->image,
            "price" => $request->price,
        ]);
        // echo "epp";

        if ($cart) {
            return redirect()->route('food.details', $id)->with(['success' => 'Thêm vào giỏ hàng thành công']);
        }
    }

    public function displayCartItems()
    {

        $cartItems = Cart::where('user_id', Auth::user()->id)->get();

        $price = Cart::where('user_id', Auth::user()->id)->sum('price');


        return view('foods.cart', compact('cartItems'), compact('price'));
        // echo "epp";


    }

    public function deleteCartItems($id)
    {
        $orderItem = Cart::where('user_id', Auth::user()->id)->where('food_id', $id);

        $orderItem->delete();


        if ($orderItem) {
            return redirect()->route('food.display.cart', $id)->with(['delete' => 'Món ăn đã được xoá khỏi giỏ hàng']);
        }


    }

    public function prepareCheckout(Request $request)
    {

        $value = $request->price;
        $price = Session::put('price', $value);

        $newPrice = Session::get('price');
 
        if ($newPrice > 0) {
            return redirect()->route('foods.checkout',compact('price','newPrice'));
        }
        else{
            abort('403');
        }
    }

    public function checkout(){
        $user = User::where('id', Auth::user()->id)->first();
        return view('foods.checkout',compact('user'));
    }

    public function storeCheckout(Request $request)
    {

        $checkout = Checkout::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            "address" => $request->address,
            "user_id" => Auth::user()->id,
            "price" => $request->price,
        ]);
        if ($checkout) {
            $orderItems = Cart::where('user_id', Auth::user()->id)->get();

            foreach ($orderItems as $orderItem) {
                $orderDetail = OrderDetail::create([
                    "checkout_id" => $checkout->id,
                    "name" => $orderItem->name,
                    "user_id" => $orderItem->user_id,
                    "food_id" => $orderItem->food_id,
                    "image" => $orderItem->image,
                    "price" => $orderItem->price,
                ]);
            }
            // return redirect()->route('foods.cart')->with(['success' => 'Đặt hàng thành công']);
            // echo "Đặt hàng thành công";
            $deleteItem = Cart::where('user_id', Auth::user()->id);
            $deleteItem->delete();
            
            return redirect()->route("home", $checkout->id)->with(['success' => 'Đặt hàng thành công']);

            // if ($orderItem) {
            //     if (Session::get('price') == 0) {
            //         abort('403');
            //     }
            // } else {
            //     Session::forget('price');
            //     return view('foods.sucess')->with(['success' => 'Thêm vào giỏ hàng thành công']);

            // }
        }
    }

    // public function success()
    // {

    //     $orderItem = Cart::where('user_id', Auth::user()->id);
    //     $orderItem -> delete();
    //     // echo "Đặt hàng thành công";

    //     if ($orderItem) {
    //         if(Session::get('price') == 0){
    //             abort('403');
    //         }
    //     }else{
    //         Session::forget('price');
    //         return view('foods.sucess')->with(['success' => 'Thêm vào giỏ hàng thành công']);

    //     }
    // }

    public function menu()
    {
        $breakfastFoods = Food::select()->take(4)->where('category', 'Breakfast')->orderBy('id', 'desc')->get();
        $launchFoods = Food::select()->take(4)->where('category', 'Launch')->orderBy('id', 'desc')->get();
        $dinnerFoods = Food::select()->take(4)->where('category', 'Dinner')->orderBy('id', 'desc')->get();



        return view('foods.menu', compact('breakfastFoods', 'launchFoods', 'dinnerFoods'));

    }

    public function search(Request $request)

    {
        // $searchString = "gà";
        $searchString = $request->searchString;

        if($searchString){
            $foods = Food::select()->take(10)->where('name', 'like', '%' . $searchString . '%')->orderBy('id', 'desc')->get();
            return view('foods.search', compact('foods'));
        }

    }


}
