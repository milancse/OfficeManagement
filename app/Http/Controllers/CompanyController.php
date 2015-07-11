<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\library\globalFunctions;
use Validator;
use Input;
use Redirect;
use Illuminate\Http\Request;
use App\Company;
use App\User;
use Session;
use File;
//use App\library\globalFunctions;
class CompanyController extends Controller {

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
		if(Auth::user()->role->name=='employee')
		{
			return Redirect::to('dashboard');
		}
		if(Auth::user()->role->name=='admin')
		{
			$company_id=Auth::user()->company->id;
			$company=Company::where('id','=',$company_id)->orderBy('created_at','desc')->paginate(10);
		}
		else
		{
			$company=Company::orderBy('created_at','desc')->paginate(10);
		}
		return view('company.index')->with('companies',$company);
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$company=Company::all();
		return view('company.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//$globalObj=new globalFunctions();
		$rules=array(
			'title'=>'required',
			'mobile'=>'required|numeric',
			'office_start_time'=>'required',
			'office_end_time'=>'required',
			'office_time_zone'=>'required',
			'email'=>'required|email',
			'logo'=>'mimes:jpeg,jpg,png|max:800'
			
			);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::to('company/create')
                ->withErrors($validator)->withInput ();
		}
		else{
			$globalFunctions=new globalFunctions();
			$company=new Company;
			$company->title=Input::get('title');
			$company->office_time_zone=Input::get('office_time_zone');
			$company->office_start_time=Input::get('office_start_time');
			$company->office_end_time=Input::get('office_end_time');
			$company->address=Input::get('address');
			$company->phone=Input::get('phone');
			$company->mobile=Input::get('mobile');
			$company->email=Input::get('email');
			$company->fax=Input::get('fax');
			$company->web=Input::get('web');
			$company->slogan=Input::get('slogan');
			$company->active=Input::get('active');
			$filename="";
			if(Input::file('logo'))
			{
				$logo_name=Input::file('logo');
				$destinationPath='uploads/';
				$filename = date ( 'ymdhis' ) . '.' . $logo_name->guessClientExtension ();
				Input::file ( 'logo' )->move ( $destinationPath, $filename );
				
			}

			$company->logo=$filename;
			if($company->save())
			{
					
				$user=User::find(Auth::user()->id);
				Session::put('company_name',$user->employee->company->title);
				$message=$globalFunctions->globalMessage(' Company has been created successfully!.','success');
				
			}
			else{
				$message=$globalFunctions->globalMessage(' Company has not been created successfully!.','danger');
			
			}
			Session::flash('message', $message);
		    return Redirect::to('company');
		}
		
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$company=Company::find($id);
		return view('company.company_details')->with('company',$company);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$company=Company::find($id);

		if($company->logo)
		{
			
			$path='uploads/'.$company->logo;
			if (File::exists ( $path )) {
			$photo = "<img src='" . asset ( $path ) . "'/>";
			$company->logo=$photo;
			}

		}
		
		return view('company.create')->with('company',$company);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
		$rules=array(
			'title'=>'required',
			'mobile'=>'required|numeric',
			'office_start_time'=>'required',
			'office_end_time'=>'required',
			'office_time_zone'=>'required',
			'email'=>'required|email',
			'logo'=>'mimes:jpeg,jpg,png|max:1024'
			
			);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::to('company/create')
                ->withErrors($validator)->withInput ();
		}
		else{
			$globalFunctions=new globalFunctions();
			$company=Company::find($id);
			$company->title=Input::get('title');
			$company->office_time_zone=Input::get('office_time_zone');
			$company->office_start_time=Input::get('office_start_time');
			$company->office_end_time=Input::get('office_end_time');
			$company->address=Input::get('address');
			$company->phone=Input::get('phone');
			$company->mobile=Input::get('mobile');
			$company->email=Input::get('email');
			$company->fax=Input::get('fax');
			$company->web=Input::get('web');
			$company->active=Input::get('active');
			$company->slogan=Input::get('slogan');
			$filename="";
			if(Input::file('logo'))
			{
				$logo_name=Input::file('logo');
				$destinationPath='uploads/';
				$filename = date ( 'ymdhis' ) . '.' . $logo_name->guessClientExtension ();
				Input::file ( 'logo' )->move ( $destinationPath, $filename );
				if ($company->logo) {
					$photo_name = $company->logo;
					$path = 'uploads/' . $photo_name;
					if (File::exists ( $path )) {
						unlink ( $path );
					}
				}	
			}

			else {
				if(Input::get('photo_id')=="")
				{
					if ($company->logo) {
						$photo_name = $company->logo;
						$path = 'uploads/' . $photo_name;
						if (File::exists ( $path )) {
							unlink ( $path );
						}
					}

				}
				else{
					$filename=$company->logo;
				}

			}	
			$company->logo=$filename;
			if($company->save())
			{
				
				$user=User::find(Auth::user()->id);
				if($user->employee->company->logo)
				{
					$path='uploads/'.$user->employee->company->logo;
					Session::put('company_logo',asset($path));

				}
				else{
					Session::forget('company_logo');
					Session::put('company_name',$user->employee->company->title);

				}
				
				$message=$globalFunctions->globalMessage('Company has been updated successfully!.','success');
				
			}
			else{
				$message=$globalFunctions->globalMessage('Company has not been updated successfully!.','danger');
				
			}
			Session::flash('message',$message);
		    return Redirect::to('company');
		}
		
	}

	public function settings (){
		$company=Auth::user()->company;
		if($company->logo)
		{
			
			$path='uploads/'.$company->logo;
			if (File::exists ( $path )) {
			$photo = "<img src='" . asset ( $path ) . "'/>";
			$company->logo=$photo;
			}

		}
		return view('company.create')->with('company',$company);
		
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
