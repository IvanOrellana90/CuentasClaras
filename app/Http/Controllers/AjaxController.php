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
        $data=Group::where('id',$request->id)->get();
        return response()->json($data);//then sent this data to ajax success
    }


}