<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semester;

class CalendarController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
    public function show() {

    	$semesters = Semester::all();

    	return view('workspace.calendar', compact('semesters'));
    }
}
