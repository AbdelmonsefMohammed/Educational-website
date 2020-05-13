<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;

class TrackController extends Controller
{
    public function index($name)
    {
        $track = Track::where('name',$name)->first();

        return view('/frontend/track',compact('track'));
    }
}
