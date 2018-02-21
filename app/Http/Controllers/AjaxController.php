<?php

namespace App\Http\Controllers;

use App\Debt;
use App\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function findGroupUsers(Request $request){

        //$request->id here is the id of our chosen option id
        $data=Group::where('groups.id',$request->id)
            ->join('group_user','group_user.group_id','=','groups.id')
            ->join('users','users.id','=','group_user.user_id')
            ->select('users.name','users.lastName','users.avatar','users.id')
            ->get();

        return response()->json($data);//then sent this data to ajax success
    }

    public function getGastosMensuales() {

        $id = Auth::id();

        $data = Debt::where('debts.user_id',$id)
            ->join('tickets','tickets.id','=','debts.ticket_id')
            ->select(DB::raw('SUM(debts.amount) AS monto'),DB::raw('DATE_FORMAT(date, "%m-%Y") AS mes'))
            ->groupBy(DB::raw('DATE_FORMAT(date, "%m-%Y")'))
            ->orderBy(DB::raw('DATE_FORMAT(date, "%m-%Y")') , 'ASC' )
            ->get(12);

        return response()->json($data);//then sent this data to ajax success
    }

}