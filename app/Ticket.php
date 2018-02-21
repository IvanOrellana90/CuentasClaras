<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function usersBelong()
    {
        return $this->belongsToMany('App\User', 'debts', 'ticket_id', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function debts()
    {
        return $this->hasMany('App\Debt');
    }

    public function group()
    {
        return $this->belongsTo('App\Group');
    }
}
