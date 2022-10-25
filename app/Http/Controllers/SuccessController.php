<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;

class SuccessController extends Controller
{
    public function index(){
    	$user = User::find(Session::get('userId'));
    	return view('dashboard', compact('user'));
    }
}
