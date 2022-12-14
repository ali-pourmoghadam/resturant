<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResturantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [

            "id" => $this->id ,

            "title" => $this->name , 

            "type" => $this->resturantCategory ,

            "address" => [

                "adress" => $this->adress , 

                "latitude" => $this->latitude ,

                "longtitude" => $this->longtitude  
            ] ,

            "is_open" => $this->is_active ,

            "image" => $this->image ,

            "schedule" => $this->work_days
        ];
    }
}
