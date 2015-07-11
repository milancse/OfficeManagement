<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {

	public function holiday(){
		return $this->hasMany('App\PublicHoliday');
	}
	public function company_holiday()
	{
		return $this->hasMany('App\Holiday');
	}

}
