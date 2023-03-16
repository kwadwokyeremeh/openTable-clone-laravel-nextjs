import Header from "./components/Header";
import Stars from "./components/Stars";
import Price from "./components/Price";
import Image from "next/image";
import defaultLoader from "next/dist/shared/lib/image-loader";

export default function Loading(){

    return(
        <main>
            <Header/>
            <div className="py-3 px-36 mt-10 flex flex-wrap flex-row">
                {[1,2,3,4,5,6,7,8,9,10,11,12].map((num)=>(
                    <div key={num}
                         className="w-64 h-72 m-3 rounded overflow-hidden border cursor-pointer"
                    >
                        <Image

                            src=""
                            alt="Picture "
                            width={0}
                            height={0}
                            // loader={imageLoader}
                            className="w-full h-36"
                        />
                        <div className="p-1">
                            <h3 className="font-bold text-2xl mb-2">Loading...</h3>
                            <div className="flex items-start">
                                <div className="flex mb-2"></div>
                                <p className="ml-2"> loading...</p>
                            </div>
                            <div className="flex text-reg font-light capitalize">
                                <p className=" mr-3">loading...</p>

                                <p>...</p>
                            </div>
                            <p className="text-sm mt-1 font-bold">Booked ... times today</p>
                        </div>
                    </div>
                ))}
            </div>
        </main>
    )
}