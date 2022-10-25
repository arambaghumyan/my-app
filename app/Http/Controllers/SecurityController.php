<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserSigninRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;

class SecurityController extends Controller
{
	public function index() {
		return view('welcome');
	}
    public function login(UserSigninRequest $request){
    	$login = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

    	$user = User::where($login, $request->login)->first();
    	if ($user) {
	    	if (Hash::check($request->password, $user->password)){
	    		$request->session()->put('userId', $user->id);
	    		return redirect('/');
	    	} else {
	    		return back()->with('fail', 'Password not matches.');
	    	}
    	} else {
    		return back()->with('fail', 'The email or username is not registered.');
    	}
    }

    public function logout(){
    	if (Session::has('userId')) {
    		Session::pull('userId');
    		return redirect('/');
    	}
    }
}
