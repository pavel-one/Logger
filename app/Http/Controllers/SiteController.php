<?php

namespace App\Http\Controllers;

use App\Events\LogEvent;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function spa()
    {
        return view('index');
    }
}
