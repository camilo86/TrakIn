<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $table = "meetings";
    protected $fillable = array('name', 'user_id', 'description', 'end_date', 'start_date');
    protected $hidden = array('user_id');

    public function owner()
    {
        return $this->belongsTo('\App\User');
    }
}
