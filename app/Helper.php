<?php

use App\Group;
use App\Ticket;
use App\Debt;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function gastosEsteMes()
{
    $total = Debt::join('tickets','tickets.id','=','debts.ticket_id')
        ->where('debts.user_id',Auth::id())
        ->where(DB::raw('MONTH(tickets.date)'),date('n'))
        ->select(DB::raw('SUM(debts.amount) as total_sales'))
        ->first();

    return number_format($total->total_sales);
}

function gastosPromedio()
{
    $montos = Debt::where('debts.user_id', Auth::id())
        ->join('tickets','tickets.id','=','debts.ticket_id')
        ->select(DB::raw('SUM(debts.amount) AS monto'),DB::raw('DATE_FORMAT(date, "%m-%Y") AS mes'))
        ->groupBy(DB::raw('DATE_FORMAT(date, "%m-%Y")'))
        ->get();

        $count = 0;
        $total = 0;

        foreach ($montos as $monto) {
            $count ++;
            $total = $total + $monto->monto;
        }

        if($count == 0)
            $count = 1;

        return number_format($total/$count);
}

function diferenciaDias($end)
{
    $now = Carbon::now();
    $length = $end->diffInDays($now);

    return $length;
}