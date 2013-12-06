<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{

		$contacts = Contact::where('user_id1', '=', Auth::user()->id)->where('accepted', '=', 1)->get();

		// $infoContact[] = "No contact accepted";

		if($contacts){
			foreach ($contacts as $contact) {
				$infoContact[] = User::find($contact->user_id2);
			}
		}
		return View::make('hello')->with('contacts', $infoContact);
	}

}