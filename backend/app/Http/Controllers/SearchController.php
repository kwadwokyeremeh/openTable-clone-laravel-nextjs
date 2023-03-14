<?php

namespace App\Http\Controllers;

use App\Enums\Price;
use App\Http\Resources\RestaurantResource;
use App\Models\Cuisine;
use App\Models\Location;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * @param Request $request
     * @return Price[]|bool|\Illuminate\Database\Eloquent\Collection
     */
    public function parameters(Request $request)
    {
        if(mb_strtolower($request->name) == "cuisine"){
            return Cuisine::all();
        }
        if (mb_strtolower($request->name) == "location"){
            return Location::all();
        }
        if(mb_strtolower($request->name) == 'price'){
            return Price::cases();
        }
        return Location::whereName($request->name)->firstOrFail()
            || Cuisine::whereName($request->name)->firstOrFail();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request): mixed
    {
        $location = Location::whereName(mb_strtolower($request->city))->first();
        $cuisine = Cuisine::whereName(mb_strtolower($request->cuisine))->first();
        $price = Restaurant::wherePrice($request->price)->get();

        if (!isset($location) && !isset($cuisine) && !isset($price)){
            return [];
        }
        elseif(self::isNotUnderScore($request->cuisine) && self::isNotUnderScore($request->city) && self::isNotUnderScore($request->price)){
            return RestaurantResource::collection(
                Restaurant::whereCuisineId($cuisine->id)
                    ->whereLocationId($location->id)
                    ->wherePrice($request->price)->get());
        }

        elseif(self::isNotUnderScore($request->city) && self::isNotUnderScore($request->cuisine)){
            return RestaurantResource::collection(
                Restaurant::whereCuisineId($cuisine->id)
                    ->whereLocationId($location->id)->get());
        }

        elseif(self::isNotUnderScore($request->cuisine) && self::isNotUnderScore($request->price)){
            return RestaurantResource::collection(
                Restaurant::whereCuisineId($cuisine->id)
                    ->wherePrice($request->price)->get());
        }
        elseif(self::isNotUnderScore($request->city) && self::isNotUnderScore($request->price)){
            return RestaurantResource::collection(
                Restaurant::whereLocationId($location->id)
                    ->wherePrice($request->price)->get());
        }
        elseif(self::isNotUnderScore($request->city)){
            return RestaurantResource::collection(Restaurant::whereLocationId($location->id)->get());
        }
        elseif(self::isNotUnderScore($request->cuisine)) {
            return RestaurantResource::collection(Restaurant::whereCuisineId($cuisine->id)->get());
        }
        elseif(self::isNotUnderScore($request->price)){
            return RestaurantResource::collection(Restaurant::wherePrice($request->price)->get());
        }
        else{
            return RestaurantResource::collection(Restaurant::all());
        }
//        return $location->restaurants()->get();
    }

    /**
     * @param string $name
     * @return bool
     */
    protected static function isNotUnderScore(string $name): bool
    {
        return $name!='_';
    }
}
