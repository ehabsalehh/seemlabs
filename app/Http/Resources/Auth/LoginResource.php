<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'expires_in' => $this->resource['expires_in'],
            'access_token' => $this->resource['access_token'],
            'refresh_token' => $this->resource['refresh_token'],
        ];
    }
}
