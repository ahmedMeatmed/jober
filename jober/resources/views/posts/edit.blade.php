@extends('layout.layout')
@section('title')
CreatePostS
@endsection


@section('main')
<div class="container">
    <div class="card w-50 mt-3 m-auto">
        <div class="card-body">
            <form method="POST" action="{{route('posts.update',$postid)}}" >     
                @csrf
                @method('PUT')
                <div class="form-floating mb-3">
                    <input type="text" name="title" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Job title</label>
                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="description" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Job description</label>
                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="responses" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Responsabilties</label>
                    @error('responses') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="requires" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Requirements</label>
                    @error('requires') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="qualifications" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Qualifications</label>
                    @error('qualifications') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="salary" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Salary</label>
                    @error('salary') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="benefits" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Benefits</label>
                    @error('benefits') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="location" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Location-country-</label>
                    @error('location') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
                <div class="form-floating mb-3">
                    <span>WorkType</span>
                    @error('work_type') <span class="text-danger">{{ $message }}</span> @enderror

                    <select class="form-control rounded-3" name="work_type" id="floatingInput">
                            <option value="On-site">On-site</option>
                            <option value="Remotely">Remotely</option>
                    </select>
                </div>
                <div class="form-floating mb-3">
                    <span>Deadline</span>
                    @error('deadline') <span class="text-danger">{{ $message }}</span> @enderror

                    <input type="date" name="deadline" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                </div>
                <button class="col-3 mb-2 btn btn-lg rounded-3 btn-success" type="submit">Publish</button>
            </form>
        </div>
    </div>
</div>
@endsection
