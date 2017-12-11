<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    public function semester() {

    	return $this->belongsTo(Semester::class);
    }

    public function attendances() {
    	return $this->hasMany(Attendance::class);
    }

    public function simpleDate() {
    	$date = Carbon::parse($this->date);
    	return $date->format('d.m');
    }

    public function nextDate() {
    	$today = Carbon::now();
    	$date = Carbon::parse($this->date);
    	if(($today <= $date)&&($today > $date->subDays(7))){
    		return true;
    	} else {
    		return false;
    	}
    }

    public function presentUsers(){
    	return $presentUsers = $this->attendances->where('value',1)->count();

    }

    public function allUsers(){
    	$presentUsers = $this->presentUsers();
    	$absendUsers = $this->attendances->where('value',0)->count();
    	return $allUsers = $presentUsers + $absendUsers;
    }
}
