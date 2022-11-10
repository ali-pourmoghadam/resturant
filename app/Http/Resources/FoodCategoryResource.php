<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodCategoryResource extends JsonResource
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

            "categories" => [

                "id" => $this->id ,

                "title" => $this->name ,

                "food" => [

                     ProductResource::collection($this->product)
                     
                 ]
            ]
        ];
    }
}
