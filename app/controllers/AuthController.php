<?php

class AuthController extends BaseController{
	
	public function login(){


		$user = User::where('username', '=', Input::get('username'))->firstOrFail();

		Auth::loginUsingId($user->id);

		return View::make('hello')->with('user', $user);

		// if (Auth::attempt(array('username' => Input::json('username'), 'password' => Input::json('password')))){
	    	
		// 	return Response::json( Auth::user() ) ;

		// }
		// else{

		// 	return Response::json( array('flash' => 'Wrong username-password combination.'), 401 ) ;

		// }
	}

	public function logout(){

		Auth::logout() ;

		return Response::json( array('flash' => 'You\'ve logged out!') ) ;

	}
}