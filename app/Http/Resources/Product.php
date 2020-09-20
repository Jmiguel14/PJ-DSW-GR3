<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Category as CategoryResource;
use Illuminate\Http\Resources\Json\Resource;

class Product extends JsonResource
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
            'name' => $this->name,
            'description' =>$this->description,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'base' => $this->base,
            'user' => new UserResource($this->user),
            'category' => new CategoryResource($this->category),
        ];
    }
}
