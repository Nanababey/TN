
@extends('layouts.app')

@section('content')

<div class="col-md-12 py-5 bg-dark hero-header mb-5" style = "margin-top: -25px">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Đặt hàng</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Đặt hàng</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="container">
    <div class="col-md-12 bg-dark">
        <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
            <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
            <h1 class="text-white mb-4">Đặt hàng</h1>
            <form method="POST" action="{{route('foods.checkout.store')}}" class="col-md-12">
                @csrf
                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" value="{{$user->name}}" name="name" class="form-control" id="name" placeholder="Your Name">
                            <label for="name">Tên</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="email" value="{{$user->email}}" name="email" class="form-control" id="email" placeholder="Your Email">
                            <label for="email">Email</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text"  value="{{$user->phone_number}}" name="phone_number" class="form-control" id="email" placeholder="Town">
                            <label for="email">Số điện thoại</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" value="{{$user->address}}" name="address" class="form-control" id="ad" placeholder="Địa chỉ">
                            <label for="ad">Địa chỉ</label>
                        </div>
                    </div>
        

                    <div class="col-12">
                        <div class="form-floating">
                            <!-- <textarea type="text" name="price" value="{{Session::get('price')}}" placeholder="Price" id="message"
                                style="height: 100px"></textarea>
                            <label for="message">Price</label> -->
                            <input type="text" name="price" value="{{Session::get('price')}}" class="form-control" id="email" placeholder="Price" readonly>
                            <label for="text">Giá</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary w-100 py-3" type="submit">Đặt hàng ngay</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

