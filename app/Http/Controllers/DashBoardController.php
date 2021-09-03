<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth', 'check-admin']);
    }

    public function index()
    {
        return "hi admin";
    }
}
