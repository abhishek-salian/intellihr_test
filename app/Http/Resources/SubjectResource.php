<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubjectResource extends JsonResource
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
            'subject_id'            =>  $this->id,
            'name'                  =>  $this->name,
            'created_at'            =>  $this->created_at,
            'updated_at'            =>  $this->updated_at,
            'deleted_at'            =>  $this->deleted_at
        ];
    }
}
