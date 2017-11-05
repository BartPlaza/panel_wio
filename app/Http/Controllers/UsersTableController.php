<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class UsersTableController extends Controller
{
	public function __construct(){

		$this->middleware('auth');

	}

    public function show(){

    	$users = User::all();

    	return view('workspace.usersTable', compact('users'));
    }

    public function filter(Request $request){

    	$users = User::all();

    	if($request->input('sex_filter') != '') {
    		$users = $users->where('sex', $request->input('sex_filter'));
    	}

    	if($request->input('age_filter') != '') {

    		$age = explode("|", $request->input('age_filter'));
    		$minAge = $age[0];
    		$maxAge = $age[1];

    		$minDate = Carbon::today()->subYears($maxAge);
    		$maxDate = Carbon::today()->subYears($minAge);



    		$users = $users->where('birthDate','>', $minDate)->where('birthDate','<', $maxDate);
    	}

    	return view('workspace.usersTable', compact('users'));
    }

    public function addUser(){

    	return view('workspace.addUser');

    }

    public function store(Request $request){

    	$this->validate($request,[
    		'name'=>'required',
    		'surname'=>'required',
    		'email'=>'required|unique:users,email',
    		'sex'=>'required',
    		'birthDate'=>'required'
    		], $messages = ['name.required'=>'Imię jest wymagane',
    						'surname.required'=>'Nazwisko jest wymagane',
    						'email.required'=>'Adres email jest wymagany',
    						'email.unique'=>'Adres email jest już w bazie',
    						'sex.required'=>'Płeć jest wymagana',
    						'birthDate.required'=>'Data urodzenia jest wymagana']);

    	$user = new User();

    	$user->name = $request->input('name');
    	$user->surname = $request->input('surname');
    	$user->email = $request->input('email');
    	$user->phone = $request->input('phone');
    	$user->sex = $request->input('sex');
    	$user->birthDate = $request->input('birthDate');

    	$user->save();

    	return redirect('/panel/usersTable');

    }

}
