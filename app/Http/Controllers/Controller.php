<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Ticket;
use App\User;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $user = Auth::user();

            view()->share('user', $user);

            $signed_in = Auth::check();

            if($signed_in) {
                // Monto total de deudas
                $pasivos = User::where('users.id', $user->id)
                    ->join('debts','debts.user_id','=','users.id')
                    ->where('debts.state','0')
                    ->select(DB::raw('SUM(debts.amount) as total_sales'))
                    ->first();

                if($pasivos->total_sales == "")
                    $pasivos->total_sales = 0;

                $activos = Ticket::where('tickets.user_id', $user->id)
                    ->join('debts','debts.ticket_id','=','tickets.id')
                    ->where('debts.state','0')
                    ->select(DB::raw('SUM(debts.amount) as total_sales'))
                    ->first();

                $bills = Ticket::join('debts','debts.ticket_id','=','tickets.id')
                    ->where('debts.user_id',Auth::id())
                    ->where('tickets.user_id','!=',Auth::id())
                    ->select('name','date','debts.amount','debts.state','tickets.user_id','tickets.group_id')
                    ->get();

                view()->share('bills', $bills);
                view()->share('pasivos', $pasivos);
                view()->share('activos', $activos);
            }

            return $next($request);
        });

    }

}
