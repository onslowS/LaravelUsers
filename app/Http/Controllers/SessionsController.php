<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

Use App\User;

class SessionsController extends Controller
{
	//Handles get login request
	//Just display login template
    public function create()
    {
    	return view('sessions.login');
    }
    //Handles the logout request
    //Destroys the user sessions variables and redirects to the homepage
    public function destroy()
    {
    	auth()->logout();
    	return redirect()->home();
    }
    //Handles the post login request
    public function store()
    {
    	if(! auth()->attempt(request(['email', 'password']))) {
    		return back();
    	}
    	return redirect()->home();
    }
    //Handles the get request for the admin page and finds all the users that aren't the current user
    public function admin()
    {
    	$users = User::where('id', '!=', Auth::id())->get();
    	return view('admin.dashboard')->with(compact('users'));
    }
    // Handles the get request with the user id
    // If there's no user it just returns to home 
    public function adminuseredit($id)
    {
    	$user = User::find(request('id'));

    	if ($user == null) {
    		return redirect()->home();
    	} else {
    		return view('admin.user')->with(compact('user'));
    	}
    }
    // Handles the post request and just saves the name, email and type of user
    public function adminusereditconfirm()
    {
    	$user = User::find(request('id'));

		$user->name = request('name');

		$user->email = request('email');

		$user->type = request('type');

		$user->save();

		return back();
    }
    //Handles get request for my profile and shows the page if the user is logged in
    // If they aren't logged in they just redirect them to home
    public function myprofile()
    {
    	if(Auth::check()) {
    		$user = Auth::user();
    		if($user != null){
    			return view('sessions.myprofile');
    		}
    	} else {
    		return redirect()->home();
    	}
    }

    // Handles post selfedit request saves the changes and the redirects to home
    public function selfedit()
    {
    	$user = User::find(Auth::id());

		$user->name = request('name');

		$user->email = request('email');

		$user->type = request('type');

		$user->save();

		return redirect()->home();
    }
}
