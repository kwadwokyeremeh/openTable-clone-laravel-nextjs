// "use client"
import Link from "next/link";

export interface NameType{
    id:string,
    name: string
}
const searchParameter = async (searchParams:string) : Promise<NameType[]> => {
    const fetchQuery = await fetch(`http://127.0.0.1:8000/search/parameters/${searchParams}`, {
        credentials: "include",
        // cache: "no-cache",
        headers: {
            accept: 'application/json',
            referer: 'http://localhost:3000/',
        },
        next: { revalidate: 60 }

    })
    if(!fetchQuery.ok){
        throw new Error('Failed to fetch data');
        // return SearchBarFallback
    }
    return fetchQuery.json()
}
export default async function SearchSideBar({searchParams}:{searchParams: {city?:string,cuisine?:string, price?:string}}){
    const locations = await searchParameter('location')
    const prices = await searchParameter('price')
    const cuisines = await searchParameter('cuisine')


    return (
        <>
            <div className="border-b pb-4">
                <h1 className="mb-2">Region</h1>
                {
                    locations.map((location)=>(
                        <Link key={location.id}
                              href={{
                            pathname: '/search',
                            query: {
                                ...searchParams,
                                city: location.name },
                            }}>
                            <p  className="font-light text-reg capitalize">{location.name}</p>
                        </Link>
                    ))
                }

            </div>
            <div className="border-b pb-4 mt-3">
                <h1 className="mb-2">Cuisine</h1>
                {
                    cuisines.map((cuisine)=>(
                        <Link key={cuisine.id}
                              href={{
                            pathname: '/search',
                            query: {
                                ...searchParams,
                                cuisine: cuisine.name },
                              }}>
                            <p className="font-light text-reg capitalize">{cuisine.name}</p>
                        </Link>
                    ))
                }

            </div>

            <div className="mt-3 pb-4">
                <h1 className="mb-2">Price</h1>
                <div className="flex">
                    <Link href={{
                            pathname: '/search',
                            query: {
                                ...searchParams,
                                price: "Cheap" },
                              }}
                        className="border w-full text-reg font-light rounded-l p-2">
                        $
                    </Link>
                    <Link href={{
                            pathname: '/search',
                            query: {
                                ...searchParams,
                                price: "Regular" },
                              }}

                        className="border-r border-t border-b w-full text-reg font-light p-2"
                    >
                        $$
                    </Link>
                    <Link href={{
                            pathname: '/search',
                            query: {
                                ...searchParams,
                                price: "Expensive" },
                              }}

                        className="border-r border-t border-b w-full text-reg font-light p-2 rounded-r"
                    >
                        $$$
                    </Link>
                </div>
            </div>
        </>
    )
}