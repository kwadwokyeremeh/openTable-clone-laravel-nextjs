import SearchBar from "../components/search/SearchBar";
import SearchSideBar from "../components/search/SearchSideBar";
import RestaurantCard from "../components/search/RestaurantCard";
import {RestaurantCardType, ServerData} from "../components/Cards";
import React, {Suspense} from "react";
import Stars from "../components/Stars";
import Price from "../components/Price";


export default function Loading (searchParams:any){

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
                                <div
                                      className="ml-4 border-b flex pb-5">
                                    <img
                                        src=''
                                        alt=""
                                        className="w-44 rounded h-36"
                                    />
                                    <div className="pl-5">
                                        <h2 className="text-3xl">Searching</h2>
                                        <div className="flex items-start">
                                            <div className="flex mb-2">loading...</div>
                                            <p className="ml-2 text-sm">Awesome</p>
                                        </div>
                                        <div className="mb-9">
                                            <div className="font-light flex text-reg">

                                                <p className="mr-4 capitalize">Cuisine...</p>
                                                <p className="mr-4 capitalize">Location...</p>
                                            </div>
                                        </div>
                                        <div className="text-red-600">
                                            View more information...
                                        </div>
                                    </div>
                                </div>
                            }
                    </div>
                </div>
             </>
    )
}