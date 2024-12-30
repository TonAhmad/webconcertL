<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    function index(){
        return view("paging/index");
    }

    function artist(){
        $artists = Artist::all();

        return view('paging/artist', compact('artists'));
    }

    function venue(){
        return view("paging/venue");
    }

    function pricing(){
        return view("paging/pricing");
    }

    function signin(){
        return view("login/signin");
    }
}
