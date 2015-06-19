<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exceptions\ValidationException;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Input;

class UserController extends CrudController
{
    protected $class_name = 'App\User';

    public function getRegister() {
        return view('register');
    }

    public function postRegister() {
        try {
            $user = $this->store();
            Auth::login($user);
            return redirect('/');
        } catch(ValidationException $e) {
            return back()->withInput()->with('errors', $e->errors);
        }
    }

}
