<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Mail;
use App\library\globalFunctions;
use Input;
use App\User;
use App\UserProfile;
use Session;
use Redirect;
use Validator;
use Crypt;
use Hash;
class PasswordController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset requests
	| and uses a simple trait to include this behavior. You're free to
	| explore this trait and override any methods you wish to tweak.
	|
	*/

	use ResetsPasswords;

	/**
	 * Create a new password controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\PasswordBroker  $passwords
	 * @return void
	 */
	public function __construct(Guard $auth, PasswordBroker $passwords)
	{
		
		$this->auth = $auth;
		$this->passwords = $passwords;
		$this->middleware('guest');
	}

	public function getEmail()
	{
		return view('password.password_reset_email');
	}

	public function postCheckEmail()
	{
		
		$email=Input::get('email');
		$user=User::where('email','=',$email)->first();
		if($user)
		{
			$globalFunctions=new globalFunctions();
			$secret_key=$user->id."|".date('Y-m-d h:i:s');
			$encrypted_key = Crypt::encrypt($secret_key);
			$name=$user->employee->first_name;
			$data=array(
			'encrypted'=>$encrypted_key,
			'name'=>$name
			);
			$mail=Mail::send("password.reset",$data, function($message)
					{
					    $message->from('noreply@smartwebsource.com', 'Laravel')->to(Input::get('email'), 'Mail from Smart Time Tracker')->subject('Password Reset');
					   
					});
			if($mail)
			{
				$message =$globalFunctions->globalMessage("An email has been sent to ".Input::get('email')." ",'info');
				
			}
		}
				
		else 
		{
			$globalFunctions=new globalFunctions();
			$message =$globalFunctions->globalMessage("Invalid email! ",'danger');
			
		}
		Session::flash('flash_message',$message);
		return Redirect::to('password/email');
	}
	public function getResetPassword($secret_key=null)
	{
		
		$data=array(
			'secret_key'=>$secret_key
			);
		return view('password.password_reset_form')->with($data);
		
	}

	public function postSavePassword()
	{
		$secret_key=Input::get('secret_key');
		$decrypted_value=explode('|',Crypt::decrypt($secret_key));
		$date1 = $decrypted_value[1];
		$date2 = date('Y-m-d h:i:s'); 
		$diff = strtotime($date2) - strtotime($date1);
		$diff_in_hrs = $diff/3600;
		$rules=[
				'password' => 'required|same:confirm_password',
				'confirm_password' => 'required' 
		];
		$validator = Validator::make ( Input::all(), $rules );
		
		if ($validator->fails ()) {
			return redirect ()->back ()->withErrors ( $validator )->withInput ();
		} 
		else if($diff_in_hrs>24)
		{
			return view('errors.404');
		}	
		else
		{
			$globalFunctions=new globalFunctions();
			$id= $decrypted_value[0];
			$user=User::find($id);
			$user->password=Hash::make(Input::get('password'));
			if($user->save())
			{
				$message =$globalFunctions->globalMessage("Your password has been successfully reset.",'info');
				
			}

			Session::flash('flash_message',$message);
			return view('auth.login');
			
		}
	}

}
