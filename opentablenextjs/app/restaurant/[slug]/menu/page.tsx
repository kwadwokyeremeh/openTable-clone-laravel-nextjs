import RestaurantNavBar from "../../../components/restaurant/NavBar";

interface MenuType{
    id:number,
    name:string,
    price:number,
    description:string
}
const fetchRestaurantMenu = async (slug:string) :Promise<MenuType[]> => {
    const restaurantMenu = await fetch(`http://127.0.0.1:8000/restaurant/${slug}/menu`, {
        credentials: "include",
        // cache: "no-cache",
        headers: {
            accept: 'application/json',
            referer: 'http://localhost:3000/',
            // cookie: req.headers.cookie,
        },next: { revalidate: 60 }
    })
    if(!restaurantMenu.ok){
        throw new Error('Failed to fetch data');
    }
    return restaurantMenu.json()
}
export default async function RestaurantMenu({params}:{params:{slug:string}}){
    const menus = await fetchRestaurantMenu(params.slug)
    // console.log(menus)
    return (
            <>
                <div className="bg-white w-[100%] rounded p-3 shadow">
                    {/* RESAURANT NAVBAR */}
                    <RestaurantNavBar slug={params.slug}/>
                    {/* RESAURANT NAVBAR */} {/* MENU */}
                    <main className="bg-white mt-5">
                        <div>
                            <div className="mt-4 pb-1 mb-1">
                                <h1 className="font-bold text-4xl">Menu</h1>
                            </div>
                            <div className="flex flex-wrap justify-between">
                                {menus.length ?
                                    (menus.map((menu)=>{
                                        return (
                                            <div key={menu.id} className=" border rounded p-3 w-[49%] mb-3">
                                                <h3 className="font-bold text-lg capitalize">{menu.name}</h3>
                                                <p className="font-light mt-1 text-sm">
                                                    {menu.description}
                                                </p>
                                                <p className="mt-7">{menu.price}</p>
                                            </div>
                                        )
                                    }))
                                    :
                                    (
                                        <div className=" border rounded p-3 w-[49%] mb-3">
                                            <h3 className="font-bold text-lg capitalize">Empty Menu</h3>
                                            <p className="font-light mt-1 text-sm">
                                                Sorry we've no item on our menu today
                                            </p>
                                        </div>
                                    )
                                }
                            </div>
                        </div>
                    </main>
                    {/* MENU */}
                </div>
            </>
    )
}