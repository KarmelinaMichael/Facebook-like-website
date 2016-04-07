<?php
namespace App\Http\Controllers;
use md5;
use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Friend as Friend;
use View;
use DB;
use App\User as User;
use Hash;
use Session;
use App\Post as Post;
class UserController extends Controller{


	 public function search(Request $request)
    {
    	$user_id = session('user_id');
$users=NULL;
$posts=NULL;
               $search = $request->get('search');
                $choice = $request->get('search_choise');
               if ($search==NUll || $search=="" ||$search==" ") return redirect::back();
               else{
               if($choice==1){  
     $users = User::where( DB::raw('CONCAT(Firstname, " ", Lastname)'), 'like', '%'.$search.'%')->orwhere('Firstname', 'like', '%'.$search.'%')->orWhere('lastname', 'like', '%'.$search.'%')->orWhere('Email', '=', $search)->orWhere('Phone_no', '=', $search)->orWhere('Hometown', 'like', '%'.$search.'%')->get();
if($users->count()<1)  { 
	// Session::flash('message', 'no result for your search');
	// return redirect::back();
	$users=Null;
	return View::make('search', compact('users','posts'));

}
 
 else  return View::make('search', compact('users','posts'));
    }

    elseif ($choice==0 ){
    	$posts=Post::where('poster_id', '=', $user_id)->where('caption', 'like', '%'.$search.'%')->get();
    	if($posts->count()<1)  { 
	// Session::flash('message', 'no result for your search');
	// return redirect::back();
    		$posts=Null;
    		return View::make('search', compact('posts','users'));
}
	else
    	return View::make('search', compact('posts','users'));
    }
//     else{
//     	 $users = User::where( DB::raw('CONCAT(Firstname, " ", Lastname)'), 'like', '%'.$search.'%')->orwhere('Firstname', 'like', '%'.$search.'%')->orWhere('lastname', 'like', '%'.$search.'%')->orWhere('Email', '=', $search)->orWhere('Phone_no', '=', $search)->orWhere('Hometown', 'like', '%'.$search.'%')->get();
//     	 $posts=Post::where('poster_id', '=', $user_id)->where('caption', 'like', '%'.$search.'%')->get();
// if($users->count()<1 &&$posts->count()<1)  { 
// 	Session::flash('message', 'no result for your search');
// 	return redirect::back();}
 
//  else  return View::make('search', compact('users','posts'));


//     }
      }  

}
	public function signup()
	{

	// Set the user array to gather data from the signup form for new user registration

		$userdata = array(
			'Firstname' => Input::get('Firstname'),                                   
			'Lastname' => Input::get('Lastname'),
			'Email' => Input::get('Email'),
			'Password' => (Input::get('Password')),
			'Phone_no' => Input::get('Phone_no'),
			'Gender' => Input::get('Gender'),
			'Birthday' => Input::get('Birthday'),
			'Image_path' => Input::get('Image_path'),
			'Hometown'=>Input::get('Hometown'),
			'Maritalstatus' => Input::get('Maritalstatus'),
			'Aboutme' => Input::get('Aboutme'),

			);
		
		
		




$rules = array(
	    /* 'Firstname'=>'Regex:/^[A-Za-z\-! ,\"\/@\.:\(\)]+$/',
	     'Lastname'=>'Regex:/^[A-Za-z\-! ,\"\/@\.:\(\)]+$/',*/
		'Email' => 'required|Email|unique:users|regex:/^[A-Za-z]+\d?+.*$/',
		'Password' => 'required|min:6',
		'Phone_no'=>'|min:6|regex:/^([0-9\(\)\/\+ \-]*)$/'
		
	);


		


	// Run our validation check
		$validator = Validator::make($userdata, $rules);

	//If validation fails then redirect the user back to the signup screen 
		if($validator->fails())
			{		echo"backkkkkkkkkkkkkkkkkkk";	
		return Redirect::back()
		->withInput()
		->withErrors($validator);
		echo"backkkkkkkkkkkkkkkkkkk";

	 } // End If
	 else
	 {
	 	$user = new User;
	 	$user->Firstname = Input::get('Firstname');
	 	$user->Lastname = Input::get('Lastname');
	 	$user->Email = Input::get('Email');
	 	$user->Image_path = Input::get('Image_path');
	 	$user->Password = md5(Input::get('Password'));
	 	$user->Phone_no = Input::get('Phone_no');
	 	$user->Gender = Input::get('Gender');
	 	$user->Birthday = Input::get('Birthday');
	 	$user->Hometown = Input::get('Hometown');
	 	$user->Maritalstatus = Input::get('Maritalstatus');
	 	$user->Aboutme =Input::get('Aboutme');


      // Session::put('User_id', $user->id);

	 	$user->save();
	 	Session_start();
	 	session(['user_id' => $user->id]);
	 	$_SESSION['firstname']=$user->Firstname;
	 	$_SESSION['lastname']=$user->Lastname;
	 	session(['pass' => $user->password]);

// $_SESSION['myValue']=$user->id;
	 	$_SESSION['myValue1']=$user->Image_path;
 //session(['image' => $user->Image_path]);
//$_SESSION['myValue2']=$user->Gender;
	 	session(['gender' => $user->Gender]);
//echo $_SESSION['myValue'];
//echo"<br>";
	 	echo"signed up sucessfully";
		//echo"$user->id";
		//return view('image');
	 	return View('image');
	} // End Else

	// Once the record has been saved to the database, then redirect the user user back to the login screen.
	
	

}





public function login()
{

	
	
	session(['y' =>0] );
	$auth = User::where('Email', '=', Input::get('Email'))->where('Password', '=',
		md5(Input::get('Password')))->first();
	if($auth){
		Auth::login($auth);
		Session_start();
  //$user=User::select('User_id')->where('Email', '=', Input::get('Email'));
// $_SESSION['userid']=$auth->User_id;
		session(['user_id' => $auth->User_id]);

//echo session('user_id')."kkkkk";
// session('on')=$on;
//  session('out')=$out;
		$x11=session('user_id');
		
		

// $on='0';
//  $on=session('on');
// $out='1';
//  $out=session('out');
		return Redirect::to("/profile/$x11");
	}
	else{  
		

//session('on')=$l;
	 //$e="error";
//session('e')=1;	
		session(['y' =>1] );
		// return Redirect::to('login');
		
		return Redirect::back();
		
		//echo session(."mm";
		
		
		
	}

	


}




public function edit(){

	$first =Input::get('Firstname');                                  
	$last= Input::get('Lastname');
	$pass= (Input::get('Password'));
	$passw = md5(Input::get('Password'));
	$email=Input::get('Email');
	$phone=Input::get('Phone_no');
	$gender=Input::get('Gender');
	$Birth=Input::get('Birthday');
	$home=Input::get('Hometown');
	$Matrial=Input::get('Maritalstatus');
	$about=Input::get('Aboutme');


	$x11=session('user_id');
	if($first!=null){

/*$ff=array('Firstname' => Input::get('Firstname'));
					$rules =array(
						 'Firstname'=>'Regex:/^[A-Za-z\-! ,\"\/@\.:\(\)]+$/');
					$validator = Validator::make($ff, $rules);

	//If validation fails then redirect the user back to the signup screen 
					if($validator->fails())
						{		echo"backkkkkkkkkkkkkkkkkkk";	
					return Redirect::back()
					->withInput()
					->withErrors($validator);
					echo"backkkkkkkkkkkkkkkkkkk";

				}*/


/*else{*/

		$user=User::where('User_id',   session('user_id'))
		->update(array('Firstname'=>$first));
		$post=Post::where('poster_id',session('user_id'))->update(array('poster_name'=>$first." ".$last));
	/*}*/
	}

		if($last!=null){

/*$ll=array('Lastname' => Input::get('Lastname'));
					$rules =array(
						 'Lastname'=>'Regex:/^[A-Za-z\-! ,\"\/@\.:\(\)]+$/');
					$validator = Validator::make($ff, $rules);

	//If validation fails then redirect the user back to the signup screen 
					if($validator->fails())
						{		echo"backkkkkkkkkkkkkkkkkkk";	
					return Redirect::back()
					->withInput()
					->withErrors($validator);
					echo"backkkkkkkkkkkkkkkkkkk";

				}


else{*/




			$user=User::where('User_id',   session('user_id'))
			->update(array('Lastname'=>$last));
$post=Post::where('poster_id',session('user_id'))->update(array('poster_name'=>$first." ".$last));
		}/*}*/

			if($pass!=null){
				$emm=array('Password' => Input::get('Password'));
				$rules =array(
					'Password' => 'required|min:6');
				$validator = Validator::make($emm, $rules);

	//If validation fails then redirect the user back to the signup screen 
				if($validator->fails())
					{		echo"backkkkkkkkkkkkkkkkkkk";	
				return Redirect::back()
				->withInput()
				->withErrors($validator);
				echo"backkkkkkkkkkkkkkkkkkk";

			}
			else{
				$user=User::where('User_id',   session('user_id'))
				->update(array('Password'=>$passw));}
			}


               
				if($email!=null){
					$em=array('Email' => Input::get('Email'));
					$rules =array(
						'Email' => 'required|Email|unique:users|regex:/^[A-Za-z]+\d?+.*$/');
					$validator = Validator::make($em, $rules);

			
			

	//If validation fails then redirect the user back to the signup screen 
				if($validator->fails())
					{		echo"backkkkkkkkkkkkkkkkkkk";	
				return Redirect::back()
				->withInput()
				->withErrors($validator);
				echo"backkkkkkkkkkkkkkkkkkk";

			}
			else{
				$user=User::where('User_id',   session('user_id'))
				->update(array('Email'=>$email));}
			}

			if($phone!=null){


				$phh=array('Phone_no'=>Input::get('Phone_no'));
				$rules =array(
					'Phone_no'=>'required|min:6|regex:/^([0-9\(\)\/\+ \-]*)$/'
					);
				$validator = Validator::make($phh, $rules);

	//If validation fails then redirect the user back to the signup screen 
				if($validator->fails())
					{		echo"backkkkkkkkkkkkkkkkkkk";	
				return Redirect::back()
				->withInput()
				->withErrors($validator);
				echo"backkkkkkkkkkkkkkkkkkk";

			}



			else{

				$user=User::where('User_id',   session('user_id'))
				->update(array('Phone_no'=>$phone));

			}

		}

		if($gender!=null){
			$user=User::where('User_id',   session('user_id'))
			->update(array('Gender'=>$gender));
			$userr=User::where('User_id',   session('user_id'))->first();
			session(['gender' => $userr->Gender]);
			//session(['g1' => $userr->Gender]);
			session(['i'=>$userr->Image_path]);
// 	return Redirect::to('upload');
			if(session('gender')=='female'&&session('i')=='dmale.gif'){
				$user1=User::where('User_id',  session('user_id'))
				->update(array('Image_path'=>'dfemale.gif'));
			}
			elseif(session('gender')=='male'&&session('i')=='dfemale.gif'){
				$user1=User::where('User_id',  session('user_id'))
				->update(array('Image_path'=>'dmale.gif'));}

			}


			if($Birth!=null){
				$user=User::where('User_id',   session('user_id'))
				->update(array('Birthday'=>$Birth));}


				if($home!=null){
					$user=User::where('User_id',   session('user_id'))
					->update(array('Hometown'=>$home));}

					if($Matrial!=null){
						$user=User::where('User_id',   session('user_id'))
						->update(array('Maritalstatus'=>$Matrial));
					}

					if($about!=null){
						$user=User::where('User_id',   session('user_id'))
						->update(array('Aboutme'=>$about));

					}

					return Redirect::to("edit");



				}
				
			}
