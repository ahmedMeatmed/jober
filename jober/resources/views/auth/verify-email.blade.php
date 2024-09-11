
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
<body>
    
    <div class="container p-3 border rounded-4">
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            <strong>
            'Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.'
        </strong>
        </div>
    
    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button class="btn btn-primary">
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>
        <br>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="btn btn-danger">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</div>


</body>
</html>