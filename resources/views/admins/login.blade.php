@extends('layouts.admin')

@section('content')


<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mt-5">ĐĂNG NHẬP</h5>
                <form method="POST" class="p-auto" action="{{route('check.login')}}">
                    <!-- Email input -->
                    @csrf
                    <div class="form-outline mb-4">
                        <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />

                    </div>


                    
                    <div class="form-outline mb-4">
                        <input type="password" name="password" id="form2Example2" placeholder="Mật khẩu" class="form-control" />
                    </div>



                  
                    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center"> Đăng nhập</button>
                    

                </form>

            </div>
        </div>
    </div>
</div>

@endsection