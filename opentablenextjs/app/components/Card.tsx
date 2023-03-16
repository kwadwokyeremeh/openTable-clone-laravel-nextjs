import {RestaurantCardType} from "./Cards";
import React from "react";
import Price from "./Price";
import Image from "next/image";
import Stars from "./Stars";

interface Props{
    // restaurant:[string , RestaurantCardType];
    restaurant:RestaurantCardType;
}
export default function ({ restaurant }:Props) {
    // console.log(restaurant)
    return (
                <div key={restaurant.id}
                    className="w-64 h-72 m-3 rounded overflow-hidden border cursor-pointer"
                >
                    <img
                        src={restaurant.main_img}
                        alt=""
                        className="w-full h-36"
                    />
                    <div className="p-1">
                        <h3 className="font-bold text-2xl mb-2">{restaurant.name}</h3>
                        <div className="flex items-start">
                            <div className="flex mb-2"><Stars rating={restaurant.rating/1.4}/></div>
                            <p className="ml-2">{restaurant.reviewsCount} review{restaurant.reviewsCount >1?'s':''}</p>
                        </div>
                        <div className="flex text-reg font-light capitalize">
                            <p className=" mr-3">{restaurant.cuisine.name}</p>
                            <Price price={restaurant.price}/>
                            <p>{restaurant.location.name}</p>
                        </div>
                        <p className="text-sm mt-1 font-bold">Booked 3 times today</p>
                    </div>
                </div>
            )
}

