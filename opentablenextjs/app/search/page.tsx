import SearchBar from "../components/search/SearchBar";
import SearchSideBar from "../components/search/SearchSideBar";
import RestaurantCard from "../components/search/RestaurantCard";
import {RestaurantCardType, ServerData} from "../components/Cards";
import React from "react";
import {notFound} from "next/navigation";
export const dynamic = 'force-dynamic'

export const searchQuery = async (searchParams: { city?: string; cuisine?: string; price?: string }) :Promise<ServerData> => {
    const city = searchParams.city !==undefined ? `/${searchParams.city}`:'/_'
    const cuisine = searchParams.cuisine !==undefined ? `/${searchParams.cuisine}`:'/_'
    const price = searchParams.price !==undefined ? `/${searchParams.price}`:'/_'

    const fetchQuery = await fetch(
        'http://127.0.0.1:8000/search'+ city + cuisine + price,

        {
        credentials: "include",
        // cache: "no-cache",
        headers: {
            accept: 'application/json',
            referer: 'http://localhost:3000/',
        },
        next: { revalidate: 60 }

    }).catch(()=>(notFound()))
    if(!fetchQuery.ok){
        throw new Error('Failed to fetch data');
        // notFound()
    }
    return fetchQuery.json()
}


export default async function Search (
    {searchParams}:
    {searchParams:
        {city?:string,cuisine?:string, price?:string}}){

const searchResults = await searchQuery(searchParams)
    if(!searchResults){
        notFound()
    }
const parseSearch:[string, RestaurantCardType][] = Object.entries(searchResults.data)
// console.log(searchResults)
    return (
             <>
                 <div className="bg-gradient-to-r to-[#5f6984] from-[#0f1f47] p-2">
                    <SearchBar querystring={searchParams}/>
                </div>
                <div className="flex py-4 m-auto w-2/3 justify-between items-start">
                    {/* SEARCH SIDE BAR */}
                    <div className="w-1/5">
                        <SearchSideBar searchParams={searchParams} />
                    </div>

                    <div className="w-5/6">
                            {
                                parseSearch.map((restaurant)=>(
                                <RestaurantCard key={restaurant[1].id}
                                    restaurant={restaurant[1]} />
                                    ))
                            }
                    </div>
                </div>
             </>
    )
}