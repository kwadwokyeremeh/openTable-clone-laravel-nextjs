<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'main_img' => $this->main_img,
            'cuisine' => CuisineResource::make($this->cuisine),
            'location' => LocationResource::make($this->location),
            'price'=>$this->price,
            'slug' =>$this->slug,
            'description' => $this->description,
            'images' => $this->when($request->slug==$this->slug,$this->images,''),
            'reviewsCount' => $this->reviews()->count(),
            'rating' => $this->calculateRating(),
            'reviews' => ReviewResource::collection($this->whenLoaded('reviews')),
        ];
    }

}
