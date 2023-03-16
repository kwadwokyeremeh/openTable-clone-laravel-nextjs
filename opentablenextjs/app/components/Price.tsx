import {RestaurantCardType} from "./Cards";

interface Props{
    price: string
}
export default function Price({price}: Props){
    const renderPrice  = () => {
        if (price === "Cheap"){
            return <>
            <span>$$</span><span className="text-gray-400">$$</span>
            </>
        }
        else if(price === "Regular"){
            return <>
            <span>$$$</span><span className="text-gray-400">$</span>
            </>
        }
        else {
            return <>
            <span>$$$$</span>
            </>
        }
    }

    return (
        <p className="mr-3">{renderPrice()}</p>
    )
}