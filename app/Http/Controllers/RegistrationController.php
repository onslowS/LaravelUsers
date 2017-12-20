<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

Use App\User;

class RegistrationController extends Controller
{
	// Handles get request for register page
	// If already logged in show the create template
	// Else just redirect them home
    public function create()
    {
    	if(Auth::check()) {
    		return redirect()->home();
    	} else {
    		return view('sessions.create');
    	}
    }
    // Handles post request for register page
	// Sets the fields they require and then saves the user if they've met the requirement
	// Then redirects to home
    public function store()
    {
    	$this->validate(request(), [
    		'name' => 'required',
    		'email' => 'required|email',
    		'password' => 'required',
    		'type' => 'required'
    	]);

    	$user = User::create([
			'name' => request('name'),
			'email' => request('email'),
			'password' => bcrypt(request('password')),
			'type' => request('type')
		]);

    	auth()->login($user);

    	return redirect()->home();
    }
}

