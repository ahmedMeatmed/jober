<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Employer;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
       
        // return view('auth.register');
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);
        if ($request->has('industry')) {
            $request->validateWithBag('employer_register', [
                'name' => 'bail|required|unique:users|max:255',
                'industry' => 'bail|required|max:255',
                'country' => 'bail|required|max:255',
                'postalcode' => 'bail|required|max:255',
                'taxcard' => 'bail|required|max:255',
                'commercial_register' => 'bail|required|max:255',
                'email' => 'bail|required|unique:users|max:255|confirmed',
                'password' => 'bail|required|min:8|max:255|confirmed',Rules\Password::defaults(),
                'image' => '|mimes:jpg,png',

            ], [
                'email.confirmed' => 'The email confirmation does not match.',
                'password.confirmed' => 'The password confirmation does not match.'
            ]);

            // Handle file upload if needed
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);

            //create user record
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => hash::make($request->password),
                'type' => 'employer'
            ]);
            // Create employer record
            Employer::create([
                'name' => $request->name,
                'email' => $request->email,
                'industry' => $request->industry,
                'country' => $request->country,
                'postalcode' => $request->postalcode,
                'taxcard' => $request->taxcard,
                'commercial_register' => $request->commercial_register,
                'img_path' => $fileName,
            ]);

        }
    
        if ($request->has('phone')) {

            $request->validateWithBag('candidate_register', [
                'name' => 'bail|required|unique:users|max:255',
                'phone' => 'bail|required|unique:candidates|max:11|min:11',
                'country' => 'bail|required|max:255',
                'email' => 'bail|required|unique:users|max:255|confirmed',
                'password' => 'bail|required|max:255|confirmed',Rules\Password::defaults(),
                'image' => '|mimes:jpg,png',
            ], [
                'email.confirmed' => 'The email confirmation does not match.',
                'password.confirmed' => 'The password confirmation does not match.'
            ]);

            // Handle file upload
           // Handle file upload if needed
        //    dd($request);

           $file = $request->file('image');
           $fileName = time() . '_' . $file->getClientOriginalName();
           $file->move(public_path('images'), $fileName);


            //create user record
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => hash::make($request->password),
                'type' => 'candidate'
            ]);

            // Create candidate record
            Candidate::create([
                'email' => $request->email,
                'phone' => $request->phone,
                'country' => $request->country,
                'img_path' => $fileName,
            ]);

        }


        // dd($request);
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
