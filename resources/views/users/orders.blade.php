@extends('layouts.app')

@section('content')

<div class="col-md-12 py-5 bg-dark hero-header mb-5" style = "margin-top: -25px">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Đơn hàng của tôi</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Đơn hàng</a></li>
            </ol>
        </nav>
    </div>
</div>

<!-- <div class="container">
    @if(Session::has('success'))
    <p class=" alert {{Session::get('alert-class','alert-success')}}">{{Session::get('success')}}</p>
    @endif
</div> -->

<div class="container">

    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Tên</th>
                    <th scope="col">Ngày mua</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Chi tiết</th>
                    <th scope="col">Đánh giá</th>

                </tr>
            </thead>
            <tbody>
                @foreach($allOrders as $order)
                <tr>
                    <td>{{$order->name}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->phone_number}}</td>
                    <td>{{$order->price}}K</td>
                    <td>{{$order->status}}</td>
                    <td><a href="{{route('orders.detail', $order->id)}}" class="btn btn-danger  text-center ">Chi tiết</a></td>
                    @if($order->status == "Đã giao")
                    <td><a href="{{route('users.review.create')}}" class="btn btn-success">Đánh giá</a></td>
                    @else
                    <td><a href="#" class="btn btn-warning btn-success">Đánh giá</a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection