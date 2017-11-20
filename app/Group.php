<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Group extends Model
{
    public function users() {

    	return $this->hasMany(User::class);
    }

    public function lider() {

    	return User::find($this->lider_id);
    	 
    }

}
