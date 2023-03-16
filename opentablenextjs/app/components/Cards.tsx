import Link from "next/link";
import Card from "./Card";
import React from 'react'
import {notFound} from "next/navigation";

export interface NameType{
    name: string
}
export interface ServerData{
    data:RestaurantCardType[]
}
export interface RestaurantCardType{
    id: number,
    name: string,
    main_img: string,
    price: string,
    slug: string,
    cuisine: NameType,
    location:NameType;
    reviewsCount: number,
    rating: number
}

export interface LocationType{
    name: string;
}
const fetchRestaurants = async () :Promise<ServerData> => {
    const restaurants = await fetch('http://127.0.0.1:8000/restaurants', {
        credentials: "include",
        // cache: "no-cache",
        headers: {
            accept: 'application/json',
            referer: 'http://localhost:3000/',
            // cookie: req.headers.cookie,
        },
        next: { revalidate: 60 }

    }).catch(()=>(notFound()))
    if(!restaurants.ok){
        throw new Error('Failed to fetch data');
    }
    return restaurants.json()
}

// const map= (f: (arg0: any) => any, elements: any[]) =>
// elements.reduce((acc, curr) => { // reducer
//     acc.push(f(curr));
//     return acc;
// }, []);
export default async function Cards (){

    const restaurantResult = await fetchRestaurants();
    const restaurants:[string, RestaurantCardType][] = Object.entries(restaurantResult.data)
    // console.log(Object.entries(restaurants.data))
    return (
        <div className="py-3 px-20 mt-10 flex flex-wrap flex-row">
            {restaurants.map((restaurant) =>
            (
                <Link key={restaurant[1].id}
                    href={'restaurant/' + restaurant[1].slug}>
                    <Card restaurant={restaurant[1]}/>
                </Link>
            ))}
        </div>
    )
}