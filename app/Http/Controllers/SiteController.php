<?php

namespace App\Http\Controllers;

use App\Events\LogEvent;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        event(new LogEvent(1, 2));
        return view('index');
    }
}
