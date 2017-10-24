<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use View;
use App\User;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $user;
    private $signed_in;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->user = Auth::user();
            $this->signed_in = Auth::check();

           if($this->signed_in) {
               // Monto total de deudas
               $pasivos = User::where('id', $this->user->id)
                   ->where('ticket_user.active','0')
                   ->join('ticket_user','ticket_user.user_id','=','users.id')
                   ->select(DB::raw('SUM(ticket_user.amount) as total_sales'))
                   ->first();

               if($pasivos->total_sales == "")
                   $pasivos->total_sales = 0;

               $activos = Ticket::where('tickets.user_id', $this->user->id)
                   ->where('ticket_user.active','0')
                   ->join('ticket_user','ticket_user.ticket_id','=','tickets.id')
                   ->select(DB::raw('SUM(ticket_user.amount) as total_sales'))
                   ->first();

               $bills = Ticket::join('ticket_user','ticket_user.ticket_id','=','tickets.id')
                   ->where('ticket_user.user_id',Auth::id())
                   ->where('tickets.user_id','!=',Auth::id())
                   ->select('name','date','ticket_user.amount','ticket_user.active','tickets.user_id','tickets.group_id')
                   ->get();

               view()->share('bills', $bills);
               view()->share('pasivos', $pasivos);
               view()->share('activos', $activos);
           }

            view()->share('signed_in', $this->signed_in);
            view()->share('user', $this->user);

            return $next($request);
        });

    }

}
