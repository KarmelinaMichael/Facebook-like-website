<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Friend as Friend;
use App\Post as Post;
use App\Like as Like;
use View;
use DB;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_id = session('user_id');
        $requests_count = Friend::where('friend_id', '=', $user_id)->where('status', '=', 0)->count();
  $like_count = DB::select('SELECT posts.post_id, count(user_id) as count  from likes right join posts on likes.post_id=posts.post_id group by post_id ');


       $posts = DB::select('SELECT a.*, b.user_id, b.post_id as p_id FROM(select * FROM posts where poster_id in (select U.User_id FROM users U, friends F WHERE CASE WHEN F.user_id = ? THEN F.friend_id = U.user_id WHEN F.friend_id= ? THEN F.user_id= U.user_id END AND F.status= ?) or poster_id=?) a LEFT JOIN (SELECT * FROM likes WHERE user_id = ?) b ON a.post_id = b.post_id Order By posted_time desc', [$user_id, $user_id, 1, $user_id, $user_id]);

        return View::make('home', compact('requests_count','posts','like_count'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function friend_requests()
    {
        $user_id = session('user_id');
        $requests_count = Friend::where('friend_id', '=', $user_id)->where('status', '=', 0)->count();

        $requests = Friend::where('friend_id', '=', $user_id)
        ->where('status', '=', 0)
        ->join('users', 'users.User_id', '=', 'friends.user_id')
        ->get();

        return View::make('friend_requests', compact('requests', 'requests_count'));
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
        //
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
        //
    }
}
