@extends('layout.layout')
@section('main')
<style>
    .navbar{
        display: none;
    }
  </style>
  
    <div class="m-auto w-75 mt-5 border round-4 p-5">
        <strong>
            
            'Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.'
        </strong>
   

    <!-- Session Status -->
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
    @if (session('status'))
        <div class="mb-4">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-floating mb-3">
            <input   class="form-control rounded-3 w-25 mt-3" type="email" id="email"   name="email" :value="old('email')" required autofocus placeholder="name@example.com">
            <label for="floatingInput">Email</label>
            @if ($errors->has('password'))
                <div class="mt-2">
                    @foreach ($errors->get('password') as $message)
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @endforeach
                </div>
            @endif
        </div>
        

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="btn btn-primary">
               Email Password Reset Link
            </button>
        </div>
    </form>
</div>
@endsection