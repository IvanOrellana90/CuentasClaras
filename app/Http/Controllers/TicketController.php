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
            'amounTicket' => 'required|numeric',
            'date' => 'required|date',
            'group' => 'required|exists:groups,id'
        ]);

        $titulo = "OPS!";
        $mensaje = "Ocurrio un problema!";
        $class = "error";

        $ticket = new Ticket();
        $montoTotal = 0;

        foreach ($request['amounts'] as $monto) {
            $montoTotal += $monto;
        }

        if($montoTotal != $request['amounTicket'])
        {
            $mensaje = "El monto de la boleta no cuadra con el de los usuarios";
            return redirect()->back()->with(['message' => $mensaje, 'class' => $class, 'titulo' => $titulo]);
        }

        $ticket->user_id = Auth::id();
        $ticket->group_id = $request['group'];
        $ticket->name = $request['name'];
        $ticket->description = $request['description'];
        $ticket->date = $request['date'];
        $ticket->amount = $request['amounTicket'];
        $ticket->img = $request['img'];

        $users = $request['users'];
        $amount = $request['amounts'];

        $syncData = [];

            for($i = 0; $i < count($users); $i++) {
                if($users[$i] == $ticket->user_id)
                    $syncData[$users[$i]] = ['amount' => $amount[$i], 'active' => 1];
                else
                    $syncData[$users[$i]] = ['amount' => $amount[$i], 'active' => 0];
            }


        if($ticket->save()) {

            $ticket->users()->attach($syncData);

            Event::fire(new TicketAdded($ticket));

            $titulo = "Excelente!";
            $mensaje = "Boleta: ".$ticket->name." ingresada correctamente";
            $class = "success";
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class, 'titulo' => $titulo]);

    }

    public function update(Request $request, $id)
    {
        $titulo = "OPS!";
        $mensaje = "Ocurrio un problema!";
        $class = "error";

        $user =  User::where('id', $id)->first();;
        $input = $request->all();

        if($user->fill($input)->save()) {
            $titulo = "Excelente!";
            $mensaje = "Usuario: ".$user->name." ".$user->lastName." editado correctamente";
            $class = "alert-success";
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class, 'titulo' => $titulo]);

    }

    public function destroy($id)
    {
        $ticket = Ticket::where('id', $id)->first();

        $titulo = "OPS!";
        $mensaje = "Ocurrio un problema!";
        $class = "error";

        if($ticket->user->id != Auth::id())
        {
            $mensaje = "No puedes eliminar una boleta que no es tuya";
            return redirect()->back()->with(['message' => $mensaje, 'class' => $class, 'titulo' => $titulo]);
        }

        $nombre = $ticket->name;

        if($ticket->delete()) {
            $titulo = "Excelente!";
            $mensaje = "Boleta: ".$nombre." eliminada correctamente";
            $class = "success";
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class, 'titulo' => $titulo]);
    }


    public function findGroupUsers(Request $request){

        //$request->id here is the id of our chosen option id
        $data=Group::where('id',$request->id)->get();
        return response()->json($data);//then sent this data to ajax success
    }


}