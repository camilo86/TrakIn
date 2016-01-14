<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

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
        $people_in_meeting = json_decode($this->people_in_meeting, true);
        $all_users_ = array();

        foreach($all_users as $user)
        {
            array_push($all_users_, $user);
        }


        foreach($all_users_ as $current_user)
        {
            if(in_array($current_user->id, $people_in_meeting)) {
                $all_users_ = array_diff($all_users_, array($current_user->id));
            }
        }

        $temp = array();

        foreach($all_users_ as $user_id)
        {
            array_push($temp, User::find($user_id));
        }

        return $temp;
    }
}
