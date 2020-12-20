<?php

namespace App\Http\Resources\Api;

use App\Http\Resources\Api\StudentResource;
use Illuminate\Http\Resources\Json\JsonResource;


class ClassroomResource extends JsonResource
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
            'id'=> (string)$this->id,
            'code' => $this->classroom_code,
            'title' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'teacher' =>[
                'firstname' => $this->teacher->firstname,
                'lastname' => $this->teacher->lastname,
                'email' => $this->teacher->email,
                'avatar' => $this->teacher->avatar_url
            ],
            'students'=>StudentResource::collection($this->students)
        ];
    }
}
