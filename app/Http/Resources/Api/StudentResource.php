<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'firstname'=>$this->firstname,
            'lastname'=>$this->lastname,
            'email'=>$this->email,
            'avatar'=>$this->avatar_url
        ];
    }
}
