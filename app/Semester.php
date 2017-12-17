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

    public function getPresentUsers(){
        $array = [];
        $weeks = $this->weeks;

        foreach($weeks as $week){
            array_push($array, $week->presentUsers());
        };
        return json_encode($array);
    }

    public function getAllUsers(){
        $array =[];
        $weeks = $this->weeks;

        foreach($weeks as $week){
            array_push($array, $week->allUsers());
        };
        return json_encode($array);
    }

    public function getUsersBySex($sex){
        $array =[];
        $weeks = $this->weeks;

        foreach($weeks as $week){
            array_push($array, $week->getUsersBySex($sex));
        };
        return json_encode($array);
    }

}
