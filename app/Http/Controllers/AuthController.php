<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exceptions\ValidationException;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Input;

class AuthController extends Controller
{
    public function getLogin(){
        return view('login');
    }

    public function postLogin(){
    	if (Auth::attempt(Input::only('email', 'password'))) {
    		return redirect('/');
    	}
    }

    public function anyLogout(){
    	Auth::logout();
    	return redirect('/');
    }
}
