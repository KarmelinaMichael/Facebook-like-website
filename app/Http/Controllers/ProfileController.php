<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Friend as Friend;
use View;
use DB;
use App\User as User;
use App\Post as Post;
use App\Like as Like;
use URL;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $user_id = session('user_id');
        
     $like_count = DB::select('SELECT posts.post_id, count(user_id) as count  from likes right join posts on likes.post_id=posts.post_id group by post_id ');


 
        $likes =  DB::select('SELECT a.*,b.user_id, b.post_id as p_id FROM(SELECT * FROM posts where poster_id=?) a LEFT JOIN (SELECT * FROM likes WHERE user_id = ?) b ON a.post_id = b.post_id Order By posted_time desc',[$id,$user_id]);
        $private =  DB::select('SELECT a.*,b.user_id, b.post_id as p_id FROM(SELECT * FROM posts where poster_id=?) a LEFT JOIN (SELECT * FROM likes WHERE user_id = ?) b ON a.post_id = b.post_id WHERE is_public = 0 Order By posted_time desc',[$id,$user_id]);
       $public =  DB::select('SELECT a.*,b.user_id, b.post_id as p_id FROM(SELECT * FROM posts where poster_id=?) a LEFT JOIN (SELECT * FROM likes WHERE user_id = ?) b ON a.post_id = b.post_id WHERE is_public = 1 Order By posted_time desc',[$id,$user_id]);
       
        $requests_count = Friend::where('friend_id', '=', $user_id)->where('status', '=', 0)->count();

        $profile = User::where('User_id', '=', $id)
        ->get();

        $status = Friend::where('friend_id', '=', $id)
        ->Where('User_id', '=', $user_id)
        ->orWhere('User_id', '=', $id)
        ->Where('friend_id', '=', $user_id)
        ->first();

        $case;
        $num = 0;
        if($user_id == $id) {
            $num = 4;
            $case = "my profile";
        }
        if(!empty($status)) {
            if($status->user_id == $user_id && $status->status == 0){
                $case = 'friend request sent';
                $num = 1;
            }
            elseif($status->user_id == $id && $status->status == 0) {
                $case = 'Confirm request';
                $num = 2;
            }
            elseif ($status->status = 1) {
                $case = 'friends';
                $num = 3;
            } else {
                $case = 'add friend';
            }
        }

        if($profile->count() > 0 && $num==4 || $num==3)
            return View::make('profile', compact('profile', 'num', 'requests_count','user_id', 'likes','like_count'));
        if($profile->count() > 0 && $num!=4 && $num!=3){
            $likes=$public;
            return View::make('profile', compact('profile', 'num', 'requests_count','user_id', 'likes','like_count'));
       }else
            return View::make('not_found', compact('requests_count'));
    }

    public function add_friend($id)
    {
        $user_id = session('user_id');

        Friend::insert(['user_id' => $user_id, 'friend_id' => $id, 'status' => 0]);
        //return $this->show($id);
        return redirect(URL::previous());
    }

    public function confirm_friend_request($id)
    {
        $user_id = session('user_id');

        Friend::where('friend_id', '=', $user_id)
        ->where('user_id', '=', $id)
        ->update(['status' => 1]);
        //return $this->show($id);
        return redirect(URL::previous());
    }

    public function delete_friend_request($id)
    {
        $user_id = session('user_id');

        Friend::where('friend_id', '=', $user_id)
        ->where('user_id', '=', $id)
        ->orWhere('friend_id', '=', $id)
        ->where('user_id', '=', $user_id)
        ->delete();
        //return $this->show($id);
        return redirect(URL::previous());
    }

    public function my_friends()
    {
        $user_id = session('user_id');

        $requests_count = Friend::where('friend_id', '=', $user_id)->where('status', '=', 0)->count();
        $friends =  DB::select('select *
            FROM users U, friends F
            WHERE
            CASE

            WHEN F.user_id = ?
            THEN F.friend_id = U.user_id
            WHEN F.friend_id= ?
            THEN F.user_id= U.user_id
            END

            AND 
            F.status= ?',[$user_id, $user_id, 1]);

        //echo $friends;

        return View::make('my_friends', compact('friends', 'requests_count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    public function edit(){
       


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
        //
    }
}
