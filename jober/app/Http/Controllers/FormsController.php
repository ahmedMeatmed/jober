<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Post;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FormsController extends Controller
{
    //
    public function create_application($post_id){
        $user = Auth::user();

        $username = $user->name;
        $email = $user->email;
        $id = $user->id;
        $type = $user->type;
        $proves = Post::where('approval',false)->get();

        return view('forms.applicationform',compact('username','email','id','type','proves','post_id'));
    }
    
    public function store_form(Request $request,$post_id){
        $request->validate([
            'email' => 'bail|required|max:255|',
            'phone' => 'bail|required|max:255',
            'cv'  => 'bail|required|file|mimes:jpeg,png,pdf|max:2048',
        ]);
        $email = $request-> email;
        $phone = $request-> phone ;
        
        // Handle file upload if needed
        $file = $request->file('cv');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('cv'), $fileName);

        $existingRecord = DB::table('forms')
        ->where('phone', $phone)
        ->where('post_id', $post_id)
        ->first();
    
        if ($existingRecord) {
            // Handle the duplicate case

            return 'sending form to the same job must be one time';
        }

        $employer_id = Post::where('id',$post_id)->first()->employer_id;

        $user = Auth::user();
        $username = $user->name;
        $candidate_id = $user->id;
        
        Form::create([
            'name'        => $username,
            'email'       => $email,
            'phone'       => $phone ,
            'file_path'   => $fileName,
            'post_id'     => $post_id,
            'employer_id' => $employer_id,
            'candidate_id'=> $candidate_id

        ]);

        return to_route('posts.index');

    }

    public function applies(){
        $user = Auth::user();

        $username = $user->name;
        $email = $user->email;
        $id = $user->id;
        $type = $user->type;

        @$employer_id = Employer::where('email',$email)->first()->id;
        // $posts = Post::where('employer_id',$employer_id)->paginate(6);
        // // $posts = DB::table('posts')->where('employer_id',$employer_id)->first();
        // dd($posts);
        
        // $forms = Form::where('post_id',$ids)->get();
        $forms = DB::table('forms')->where('employer_id',$employer_id)->paginate(6);
        $applies =  DB::table('forms')->where('candidate_id',$id)->paginate(6);

        $proves = Post::where('approval',false)->get();
        
        return view('forms.applies',compact('username','type','proves','forms','applies'));
    }

    public function destroy($form_id){
        $form = Form::findOrFail($form_id);
        $form->delete();
        // dd($form);
        return to_route('applies.show');
    }
}
