@extends('layouts.admin')

@section('content')


<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Thêm món mới</h5>
                <form method="POST" action="{{route('store.foods')}}" enctype="multipart/form-data">
                    <!-- Email input -->
                    @csrf
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="name" id="form2Example1" class="form-control" placeholder="tên" />

                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="price" id="form2Example1" class="form-control" placeholder="giá" />

                    </div>
                    <div class="form-outline mb-4 mt-4">
                        <input type="file" name="image" id="form2Example1" class="form-control" />

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Mô tả</label>
                        <textarea name="des" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <div class="form-outline mb-4 mt-4">

                        <select name="category" class="form-select  form-control" aria-label="Default select example">
                            <option selected>Loại</option>
                            <option value="Breakfast">Sáng</option>
                            <option value="Launch">Trưa</option>
                            <option value="Dinner">Tối</option>
                        </select>
                    </div>

                    <br>



                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Thêm</button>


                </form>

            </div>
        </div>
    </div>
</div>

@endsection