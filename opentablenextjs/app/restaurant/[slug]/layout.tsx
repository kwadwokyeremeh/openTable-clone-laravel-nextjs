import Header from "../../components/restaurant/Header";

export default function RestaurantLayout({children,params}:{children: React.ReactNode,params:{slug:string}})

{
    return (
        <>
            <Header name={params.slug}/>
            {/* HEADER */} {/* DESCRIPTION PORTION */}
            <div className="flex m-auto w-2/3 justify-between items-start 0 -mt-11">
                {children}
            </div>
        </>
    )
}