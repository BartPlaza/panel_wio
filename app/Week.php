<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    public function semester() {

    	return $this->belongsTo(Semester::class);
    }
}
