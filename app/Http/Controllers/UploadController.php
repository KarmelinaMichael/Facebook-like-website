<?php
namespace App\Http\Controllers;
use Session;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Input;
use Redirect;
use App\User as User;
use App\Post as Post;
class UploadController extends Controller {
	public function upload(){
		Session_start();
   echo  "<a href=\"\home\">Home</a>";
   $x1=session('user_id'); 
    $u=User::where('User_id',   session('user_id'))->first();
    $g=$u->Gender;

   echo "<a href=\"\profile/$x1\"><h3>Profile</h3></a>";
   echo "<br>";

   
   if(Input::hasFile('file')){
    
    $file=Input::file('file');
    
    $x=$file->getClientOriginalName();

    $filee = $file->getClientOriginalName();

    $p= pathinfo($filee, PATHINFO_EXTENSION);




    if($p != "jpg" && $p != "png" && $p != "jpeg"
     && $p != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    echo"<br>";
    echo"upload again";
    return View('image');}
    $file->move('Downloads',$file->getClientOriginalName());
    $_SESSION['myValue1']=$x;
//session('image')=$x;

    $user=User::where('User_id',   session('user_id'))
    ->update(array('Image_path'=> $_SESSION['myValue1']));
  //echo"laaaaaaaaaaaaa";
	   //echo '<img src="Downloads/'. $file->getClientOriginalName().'"/>';
    echo"<br>";
    echo"successfully uploaded";
 $user = User::where('User_id', '=',$x1)->First(); 
        $fullname= $user->Firstname.' '. $user->Lastname;
        $path='Downloads/'.$file->getClientOriginalName();
      Post::insert(['caption' => "User has changed their profile picture", 'poster_name' =>$fullname ,'is_public'=> 1, 'poster_id' =>$x1 , 'image'=>$path]);
 
  }

  else if($g=='female')
    { $user=User::where('User_id',  session('user_id'))
  ->update(array('Image_path'=>'dfemale.gif'));
  	// echo '<img src="Downloads/'. 'dfemale.gif'.'"/>';
  	 //echo"right";

}
else if($g=='male'){$user=User::where('User_id',  session('user_id'))
  ->update(array('Image_path'=>'dmale.gif'));
  	// echo '<img src="Downloads/'. 'dmale.gif'.'"/>';
}
//echo $g;
return Redirect::to("/profile/$x1");

}





public function delete(){
 //Session_start();
 $x11=session('user_id'); 
  $u=User::where('User_id',   session('user_id'))->first();
    $g=$u->Gender;
 // echo "<a href=\"\profile/$x11\"><h3>Profile</h3></a>";
 //if(session('g1')==null){
  if($g=='female')
    { $user=User::where('User_id',  session('user_id'))
  ->update(array('Image_path'=>'dfemale.gif'));
  	 // echo '<img src="Downloads/'. 'dfemale.gif'.'"/>';
  	 //echo"right";
 //return View("/profile/{{session('user_id')}}");
}
elseif($g=='male')
 {$user=User::where('User_id',  session('user_id'))
->update(array('Image_path'=>'dmale.gif'));
  	 // echo '<img src="Downloads/'. 'dmale.gif'.'"/>';
  	 //echo" Image deleted";
  	// return View("/profile/{{session('user_id')}}");
}

//echo $u;

return Redirect::to("/profile/$x11");
}

// else{
//   if(session('g1')=='female')
//     { $user=User::where('User_id',  session('user_id'))
//   ->update(array('Image_path'=>'dfemale.gif'));
//   	// echo '<img src="Downloads/'. 'dfemale.gif'.'"/>';
//   	 //echo"right";

// }
// else{$user=User::where('User_id',  session('user_id'))
//   ->update(array('Image_path'=>'dmale.gif'));
//   	// echo '<img src="Downloads/'. 'dmale.gif'.'"/>';
// }
// }

		//echo"$user->id";
		//return view('image');


//return Redirect::to('home');

//}


}



