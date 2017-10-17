<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function bills()
    {
        return view('bills');
    }
}