<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Group;
use App\User;
use App\Debt;

class GroupController extends Controller
{

    public function groups()
    {
        $users = User::all();

        return view('groups.groups', [
            'users' => $users
        ]);
    }

    public function group($id)
    {
        $group = Group::where('id',$id)->first();

        return view('groups.group', [
            'group' => $group
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $titulo = "OPS!";
        $mensaje = "Ocurrio un problema!";
        $class = "error";

        $group = new Group();

        $group->user_id = Auth::id();
        $group->name = $request['name'];
        $group->description = $request['description'];

        if ($group->save()) {
            $group->users()->attach($request['users']);
            $group->users()->attach($group->user_id);

            $titulo = "Excelente!";
            $mensaje = "Grupo: ".$group->name." ingresado correctamente";
            $class = "success";
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class, 'titulo' => $titulo]);
    }

    public function destroy($id)
    {
        $group = Group::where('id', $id)->first();

        $titulo = "OPS!";
        $mensaje = "Ocurrio un problema!";
        $class = "error";

        if($group->user->id != Auth::id()) {
            $mensaje = "No puedes eliminar un grupo de otro usuario!";
            return redirect()->back()->with(['message' => $mensaje, 'class' => $class]);
        }

        $nombre = $group->name;

        if(DB::table('group_user')->where('group_id', $group->id)->delete())     {
            if($group->delete()) {
                if(Debt::where('group_id',$group->id)->delete()) {
                    if(Ticket::where('group_id',$group->id)->delete()) {
                        $titulo = "Excelente!";
                        $mensaje = "Grupo: ".$nombre." eliminado correctamente!";
                        $class = "success";
                    }
                }
            }
            $titulo = "Excelente!";
            $mensaje = "Grupo: ".$nombre." eliminado correctamente!";
            $class = "success";
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class, 'titulo' => $titulo]);
    }
}