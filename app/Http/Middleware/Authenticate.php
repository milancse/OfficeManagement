<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;
use Route;
use Request;
class Authenticate {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;

	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		//dd("hi");
		if ($this->auth->guest())
		{
			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
				return redirect()->guest('auth/login');
			}
		}
		
		// echo substr(class_basename(Route::currentRouteAction()), 0, (strpos(class_basename(Route::currentRouteAction()), '@') -0) )."<br/>" ;
		// echo substr(class_basename(Route::currentRouteAction()), (strpos(class_basename(Route::currentRouteAction()), '@') + 1));
		// exit();
		return $next($request);
	}

}
