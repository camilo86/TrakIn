<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    protected $table = 'lists';
    protected $fillable = array('name', 'description', 'users', 'user_id');
    protected $hidden = array('id', 'user_id');

    public function user()
    {
        return $this->belongsTo('\App\User');
    }
}
