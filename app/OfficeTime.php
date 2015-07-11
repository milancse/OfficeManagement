<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OfficeTime extends Model {

	public $timestamps=false;
	public function depertment()
	{
		return $this->belongsTo('App\Depertment');
	}

}
