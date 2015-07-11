<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\library\globalFunctions;
use Input;
use Validator;
use Redirect;
use Session;
use DB;
use Date;
use stdClass;
use Illuminate\Http\Request;
use App\Company;
use App\Holiday;


class HolidayController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
		if(Auth::user()->role->name=='admin' || Auth::user()->role->name=='employee')
		{
			$company_id=Auth::user()->company->id;
			$holidays=DB::select(DB::raw("SELECT * FROM holidays WHERE company_id='$company_id' AND DATE_FORMAT(holiday_start_date,'%Y')=DATE_FORMAT(now(),'%Y') AND status=1  ORDER BY id ASC"));
		}
		else
		{
			$holidays=DB::select(DB::raw("SELECT * FROM holidays WHERE  DATE_FORMAT(holiday_start_date,'%Y')=DATE_FORMAT(now(),'%Y') AND status=1  ORDER BY id ASC"));
		}
		if(count($holidays)<=0)
		{
			return view('holiday.no_holiday');
		}
		$holiday=new stdClass();
		$holiday->title=$holidays[0]->holiday_name;
		$holiday->start=date('Y, m, d',strtotime($holidays[0]->holiday_start_date));
		$event=array();
		foreach($holidays as $holiday)
		{
			
			$temp= new stdClass;
			$temp->id=$holiday->id;
			$temp->title=$holiday->holiday_name;
			$temp->start=date('Y-m-d',strtotime($holiday->holiday_start_date));
			$temp->end=date('Y-m-d',strtotime("+1 day",strtotime($holiday->holiday_end_date)));	
			$temp->allDay=true;
			$event[]=$temp;
		} 
		// echo "<pre>";
		// exit(print_r($event));
		return view('holiday.index')->with('holidays',json_encode($event));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('holiday.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules=array(
			'holiday_start_date'=>'required',
			'holiday_end_date'=>'required',
			'holiday_name'=>'required'
			);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::to('holiday/create')
                ->withErrors($validator)->withInput ();
		}
		else{
			$globalFunctions=new globalFunctions();
			$holiday=new Holiday;
			$holiday->holiday_start_date=date('Y-m-d',strtotime(Input::get('holiday_start_date')));
			$holiday->holiday_end_date=date('Y-m-d',strtotime(Input::get('holiday_end_date')));
			$holiday->holiday_name=Input::get('holiday_name');
			$date1 = new \DateTime(Input::get('holiday_start_date'));
			$date2 = new \DateTime(Input::get('holiday_end_date'));
			$date_difference=($date1->diff($date2)->days)+1;
			$holiday->holiday_total=$date_difference;
			$holiday->holiday_year=date('Y',strtotime(Input::get('holiday_start_date')));
			$holiday->status=Input::get('status');
			$holiday->company_id=Auth::user()->company_id;
			if($holiday->save())
			{
				$message=$globalFunctions->globalMessage('Holiday has been successfully inserted','success');

			}
			else
			{
				$message=$globalFunctions->globalMessage('Holidaye has not been successfully inserted','danger');

			}
			Session::flash('message',$message);
			return Redirect::to('holiday');
		}
		
	}
	
	/*Edit Holiday*/
	public function holiday()
	{
		$globalFunctions=new globalFunctions();
		$holiday_id=Input::get('hdn_holiday_id');
		$holiday=Holiday::find($holiday_id);
		$holiday->holiday_start_date=Input::get('holiday_start_date');
		$holiday->holiday_end_date=Input::get('holiday_end_date');
		$holiday->holiday_name=Input::get('holiday_name');
		$date1 = new \DateTime(Input::get('holiday_start_date'));
		$date2 = new \DateTime(Input::get('holiday_end_date'));
		$date_difference=($date1->diff($date2)->days)+1;
		$holiday->holiday_total=$date_difference;
		$holiday->holiday_year=date('Y',strtotime(Input::get('holiday_start_date')));
		$holiday->company_id=Auth::user()->company_id;
		if($holiday->save())
		{
			$message=$globalFunctions->globalMessage('Holiday has been successfully updated','success');

		}
		else
		{
			$message=$globalFunctions->globalMessage('Holidaye has not been successfully updated','danger');

		}
		Session::flash('message',$message);
		return Redirect::to('holiday');
	}

	

}
