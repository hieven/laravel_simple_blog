<?php

class AuthController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getLogin()
	{
		return View::make('auth.login');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function getRegister()
	{
		return View::make('auth.register');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function postLogin()
	{
		try
		{
		    // Login credentials
		    $credentials = array(
		        'email'    => Input::get('email'),
		        'password' => Input::get('password')
		    );

		    $rules = array(
		    	'email' 	=> 'required',
		    	'password' 	=> 'required'
		    );

		    $validator = Validator::make($credentials, $rules);

		    if($validator->passes())
		    {
		    	 // Authenticate the user
			    $user = Sentry::authenticate($credentials, false);

			    return Redirect::to('post');	     

		    }

		    return Redirect::to('login')->withErrors($validator)->withInput(Input::except('password'));
		    
		}
		catch (\Exception $e)
		{
		    return Redirect::to('/');
		}

	}


	/**
	 * Display the specified resource.
	 *
	 * @return Response
	 */
	public function postRegister()
	{
		$user = array(
            'email'     	=> Input::get('email'),
            'password'  	=> Input::get('password'),
            'first_name'	=> Input::get('first_name'),
            'last_name' 	=> Input::get('last_name'),
            'activated' 	=> false,
	    );

		$validator = Validator::make($user, User::$rules);

		if($validator->passes()){
			

			$user = Sentry::createUser($user);


			Mail::send('emails.auth.activate', ['user' => $user], function($message) use ($user)
			{
			    $message->to($user['email'], $user['first_name'] .' '. $user['last_name'])->subject('Welcome!');
			});

			return Redirect::to('login');

		   
		    
		} 

		return Redirect::to('register')->withErrors($validator)->withInput(Input::except('password'));

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function logout()
	{
		Sentry::logout();
		return Redirect::to('login');
	}


	public function activated($id)
	{
		$user = Sentry::findUserById($id);
		$user->activated = true;
		$user->save();
		$user = Sentry::authenticate($credentials, false);
		return Redirect::to('/');
	}

}
