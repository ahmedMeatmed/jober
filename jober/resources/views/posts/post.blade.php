@extends('layout.layout')
@section('title')
Post
@endsection


@section('main')
@if ($type !== 'candidate')<style>#fill{display: none}</style>@endif
<div class="container">
    <div class="card w-80 mt-3">
        <div class="card-body">
        <h5 class="card-title text-center">{{$post->title}}</h5>
        <p class="text-center"><small >{{$post->description}}</small>
        </p>
        <hr>
        <h5 class="card-title">Responsabilities</h5>
        <small>{{$post->responses}}</small>
        <hr>
        <h5 class="card-title">Requirements</h5>
        <small>{{$post->requires}}</small>
        <hr>
        <p class="card-text">
            <strong>Qualifications</strong><br>
            <small>{{$post->qualifications}}</small>
        </p>
        <hr>
        <h5 class="card-title">Salary</h5>
        <small>{{$post->salary}}</small>
        <hr>
        <h5 class="card-title">Benefits</h5>
        <small>{{$post->benefits}}</small>
        <hr>
        <h5 class="card-title">Location</h5>
        <small>{{$post->location}}</small>
        <hr>
        <h5 class="card-title">{{$post->work_type}}</h5>
        <hr>
        <h5 class="card-title">DeadLine</h5>
        <small>{{$post->deadline}}</small>
        </div>
    </div>
    <a href="{{route('form.create',$post->id)}}" class="btn btn-success col-2 mt-2 " id="fill">FillApplicationForm</a>
</div>
@endsection
