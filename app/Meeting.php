<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;

class Meeting extends Model
{
    protected $table = "meetings";
    protected $fillable = array('name', 'user_id', 'description', 'end_date', 'start_date');
    protected $hidden = array('id', 'user_id');

    public function user()
    {
    	return $this->belongsTo('\App\User');
    }

    public function getAttandance()
    {
        $people_in_meeting = json_decode($this->people_in_meeting, true);
        $temp = array();
        foreach($people_in_meeting as $user_id)
        {
            array_push($temp, User::find($user_id));
        }

        return $temp;
    }

    public function getSkipped() {
        $all_users = User::all();
        $people_in_meeting = $this->getAttandance();
        $temp = array();

        foreach($all_users as $user)
        {
            foreach($people_in_meeting as $person_in_meeting)
            {
                if($person_in_meeting->id != $user->id)
                {
                    array_push($temp, $user);
                }
            }
        }
        return $temp;
    }

    public function getStartDateTimeString() {
        return Carbon::parse($this->start_date)->format('M/d/y | h:m');
    }

    public function getEndDateTimeString() {
        return Carbon::parse($this->end_date)->format('M/d/y | h:m');
    }
}
