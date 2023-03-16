import React from "react";

import emptyStar from "../../public/empty-star.png";
import fullStar from "../../public/full-star.png";
import halfStar from "../../public/half-star.png";
import Image from "next/image";
export default function Stars(rating:number){
    const renderImages = () => {
        const stars = []
        const rate =  Object.values(rating).at(0)
        let n = 0
        while (n < Math.floor(rate)){
            stars.push(fullStar)
            n++
        }
        
        let diff = rate % 1
        if (diff> 0.2 && diff <= 0.6){
            stars.push(halfStar)
        }
        else if(diff<= 0.2){
            stars.push(emptyStar)
        }
        else {stars.push(fullStar)}

        if(stars.length <5){
            let addMore = 5 - stars.length
            let m=0
            while(m < addMore){
                stars.push(emptyStar)
                m++
            }
        }
        if(stars.length > 5){
            const removeStars= stars.length - 5
            stars.slice(0,removeStars-1)

        }
        return stars.map((star)=>(
            <Image key={(Math.random() + 1).toString(36)} src={star} alt='' className='w-4 h-4 mr-1'/>
        ))
    }
    return (
        <div className='flex items-center'>{renderImages()}</div>
    )
}