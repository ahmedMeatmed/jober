@extends('layout.layout')
@section('title')
Home
@endsection

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-nhTYl+9IkZjO7O4Vjwr9hD+3I7s/aQRUJ5rYw6T3kvZxRZJ/RB6yFJmT5RX5RZoXzQ/MBD4OqRmcJkVjIa1l5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
@section('main')
@if ($type == 'candidate')<style>#show{display: none;}#delete{display: none}#edit{display: none;}</style>@endif
@if ($type !== 'candidate')<style>#apply{display: none;}</style>@endif
@if ($type == 'employer')<style>#delete{display: none}#edit{display: none;}</style>@endif
@if ($type !== 'employer')<style>#edit{display: none}</style>@endif


 <div class="container-fluid" ">      
    <div class=" col-2 sidebar " >
        <div class="card w-100 mt-3 p-2">
            <div class="card-body m-auto">
                
              
              <a href="{{route('profile.show',$username)}}" >
                <img src="{{asset('images/'.$profile_pic)}}" alt="ProfilePicture"   style="height: 100px;width:100px" class="profile m-auto mb-3 rounded-circle img-fluid">
              </a>
              <br>
              <small class="card-title">{{$username}}</small>
              <hr>
              <small class="card-title">{{$email}}</small>
              <hr>
              <small class="card-title">{{$type}}</small>
              <br><br><br>
              <hr><hr>
              <strong>Filter</strong>

              <div class="card w-100 mt-3 p-2">
                <div class="card-body m-auto">
                  <form action="{{ route('posts.filter') }}" method="POST">
                    @csrf
                    <input type="radio" name="latest" class="m-2" id="last" placeholder="name@example.com" value="latest" >
                    <label for="last">Latest Posts</label>
                    <br>
                    <input type="radio" name="latest" class="m-2" id="old" placeholder="name@example.com" value= "oldest">
                    <label for="old">Oldest Posts</label>
                    <hr>
                    <strong>salary range</strong>
                    <br>
                    <input type="radio" name="salary" class="m-2" id="300" placeholder="name@example.com" value="300">
                    <label for="300" >0 -> 300 $</label>
                    <br>
                    <input type="radio" name="salary" class="m-2" id="500" placeholder="name@example.com" value="500">
                    <label for="500" >300 -> 500 $</label>
                    <br>
                    <input type="radio" name="salary" class="m-2" id="1000" placeholder="name@example.com" value="1000">
                    <label for="1000">500 -> 1000 $</label>
                    <br><br><br>
                    <button type="submit" class="btn btn-success m-auto">Filter</button>
                </form>
                </div>
              </div>

            </div>
        </div>
    </div>


        <div class="container">
            <div class="container col-8">
            
                @foreach ($posts as $post )
                    
                      <div class="card text-center">
                          <div class="card-header">
                            <div style="float: left">
                              @foreach ($employers as $employer )
                                @if ($employer -> id == $post-> employer_id)
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
                {{$posts->links('pagination::bootstrap-5')}}
            </div>   
        </div>
        

        


</div>

    {{-- <script src="{{asset('script/sidebars.js')}}"></script> --}}
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0" nonce="YOUR_NONCE"></script>
    <script type="text/javascript" src="https://platform.linkedin.com/in.js" async defer></script>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

@endsection
