<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
use Socialite;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function validateLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required'
        ]);

        $email = $request['email'];
        $password = $request['password'];

        $mensaje = "Ups! Correo o contraseña incorrectos.";
        $class = "alert-danger";

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('welcome');
        }

        echo $email ." ". $password ." ". $mensaje;

        return redirect()->back()->with(['message' => $mensaje, 'class' => $class]);
    }

    public function logout()
    {
        Auth::logout();
        return view('login');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();

        // $user->token;
    }
}