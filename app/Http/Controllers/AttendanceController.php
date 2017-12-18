<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Semester;
use App\Week;
use App\Attendance;

class AttendanceController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request) {
    	$users = User::where('group_id', Auth::User()->group_id)->get();
        $semesters = Semester::orderBy('endDate', 'desc')->get();
        if($request->has('semester_id')){
           $semester = Semester::find($request->input('semester_id')); 
        } else {
           $semester = $semesters->where('startDate','<=',Carbon::today()->toDateString())->orderBy('endDate', 'desc')->first();
        }
    	$weeks = Week::where('semester_id', $semester->id)->get();

    	return view('attendance.showAttendance', compact('weeks', 'users', 'semesters', 'semester'));
    }

    public function show($user_id, $week_id) {
    	return 'okej';
    }

    public function store($user_id, $week_id) {
    	$attendance = new Attendance;
    	$attendance->user_id = $user_id;
    	$attendance->week_id = $week_id;
    	$attendance->value = 1;

    	$attendance->save();

    	return $attendance->value;
    }

    public function update($user_id, $week_id) {

    	Attendance::where('user_id', $user_id)->where('week_id', $week_id)->update(['value'=> 0]);
    	return 0;
    }

    public function delete($user_id, $week_id) {

    	Attendance::where('user_id', $user_id)->where('week_id', $week_id)->delete();
    	return null;
    }
}
