<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
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
            'doctor'=>parent::toArray($request),
            'doctorinfo'=>$this->user,
            'ownerinfo'=>$this->owner,
        ];
    }
}
