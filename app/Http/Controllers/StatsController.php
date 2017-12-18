<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semester;
use App\Week;

class StatsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(Request $request){

    	$semesters = Semester::orderBy('endDate', 'desc')->get();
    	if($request->has('semester_id')){
           $semester = Semester::find($request->input('semester_id')); 
        } else {
           $semester = $semesters->first();
        }
    	$weeks = Week::where('semester_id', $semester->id)->get();

    	return view('stats.stats', compact('weeks', 'semester', 'semesters'));
    }
}
