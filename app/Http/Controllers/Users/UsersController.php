<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food\Checkout;
use App\Models\Food\Review;
use App\Models\User;
use Auth;

class UsersController extends Controller
{
    public function getOrders(){
        $allOrders = Checkout::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        
        return view('users.orders', compact('allOrders'));
    }

    public function viewReview()
    {
        $user = User::where('id', Auth::user()->id)->get();
        return view('users.writeReview', compact('user'));
    }

    public function submitReview(Request $request)
    {
        Request()->validate([

            // "name" => "required|max:40",
            "review"=> "required",
        ]);

        $submitReviews = Review::create([

            "user_id" => $request->user_id,
            "review" =>  $request->review,
            "name" => $request->user_name,

        ]);
        if($submitReviews){
            return redirect()->route("home")->with("success","Thêm thành công");

        }    
    }
}
