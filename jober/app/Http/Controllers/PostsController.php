<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Form;
use App\Models\Post;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;




    


class PostsController extends Controller
{
 
    //
   
    public function create(){
        $user = Auth::user();
        $username = $user->name;
        $email = $user->email;
        $id = $user->id;
        $type = $user->type;

        $proves = Post::where('approval',0)->get();
        $proves=Post::paginate(6);

        return view('posts.createpost',compact('proves','username','email','id','type'));

    }
    public function store(Request $request){
        $user = Auth::user();
        
        $email = $user->email;
        
        $type = $user->type;
        if ($type == 'employer') {
        $users = Employer::where('email', $email)->first();
        $users->id;
        
        

              //validation inputs
              $request->validate([
                'title'         =>'bail|required',
                'description'   =>'bail|required',
                'responses'     =>'bail|required',
                'requires'      =>'bail|required',
                'qualifications'=>'bail|required',
                'salary'        =>'bail|required|integer',
                'benefits'      =>'bail|required',
                'location'      =>'bail|required',
                'work_type'     =>'bail|required|max:255',
                'deadline'      =>'bail|required|max:255',
                ]);
            
            $title =$request->title;
            $description =$request->description;
            $responses =$request->responses;
            $requires =$request->requires;
            $qualifications =$request->qualifications;
            $salary =$request->salary;
            $benefits =$request->benefits;
            $location =$request->location;
            $work_type =$request->work_type;
            $deadline =$request->deadline;
            $employer_id = $users->id;

    
    
            Post::create([
                'title'           =>  $title,
                'description'     =>  $description,
                'responses'       =>  $responses,
                'requires'        =>  $requires,
                'qualifications'  =>  $qualifications,
                'salary'          =>  $salary,
                'benefits'        =>  $benefits,
                'location'        =>  $location,
                'work_type'       =>  $work_type,
                'deadline'        =>  $deadline,
                'employer_id'     => $employer_id,
                'approval'        => false,
    
            ]);
    
            return to_route('posts.create');
        }else {
            return 'You Must be Employer';
        }
      
    }
    public function show($id){
        $user = Auth::user();
        $username = $user->name;
        $email = $user->email;
        // $id = $user->id;
        $type = $user->type;

        $proves = Post::where('approval',0)->get();
        $proves=Post::paginate(6);

        $post = Post::findOrFail($id);
        return view('posts.post',compact('post','username','email','type','proves'));
    }

   
    public function edit($postid){

        $proves = Post::where('approval',0)->get();
        $proves=Post::paginate(6);

        return view('posts.edit',compact('postid'));
    }
    public function update($postid,Request $request){

         //validation inputs
         $request->validate([
            'title'         =>'bail|required|max:255',
            'description'   =>'bail|required|max:255',
            'responses'     =>'bail|required|max:255',
            'requires'      =>'bail|required|max:255',
            'qualifications'=>'bail|required|max:255',
            'salary'        =>'bail|required|max:255',
            'benefits'      =>'bail|required|max:255',
            'location'      =>'bail|required|max:255',
            'work_type'     =>'bail|required|max:255',
            'deadline'      =>'bail|required|max:255',
            ]);

            //hold request in variables
    
            $title =$request->title;
            $description =$request->description;
            $responses =$request->responses;
            $requires =$request->requires;
            $qualifications =$request->qualifications;
            $salary =$request->salary;
            $benefits =$request->benefits;
            $location =$request->location;
            $work_type =$request->work_type;
            $deadline =$request->deadline;
        // dd($request);
        $post = Post::findOrFail($postid);
        $post->update([
            'title'           =>  $title,
            'description'     =>  $description,
            'responses'       =>  $responses,
            'requires'        =>  $requires,
            'qualifications'  =>  $qualifications,
            'salary'          =>  $salary,
            'benefits'        =>  $benefits,
            'location'        =>  $location,
            'work_type'       =>  $work_type,
            'deadline'        =>  $deadline,
    
        ]);

        return to_route('myposts.show',1);

    }

    public function destroy($postid){
        $post = Post::findOrFail($postid);
        $post ->delete();
        return to_route('posts.index');
        
    }

    public function approval(Request $request,$id){

        $user = Auth::user();
        $admin_id = $user->id;
        $post = Post::FindOrFail($id);

        $post->update([
            'approval' => 1,
            'admin_id' =>$admin_id,
        ]);
         

            return to_route('posts.index');

    }
    
}














