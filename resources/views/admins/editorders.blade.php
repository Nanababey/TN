@extends('layouts.admin')

@section('content')


<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Cập nhật trạng thái đơn hàng</h5>
                <p>Trạng thái: <b>{{$order->status}}</b></p>
                <form method="POST" action="{{route('orders.update', $order->id)}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-outline mb-4 mt-4">

                        <select name="status" class="form-select  form-control" aria-label="Default select example">
                            <option selected>Trạng thái</option>
                            <option value="Chờ xử lý">Chờ xử lý</option>
                            <option value="Đã giao">Đã giao</option>
                        </select>
                    </div>
                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Cập nhật</button>


                </form>

            </div>
        </div>
    </div>
</div>

@endsection