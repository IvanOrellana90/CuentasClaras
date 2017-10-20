<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User','ticket_user')->withPivot('ticket_id', 'user_id', 'active')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function group()
    {
        return $this->belongsTo('App\Group');
    }
}
