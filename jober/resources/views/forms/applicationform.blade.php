@extends('layout.layout')
@section('title')
ApplicationForm
@endsection


@section('main')
<div class="container">
    <div class="card w-50 mt-3 m-auto">
        <div class="card-body">
            <form method="POST" action="{{ route('form.store',$post_id)}}" enctype="multipart/form-data">    
                @csrf 
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="phone" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Phone Number</label>
                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
                <div class="form-floating mb-3">
                    <span>Attach your resume</span>
                    <input type="file" name="cv" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                    @error('cv') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <button class="col-3 mb-2 btn btn-lg rounded-3 btn-success" type="submit">Apply</button>
            </form>
        </div>
    </div>
</div>
@endsection
