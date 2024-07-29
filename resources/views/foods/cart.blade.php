@extends('layouts.app')

@section('content')

<div class="col-md-12 py-5 bg-dark hero-header mb-5" style = "margin-top: -25px">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Giỏ hàng</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Giỏ hàng</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="container">
    @if(Session::has('delete'))
        <p class="alert {{Session::get('alert-class', 'alert-success')}}">{{Session::get('delete')}}</p>
    @endif
</div>

<!-- Service Start -->
<div class="container">

    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Xoá</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $food)
                    <tr>
                        <th><img width="60" height="60" src="{{asset('assets/img/'.$food->image.'')}}"></th>
                                        <td>{{$food->name}}</td>
                                        <td>1</td> 
                                        <!-- <td>
                                            
                                            <button class="btn btn-sm btn-secondary" onclick="updateQuantity('{{$food->food_id}}', -1)">-</button>
                                        
                                
                                            <input type="text" id="quantity_{{$food->food_id}}" value="1" readonly>
                                        
                                            
                                            <button class="btn btn-sm btn-secondary" onclick="updateQuantity('{{$food->food_id}}', 1)">+</button>
                                        </td>
                                        <td>{{$food->price}}K</td>
                                        <td>
                                            
                                            <span id="total_price_{{$food->food_id}}">{{$food->price}}K</span>
                                        </td> -->
                                        <td>{{$food->price}}K</td>
                                        <td><a href="{{route('food.delete.cart', $food->food_id)}}" class=" btn btn-danger text-white">xoá</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="position-relative mx-auto" style="max-width: 400px; padding-left: 679px;">
            <p style="margin-left: -7px;" class="w-19 py-3 ps-4 pe-5" type="text"> Tổng: {{$price}}K</p>
            <!-- @if( $price == 0)
                <p style='width: 241px;"" class="alert alert-success">Vui lòng thêm sản phẩm vào giỏ hàng để đặt mua</p>
            @else
                <form method="POST" action="{{route('prepare.checkout')}}">
                    @csrf
                    <input type="text" value="{{$price}}" name="price" style="display:none">
                    <button type="submit" name="submit" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">Đặt mua</button>
                </form>
            @endif -->
            <form method="POST" action="{{route('prepare.checkout')}}">
                @csrf
                <input type="text" value="{{$price}}" name="price" style="display:none">
                <button type="submit" name="submit" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">Đặt mua</button>
            </form>
        </div>
    </div>
</div>
<!-- Service End -->


@endsection