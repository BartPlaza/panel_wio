<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Week;
use Carbon\Carbon;

class Semester extends Model
{

	public function weeks() {

		return $this->hasMany(Week::class);
	}

    public function generateWeeks() {

    	$startDate = Carbon::parse($this->startDate);
    	$endDate = Carbon::parse($this->endDate);
    	$semesterId = $this->id;
    	$counter = 1;

    	for ($i=$startDate; $i<=$endDate;) {
    		$week = new Week;
    		$week->semester_id = $semesterId;
    		$week->name = 'T'.$counter;
      		$week->date = $i;
    		$week->save();
			$counter++;
    		$i = $i->addDays(7);
    	} 
    }
}
