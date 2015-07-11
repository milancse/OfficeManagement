<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model {

	public function userprofile(){
		return $this->belongsTo('App\User');
	}

}
