"use client"
import {useCallback, useState} from "react";
import { useRouter, useSearchParams} from "next/navigation";

interface Props{
    querystring: {searchParams: {city?:string,cuisine?:string, price?:string}}
}
export default function SearchBar({searchParams} : any ){
    const router = useRouter()
    const [location, setLocation] = useState(searchParams)
    const searchParam = useSearchParams()
    const createQueryString = useCallback(
        (name:string, value:string ) => {
            // @ts-ignore
            const params = new URLSearchParams(searchParam);
            params.set(name,value);
            return params.toString()
        }, [searchParam],
    )
    return (
        <div className="text-left text-lg py-3 m-auto flex justify-center">
            <input
                className="rounded  mr-3 p-2 w-[450px]"
                type="text"
                placeholder="State, city or town"
                value={location}
                onChange={(event) => setLocation(event.target.value)}
            />
            <button className="rounded bg-red-600 px-9 py-2 text-white"
                    onClick={()=>{
                        if (location ===undefined || location === ' ')return;
                        else{
                        router.push('search' + '?' + createQueryString('city', location))
                    }}}>
                Let's go
            </button>
        </div>

    )
}