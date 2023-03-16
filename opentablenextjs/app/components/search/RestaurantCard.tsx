import Link from "next/link";
import {RestaurantCardType} from "../Cards";
import Price from "../Price";
import Image from "next/image";
import Stars from "../Stars";

interface Props{
    // restaurant:[string , RestaurantCardType];
    restaurant:RestaurantCardType;
}
export default function RestaurantCard({restaurant}:Props){
    return (
        <Link key={restaurant.id}
            href={`restaurant/${restaurant.slug}`}
              className="ml-4 border-b flex pb-5">
            <img
                src={restaurant.main_img}
                alt=""
                className="w-44 rounded h-36"
            />
            <div className="pl-5">
                <h2 className="text-3xl">{restaurant.name}</h2>
                <div className="flex items-start">
                    <div className="flex mb-2"><Stars rating={restaurant.rating/1.4}/></div>
                    <p className="ml-2 text-sm">Awesome</p>
                </div>
                <div className="mb-9">
                    <div className="font-light flex text-reg">
                        <Price price={restaurant.price}/>
                        <p className="mr-4 capitalize">{restaurant.cuisine.name}</p>
                        <p className="mr-4 capitalize">{restaurant.location.name}</p>
                    </div>
                </div>
                <div className="text-red-600">
                    <Link href={`restaurant/${restaurant.slug}`}>View more information</Link>
                </div>
            </div>
        </Link>
    )
}