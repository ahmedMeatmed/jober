<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

use App\Models\Admin;
use App\Models\Candidate;
use App\Models\Employer;
use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;



class AdminsController extends Controller
{
    //
    public function create(){
        return view('pages.createAdmin');
    }
    public function store(Request $request){
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => hash::make($request->password),
            'type' => 'admin'
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => hash::make($request->password),
        ]);

        return redirect();
    }

    public function dashboard_create(){
        $user = Auth::user();
        $username = $user->name;
        $email = $user->email;
        $id = $user->id;
        $type = $user->type;

        $proves = Post::where('approval',0)->get();
        $proves=Post::paginate(6);

        $employers = Employer::count();
        $candidates = Candidate::count();
        $admins = Admin::count();
        $posts = Post::count();
        $forms = Form::count();
        // dd($employers);
        return view('pages.dashboard',compact('username','email','id','type','proves','employers','candidates','admins','posts','forms'));

    }
}
