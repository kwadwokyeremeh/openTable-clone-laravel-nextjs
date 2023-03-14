<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Restaurant::whereSlug("vivaan-fine-indian-cuisine-ottawa")
            ->first()
            ->items()
            ->createMany([
                [
                'name'=> "Ghee roast chicken wings",
                'description'=>
                  "Crispy chicken wings coated in a sauce made from roasted whole spices and clarified butter.",
                'price'=> 18.00,
            ],
            [
                'name'=> "Sol Kadhi scallop ceviche",
                'description'=> "Cured scallop served with mangosteen and coconut broth",
                'price'=> 18.00,
            ],
                [
                    'name'=> "Butte ka kees",
                    'description'=>
                      "Bhutte( Corn) Khees( grated) and spiced and tempered served with waffers",
                    'price'=> 17.00,
                ],
                    [
                        'name'=> "Burrata Paapdi Chaat",
        'description'=>
          "Our house made paapdi served with spiced potatoes and burrata cheese dressed with in house chutneys",
        'price'=> 16.00,
                    ],
        [
            'name'=> "Shaadi Waala Chicken Curry",
        'description'=>
          "Chicken curry usually served in weddings back home (Must Try)",
        'price'=> 26.00,
        ],
        [
            'name'=> "Shahi Tukda",
        'description'=>
          "Chef’s signature dessert : crispy bread poched with flavoured milk and topped with homemade cream made of pistachios, rose.",
        'price'=> 11.00,
        ]]
    );
        Restaurant::whereSlug("ramakrishna-indian-restaurant-ottawa")
            ->first()
            ->items()
            ->createMany([
                ['name'=> "Four-In-One Chicken",
        'description'=>
          "Boneless chicken breast pieces marinated with four different kind of texture and Indian spices for each piece and grilled in clay oven",
        'price'=> 16.99,],
        ['name'=> "Chicken Tikka",
        'description'=>
          "Boneless Chicken marinated overnight with yogurt, Indian spices and cooked in a Tandoor oven",
        'price'=> 16.99],
        ['name'=> "Paneer Tikka",
        'description'=>
          "Tandoori Paneer Tikka is made from homemade cottage cheese which is marinated in yogurt and dry aromatic Indian spices along with diced onions and capsicum and grilled in clay oven",
        'price'=> 16.99,],
        ['name'=> "Fish Tikka",
        'description'=>
          "Deboned fish marinated in ginger, garlic and other spices and grilled in clay oven",
        'price'=> 16.99,],
        ['name'=> "Prawn Tandoori",
        'description'=>
          "Large juicy prawn marinated in ginger, garlic, fresh squeezed lemon juice and along with various dry spices and grilled in clay oven",
        'price'=> 19.49,],
        ['name'=> "Mixed Grill",
        'description'=>
          "Tandoori chicken, lamb tikka, chicken tikka and fish grilled in our clay oven",
        'price'=> 20.99,],
        ['name'=> "Coconut Curry",
        'description'=>
          "Choice of boneless chicken breast, lamb, beef, fish or shrimp cooked in a creamy coconut, butter and onion sauce",
        'price'=> 15.99,]
            ]);
        Restaurant::whereName("Coconut Lagoon")
            ->first()
            ->items()
            ->createMany([
                ['name'=> "Quilon Chicken",
        'description'=>
          "free range grass fed chicken cooked in a tangy tomato masala",
        'price'=> 25.00,],
                ['name'=> "Mariposa's Duck Biryani**",
        'description'=> "slow baked in kiama rice, quail egg and raita",
        'price'=> 26.00 ],
                ['name'=> "Pala Lamb Peralan",
        'description'=> "tender morsels of lamb in an exotic masala",
        'price'=> 26.00 ],
        ['name'=> "Roasted Salmon In Moilee Sauce",
        'description'=> "marinated in green mango, spices and roasted",
        'price'=> 27.00 ],
        ['name'=> "Vegetable Aviyal",
        'description'=>
          "assorted vegetables cooked in yoghurt, coconut spiked with cumin",
        'price'=> 22.00 ]
            ]);

        Restaurant::whereName("Last Train to Delhi")
            ->first()
            ->items()
            ->createMany([
                ['name'=> "Aloo Tiki",
        'description'=>
          "Potato croquette topped with pickled seasonal vegetables and an assortment of chutneys",
        'price'=> 12.00 ],
                ['name'=> "Spicy Lamb Chops",
        'description'=>
          "Lamb chops are coated in a spicy marinade and seared. It's paired with mint chutney, mango chutney, and raita. Allergens: Meat",
        'price'=> 16.00 ],
                ['name'=> "Crispy Shrimp",
        'description'=>
          "Tandoori shrimp wrapped in crispy potato accompanied by a seasonal chutney and micro greens from the garden",
        'price'=> 15.00 ],
                ['name'=> "Bhaingan Bharta",
        'description'=> "Smokey eggplant and peas",
        'price'=> 17.00 ],
                ['name'=> "Kofta Curry",
        'description'=>
          "Indian kofta served with bottleneck gourds and potatoes in a cashew coconut sauce",
        'price'=> 20.00 ],
            ]);

        Restaurant::whereName("Adrak Yorkville")
            ->first()
            ->items()
            ->createMany([
                ['name'=> "murgh salaad",
        'description'=> "Chicken breast, mix greens, mint vinegar dressing",
        'price'=> 18.00 ],
                ['name'=> "papad ki tokri",
        'description'=> "Papadams, assorted chutneys & salsa",
        'price'=> 18.00 ],
                ['name'=> "khumb korma",
        'description'=>
          "Aged basmati rice, marinated lamb & puff pastry cover, garlic yogurt",
        'price'=> 36.00 ],
                ['name'=> "dal tadka",
        'description'=> "Yellow lentils, indian tempering",
        'price'=> 20.00 ],
                ['name'=> "cocochoco rasmalai cheese cake",
        'description'=>
          "Coconut crémeux, chocolate hazelnut crunch, coconut snow, citrus gel, cardamom ice cream",
        'price'=> 19.00 ],
            ]);

        Restaurant::whereName("Curryish Tavern")
            ->first()
            ->items()
            ->createMany([
                ['name'=> "Molasses Braised Beef Cheeks Curry",
        'description'=>
          "Caramelised root vegetables, deggi mirch, buttermilk onion rings",
        'price'=> 32.00 ],
                ['name'=> "Coconut Vatan Stuffed Whole Branzino",
        'description'=> "Turmeric lemon butter sauce, curry leaves, mustard seeds",
        'price'=> 39.00 ],
                ['name'=> "Goan Chorizo + Braised Pork Shoulder Curry",
        'description'=>
          "Double smoked bacon, roasted parsnips, red kidney beans, apple achar",
        'price'=> 31.00 ],
                ['name'=> "Screech Rum Soaked Gulab Jamun",
        'description'=> "Whipped mascarpone cream, pistachio crumble",
        'price'=> 14.00 ],
                ['name'=> "Ontario Apple + Almond Halwa Tart",
        'description'=> "Whipped cinnamon malai, red currants",
        'price'=> 14.00 ],
            ]);

        Restaurant::whereName("Utsav")
            ->first()
            ->items()
            ->createMany([
                ['name'=> "Vegetable samosa",
        'description'=> "Seasoned potatoes and peas wrapped in a light pastry",
        'price'=> 4.00 ],
                ['name'=> "Goan fish curry",
        'description'=>
          "Filet of salmon cooked in a traditional hot and tangy coconut curry",
        'price'=> 15.00 ],
                ['name'=> "Lamb vindaloo",
        'description'=>
          "A delicacy from Goa - Boneless lamb cooked in a hot, spicy and tangy sauce with potatoes",
        'price'=> 14.00 ],
                ['name'=> "Matar paneer",
        'description'=>
          "Cottage cheese and green peas cooked in butter flavored onion and tomato gravy",
        'price'=> 10.00 ],
                ['name'=> "Chicken vindaloo",
        'description'=>
          "Chicken cooked with herbs and spices in special hot spicy and tangy sauce with potatoes",
        'price'=> 14.00 ],
        ['name'=> "Chicken jalfrezi",
        'description'=>
          "Chicken cooked with delicious mix of green peppers, onions, green chillies and tomatoes",
        'price'=> 14.00 ]
            ]);

        Restaurant::whereName("Pukka")
            ->first()
            ->items()
            ->createMany([
                ['name'=> "Lamb Lollipops",
        'description'=> "grilled chops with turmeric, mint and fenugreek curry",
        'price'=> 44.00 ],
                ['name'=> "Vegan Tikka Masala",
        'description'=> "tofu, sweet peppers, red onion, tomato and cashew cream",
        'price'=> 23.00 ],
                ['name'=> "Short Ribs",
        'description'=>
          "PEI beef braised with black cumin, cloves, cardamom and fennel seeds",
        'price'=> 32.00 ],
                ['name'=> "Punjabi Chicken Curry",
        'description'=> "spicy home-style chicken curry",
        'price'=> 24.00 ],
                ['name'=> "Pukka Chaat",
        'description'=>
          "string vegetables, sprouts, rice crisps, pomegranate, mango, green apple, chutneys and yoghurt",
        'price'=> 16.00 ],
        ['name'=> "Chicken Tikka",
        'description'=>
          "herb-infused white meat, tandoor roasted and served with tamarind chutney",
        'price'=> 21.00 ]
            ]);

        Restaurant::whereName("Kamasutra Indian")
            ->first()
            ->items()
            ->createMany([
                ['name'=> "Butter Chicken Poutine",
        'description'=>
          "Fries are served topped with melting cheese and butter chicken gravy",
        'price'=> 8.99,],
                ['name'=> "Vegetable Appy Platter",
        'description'=>
          "2 Vegetable samosas, vegetable pakora, paneer pakora, 1 papadum, served with chickpea curry",
        'price'=> 13.99,]
            ]);

        Restaurant::whereName("Eldorado Taco")
            ->first()
            ->items()
            ->create([
                'name'=> "Pulled Chicken",
        'description'=> "marinated chicken with salsa",
        'price'=> 12.00,
            ]);

        Restaurant::whereName("La Bartola")
            ->first()
            ->items()
            ->createMany([
                ['name'=> "Fettuccine Pescatore",
        'description'=> "Scallops, mussels, shrimp and crab meat in a rose sauce",
        'price'=> 33.00 ],
                ['name'=> "Colosseo Pizze",
        'description'=>
          "Luciano's spicy Italian sausage, black olives, hot peppers, mozzarella and parmigiano cheeses",
        'price'=> 22.00 ],
                ['name'=> "Vitello alla Griglia",
        'description'=>
          "Grilled veal medallion, with seasonal vegetables and potatoes",
        'price'=> 35.00 ],
                ['name'=> "Agnello",
        'description'=>
          "Grilled lamb chops in a citrus marinade, with seasonal vegetables and potatoes",
        'price'=> 35.00 ],
                ['name'=> "Orata ai Porri",
        'description'=> "Pan seared sea bream filet with sautéed leeks, served over a wild rice medley and greens",
        'price'=>32.00 ],
                ['name'=> "Insalata di Mare",
        'description'=>
          "Mixed greens tossed in our house viniagriette, topped with grilled shrimp and crab meat",
        'price'=> 25.00 ],
            ]);

        Restaurant::whereName("El Catrin")
            ->first()
            ->items()
            ->createMany([
                ['name'=> "COCHINITA PIBIL",
        'description'=>
          "Achiote rubbed pork, black bean puree, pickled red onion, cilantro, habanero salsa",
        'price'=> 23.00 ],
                ['name'=> "PASTOR",
        'description'=>
          "Marinated shaved pork, pineapple, red onion dice, cilantro, salsa verde, corn tortilla",
        'price'=> 23.00 ],
            ]);

        Restaurant::whereName("3 Mariachis")
            ->first()
            ->items()
            ->createMany([
                ['name'=> "Seafood Molcajete",
        'description'=> "Grilled calamari, morita garlic shrimp, octopus",
        'price'=> 23.00 ],
                ['name'=> "Sirloin Steak & Tuetano Osso Buco",
        'description'=>
          "Bone marrow, slow cooked in the oven, topped with our seasoning",
        'price'=> 26.00 ],
                ['name'=> "Fajitas",
        'description'=>
          "A sizzling bed of onions and bell peppers topped with your choice of protein",
        'price'=> 17.50 ]
            ]);

        Restaurant::whereName("Cano Restaurant")
            ->first()
            ->items()
            ->createMany([
                ['name'=> "Hamachi",
        'description'=>
          "Ponzu à la truffe, truffe noire râpée [Salmon Tataki, Truffle ponzu, Shaved black truffle]",
        'price'=> 24.00 ],
                ['name'=> "Tartare de Thon",
        'description'=>
          "Soja Yuzu, piment serrano [Hot Hamachi, Yuzu soy, Serrano pepper]",
        'price'=> 24.00 ],
                ['name'=> "Tataki de Saumon",
        'description'=>
          "Purée d'avocat, chili soja [Tuna Tartar, Avocado puree, Chili soy]",
        'price'=> 27.00 ],
            ]);

        Restaurant::whereName("Blu Ristorante")
            ->first()
            ->items()
            ->createMany([
                ['name'=> "Tomato Braised Beef Cheek Ragu",
        'description'=>
          "Wild Mushrooms, Sweet Potato & Ricotta Gnocchi, Fresh Basil",
        'price'=> 29.00 ],
                ['name'=> "Roasted Butternut Squash Ravioli",
        'description'=>
          "Gorgonzola, Balsamic Reduction, Brown Butter, Crispy Sage",
        'price'=> 33.00 ],
                ['name'=> "Pan Seared Atlantic Salmon",
        'description'=>
          "Heirloom Carrots, Green Beans, Parsnip Puree, Beluga Lentils & Barley, Chive Oil",
        'price'=> 33.00 ],
                ['name'=> "Woodfire Grilled 12oz AAA Ribeye",
        'description'=>
          "Heirloom Carrots, Green Beans, Sweet Potato Gratin, Mushroom Veal jus",
        'price'=> 55.00 ],
            ]);

        Restaurant::whereName("Stelvio")
            ->first()
            ->items()
            ->createMany([
                ['name'=> "Pizzoccheri di Teglio",
        'description'=>
          "Homemade short buckwheat Pasta coated in three-cheese sauce, savoy cabbage, potatoes, butter and sage",
        'price'=> 24.00 ],
                ['name'=> "Gnocchi al Gorgonzola",
        'description'=> "Fresh homemade Gnocchi served in a blue cheese sauce",
        'price'=> 23.00 ],
                ['name'=> "Risotto ai Funghi",
        'description'=> "Aironi Carnaroli risotto served with mushrooms",
        'price'=> 26.00 ],
                ['name'=> "Spezzatino con Polenta",
        'description'=>
          "Traditional Northern Italian Specialty. Slow-cooked feef stew, cooked in tomato sauce and red wine reduction, served over soft polenta",
        'price'=> 26.00,],
            ]);

    }
}
