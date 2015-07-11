<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\library\globalFunctions;
use Validator;
use Input;
use Redirect;
use Session;
use App\Leave;
use App\Employee;
use App\User;
use DB;
class LeaveController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		if(Auth::user()->role->name=="employee")
		{
			return Redirect::to('dashboard');
		}
		$leave_request=Leave::where('read_unread','=',0)->where('approval','pending')->orderBy('leave_application_date', 'desc')->paginate(10);
		return view('leave.show_all_leave_request')->with('leave_request',$leave_request);
		
	}

	public function getLeaveRequest()
	{
		return view('leave.leave_request');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function postSaveLeaveRequest()
	{
		// echo Auth::user()->employee->id;
		// exit();
		$globalFunctions=new globalFunctions(); 
		$leave=new Leave;
		$rules=array(
			'leave_start_date'=>'required',
			'leave_end_date'=>'required',
			'description'=>'required'
			);
		$validator=validator::make(Input::all(),$rules);
		if($validator->fails()){
			return Redirect::to('leave')
                ->withErrors($validator)->withInput ();
		}
		else{
			$date1 = new \DateTime(Input::get('leave_start_date'));
			$date2 = new \DateTime(Input::get('leave_end_date'));
			$date_difference=($date1->diff($date2)->days)+1;
			$leave->leave_application_date=date('Y-m-d H:i:s');
			$leave->leave_start_date=Input::get('leave_start_date');
			$leave->leave_end_date=Input::get('leave_end_date');
			$leave->leave_days_count=$date_difference;
			$leave->approval="pending";
			$leave->description=Input::get('description');
			$leave->user_id=Auth::user()->id;
			if($leave->save())
			{
				$message=$globalFunctions->globalMessage('Leave request successfully completed !','success');
				// "<div class='alert alert-success alert-dismissible' role='alert'>
				// 			 <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				// 			Leave request successfully completed !.</div>";
			}
			else{
				$message=$globalFunctions->globalMessage('Leave request successfully completed !','danger');
			}
		}
		Session::flash('message',$message);
		return Redirect::to('leave/leave-request');
	}

	
	public function getDetail($id)
	{	
		$leave_details=Leave::where('id','=',$id)->first();
		return view('leave.leave_application')->with('leave_details',$leave_details);
	 }

	 public function postLeaveAcceptReject(){
	 	$btn_value=Input::get('btn_type');
	 	if(isset($btn_value))
	 	list($btn_type, $leave_id) = explode('.', $btn_value);
	 	if($btn_type=='accept'){
	 		$leave_application=DB::table('leaves')->where('id',$leave_id)->update(['read_unread'=>1,'approval'=>$btn_type]);
	 		
	 	}
	 	else{
	 		$leave_application=DB::table('leaves')->where('id',$leave_id)->update(['read_unread'=>1,'approval'=>$btn_type]);
	 	}
	 	if($leave_application)
	 	{
	 		$message="<div class='alert alert-success alert-dismissible' role='alert'>
							 <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
							Leave request ".$btn_type."ed!</div>";	
	 	}

	 	Session::flash('message',$message);
	 	return Redirect::to('dashboard');
	 	
	 }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
