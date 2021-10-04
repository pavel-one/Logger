<?php

namespace App\Http\Controllers;

use App\Events\LogEvent;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function spa()
    {
        return view('index');
    }
}
