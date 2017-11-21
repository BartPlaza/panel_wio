<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use App\Attendance;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function group() {

        return $this->belongsTo(Group::class);

    }

    public function getAge(){

        return Carbon::parse($this->attributes['birthDate'])->age;

    }

    public function getStatus(){

        return $this->status ? 'aktywny' : 'nieaktywny';
    }

    public function getAttendance(Week $week){

        $attendance = Attendance::where('user_id', $this->id)->where('week_id', $week->id)->first();
        if($attendance !== null) {
            return $attendance->value;
        } else {
            return 'null';
        }
    }
}
