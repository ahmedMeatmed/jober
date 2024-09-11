<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Employer;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    //
    public function index(Request $request){
        // return'route is working';

        $user = Auth::user();

        $username = $user->name;
        $email = $user->email;
        $id = $user->id;
        $type = $user->type;
        $profile_pic = 'profileimage.png';
        if ($type == 'candidate') {
            $enduser = Candidate::where('email',$email)->first();
            $profile_pic =  $enduser->img_path;
        }elseif ($type == 'employer') {
            $enduser = Employer::where('email',$email)->first();
            $profile_pic =  $enduser->img_path;
        }
    
        $users = User::all();

        $employers = Employer::all();

        $proves =  DB::table('posts')->where('approval',false)->paginate(6);
        
        $posts = DB::table('posts')->where('approval',true)->paginate(6);


    // dd($request);
    if ($request->search) {
    
        $query =$request ->search;
        // dd($query);
        $posts = DB::table('posts')->where('approval',true)->where('title','like',"%{$query}%")
                    ->orwhere('description','like',"%{$query}%")
                    ->orwhere('location','like',"%{$query}%")
                    ->paginate(6);
                }

    if ($request->latest == 'latest') {

        // dd($request);
        $posts = DB::table('posts')->where('approval',true) ->orderBy('created_at','asc');
        
        // dd($posts);

       
    }if ($request->salary) {

        dd($request);
    }
   

        return view('pages.index',compact('posts','username','email','id','type','proves','profile_pic','employers'));
    }
}
