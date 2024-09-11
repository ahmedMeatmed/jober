@extends('layout.layout')
@section('title')
EditProfile
@endsection


@section('main')
<div class="container">
    <div class="card w-50 mt-3 m-auto">
        <div class="card-body">
            <form method="POST" action="{{ route('profile.store',$id) }}" enctype="multipart/form-data" >     
                @csrf

                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com" value="{{ $username }}">
                    <label for="floatingInput">FullName</label>
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="file" name="image" class="form-control rounded-3" id="floatingInput" value="{{ $img }}" placeholder="name@example.com">
                    <label for="floatingInput">ProfilePicture</label>
                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com" value="{{ $email }}">
                    <label for="floatingInput">Email address</label>
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password_confirmation" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
                    <label for="password_confirmation">Confirm Password</label>
                    @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror

                </div>

                <button class="col-3 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
