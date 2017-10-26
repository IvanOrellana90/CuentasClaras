<?php

namespace App\Http\Controllers;

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

    public function welcomeGroupTable() {
        $data = Ticket::join('ticket_user','ticket_user.ticket_id','=','tickets.id')
            ->join('groups','groups.id','=','tickets.group_id')
            ->where('ticket_user.user_id',Auth::id())
            ->where('ticket_user.active',0)
            ->select('tickets.group_id as id', 'groups.name', DB::raw('SUM(ticket_user.amount) as total_sales'))
            ->groupBy('tickets.group_id','groups.name')
            ->orderBy('total_sales','desc')
            ->get(4);

        $object = (Object) [
            "current" => 1,
            "rowCount" => count($data),
            "rows" => $data,
            "total" => count($data),
        ];

        return response()->json($object);
    }

    public function welcomePasivosUserTable() {
        $data = Ticket::join('ticket_user','ticket_user.ticket_id','=','tickets.id')
            ->join('users','users.id','=','tickets.user_id')
            ->where('ticket_user.user_id',Auth::id())
            ->where('ticket_user.active',0)
            ->select('tickets.user_id as id', DB::raw('CONCAT(users.name," ",users.lastName) as name'), DB::raw('SUM(ticket_user.amount) as total_sales'))
            ->groupBy('tickets.user_id','name')
            ->orderBy('total_sales','desc')
            ->get(4);

        $object = (Object) [
            "current" => 1,
            "rowCount" => count($data),
            "rows" => $data,
            "total" => count($data),
        ];

        return response()->json($object);
    }

    public function welcomeActivosUserTable() {
        $data = Ticket::join('ticket_user','ticket_user.ticket_id','=','tickets.id')
            ->join('users','users.id','=','ticket_user.user_id')
            ->where('tickets.user_id',Auth::id())
            ->where('ticket_user.active',0)
            ->select('ticket_user.user_id as id', DB::raw('CONCAT(users.name," ",users.lastName) as name'), DB::raw('SUM(ticket_user.amount) as total_sales'))
            ->groupBy('ticket_user.user_id','name')
            ->orderBy('total_sales','desc')
            ->get(4);

        $object = (Object) [
            "current" => 1,
            "rowCount" => count($data),
            "rows" => $data,
            "total" => count($data),
        ];

        return response()->json($object);
    }

}