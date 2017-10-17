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
            'name' => 'required',
            'description' => 'required'
        ]);

        $mensaje = "OPS! Ocurrio un problema!";
        $class = "alert-danger";

        $group = new Group();

        $group->user_id = Auth::id();
        $group->name = $request['name'];
        $group->description = $request['description'];

        if ($group->save()) {
            $group->users()->sync($request['users']);
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class]);
    }

    public function update(Request $request, $id)
    {
        $mensaje = "OPS! Ocurrio un problema!";
        $class = "alert-danger";

        $group =  Group::where('id', $id)->first();;
        $input = $request->all();

        if($group->fill($input)->save()) {
            $mensaje = "Grupo: ".$group->name." editado correctamente!";
            $class = "alert-success";
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class]);

    }

    public function destroy($id)
    {
        $group = Group::where('id', $id)->first();

        $nombre = $group->name;

        $mensaje = "OPS! Ocurrio un problema!";
        $class = "alert-danger";

        if($group->delete()) {
            $mensaje = "Grupo: ".$nombre." eliminado correctamente!";
            $class = "alert-success";
        }

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class]);
    }
}