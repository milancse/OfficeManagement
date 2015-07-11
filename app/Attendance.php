<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model {

	public function employee(){
		return $this->hasMany('App\Employee');
	}

	public function office_time()
	{
		return $this->hasOne('App\OfficeTime');
	}
	

}
