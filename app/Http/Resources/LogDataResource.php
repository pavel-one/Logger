<?php

namespace App\Http\Resources;

use App\Models\LogData;
use Illuminate\Http\Resources\Json\JsonResource;

class LogDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var LogData $this */
        return $this->content;
    }
}
