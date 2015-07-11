<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use Validator;
use Input;
use Redirect;
use App\TransactionHead;
use Session;
use App\library\globalFunctions;

class TransactionHeadController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Auth::user()->role->name=='employee')
		{
			return Redirect::to('dasboard');
		}
		return view('transaction_head.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		
		$rules=array(
			'title'=>'required'
			);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails())
		{
			return Redirect::to('transaction/create')
                ->withErrors($validator)->withInput ();
		}
		else
		{
			$globalFunctions=new globalFunctions();
			if($request->head_type=='income')
			{
				$check_title_with_type_head=TransactionHead::where('title','=',$request->title)->where('head_type','income')->get();
			}
			else if($request->head_type=='expense')
			{
				$check_title_with_type_head=TransactionHead::where('title','=',$request->title)->where('head_type','expense')->get();
			}
			if(count($check_title_with_type_head)>0)
			{
				
				$message=$globalFunctions->globalMessage('This title is already used for this head type!.','danger');
				Session::flash('message',$message);
				return Redirect::to('transaction/create')->withInput ();
			}
			else
			{
				$transaction_head=new TransactionHead;
				$transaction_head->company_id=Auth::user()->company->id;
				$transaction_head->title=$request->title;
				$transaction_head->head_type=$request->head_type;
				$transaction_head->details=$request->details;
				$transaction_head->created_by=Auth::user()->id;
				if($transaction_head->save())
				{
					
					$message=$globalFunctions->globalMessage(' Transaction Head has been created successfully!.','success');
				}
				else
				{
					$message=$globalFunctions->globalMessage(' Transaction Head has not been created successfully!.','danger');
				}
			}

			Session::flash('message',$message);
			return view('transaction_head.create');
		}
		
		/*else{
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
		}*/
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
