import {RestaurantDetailsType} from "../../restaurant/[slug]/page";
import Stars from "../Stars";

export interface ReviewType{
    id:number,
    comment: string,
    rating: number
    user: UserType
}
export interface UserType{
    id: string,
    firstName: string,
    lastName: string,
    city:string,
    email:string,
    phone:string
}

interface Props{
    reviews:ReviewType[]
}
export default function Reviews({reviews}:Props){
    const renderInitials = (firstName: string, lastName: string)=>{
        return `${firstName.charAt(0)}${lastName.charAt(0)}`
    }
    return (
        <div>
            <h1 className="font-bold text-3xl mt-10 mb-7 borber-b pb-5">
                What {reviews.length} people are saying
            </h1>
            {Object.create(reviews).map((review:ReviewType)=>(
                <div key={review.id}>
                    {/* REVIEW CARD */}
                    <div className="border-b pb-7 mb-7">
                        <div className="flex">
                            <div className="w-1/6 flex flex-col items-center">
                                <div
                                    className="rounded-full bg-blue-400 w-16 h-16 flex items-center justify-center"
                                >
                                    <h2 className="text-white text-2xl">{renderInitials(review.user.firstName,review.user.lastName)}</h2>
                                </div>
                                <p className="text-center">{review.user.firstName} {review.user.lastName}</p>
                            </div>
                            <div className="ml-10 w-5/6">
                                <div className="flex items-center">
                                    <div className="flex mr-5"><Stars rating={review.rating/2}/></div>
                                </div>
                                <div className="mt-5">
                                    <p className="text-lg font-light">
                                        {review.comment}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/* REVIEW CARD */}
                </div>
            ))}

        </div>
    )
}