<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    function index(){
        return view("paging/index");
    }

    function artist(){
        return view("paging/artist");
    }

    function venue(){
        return view("paging/venue");
    }

    function pricing(){
        return view("paging/pricing");
    }
}
