<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    public function groupsBelong()
    {
        return $this->belongsToMany('App\Group','group_user')->withPivot('group_id', 'user_id')->withTimestamps();
    }

    public function ticketsBelong()
    {
        return $this->belongsToMany('App\Ticket', 'debts', 'user_id', 'ticket_id');
    }


    public function groups()
    {
        return $this->hasMany('App\Group');
    }

    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }

    public function debts()
    {
        return $this->hasMany('App\Debt');
    }
}
