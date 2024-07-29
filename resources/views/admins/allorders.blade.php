@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        @if(Session::has('success'))
                        <p class="alert {{Session::get('alert-class','alert-success')}}">{{Session::get('success')}}</p>
                        @endif
                    </div>
                    <h5 class="card-title mb-4 d-inline">Đơn đặt hàng</h5>
                    <br>
                    <h5 class="card-title mb-4 d-inline">Doanh thu hôm nay: {{$revenue->total_revenue}}K</h5>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Ngày đặt hàng</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Cập nhật TT</th>
                                <th scope="col">Chi tiết</th>
                                <th scope="col">Xoá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <th scope="row">{{$order->id}}</th>
                                <td>{{$order->name}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->address}}</td>
                                <td>{{$order->price}}K</td>


                                <td>{{$order->status}}</td>
                                <td><a href="{{route('orders.edit', $order->id)}}"
                                        class="btn btn-warning  text-center ">Cập nhật</a></td>
                                <td><a href="{{route('orders.detail', $order->id)}}" class="btn btn-danger  text-center ">Chi tiết</a></td>
                                <td><a href="{{route('orders.edit', $order->id)}}" class="btn btn-danger  text-center ">Xoá</a></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @endsection