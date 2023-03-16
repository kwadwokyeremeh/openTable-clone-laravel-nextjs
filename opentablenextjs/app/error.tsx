"use client"
import Image from "next/image";
import ErrorImage from "../public/error.png"
import Link from "next/link";
export default function Error({error}:{error:Error}){
    return (
        <div className="h-screen bg-gray-200 flex flex-col justify-center items-center">
            <Image src={ErrorImage} alt="error"
            className="w-56 mb-8"
            />
            <div className="bg-white px-9 py-14 shadow rounded">
                <h3 className="text-3xl font-bold">
                    Sorry, you've been ejected into outer space!!!
                </h3>
                <p className="text-center">Message: {error.message}</p>
                <p className="text-center">Error: {error.name}</p>
                <Link href="/"
                      className="text-xl text-center font-bold"
                >Find your way back home</Link>

            </div>
        </div>
    )
}