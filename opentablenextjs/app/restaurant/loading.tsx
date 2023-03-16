import Header from "../components/restaurant/Header";
import RestaurantNavBar from "../components/restaurant/NavBar";
import Stars from "../components/Stars";
import Reviews from "../components/restaurant/Reviews";

export default function Loading()

{
    return (
        <>
            <Header name="loading...city"/>
            {/* HEADER */} {/* DESCRIPTION PORTION */}
            <div className="flex m-auto w-2/3 justify-between items-start 0 -mt-11">
                <div className="bg-white w-[70%] rounded p-3 shadow">
                    {/* RESTAURANT NAVBAR */}
                    <RestaurantNavBar slug='loading...'/>
                    {/* RESAURANT NAVBAR */} {/* TITLE */}
                    <div className="mt-4 border-b pb-6">
                        <h1 className="font-bold text-6xl">loading</h1>
                    </div>
                    {/* TITLE */} {/* RATING */}
                    <div className="flex items-end">
                        <div className="ratings mt-2 flex items-center">
                            <p></p>
                            <p className="text-reg ml-3">loading...</p>
                        </div>
                        <div>
                            <p className="text-reg ml-4">... Reviews</p>
                        </div>
                    </div>
                    {/* RATING */} {/* DESCRIPTION */}
                    <div className="mt-4">
                        <p className="text-lg font-light">
                            ...
                        </p>
                    </div>
                    {/*DESCRIPTION   IMAGES*/}
                    <div>
                        <h1 className="font-bold text-3xl mt-10 mb-7 border-b pb-5">
                            loading photos
                        </h1>
                        <div className="flex flex-wrap">

                                <img
                                    className="w-56 h-44 mr-1 mb-1"
                                    src='{image}'
                                    key='{image}'
                                    alt=""
                                />
                        </div>
                    </div>
                    {/* IMAGES */} {/* REVIEWS */}

                </div>
            </div>
        </>
    )
}