

<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="{{asset('style/assets/js/color-modes.js')}}"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
          rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
          crossorigin="anonymous"
    >

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3.6.1/dist/style.css">
    
    <link href="{{asset('style/assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('style/navbars.css')}}">
    <link rel="stylesheet" href="{{asset('style/sidebars.css')}}">

    
    
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" 
    integrity="sha512-nhTYl+9IkZjO7O4Vjwr9hD+3I7s/aQRUJ5rYw6T3kvZxRZJ/RB6yFJmT5RX5RZoXzQ/MBD4OqRmcJkVjIa1l5w==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
     --}}
     
     <link rel="stylesheet" href="{{ asset('fontawesome-free-5.15.4-web/css/all.min.css') }}">
     <link rel="stylesheet" href="{{ asset('fontawesome-free-5.15.4-web/css/brands.min.css') }}">
     <link rel="stylesheet" href="{{ asset('fontawesome-free-5.15.4-web/css/fontawesome.min.css') }}">
     <link href="{{asset('style/sign-in.css')}}" rel="stylesheet">

      <link rel="stylesheet" href="{{asset('style/style.css')}}">
    
 <!-- Custom styles for this template -->
  </head>
  <body>
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

    <main class="form-signin w-100 m-auto mt-5">
    
          <form  method="POST" action="{{route('login')}}">
            @csrf

            <h1 class="h3 mb-3 fw-normal m-auto" style="font-size: 48px"><i class="fas fa-briefcase m-1" ></i>Jober</h1>

            <div class="form-floating">
              <input type="email" name="email" class="form-control" :value="old('email')" required autofocus autocomplete="username">
              <label for="floatingInput">Email address</label>
              @error('email')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <br>
            <div class="form-floating">
              <input type="password" name="password" class="form-control"  required autocomplete="current-password"> 
              <label for="floatingPassword">Password</label>
              @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                      </div>

            <div class="form-check text-start my-3">
              <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
              <label class="form-check-label" for="flexCheckDefault">
                Remember me
              </label>
            </div>
            <div class="flex items-center justify-end mt-4">
              @if (Route::has('password.request'))
                  <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" 
                  href="{{ route('password.request') }}">
                      {{ __('Forgot your password?') }}
                  </a>
              @endif
            <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Sign in</button>
            </div>
            
            <p class="mt-2">Create An Account <a href="{{route('register')}}">Register</a></p>
          </form>


          
    </main>
    <script src="{{asset('script/script.js')}}"></script>
    <script src="{{ asset('fontawesome-free-5.15.4-web/js/all.min.js') }}"></script>
    <script src="{{ asset('fontawesome-free-5.15.4-web/js/brands.min.js') }}"></script>
    <script src="{{ asset('fontawesome-free-5.15.4-web/js/conflict-detection.js') }}"></script>
    <script src="{{ asset('fontawesome-free-5.15.4-web/js/fontawesome.min.js') }}"></script>
  </body>
</html>

