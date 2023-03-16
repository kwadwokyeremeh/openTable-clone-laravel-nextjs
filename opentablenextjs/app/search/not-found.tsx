"use client"
import SearchBar from "../components/search/SearchBar";
import SearchSideBar from "../components/search/SearchSideBar";
import React from "react";
import ErrorImage from "../../public/error.png";
import Link from "next/link";


export default function NotFound ({error}:{error:Error}){

    return (
             <>
                 <div className="bg-gradient-to-r to-[#5f6984] from-[#0f1f47] p-2">
                    <SearchBar/>
                </div>
                <div className="flex py-4 m-auto w-2/3 justify-between items-start">
                    {/* SEARCH SIDE BAR */}
                    <div className="w-1/5">
                        <SearchSideBar />
                    </div>

                    <div className="w-5/6">
                            {
                                <div className="bg-gray-200 flex flex-col justify-center items-center">
                                    <Image src={ErrorImage} alt="error" className="w-56 mb-8"/>
                                    <div className="bg-white px-9 py-14 shadow rounded">
                                        <h3 className="text-3xl font-bold">
                                            Sorry, you've been ejected into outer space!!!
                                        </h3>
                                        <p>Message: Item not found (404) </p>
                                        <p>Error: 404 {error.name}</p>
                                        <Link href="search"
                                              className="text-4xl font-bold"
                                        >Find your way back home</Link>
                                    </div>
                                </div>
                            }
                    </div>
                </div>
             </>
    )
}