<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function bills()
    {
        $bills = Ticket::join('ticket_user','ticket_user.ticket_id','=','tickets.id')
            ->where('ticket_user.user_id',Auth::id())
            ->where('tickets.user_id','!=',Auth::id())
            ->select('name','date','ticket_user.amount','ticket_user.active','tickets.user_id','tickets.group_id')
            ->get();

        $users = User::all();

        return view('bill.bills', [
            'bills' => $bills,
        ]);
    }


}