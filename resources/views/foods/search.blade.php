@extends('layouts.app')

@section('content')



<div class="col-md-12 py-5 bg-dark hero-header mb-5" style="margin-top: -25px">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Tìm kiếm</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>

                <li class="breadcrumb-item text-white active" aria-current="page">Tìm kiếm</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <!-- <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Thực </h5>
            <h1 class="mb-5">Món ngon mỗi ngày</h1>
        </div> -->
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @if(count($foods)==0)
                            <div class="container">
                                <p><b>Không tìm thấy món ăn</b></p>
                            </div>
                        @else
                            @foreach ($foods as $food)
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded"
                                        src="{{asset('assets/img/'.$food->image.'')}}" alt="" style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>{{$food->name}}</span>
                                            <span class="text-primary">{{$food->price}}K</span>
                                        </h5>
                                        <small class="fst-italic">{{substr($food->des,0,70)}}</small>
                                        <a type="button" href="{{route('food.details', $food->id)}}"
                                            class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Menu End -->

@endsection