import RestaurantNavBar from "../../components/restaurant/NavBar";
import ReservationCard from "../../components/restaurant/ReservationCard";
import Reviews, {ReviewType} from "../../components/restaurant/Reviews";
import {NameType} from "../../components/Cards";
import Stars from "../../components/Stars";
import {notFound} from "next/navigation";

export interface RestaurantDetailsType{
    id: number,
    name: string,
    main_img: string,
    price: string,
    cuisine: NameType[],
    location:NameType[],
    description: string,
    images:string,
    open_time: string,
    close_time:string,
    slug:string,
    reviews:ReviewType[],
    rating:number,
    reviewsCount:number
}

interface ServerData{
    data:RestaurantDetailsType
}
const fetchRestaurantDetails = async (slug:string) :Promise<ServerData> => {
    const restaurantDetails = await fetch('http://127.0.0.1:8000/restaurant/'+ slug, {
        credentials: "include",
        // cache: "no-cache",
        headers: {
            accept: 'application/json',
            referer: 'http://localhost:3000/',
            // cookie: req.headers.cookie,
        },next: { revalidate: 60 }
    }).catch(()=>(notFound()))
    if(!restaurantDetails.ok){
        // notFound()
        throw new Error('Failed to fetch data');
    }
    return restaurantDetails.json()
}
export default async function RestaurantDetails ({params,}: {params: {slug:string}}) {
    const restaurantDetailsData = await fetchRestaurantDetails(params.slug)
    let restaurantDetails: RestaurantDetailsType;
    restaurantDetails = await new Object(restaurantDetailsData.data) as RestaurantDetailsType;
    if (!restaurantDetails){
        notFound()
    }
    // console.log(restaurantDetails)
    const images = JSON.parse(restaurantDetails.images)
    // console.log(images)
    return (
            <>
                <div className="bg-white w-[70%] rounded p-3 shadow">
                    {/* RESTAURANT NAVBAR */}
                    <RestaurantNavBar slug={restaurantDetails.slug}/>
                    {/* RESAURANT NAVBAR */} {/* TITLE */}
                    <div className="mt-4 border-b pb-6">
                        <h1 className="font-bold text-6xl">{restaurantDetails.name}</h1>
                    </div>
                    {/* TITLE */} {/* RATING */}
                    <div className="flex items-end">
                        <div className="ratings mt-2 flex items-center">
                            <p><Stars rating={restaurantDetails.rating/1.4}/></p>
                            <p className="text-reg ml-3">{restaurantDetails.rating}</p>
                        </div>
                        <div>
                            <p className="text-reg ml-4">{restaurantDetails.reviewsCount} Reviews</p>
                        </div>
                    </div>
                    {/* RATING */} {/* DESCRIPTION */}
                    <div className="mt-4">
                        <p className="text-lg font-light">
                            {restaurantDetails.description}
                        </p>
                    </div>
                    {/*DESCRIPTION   IMAGES*/}
                    <div>
                        <h1 className="font-bold text-3xl mt-10 mb-7 border-b pb-5">
                            {images.length} photo{images.length>1?"s":""}
                        </h1>
                        <div className="flex flex-wrap">
                            {images.map((image: string | undefined)=>
                                <img
                                    className="w-56 h-44 mr-1 mb-1"
                                    src={image}
                                    key={image}
                                    alt=""
                                />
                            )}
                        </div>
                    </div>
                    {/* IMAGES */} {/* REVIEWS */}
                    <Reviews reviews={restaurantDetails.reviews}/>
                </div>
                <ReservationCard/>

            </>
    )
}