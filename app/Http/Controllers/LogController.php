<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLogRequest;
use App\Http\Resources\LogResource;
use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function create(CreateLogRequest $request): LogResource
    {
        $log = Log::create($request->all());

        return LogResource::make($log);
    }
}
