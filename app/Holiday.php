<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model {

	public $timestamps=false;
	public function company(){
		return $this->belongsTo('App\Company');
	}

}
