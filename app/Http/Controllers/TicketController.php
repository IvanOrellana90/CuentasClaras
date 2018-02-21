<?php

namespace App\Http\Controllers;

use App\Debt;
use App\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Ticket;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class TicketController extends Controller
{

    public function tickets()
    {
        $users = User::all();

        return view('tickets.tickets', [
            'users' => $users,
        ]);
    }

    public function ticket($id)
    {
        $ticket = Ticket::where('id',$id)->first();

        return view('tickets.ticket', [
            'ticket' => $ticket
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'amounTicket' => 'required|numeric|max:2000000000|min:1',
            'date' => 'required|date',
            'group' => 'required|exists:groups,id',
        ]);

        if($request['attached'] != "") {
            $this->validate($request, [
                'attached' => 'image|max:1024'
            ]);
            $path = $request->file('attached')->store("tickets/" .Auth::id());
        } else {
            $path = "";
        }

        $titulo = "OPS!";
        $mensaje = "Ocurrio un problema!";
        $class = "error";

        $ticket = new Ticket();

        $ticket->user_id = Auth::id();
        $ticket->group_id = $request['group'];
        $ticket->name = $request['name'];
        $ticket->description = $request['description'];
        $ticket->date = $request['date'];
        $ticket->amount = $request['amounTicket'];
        $ticket->attached = $path;

        $users = $request['users'];
        $amount = $request['amounts'];

        if($ticket->save()) {

            for($i = 0; $i < count($users); $i++) {
                $debt = new Debt();
                $debt->amount = $amount[$i];
                $debt->group_id = $ticket->group_id;
                $debt->payment_id = 0;
                $debt->ticket_id = $ticket->id;
                $debt->user_id = $users[$i];
                if($users[$i] == $ticket->user_id)
                    $debt->state = 1;
                else
                    $debt->state = 0;
                $debt->save();
            }

            $titulo = "Excelente!";
            $mensaje = "Ticket: ".$ticket->name." ingresado correctamente";
            $class = "success";
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class, 'titulo' => $titulo]);

    }

    public function destroy($id)
    {
        $ticket = Ticket::where('id', $id)->first();

        $titulo = "OPS!";
        $mensaje = "Ocurrio un problema!";
        $class = "error";

        if($ticket->user->id != Auth::id()) {
            $mensaje = "No puedes eliminar un ticket de otro usuario!";
            return redirect()->back()->with(['message' => $mensaje, 'class' => $class]);
        }

        $nombre = $ticket->name;

        if($ticket->delete() && Debt::where('ticket_id',$ticket->id)->delete()) {
            if(Storage::delete($ticket->attached)) {
                $titulo = "Excelente!";
                $mensaje = "Grupo: ".$nombre." eliminado correctamente!";
                $class = "success";
            }
            $titulo = "Excelente!";
            $mensaje = "Grupo: ".$nombre." eliminado correctamente!";
            $class = "success";
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class, 'titulo' => $titulo]);
    }

}