<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Login;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function index()
    {

        return view('index');
    }


}
