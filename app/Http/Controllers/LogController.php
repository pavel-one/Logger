<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLogRequest;
use App\Http\Resources\LogResource;
use App\Models\Category;
use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function create(CreateLogRequest $request): LogResource
    {
        //TODO: Проверять эти штуки и создавать
        //TODO: Трансформировать статус
        $user = \Auth::user();
        $level = Log::getLevelId($request->get('level'));
        $message = trim(htmlspecialchars($request->get('message')));
        $categoryName = $request->get('category');

        /** @var Category $category */
        $category = $user->categories()->firstOrCreate([
            'name' => $categoryName
        ]);

        /** @var Log $log */
        $log = $category->logs()->create(compact('level', 'message'));

        if ($data = $request->get('data')) {
            $log->data()->create([
                'content' => $data
            ]);
        }


        return LogResource::make($log);
    }
}
