<?php

namespace App\Http\Controllers;

use App\Models\ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function admin()
    {
        return view("admin/dashboard");
    }

    function ticket(){
        $ticket= ticket::all();
        return view('admin.ticket')->with('ticket',$ticket);
    }
}
