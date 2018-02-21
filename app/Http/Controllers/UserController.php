<?php

namespace App\Http\Controllers;

use App\Debt;
use App\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Ticket;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function users()
    {
        $id = Auth::id();

        $users = User::join('group_user','group_user.user_id','=','users.id')
            ->join('groups','groups.id','=','group_user.group_id')
            ->select('users.id','users.name','users.lastName','users.email')
            ->where('users.id','<>',$id)
            ->groupBy('users.id','users.email','users.name','users.lastName')
            ->get();

        foreach ($users as $user)
        {
            $deuda = Debt::join('tickets','debts.ticket_id','=','tickets.id')
                ->where('debts.user_id', $user->id)
                ->where('tickets.user_id', $id)
                ->where('debts.state',0)
                ->select(DB::raw('SUM(debts.amount) as monto'))
                ->first();

            $user->deuda = $deuda->monto;

            $abono = Debt::join('tickets','debts.ticket_id','=','tickets.id')
                ->where('debts.user_id', $id)
                ->where('tickets.user_id', $user->id)
                ->where('debts.state',0)
                ->select(DB::raw('SUM(debts.amount) as monto'))
                ->first();

            $user->abono = $abono->monto;
        }

        return view('users.users', [
           'users' => $users
        ]);

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required|unique:users',
            'password' => 'required|min:6',
            'name' => 'required|string|max:191',
            'lastName' => 'required|string|max:191'
        ]);

        $mensaje = "OPS! Ocurrio un problema!";
        $class = "alert-danger";

        $user = new User();

        $user->name = $request['name'];
        $user->password = Hash::make($request['password']);
        $user->email = $request['email'];
        $user->lastName = $request['lastName'];
        $user->avatar = "avatar". rand(1,10);

        if($user->save()) {
            $mensaje = "Usuario: ".$user->name." ".$user->lastName." ingresado correctamente!";
            $class = "alert-success";
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class]);

    }
}