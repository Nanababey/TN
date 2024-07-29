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
                    <h5 class="card-title mb-4 d-inline">Chi tiết đơn hàng</h5>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderItems as $order)
                            <tr>
                                <th><img width="60" height="60" src="{{asset('assets/img/'.$order->image.'')}}"></th>
                                <td>{{$order->name}}</td>
                                <td>1</td>
                                <td>{{$order->price}}K</td>
                
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @endsection