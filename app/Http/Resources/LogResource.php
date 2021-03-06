<?php

namespace App\Http\Resources;

use App\Models\Log;
use Illuminate\Http\Resources\Json\JsonResource;

class LogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var Log $this */
        return [
            'id' => $this->id,
            'message' => $this->message,
            'category' => CategoryResource::make($this->category),
            'data' => LogDataResource::make($this->data),
            'files' => LogFilesResource::collection($this->files)
        ];
    }
}
