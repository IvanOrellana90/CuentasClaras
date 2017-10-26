<?php

use App\Group;
use App\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function formatNumber($number)
{

}

function pasivosGrupo($group_id)
{
    $pasivos = Ticket::where('group_id',$group_id)
        ->join('ticket_user','ticket_user.ticket_id','=','tickets.id')
        ->select(DB::raw('SUM(ticket_user.amount) as total_sales'))
        ->first();

    return $pasivos->total_sales;
}

function activosGrupo($group_id)
{
    $activos = Ticket::where('group_id',$group_id)
        ->where('ticket_user.active',1)
        ->join('ticket_user','ticket_user.ticket_id','=','tickets.id')
        ->select(DB::raw('SUM(ticket_user.amount) as total_sales'))
        ->first();

    return $activos->total_sales;
}

function gastosTotales()
{
    $total = Ticket::join('ticket_user','ticket_user.ticket_id','=','tickets.id')
        ->where('ticket_user.user_id',Auth::id())
        ->where(DB::raw('MONTH(ticket_user.created_at)'),date('n'))
        ->select(DB::raw('SUM(ticket_user.amount) as total_sales'))
        ->first();

    return number_format($total->total_sales);
}