<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Group;

class GroupController extends Controller
{

    public function groups()
    {
        $users = User::all();

        return view('group.groups', [
            'users' => $users
        ]);
    }

    public function group($id)
    {

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

    public function update(Request $request, $id)
    {
        $titulo = "OPS!";
        $mensaje = "Ocurrio un problema!";
        $class = "error";

        $group =  Group::where('id', $id)->first();;
        $input = $request->all();

        if($group->fill($input)->save()) {
            $mensaje = "Grupo: ".$group->name." editado correctamente!";
            $class = "success";
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class]);

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

        if($group->delete()) {
            $titulo = "Excelente!";
            $mensaje = "Grupo: ".$nombre." eliminado correctamente!";
            $class = "success";
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class, 'titulo' => $titulo]);
    }
}