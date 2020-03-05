<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'chemical'=>$this->chemical,
            'medicinetype_id'=>$this->medicinetype_id,
            'medcinetype'=>$this->medicinetype->name
        ];

        // return $array;
    }
}
