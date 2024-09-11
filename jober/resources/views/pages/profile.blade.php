@extends('layout.layout')
@section('title')
Profile
@endsection

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" 
integrity="sha512-nhTYl+9IkZjO7O4Vjwr9hD+3I7s/aQRUJ5rYw6T3kvZxRZJ/RB6yFJmT5RX5RZoXzQ/MBD4OqRmcJkVjIa1l5w==" 
crossorigin="anonymous" referrerpolicy="no-referrer" />
@section('main')
@if ($type == 'employer' || $type == 'admin' || $type == 'super_admin')<style>#skills{display: none;}</style>@endif
@if ($type !== 'employer')<style>#posts{display: none;}</style>@endif

<div class="container">
    <div class="card w-80 mt-3">
        <div class="card-body">
            <img src="{{asset('images/'.$profile_pic)}}" alt="ProfilePicture" style="height: 150px;width:150px" class=" profile m-auto mb-3 rounded-circle img-fluid">
            <div style="display: inline-block;float:right; width:80%">
                <h5 class="card-title" style="display: inline-block;">Username</h5>
                <a href="{{ route('profile.edit',$id) }}"><i class="fas fa-pen" style="float:right"></i></a>
                <br>
                <strong>{{ $username }}</strong>
                <hr>
                <h5 class="card-title">E-mail</h5>
                <strong>{{ $email }}</strong>
                <div id="skills">
                    <hr>
                    <p class="card-text" >
                    <strong>Skills</strong><a href="{{ route('profile.edit',$id) }}"><i class="fas fa-pen" style="float:right"></i></a>
                    <br>
                    <ul>
                        <li><small>skill</small></li>
                        
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container col-8" id="posts">
        
        @foreach ($posts as $post )
                    
                      <div class="card text-center">
                          <div class="card-header">
                            <div style="float: left">
                              @foreach ($employers as $employer )
                                @if ($employer->id == $post->employer_id)
                                <img src="{{ asset('images/'.$employer->img_path) }}" alt="" class="rounded-5 " style="height:50px;width:50px">
                                <div style="display: inline-block" class="m-2">
                                  <strong>{{ $employer->name }}</strong>
                                  <br>
                                  <small>{{ $post->created_at }}</small>
                                </div>
                                @endif
                              @endforeach
                                
                            </div>
                          
                          {{-- <a class="fb-share-button" style="float: right" data-href={{( "http://127.0.0.1:8000/posts")}} > --}}
                            <div style="display: inline-block; float: right;">
                            <ul  class="navbar-nav  mb-2 mb-lg-0 ">
                              <li class="nav-item dropdown" style="list-style: none">
                                <strong class="dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <strong><i class="fas fa-share"></i></strong>
                                </strong>
                                <ul class="dropdown-menu" >
                                  <li ><a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fexample.com%2Fmy-page" target="_blank">
                                    <i class="fab fa-facebook" style="font-size: 36px"></i> <strong>FaceBook</strong></a>
                                  </li>
                                  <li><a class="dropdown-item"  href="https://www.linkedin.com/sharing/share-offsite/?url=https%3A%2F%2Fexample.com%2Fmy-page" target="_blank">
                                    <i class="fab fa-linkedin" style="font-size: 36px"></i> <strong>LinkedIn</strong></a>
                                  </li>
                                  <li><a class="dropdown-item"  href="https://twitter.com/intent/tweet?text=Check%20this%20out!" target="_blank" >
                                    <i class="fab fa-twitter-square" style="font-size: 36px"></i><strong> Twitter</strong></a>
                                  </li>
                                </ul>
                              </li>
                            </ul>
                          </div>



                        </div>
                  
                    
                        <div class="card-body">
                          <h5 class="card-title">{{$post->title}}</h5>
                          <p class="card-text">{{$post->description}}</p>
                          <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary" id="apply">apply</a>
                          <a href="{{route('posts.show',$post->id)}}" class="btn btn-info" id="show">show</a>
                          <a href="{{route('posts.edit',$post->id)}}" class="btn btn-warning" id="edit">Edit</a>
                          <form action="{{route('posts.destroy',$post->id)}}" method="post" style="display: inline-block" id="delete">
                              @csrf
                              @method('DELETE')
                            <button type="submit" class="btn btn-warning" id="delete">Delete</button>
                          </form>
                        </div>
                      
                </div>
                <br>
                @endforeach
        {{-- {{$posts->links('pagination::bootstrap-5')}} --}}

    </div>   
   
</div>

@endsection
