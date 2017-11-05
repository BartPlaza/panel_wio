<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semester;
use App\Rules\uniqueCombination;
use App\Rules\isDayOfWeek;

class SemesterController extends Controller
{

    public function create() {

    	return view('workspace.addSemester');
    }

    public function store(Request $request) {

    	$this->validate($request, ['year'=>['required', new uniqueCombination('semesters', 'season', $request->input('season'))],
    							   'season'=>'required',
    							   'startDate'=>['required','date','unique:semesters,endDate', new isDayOfWeek(4)],
    							   'endDate'=>['required','date','unique:semesters,startDate', new isDayOfWeek(4)]], $messages = ['year.required'=>'Rok jest wymagany',
    							   																'season.required'=>'Semestr jest wymagany',
    							   																'startDate.required'=>'Data rozpoczęcia jest wymagana',
    							   																'startDate.date'=>'Data rozpoczęcia: wprowadzone dane nie są datą',
    							   																'startDate.unique'=>'Data rozpoczęcia: ta data należy do innego semestru',
    							   																'endDate.required'=>'Data zakończenia jest wymagana',
    							   																'endDate.date'=>'Data zakończenia: wprowadzone dane nie są datą',
    							   															    'endDate.unique'=>'Data zakończenia: ta data należy do innego semestru']);

    	$semester = new Semester;

    	$semester->year = $request->input('year');
    	$semester->season = $request->input('season');
    	$semester->startDate = $request->input('startDate');
    	$semester->endDate = $request->input('endDate');

    	$semester->save();

    	$semester->generateWeeks();



    	return redirect('/panel/calendar');
    }

    public function show($year, $season) {

        $weeks = Semester::where('year', $year)->where('season', $season)->first();
        $weeks = $weeks->weeks;

    	return view('workspace.semester', compact('weeks'));

    }
}
