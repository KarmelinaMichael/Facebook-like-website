<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

//use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticable as AuthenticableTrait; 
use Illuminate\Auth\Passwords\CanResetPassword;  

use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;  
class User extends Model implements AuthenticatableContract, CanResetPasswordContract 
   

{ use Authenticatable, CanResetPassword;
	public $timestamps = false;
	


protected $fillable = array( 'Email', 'Password');

 
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
 
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	 public static  $rules = array(
		'Email'=>'required|unique:users|',
		'password'=>'required'
		
	);
public function Post(){
    	return $this -> hasMany('App\Post');
    }
	 
	}