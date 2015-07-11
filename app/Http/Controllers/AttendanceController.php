<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\library\globalFunctions;
use App\Company;
use App\Holiday;
use Illuminate\Http\Request;
use App\User;
use App\Attendance;
use App\Employee;
use App\PublicHoliday;
use App\Leave;
use App\OfficeTime;
use File;
use Session;
use Redirect;
use Input;
use DB;
class AttendanceController extends Controller {

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
		$employee=Auth::user()->employee;
		$employee_id=$employee->id;
		$attendance=DB::select(DB::raw("SELECT * FROM attendances WHERE employee_id=$employee_id AND DATE_FORMAT(in_time,'%Y-%m')=DATE_FORMAT(now(),'%Y-%m') ORDER BY created_at DESC"));
		return view('attendance.index')->with('attendances',$attendance);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	
	public function postPunchin()
	{
		 
		$globalFunctions=new globalFunctions();
		$ip=self::get_client_ip();
		$attendance=new Attendance;
		$employee=User::find(Auth::user()->id)->employee;
		$office_time=OfficeTime::where('company_id','=',Auth::user()->company->id)->where('status',1)->first();
		$attendance->employee_id=$employee->id;
		$attendance->in_time=date("Y-m-d H:i:s");
		$attendance->network_ip=$ip;
		$attendance->office_time_id=$office_time->id;
		if(Input::get('comment')){
			$attendance->comments=Input::get('comment');
		}
		$employee_id=$employee->id;
		$attendance_employee=DB::select(DB::raw("SELECT * FROM attendances WHERE employee_id=$employee_id AND DATE_FORMAT(in_time,'%Y-%m')=DATE_FORMAT(now(),'%Y-%m-%d')"));
		if(isset($attendance_employee[0]->in_time)){
			$message=$globalFunctions->globalMessage('You are already punch in for today.','success');
			
		}
		else{
			if($attendance->save()){
				Session::forget('in_time');
				$message=$globalFunctions->globalMessage('Operation success!.','success');
				$message="<div class='alert alert-success alert-dismissible' role='alert'>
							 <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
							Operation success!.</div>";
			}
			else{
				$message=$globalFunctions->globalMessage('Operation not success!.','danger');
				
			}
		}
		
		Session::flash('message',$message);
		return Redirect::to('attendance');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function getComment(){
		$id = Input::get('id');
		$in_time=Input::get('in_time');
		$comment= Attendance::where('id','=',$id)->where('in_time','=','$in_time','OR')->first();
		exit(json_encode($comment));
	}
	public function postPunchout()
	{
		
		$globalFunctions=new globalFunctions();
		$user=User::find(Auth::user()->id);
		$employee_id=$user->employee->id;
		$in_time=Input::get('in_time');
		$affectedRows=0;
		$out_time=date("Y-m-d H:i:s");
		$attendance=DB::select(DB::raw("SELECT * FROM attendances WHERE  employee_id=$employee_id AND DATE_FORMAT(in_time,'%Y-%m-%d')=DATE_FORMAT('$in_time','%Y-%m-%d')"));
		if(isset($attendance[0]->out_time)){
			$message=$globalFunctions->globalMessage('You are already punch out for today!.','danger');
			
		}
		else{
			if(null!==(Input::get('comment'))){
				$affectedRows = Attendance::where('id', '=',$attendance[0]->id)->orWhere('in_time','=',$in_time)->update(['out_time' =>$out_time,'comments'=>Input::get('comment')]);
			}

			else{
				$affectedRows = Attendance::where('id', '=',$attendance[0]->id)->orWhere('in_time','=',$in_time)->update(['out_time' =>$out_time]);
			}

			if($affectedRows>0){
				$message=$globalFunctions->globalMessage('Operation success!.','success');
				
			}
			else{
				$message=$globalFunctions->globalMessage('Operation not success!.','danger');
				
			}
			
		}
		Session::flash('message',$message);
		return Redirect::to('attendance');
		
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

	public function get_client_ip() {
	    $ipaddress = '';
	    if (getenv('HTTP_CLIENT_IP'))
	        $ipaddress = getenv('HTTP_CLIENT_IP');
	    else if(getenv('HTTP_X_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	    else if(getenv('HTTP_X_FORWARDED'))
	        $ipaddress = getenv('HTTP_X_FORWARDED');
	    else if(getenv('HTTP_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_FORWARDED_FOR');
	    else if(getenv('HTTP_FORWARDED'))
	       $ipaddress = getenv('HTTP_FORWARDED');
	    else if(getenv('REMOTE_ADDR'))
	        $ipaddress = getenv('REMOTE_ADDR');
	    else
	        $ipaddress = 'UNKNOWN';
	    return $ipaddress;
	}
	
	function getAttendanceReport(){
		if(Auth::user()->role->name=='superadmin')
		{
			$users = User::where('active', '=', 1)->get();
		}
		else
		{
			$users = User::where('active', '=', 1)->where('company_id',Auth::user()->company_id)->get();
		}
		$employee_list = array();
		foreach($users as $user){
			$employee_list[$user->employee->id] = $user->employee->first_name.' '.$user->employee->last_name;
		}
		$tbody = "<tr><td colspan='5'>No record(s) found</td></tr>";
		$footer="";
		$data = array(
			'employee_list' => $employee_list,
			'tbody' => $tbody,
			'footer'=>$footer,
			'start_date'=>'',
			'end_date'=>'',
			'printing_markup'=>''
		);
		
		//Input::replace(array('start_date' => date('F d,Y'),'end_date'=>date('F d,Y')));
		Input::replace(array('start_date' => date('Y-m-d'),'end_date'=>date('Y-m-d')));
		return view('attendance.attendance_report')->with($data)->withInput(Input::all());
	}
	
	function postAttendanceReport(){
		$employee_id= Input::get('employee_id');
		if($employee_id=='default')
		{
			$globalFunctions=new globalFunctions();
			$message=$globalFunctions->globalMessage('Please Select an employee!.','danger');
			Session::flash('message',$message);
			return Redirect::to('attendance/attendance-report');
				
		}
		else
		{
			/*Getting Public Holiday List*/
			$company_id=Auth::user()->employee->company_id;
			$holidays=Holiday::where('company_id','=',Auth::user()->company->id)->where('status',1)->get();
			$holiday_list=array();
			foreach($holidays as $holiday){
				for($i=0;$i<$holiday->holiday_total;$i++)
				{
					$holiday_list[date('Y-m-d',strtotime("+$i day", strtotime($holiday->holiday_start_date)))]=$holiday->holiday_name;
				}	
			}
 			/*end*/
 			
			/*Getting employee list*/
			$users = User::where('active', '=', 1)->get();
			$employee_list = array();
			foreach($users as $user){
				$employee_list[$user->employee->id] = $user->employee->first_name.' '.$user->employee->last_name;
			}
			/*end*/		
			$employee_id= Input::get('employee_id');
			$start_date=Input::get('start_date');
			$end_date=Input::get('end_date');
			/*Getting casual holiday list*/
			$leave_list=array();
			$user_id=Auth::user()->id;
			$casual_leaves=DB::select(DB::raw("SELECT * FROM leaves WHERE user_id=$user_id AND approval='accept' AND DATE_FORMAT(leave_start_date,'%Y-%m-%d') BETWEEN '$start_date' AND '$end_date'"));
			foreach($casual_leaves as $casual_leave)
			{
				for($i=0;$i<$casual_leave->leave_days_count;$i++)
				{
					$leave_list[date('Y-m-d',strtotime("+$i day", strtotime($casual_leave->leave_start_date)))]="On Leave";
				}
				
			}
			/*End*/
			
			//$attendance = DB::select(DB::raw("SELECT * FROM attendances WHERE employee_id=$employee_id AND DATE_FORMAT(in_time,'%Y-%m-%d') BETWEEN '$start_date' AND '$end_date'"));
			$attendance = DB::select(DB::raw("SELECT * FROM attendances,office_times WHERE attendances.office_time_id=office_times.id AND  attendances.employee_id=$employee_id AND DATE_FORMAT(attendances.in_time,'%Y-%m-%d') BETWEEN '$start_date' AND '$end_date'"));
		 	$tbody = "";
			$footer="";
			if(count($attendance) > 0){
				$count=count($attendance);
				$day=$start_date;
				$date1 = new \DateTime($start_date);
				$date2 = new \DateTime($end_date);
				$date_difference=$date1->diff($date2)->days;
				$j=0;
				$total_present=0;
				$total_absent=0;
				$total_friday=0;
				$total_paidLeave=0;
				$total_holiday=0;
				$inTime_label="";
				$outTime_label="";
				for($i=1;$i<=$date_difference+1;$i++)
				{	
					if($j==$count)
					{	
						$j=0;
					}
					if(date('Y-m-d',strtotime($attendance[$j]->in_time))==$day)
					{	
						$office_time=SELF::OfficeTime($attendance[$j]->office_time_id);
						$outTime_label="";
						$total_present++;
						if(date('H:i:s ',strtotime($attendance[$j]->in_time))>date('H:i:s ',strtotime($office_time->office_intime)))
						{
							$inTime_label="<span class='label label-danger'>Late Entry</span>";
						}
						else
						{
							$inTime_label="";
						}
						if(isset($attendance[$j]->out_time))
						{
							if(date('H:i:s ',strtotime($attendance[$j]->out_time))<date('H:i:s ',strtotime($office_time->office_intime)))
							{
								$outTime_label="<span class='label label-danger'>Early Leave</span>";
							}
							
							$out_time=date('Y-m-d @ h:i:s a',strtotime($attendance[$j]->out_time));
						}
						else
						{		
							$outTime_label="<span class='label label-danger'>Did not signOut</span>";
							$out_time="";
						}
						$comment=$attendance[$j]->comments ? $attendance[$j]->comments : 'No Comment';
						$attendance_id=$attendance[$j]->id;
						$tbody.="<tr><td>".date('d M, Y (D)',strtotime($attendance[$j]->in_time))."</td><td>".date('Y-m-d @ h:i:s a',strtotime($attendance[$j]->in_time))." $inTime_label</td><td>".$out_time." $outTime_label</td><td class='comment'><button type='button' class='btn btn-info btn-xs' data-container='body' data-toggle='popover' data-placement='top' data-content='$comment'><i class='fa fa-eye'></i>
</button></td><td>".$attendance[$j]->network_ip."</td></tr>";
						$j++;
					}
					else
					{
						if(array_key_exists($day, $holiday_list))
						{
							
							$tbody.="<tr class='warning'><td>".date('d M, Y (D)',strtotime($day))."</td><td colspan='4' class='text-center'>".$holiday_list[$day]."</td></tr>";
							$total_holiday++;
					
						}
						else if(array_key_exists($day, $leave_list))
						{
							$tbody.="<tr class='info'><td>".date('d M, Y (D)',strtotime($day))."</td><td colspan='4' class='text-center'>".$leave_list[$day]."</td></tr>";
							$total_paidLeave++;
						}
						else if(date('w',strtotime($day))==5 )
						{	
							$tbody.="<tr class='warning'><td>".date('d M, Y (D)',strtotime($day))."</td><td colspan='4' class='text-center'>Friday</td></tr>";	
							$total_friday++;
						}
						else
						{	
							$tbody.="<tr class='danger'><td>".date('d M, Y (D)',strtotime($day))."</td><td colspan='4' class='text-center'>Absent</td></tr>";
						}	
					}
					$day=date('Y-m-d',strtotime("+$i day", strtotime($start_date)));
					 
				}
				$total_absent=$date_difference+1-($total_friday+$total_paidLeave+$total_holiday+$total_present);
				//$tbody.="<tr><td>Total present: $total_present day(s)</td><td>Total holiday: $total_holiday day(s)</td><td>Total Leave: $total_paidLeave day(s)</td><td>Total absent: $total_absent day(s)</td></tr>";
				$footer.="Total present: $total_present day(s) | Total holiday: $total_holiday day(s) | Total Leave: $total_paidLeave day(s) | Total absent: $total_absent day(s)";			
				$footer.="<div class='pull-right'>Report generated on ".date('d,F Y @ h:i:s a')."</div>";
			}
			else{
				$tbody .= "<tr><td colspan='4'>No record(s) found</td></tr>";
			}
			$employee=Employee::find($employee_id);
			if($employee->company->slogan)
			{
				$slogan="<tr><td>Company Slogan:  ".$employee->company->slogan."</td><td>Employee ID: ".$employee->employee_identifier."</td></tr><tr><td>Address: ".$employee->company->address."</td><td>Report Date: ".date('d F, Y',strtotime(Input::get('start_date')))." to ".date('d F, Y',strtotime(Input::get('end_date')))."</td></tr>";
			}
			else
			{
				$slogan="<tr><td>Address: ".$employee->company->address."</td><td>Employee ID: ".$employee->employee_identifier."</td></tr><tr><td></td><td>Report Date: ".date('d F, Y',strtotime(Input::get('start_date')))." to ".date('d F, Y',strtotime(Input::get('end_date')))."</td></tr>";;
			}
			$photo='';
			if($employee->company->logo)
			{	
				$path='uploads/'.$employee->company->logo;
				if (File::exists ( $path )) {
				$photo = "<img src='" . asset ( $path ) . "' width='90'/>";
				}
			}
			$printing_markup="<div class='pull-left'>".$photo."</div><table width='100%'><tr><th width='50%'></th><th width='50%'></th></tr><tr><td>Company Name: ".$employee->company->title."</td><td>Employee Name: ".$employee->first_name." ".$employee->last_name."</td></tr>".$slogan."</table>";
			
			
			$data = array(
				'employee_list' => $employee_list,
				'tbody' => $tbody,
				'footer'=>$footer,
				'start_date'=>date('d F, Y',strtotime(Input::get('start_date'))),
				'end_date'	=>date('d F, Y',strtotime(Input::get('end_date'))),
				'printing_markup'=>$printing_markup
				
			);

			return view('attendance.attendance_report')->with($data)->withInput(Input::all());
		}
	}

	public function OfficeTime($office_time_id)
	{
		return OfficeTime::where('company_id','=',Auth::user()->company->id)->where('id',$office_time_id)->first();
	}

}
