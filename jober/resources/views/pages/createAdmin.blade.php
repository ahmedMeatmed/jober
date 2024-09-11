@extends('layout.layout')
@section('title')
CreateAdmin
@endsection


@section('main')
<div class="container">
    <div class="card w-50 mt-3 m-auto">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.store') }}" >     
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Admin's name</label>
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="email" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Admin's email</label>
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Password</label>
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password_confirmation" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Confirm Password</label>
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
                
                <button class="col-4 mb-2 btn btn-lg rounded-3 btn-success" type="submit">CreateAdmin</button>
            </form>
        </div>
    </div>
</div>
@endsection
