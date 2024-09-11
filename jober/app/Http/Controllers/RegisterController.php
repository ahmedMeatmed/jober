<?php
/*
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Candidate;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function create(){

        return view('pages.register');

    }

    public function store(Request $request){

        $firstname          =$request->firstname;
        $lastname           =$request->lastname;
        $phonenumber        =$request->phonenumber;
        $email              =$request->email;
        $password           =$request->password;
        $encryptedPassword = bcrypt($password);
        $company_name       =$request->company_name;
        $industry           =$request->industry;
        $country            =$request->country;
        $postalcode         =$request->postalcode;
        $taxcard            =$request->taxcard;
        $commercial_register=$request->commercial_register;
        $img_path           =$request->file('image');

        // dd($request);

        if ($request->has('firstname')) {
            $request->validateWithBag('candidate_register',[
                'firstname' => 'bail|required|unique:candidates|max:255',
                'lastname' =>'bail|required|unique:candidates|max:255',
                'phonenumber' =>'bail|required|unique:candidates|max:255',
                'country' =>'bail|required|max:255',
                'email' =>'bail|required|unique:candidates|max:255|confirmed',
                'password' =>'bail|required|max:255|confirmed',
                'image' => 'required|mimes:jpg,png|max:2048'
                
            ],
            [
                'email.confirmed' => 'The email confirmation does not match.',
                'password.confirmed' => 'The password confirmation does not match.'
            ]);
            
            # code...
                // dd($request);
                $candidate =Candidate::create([
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'phonenumber' => $phonenumber,
                    'country' => $country,
                    'email' => $email,
                    'password' => $encryptedPassword,
                    'img_path'=>$img_path,

                ]);

                return to_route('login');

        }


        if ($request->has('company_name')){

            $request->validateWithBag('employer_register',[
                'company_name' => 'bail|required|unique:employers|max:255',
                'industry' =>'bail|required|unique:employers|max:255',
                'country' =>'bail|required|unique:employers|max:255',
                'postalcode' =>'bail|required|unique:employers|max:255',
                'taxcard' =>'bail|required|unique:employers|max:255',
                'commercial_register' =>'bail|required|unique:employers|max:255',
                'email' =>'bail|required|unique:employers|max:255|confirmed',
                'password' =>'bail|required|unique:employers|max:255|confirmed',
                
            ],
            [
                'email.confirmed' => 'The email confirmation does not match.',
                'password.confirmed' => 'The password confirmation does not match.'
            ]);

        
            // dd($request);

            $employer = Employer::create([

                'company_name'=> $company_name,
                'industry'=> $industry,
                'country'=> $country,
                'postalcode'=> $postalcode,
                'taxcard'=> $taxcard,
                'commercial_register'=> $commercial_register,
                'email'=> $email,
                'password'=>$encryptedPassword,
                'img_path'=>$img_path,
            ]);
            return to_route('login');
        }
    }


    public function index(){

        return view('pages.signin');
    }

//     public function login(Request $request)
//     {


//         // Validate the request data
//         $request->validateWithBag('candidate_login',[
//             'email' => 'required|email',
//             'password' => 'required',
//         ]);

//         // $request->validateWithBag('candidate_login',[
//         //     'email' => 'required|email',
//         //     'password' => 'required',
//         // ]);


//         // Find the user by email
//         $user = Candidate::where('email', $request->email)->first();
//         // dd($user->password);
//         // $user = Employer::where('email', $request->email)->first();
        

//     //     // Check if the user exists and the password is correct
//         if ($user && Hash::check($request->password, $user->password)) {
//             // Passwords match, log the user in
//             // (You can create a session, generate a token, etc.)
            
//             return to_route('posts.index');
//         }
//  // //     // If the credentials don't match
//         return 'email or password invalid';
//      }
    public function login(Request $request)
        {
                    // Validate the request data
        $request->validateWithBag('candidate_login',[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // $request->validateWithBag('candidate_login',[
        //     'email' => 'required|email',
        //     'password' => 'required',
//         // ]);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                // Authentication passed, redirect to intended route
                return redirect()->intended('posts.index');
            } else {
                // Authentication failed, redirect back with an error message
                // return back()->withErrors([
                //     'email' => 'The provided credentials do not match our records.',
                // ]);
                dd($request);
            }
        }

}*/


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Candidate;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('pages.register');
    }

    public function store(Request $request)
    {
        // Validate request based on the type of registration
        if ($request->has('firstname')) {
            $request->validateWithBag('candidate_register', [
                'firstname' => 'bail|required|unique:candidates|max:255',
                'phonenumber' => 'bail|required|unique:candidates|max:255',
                'country' => 'bail|required|max:255',
                'email' => 'bail|required|unique:candidates|max:255|confirmed',
                'password' => 'bail|required|max:255|confirmed',
                'image' => 'required|mimes:jpg,png|max:2048',
            ], [
                'email.confirmed' => 'The email confirmation does not match.',
                'password.confirmed' => 'The password confirmation does not match.'
            ]);

            // Handle file upload
            $img_path = $request->file('image')->store('images', 'public');

            // Create candidate record
            Candidate::create([
                'name' => $request->firstname,
                'phonenumber' => $request->phonenumber,
                'country' => $request->country,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'img_path' => $img_path,
            ]);

            return redirect()->route('login');
        }

        if ($request->has('company_name')) {
            $request->validateWithBag('employer_register', [
                'company_name' => 'bail|required|unique:employers|max:255',
                'industry' => 'bail|required|max:255',
                'country' => 'bail|required|max:255',
                'postalcode' => 'bail|required|max:255',
                'taxcard' => 'bail|required|max:255',
                'commercial_register' => 'bail|required|max:255',
                'email' => 'bail|required|unique:employers|max:255|confirmed',
                'password' => 'bail|required|max:255|confirmed',
            ], [
                'email.confirmed' => 'The email confirmation does not match.',
                'password.confirmed' => 'The password confirmation does not match.'
            ]);

            // Handle file upload if needed
            $img_path = $request->file('image');
            // ->store('images', 'public');

            // Create employer record
            Employer::create([
                'name' => $request->company_name,
                'industry' => $request->industry,
                'country' => $request->country,
                'postalcode' => $request->postalcode,
                'taxcard' => $request->taxcard,
                'commercial_register' => $request->commercial_register,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'img_path' => $img_path,
            ]);

            return redirect()->route('login');
        }
    }

        // {// // $credentials['password'] = bcrypt($credentials['password']);
        //     // $user = Candidate::where('email', $request->email)->first();

        //     // if ($user && Hash::check($credentials['password'], $user->password) ){
                
        //     //     Auth::login($user);
                
        //     //     // dd($credentials['password']);
        //     //     return redirect()->intended('posts.index');
        //     //     // return to_route('posts.index');
                
        //     // }else {
        //     //     return ('in valid');
        //     // }
        //     // dd($credentials['password']);
        // }


    public function index()
    {
       
        $username = 'username';
       
        return view('pages.signin',compact('username'));
    }

    public function login(Request $request)
    {

        // {// dd($request);
        //     // if($request->has('candidate_email')){

        //     //     // Validate the request data
        //     //     $request->validateWithBag('candidate_login', [
        //     //         'candidate_email' => 'required|email',
        //     //         'password' => 'required',
        //     //     ]);
        //     //     $credentials = $request->only('candidate_email', 'password');
        //     //     // Authenticate using Candidate model
        //     //     if (Auth::guard('candidate')->attempt($credentials)) {
        //     //         // Authentication passed, redirect to intended route
        //     //         return to_route('posts.index');
        //     //     } else {
        //     //         // Authentication failed, redirect back with an error message
        //     //         return 
        //     //         'doesnt match';
        //     //     }
        //     // }
        //     // if($request->has('employer_email')){
                
        //     //     // Validate the request data
        //     //     $request->validateWithBag('candidate_login', [
        //     //         'employer_email' => 'required|email',
        //     //         'password' => 'required',
        //     //     ]);
        //     //     $credentials = $request->only('employer_email', 'password');
        //     //     // Authenticate using Candidate model
        //     //     if (Auth::guard('employer')->attempt($credentials)) {
        //     //         dd($credentials);
        //     //         // Authentication passed, redirect to intended route
        //     //         return to_route('posts.index');
        //     //     } else {
        //     //         // Authentication failed, redirect back with an error message
        //     //         return 
        //     //         'doesnt match';
        //     //     }
        //     // }
        // }
            
            
        // if($request->has('candidate_email')){
        //     $credentials = [
        //         'email' => $request->candidate_email,
        //         'password' => $request->password,
        //     ];
        //     if (Auth::guard('candidate')->attempt($credentials)) {
        //          $user = Candidate::where('email', $request->candidate_email)->first();
        //         return to_route('posts.index');
        //     }
        // }
        // if($request->has('employer_email')){
        //     $credentials = [
        //         'email' => $request->employer_email,
        //         'password' => $request->password,
        //     ];
        //     if (Auth::guard('employer')->attempt($credentials)) {
        //         $user = Employer::where('email', $request->employer_email)->first();
        //         $id = $user->id;
        //         // dd($request);
        //         return to_route('posts.index');
        //     }
        // }

        // Determine which type of user is attempting to authenticate
    $guard = $request->has('candidate_email') ? 'candidate' : ($request->has('employer_email') ? 'employer' : null);
    $emailField = $request->has('candidate_email') ? 'candidate_email' : ($request->has('employer_email') ? 'employer_email' : null);

    if ($guard && $emailField) {
        $credentials = [
            'email' => $request->$emailField,
            'password' => $request->password,
        ];

        if (Auth::guard($guard)->attempt($credentials)) {
            $modelClass = $guard === 'candidate' ? Candidate::class : Employer::class;
            $user = $modelClass::where('email', $request->$emailField)->first();

            // Optionally store user ID in session or handle it as needed
            // $id = $user->id;
            return to_route('posts.index');
        } else {
            // Authentication failed
            return redirect()->back()->withErrors(['login' => 'Invalid credentials provided.']);
        }
    }

    // No email field provided
    return redirect()->back()->withErrors(['login' => 'No email provided for authentication.']);
}

    }


