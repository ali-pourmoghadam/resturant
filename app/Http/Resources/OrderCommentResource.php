<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderCommentResource extends JsonResource
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

            "author" => $this->user->fullName ,

            "products" =>  $this->product->map(fn($product)=>  $product->name) ,

            "created_at" =>  Carbon::parse($this->created_at)->format("Y:m:d") ,

            "comments" =>  $this->comment->map(fn($comment)=>  $comment->message) ,


        ];
    }
}
