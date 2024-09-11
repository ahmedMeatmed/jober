<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="{{asset('style/assets/js/color-modes.js')}}"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>@yield('title')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
          rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
          crossorigin="anonymous"
    >

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3.6.1/dist/style.css">
    
    <link href="{{asset('style/assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('style/navbars.css')}}">
    <link rel="stylesheet" href="{{asset('style/sidebars.css')}}">

    <link rel="stylesheet" href="{{asset('style/style.css')}}">
    
    
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" 
    integrity="sha512-nhTYl+9IkZjO7O4Vjwr9hD+3I7s/aQRUJ5rYw6T3kvZxRZJ/RB6yFJmT5RX5RZoXzQ/MBD4OqRmcJkVjIa1l5w==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
     --}}
     <link rel="stylesheet" href="{{ asset('fontawesome-free-5.15.4-web/css/all.min.css') }}">
     <link rel="stylesheet" href="{{ asset('fontawesome-free-5.15.4-web/css/brands.min.css') }}">
     <link rel="stylesheet" href="{{ asset('fontawesome-free-5.15.4-web/css/fontawesome.min.css') }}">
    
 <!-- Custom styles for this template -->
</head>
<body >
  @if ($type !== 'employer')<style>#CreatePost{display: none;}#applies{display: none;}</style>@endif
  @if ($type !== 'super_admin')<style>#CreateAdmin{display: none;}</style>@endif
  @if ($type == 'employer' || $type == 'candidate' )<style>#superAdminDashboard{display: none;}</style>@endif
  @if ($type !== 'admin')<style>#approve{display: none;}</style>@endif
  @if ($type !== 'candidate')<style>#applies-candidate{display: none;}</style>@endif
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
        </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
                id="bd-theme"
                type="button"
                aria-expanded="false"
                data-bs-toggle="dropdown"
                aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
            </button>
        </li>
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
            </button>
        </li>
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#circle-half"></use></svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
            </button>
        </li>
        </ul>
    </div>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand " href="{{route('posts.index')}}" style="font-size: 48px"><i class="fas fa-briefcase m-1" ></i>Jober</a>

          
          
          <div class="collapse navbar-collapse" id="navbarSupportedContent">  
  
         
              <form class="d-flex" role="search" style="width: 80%" method="POST" action="{{ route('posts.search') }}" >
                @csrf
                <input class="form-control me-2"  type="search" placeholder="Search(title,description & location) of job" name="search" aria-label="Search">
                <button class="btn btn-outline-success me-5" type="submit">Search</button>
              </form>

          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
            <li class="nav-item dropdown" id="approve" style="list-style: none">
              <strong class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <strong><i class="fas fa-bell"></i></strong>
              </strong>
              <ul class="dropdown-menu" >
                @foreach ($proves as $prove )
                  
                
                <li>
                  <a class="dropdown-item" href="{{route('posts.show',$prove->id)}}">

                    <div class="card">
                      <div class="card-header">
                        {{$prove->created_at}}
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">{{$prove->title}}</h5>
                        <p class="card-text">{{$prove->description}}</p>
                        <form action="{{route('posts.approve',$prove->id)}}" method="post" style="display: inline-block" >
                          @csrf
                        <button type="submit" class="btn btn-success">Approve</button>
                        </form>
                        <form action="{{route('posts.show',$prove->id)}}" method="Get" style="display: inline-block" >
                          
                        <button type="submit" class="btn btn-info">View</button>
                        </form>
                        <form action="{{route('posts.destroy',$prove->id)}}" method="post" style="display: inline-block" >
                          @csrf
                          @method('DELETE')
                        <button type="submit" class="btn btn-danger" >Reject</button>
                      </form>
                      </div>
                    </div>
                    
                  </a>
                </li>
                @endforeach
                
              </ul>
            </li>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5 ">
              <li class="nav-item dropdown" style="list-style: none">
                <strong class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <strong>{{ $username }}</strong>
                </strong>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{route('profile.show',$username)}}">profile</a></li>
                  <li><a class="dropdown-item" href="{{ route('superAdmin.dashboard') }}" id="superAdminDashboard">Dashboard</a></li>
                  <li><a href="{{route('admin.create')}}" class="dropdown-item" id="CreateAdmin">CreateAdmin</a></li>
                  <li><a href="{{route('posts.create')}}" class="dropdown-item" id="CreatePost">CreatePost</a></li>
                  <li><a href="{{route('applies.show')}}" class="dropdown-item" id="applies">Applies</a></li>
                  <li><a href="{{route('applies.show')}}" class="dropdown-item" id="applies-candidate">Applies</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <form action="{{route('logout')}}" method="POST">
                    @csrf
                  <li><button type="submit" class="dropdown-item">Logout</button></li>
                  </form>
                </ul>
              </li>
            </ul>
           

            
          </ul>
          </div>
        </div>
    </nav>

    @yield('main')
    
{{-- <script src="{{asset('style/assets/dist/js/bootstrap.bundle.min.js')}}"></script> --}}


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
crossorigin="anonymous">
</script>
<script src="{{ asset('fontawesome-free-5.15.4-web/js/all.min.js') }}"></script>
<script src="{{ asset('fontawesome-free-5.15.4-web/js/brands.min.js') }}"></script>
<script src="{{ asset('fontawesome-free-5.15.4-web/js/conflict-detection.js') }}"></script>
<script src="{{ asset('fontawesome-free-5.15.4-web/js/fontawesome.min.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script> --}}

</body>
</html>