@extends('layout.layout')
@section('main')

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <label for="password" :value="__('Password')" />

            <input type="text" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
                @if ($errors->has('password'))
                <div class="mt-2">
                    @foreach ($errors->get('password') as $message)
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                    @endforeach
                </div>
                @endif
        </div>

        <div class="flex justify-end mt-4">
            <button>Confirm</button>
        </div>
    </form>

@endsection