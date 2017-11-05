<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

	public function __construct(){
		$this->middleware('guest')->except('logout');
	}

    public function loginPage() 
    {
    	return view ('auth.login');
    }

    public function login(Request $request)
    {

    	$this->validate($request,[
    		'email' => 'required',
    		'password' => 'required'
    		], $messages = ['email.required'=> 'Adres email jest wymagany',
    					    'password.required' => 'Hasło jest wymagane']);

    	if(Auth::attempt(['email' => $request->input('email'),
    					  'password' => $request->input('password')])) {

    		return redirect()->route('panel');

    	} 

    	return redirect()->route('login')->with('errorMessage', 'Nieprawidłowa kombinacja danych');
    }

    public function logout()
    {
    	Auth::logout();

    	return redirect('/');
    }
}
