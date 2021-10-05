<?php

namespace App\Http\Resources;

use App\Models\UserSocial;
use Illuminate\Http\Resources\Json\JsonResource;

class SocialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var UserSocial $this */
        return [
            'provider' => $this->provider,
            'social_id' => $this->social_id,
//            'info' => $this->info из соображений этичности, не стоит отдавать на фронт
        ];
    }
}
