<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function validateLogin(Request $request)
    {

        $email = $request['email'];
        $password = $request['password'];

        $mensaje = "Ups! Correo o contraseña incorrectos.";
        $class = "alert-danger";

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('/home');
        }

        return redirect()->route('inicio')->with(['message' => $mensaje, 'class' => $class]);
    }

    public function logout()
    {
        Auth::logout();
        return view('login');
    }
}