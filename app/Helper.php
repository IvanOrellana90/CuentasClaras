<?php

use App\Group;
use App\Ticket;
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