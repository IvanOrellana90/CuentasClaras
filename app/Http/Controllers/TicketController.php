<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Ticket;

class TicketController extends Controller
{

    public function tickets()
    {
        $users = User::all();

        return view('ticket.tickets', [
            'users' => $users
        ]);
    }

    public function ticket($id)
    {
        $user = User::where('id', $id)->first();

        return view('admin.user.user', [
            'user' => $user
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'group' => 'required'
        ]);

        $mensaje = "OPS! Ocurrio un problema!";
        $class = "alert-danger";

        $ticket = new Ticket();
        $montoTotal = 0;

        foreach ($request['montoUsuario'] as $monto) {
            $montoTotal += $monto;
        }

        if($montoTotal != $request['amount'])
        {
            $mensaje = "OPS! El monto de la boleta no cuadra con el de los usuarios!";
            return redirect()->back()->with(['message' => $mensaje, 'class' => $class]);
        }

        $ticket->user_id = Auth::id();
        $ticket->name = $request['name'];
        $ticket->description = $request['description'];
        $ticket->date = $request['date'];
        $ticket->amount = $request['amount'];
        $ticket->img = $request['img'];

        if($ticket->save()) {
            $mensaje = "Boleta: ".$ticket->name." ingresado correctamente!";
            $class = "alert-success";
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class]);

    }

    public function update(Request $request, $id)
    {
        $mensaje = "OPS! Ocurrio un problema!";
        $class = "alert-danger";

        $user =  User::where('id', $id)->first();;
        $input = $request->all();

        if($user->fill($input)->save()) {
            $mensaje = "Usuario: ".$user->name." ".$user->lastName." editado correctamente!";
            $class = "alert-success";
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class]);

    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->first();

        $nombre = $user->name;
        $apellido = $user->lastName;

        $mensaje = "OPS! Ocurrio un problema!";
        $class = "alert-danger";

        if($user->delete()) {
            $mensaje = "Usuario: ".$nombre." ".$apellido." eliminado correctamente!";
            $class = "alert-success";
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class]);
    }


    public function findGroupUsers(Request $request){

        //$request->id here is the id of our chosen option id
        $data=Group::where('id',$request->id)->get();
        return response()->json($data);//then sent this data to ajax success
    }


}