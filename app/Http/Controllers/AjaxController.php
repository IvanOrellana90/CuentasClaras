<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Ticket;

class AjaxController extends Controller
{
    public function findGroupUsers(Request $request){

        //$request->id here is the id of our chosen option id
        $data=Group::where('groups.id',$request->id)
            ->join('group_user','group_user.group_id','=','groups.id')
            ->join('users','users.id','=','group_user.user_id')
            ->select('users.name','users.lastName','users.avatar','users.id')
            ->get();

        $owner = Group::where('groups.id',$request->id)
            ->join('users','users.id','=','groups.user_id')
            ->select('users.name','users.lastName','users.avatar','users.id')
            ->first();

        $data->push($owner);


        return response()->json($data);//then sent this data to ajax success
    }


}