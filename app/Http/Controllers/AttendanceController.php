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
    public function index() {

    	$users = User::where('group_id', Auth::User()->group_id)->get();
    	$semester = Semester::orderBy('endDate', 'desc')->first();
    	$weeks = Week::where('semester_id', $semester->id)->get();

    	return view('attendance.showAttendance', compact('weeks', 'users'));
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
