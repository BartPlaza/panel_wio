<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    public function semester() {

    	return $this->belongsTo(Semester::class);
    }

    public function simpleDate() {
    	$date = Carbon::parse($this->date);
    	return $date->format('d.m');
    }
}
