<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLogRequest;
use App\Http\Resources\LogResource;
use App\Models\Category;
use App\Models\Log;
use Illuminate\Http\UploadedFile;

class LogController extends Controller
{
    public function create(CreateLogRequest $request): LogResource
    {
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

        if ($files = $request->allFiles()) {
            /** @var UploadedFile $file */
            foreach ($files['files'] as $file) {
                if ($file->getMimeType() === 'application/x-php') {
                    continue;
                }

                $log->files()->create([
                    'path' => $user->id . DIRECTORY_SEPARATOR . $file->hashName(),
                    'disk' => Log::STORAGE
                ]);

                \Storage::disk(Log::STORAGE)->putFile($user->id, $file);
            }
        }


        return LogResource::make($log);
    }
}
