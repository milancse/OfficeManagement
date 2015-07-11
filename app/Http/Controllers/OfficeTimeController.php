<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\OfficeTime;
use App\Depertment;
use App\library\globalFunctions;
use Session;
use Redirect;
use Validator;
use Input;

class OfficeTimeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		$this->middleware('auth');
		
	}
	public function getIndex()
	{
		if(Auth::user()->role->name=='employee')
		{
			return Redirect::to('dashboard');
		}
		/*Get offie time information*/
		$office_times=OfficeTime::where('company_id','=',Auth::user()->company->id)->orderBy('created_at','desc')->paginate(10);
		/*End*/
		
		$department_list=Depertment::lists('title','id');
		$data=array(
			'department_list'=>$department_list,
			'office_times'=>$office_times
			);
		return view('office_time.create')->with('data',$data);
	}

	public function postSaveOfficeTime(Request $request)
	{
		
		$rules=array(
			'office_time_title'=>'required'
			);
		$validator=validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('office')
                ->withErrors($validator)->withInput();
		}
		else
		{
			$office_time=OfficeTime::where('company_id','=',Auth::user()->company->id)->update(['status'=>0]);
			$new_office_time=new OfficeTime;
			$new_office_time->company_id=Auth::user()->company->id;
			$new_office_time->depertment_id=$request->department;
			$new_office_time->title=$request->office_time_title;
			$new_office_time->office_intime=date('H:i:s',strtotime($request->office_intime));
			$new_office_time->office_outtime=date('H:i:s',strtotime($request->office_outtime));
			$new_office_time->status=$request->active;
			$new_office_time->created_at=Date('Y-m-d H:i:s');
			$new_office_time->created_by=Auth::user()->id;
			if($new_office_time->save())
			{
				$globalFunctions=new globalFunctions(); 
				$message=$globalFunctions->globalMessage('Office timr has been successfully added!','success');
			}
		}
		Session::flash('message',$message);
		return Redirect::to('office');
	}

	public function postChangedStatus()
	{
		$office_time_id=Input::get('id');
		$office_time_all_update=OfficeTime::where('company_id','=',Auth::user()->company->id)->update(['status'=>0]);
		$office_time_update_by_id=OfficeTime::find($office_time_id);
		$office_time_update_by_id->status=1;
		$office_time_update_by_id->save();
		exit();
	}
	

}
