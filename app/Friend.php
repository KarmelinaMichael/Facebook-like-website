<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
	public $timestamps = false;

	public function posts(){
    	return $this -> hasMany('App\Post');
    }
}