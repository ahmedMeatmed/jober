<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Post;
use App\Models\User;
use App\Models\Employer;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    //
    public function show(){

        $user = Auth::user();
        $username = $user->name;
        $email = $user->email;
        $id = $user->id;
        $type = $user->type;
        $posts = Post::all();
        $profile_pic = 'profileimage.png';
        if ($type == 'candidate') {
            $enduser = Candidate::where('email',$email)->first();
            $profile_pic =  $enduser->img_path;

        }elseif ($type == 'employer') {
            $enduser = Employer::where('email',$email)->first();
            $users = Employer::where('email', $email)->first();
            $employer_id = $users->id;
            // dd($posts);
            $posts =  DB::table('posts')->where('employer_id',$employer_id)->paginate(6);
            
            $profile_pic =  $enduser->img_path;
        }
        // dd($enduser);
        
        $employers = Employer::all();
        
        
        $proves =  DB::table('posts')->where('approval',false)->paginate(6);
        // $proves=Post::paginate(6);

        // $posts = Post::paginate(6);
        

        return view('pages.profile',compact('posts','username','type','email','proves','profile_pic','id','employers'));

    }

    public function edit(){
        $user = Auth::user();
        $username = $user->name;
        $email = $user->email;
        $id = $user->id;
        $type = $user->type;
        $password = $user->password;

        if ($type == 'employer') {

            $employer = Employer::where('email',$email)->first();
            $img = $employer ->img_path;
        }
        if ($type == 'candidate') {

            $candidate = Candidate::where('email',$email)->first();
            $img = $candidate ->img_path;
        }

        $proves =  DB::table('posts')->where('approval',false)->paginate(6);


        return view('pages.editprofile',compact('username','type','proves','username','email','id','password','img'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => [ 'string', 'max:255'],
            'email' => [ 'string', 'lowercase', 'email', 'max:255'],
            'password' => [ 'required','confirmed', Password::defaults()],
        ],
        [
            'password.required' => 'you must enter password'
        ]
    );
// dd($request);
        $user = Auth::user();
        $id = $user->id;
        $email = $user->email;
        $type = $user->type;

        // dd($request);

        $user = User::FindOrFail($id);
        $user->update([

            'name' => $request->name,
            'email' => $request->email,
            'password' => hash::make($request->password),

        ]);

        
            $file = $request->file('image');
           $fileName = time() . '_' . $file->getClientOriginalName();
           $file->move(public_path('images'), $fileName);
        

        if ($type == 'employer') {

            $guest = Employer::where('email',$email)->first();
            $guest->update([
                'img_path' => $fileName
            ]);
            
        }
        if ($type == 'candidate') {

            $guest = Candidate::where('email',$email)->first();
            $guest->update([
                'img_path' => $fileName
            ]);
            
        }


        return to_route('profile.show',$id);
    }
}
