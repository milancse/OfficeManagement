<?php namespace App\Http\Controllers;
use App\library\globalFunctions;
use App\Leave;
use Session;
use URL;
use App\User;
use Auth;
class DashboardController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		/*Get leave application if available*/
		$leave_message="";
		$photo="";
		$applications=Leave::where('read_unread','=',0)->where('approval','pending')->orderBy('leave_application_date','DESC')->get();
		foreach($applications as $application)
		{
			if(isset($application->user->employee->photo))
			{
				$photo_path='uploads/'.$application->user->employee->photo;
				$photo = "<img src='" . asset ( $photo_path ) . "'class='img-circle' alt='User Image'/>";
			}
			
			$route=URL::to('leave/detail',array($application->id));
			$short_description=substr($application->description,0,30).'....';
			$leave_message.="<li>	
								<a href=".$route.">
									<div class='pull-left'>
										".$photo." 
									</div>
									<h4>
										".$application->user->employee->first_name.' '.$application->user->employee->last_name."<br>
										".$short_description."
									</h4>
									<input type='hidden' name='hdn_value' value=1>
								</a>
							</li>";
		}
		/*End*/
		$user=User::limit(5)->where('company_id','=',Auth::user()->company->id)->get();
		// echo "<pre>";
		// exit(print_r($user));
		//$employee=$user->employee->where('company_id','=',$user->employee->company->id)->get();
		// foreach($user as $u)
		// {
		// 	echo $u->employee->first_name."<br>";
		// }
		// exit();
		$leave=array(
			'application'=>$leave_message,
			'users'=>$user
			);
		Session::put('active','active');
		Session::put('application_number',count($applications));
		return view('dashboard.index')->with($leave);
	}
}
