<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post as Post;
use App\User as User;
use App\Like as Like;
use App\Friend as Friend;
use View;
use DB;
use \Input as Input;
use URL;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function upload()
    // {

    
    //     return View::make('posts/show')->with('posts',$posts);
    
    //     //
    // }
    // public function index()
    // {
    //     $posts = Post::where('poster_id', '=', 1)->orderBy('posted_time','desc')->get(); 
    
    //     return View::make('posts/show')->with('posts',$posts);
    
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       // return view('posts/create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user_id = session('user_id');
        $caption = $request->get('caption');
        $is_public = $request->get('public');
        $user = User::where('User_id', '=',$user_id)->First(); 

        $fullname= $user->Firstname.' '. $user->Lastname;
        if(Input::hasFile ('file')){
            echo'uploaded';
            $file =Input::file('file');
            $filename=time().'.'.$file->getClientOriginalName();
            $file->move('uploads',$filename);
            $path= 'uploads/'.$filename;
            echo '<img src="uploads/'.$filename.'"/>';
        }
        else $path=Null;
        if($caption==""&&$path==Null);
        else{
           Post::insert(['caption' => $caption, 'poster_name' =>$fullname ,'is_public'=> $is_public, 'poster_id' =>$user_id , 'image'=>$path]);}
           
           return redirect(URL::previous());
       }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        
        //   return View::make('posts/show', compact($posts));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    
       $user_id = session('user_id');

        DB::table('likes')->where('post_id', '=',$id)->delete();   
       DB::table('posts')->where('post_id', '=',$id)->delete();
       

       return redirect('profile/'.$user_id);

   }

   public function like($id)
   {
        $user_id = session('user_id');
        Like::insert(['user_id' => $user_id, 'post_id' => $id]);

        return redirect(URL::previous());
        
   }

   public function unlike($id)
   {
        $user_id = session('user_id');
        $like = Like::where('post_id','=',$id)->where('user_id','=',$user_id)->delete();

        return redirect(URL::previous());
   }

   public function likers($id)
   {
        $user_id = session('user_id');
        $requests_count = Friend::where('friend_id', '=', $user_id)->where('status', '=', 0)->count();
        $friends = Like::where('post_id','=',$id)->join('users', 'users.User_id', '=', 'likes.user_id')->get();
    
        return View::make('likers', compact('requests_count', 'friends'));
   }


}
