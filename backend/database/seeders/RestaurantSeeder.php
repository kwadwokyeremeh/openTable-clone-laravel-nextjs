<?php

namespace Database\Seeders;

use App\Enums\Price;
use App\Models\Cuisine;
use App\Models\Location;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ottawaLocationId = Location::where('name', 'ottawa')->first()->id;
        $torontoLocationId = Location::where('name', 'toronto')->first()->id;
        $niagaraLocationId = Location::where('name', 'niagara')->first()->id;
        $indianCuisine = Cuisine::where('name', 'indian')->first()->id;
        $italianCuisine = Cuisine::where('name', 'italian')->first()->id;
        $mexicanCuisine = Cuisine::where('name', 'mexican')->first()->id;

        Restaurant::create([
            'name' => 'Vivaan - fine Indian',
            'description' => 'Vivaan is Modern Indian Cuisine serving dishes from different regions of India. We carefully select our ingredients and use them to make authentic Indian recipes and our chef puts his modern flair and twists to the dishes.',
            'main_img' => 'https://resizer.otstatic.com/v2/photos/wide-huge/1/32109459.jpg',
            'images' => json_encode([
                'https://resizer.otstatic.com/v2/photos/xlarge/2/32109461.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/32459786.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/32484701.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/32484708.jpg',
            ]),
            'open_time' => Carbon::createFromTimeString('14:30:00.000Z')->toTimeString(),
            'close_time' => Carbon::createFromTimeString('21:30:00.000Z')->toTimeString(),
            'slug' => 'vivaan-fine-indian-cuisine-ottawa',
            'price' => Price::Regular,
            'location_id' => $ottawaLocationId,
            'cuisine_id' => $indianCuisine,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Restaurant::create([
            'name' => 'RamaKrishna Indian',
            'description' => 'With 20 years of experience cooking in the finest restaurants, our chef is excited to present their vision to you and all our guests. Our caring and committed staff will ensure you have a fantastic experience with us.',
            'main_img' => 'https://resizer.otstatic.com/v2/photos/wide-huge/2/47417441.jpg',
            'images' => json_encode([
                'https://resizer.otstatic.com/v2/photos/xlarge/2/47417455.png',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/47417456.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/47417457.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/47417458.jpg',
            ]),
            'open_time' => Carbon::createFromTimeString('12:30:00.000Z')->toTimeString(),
            'close_time' => Carbon::createFromTimeString('22:00:00.000Z')->toTimeString(),
            'slug' => 'ramakrishna-indian-restaurant-ottawa',
            'price' => Price::Cheap,
            'location_id' => $ottawaLocationId,
            'cuisine_id' => $indianCuisine,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Restaurant::create([
            'name' => 'Coconut Lagoon',
            'description' => 'At Coconut Lagoon prepare yourselves for a most memorable journey through South Indian cuisine and feast on high quality food of inimitable flavour, aroma and originality in the vibrant setting of Coconut Lagoon.',
            'main_img' => 'https://resizer.otstatic.com/v2/photos/wide-huge/3/48545745.jpg',
            'images' => json_encode([
                'https://resizer.otstatic.com/v2/photos/xlarge/1/30045353.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/48545766.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/30045356.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/49399187.jpg',
            ]),
            'open_time' => Carbon::createFromTimeString('17:30:00.000Z')->toTimeString(),
            'close_time' => Carbon::createFromTimeString('22:00:00.000Z')->toTimeString(),
            'slug' => 'coconut-lagoon-ottawa',
            'price' => Price::Expensive,
            'location_id' => $ottawaLocationId,
            'cuisine_id' => $indianCuisine,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Restaurant::create([
            'name' => 'Last Train to Delhi',
            'description' => 'Welcome to Last Train to Delhi. We are a progressive Indian restaurant in the beautiful Glebe community in Ottawa. Our speciality is Northern Indian food, classics like Murg Mahkini and some modern dishes like Crispy Shrimp. We are a small cozy restaurant, so make sure that you reserve through OpenTable.',
            'main_img' => 'https://resizer.otstatic.com/v2/photos/wide-huge/3/26429498.jpg',
            'images' => json_encode([
                'https://resizer.otstatic.com/v2/photos/xlarge/1/29477326.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/29777084.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/32104059.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/32104066.jpg',
            ]),
            'open_time' => Carbon::createFromTimeString('10:00:00.000Z')->toTimeString(),
            'close_time' => Carbon::createFromTimeString('21:00:00.000Z')->toTimeString(),
            'slug' => 'last-train-to-delhi-ottawa',
            'price' => Price::Regular,
            'location_id' => $ottawaLocationId,
            'cuisine_id' => $indianCuisine,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Restaurant::create([
            'name' => 'Adrak Yorkville',
            'description' => 'Namaste and welcome to Adrak - a place where food unites all. We take you through a journey of the past and present, as we hope to encourage thought-provoking conversations amid elevated Indian food.',

            'main_img' => 'https://resizer.otstatic.com/v2/photos/wide-huge/4/47914200.jpg',
            'images' => json_encode([
                'https://resizer.otstatic.com/v2/photos/xlarge/3/47914185.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/3/47914186.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/47980632.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/47980634.jpg',
            ]),
            'open_time' => Carbon::createFromTimeString('16:00:00.000Z')->toTimeString(),
            'close_time' => Carbon::createFromTimeString('21:00:00.000Z')->toTimeString(),
            'slug' => 'adrak-yorkville-toronto',
            'price' => Price::Expensive,
            'location_id' => $torontoLocationId,
            'cuisine_id' => $indianCuisine,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Restaurant::create([
            'name' => 'Curryish Tavern',
            'description' => "The most unique Indian food in the world! We are inspired by the seasons of Ontario and the cooking techniques of the world. Regale in the imagination of Chef Miheer Shete's dishes and change your palate for life.",

            'main_img' => 'https://resizer.otstatic.com/v2/photos/wide-huge/3/49294128.jpg',
            'images' => json_encode([
                'https://resizer.otstatic.com/v2/photos/xlarge/2/48765139.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/48765149.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/48765157.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/48765162.jpg',
            ]),
            'open_time' => Carbon::createFromTimeString('10:00:00.000Z')->toTimeString(),
            'close_time' => Carbon::createFromTimeString('21:00:00.000Z')->toTimeString(),
            'slug' => 'curryish-tavern-toronto',
            'price' => Price::Regular,
            'location_id' => $torontoLocationId,
            'cuisine_id' => $indianCuisine,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Restaurant::create([
            'name' => 'Utsav',
            'description' => "Utsav is an ancient Sanskrit word meaning festival. An integral part of Indian culture, Indian festivals are innumerable and equally varied in origin from the Himalayan foothills to the Peninsula's tip and food plays a very prominent part of the festive events.",

            'main_img' => 'https://resizer.otstatic.com/v2/photos/xlarge/1/26646742.jpg',
            'images' => json_encode([
                'https://resizer.otstatic.com/v2/photos/xlarge/1/26646742.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/26646761.jpg',
            ]),
            'open_time' => Carbon::createFromTimeString('14:00:00.000Z')->toTimeString(),
            'close_time' => Carbon::createFromTimeString('19:00:00.000Z')->toTimeString(),
            'slug' => 'utsav-toronto',
            'price' => Price::Cheap,
            'location_id' => $torontoLocationId,
            'cuisine_id' => $indianCuisine,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Restaurant::create([
            'name' => 'Pukka',
            'description' => 'At this refined, yet casual, Indian restaurant, the portions are large, the wine list is top-notch, and the ambience encourages sharing.',

            'main_img' => 'https://resizer.otstatic.com/v2/photos/wide-huge/1/25733300.jpg',
            'images' => json_encode([
                'https://resizer.otstatic.com/v2/photos/xlarge/1/25733294.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/25733295.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/25733296.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/25733297.jpg',
            ]),
            'open_time' => Carbon::createFromTimeString('12:00:00.000Z')->toTimeString(),
            'close_time' => Carbon::createFromTimeString('21:00:00.000Z')->toTimeString(),
            'slug' => 'pukka-niagara',
            'price' => Price::Expensive,
            'location_id' => $niagaraLocationId,
            'cuisine_id' => $indianCuisine,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Restaurant::create([
            'name' => 'Kamasutra Indian',
            'description' => 'This elegant fine dining Indian Restaurant has been satisfying the Indian tandoori and curry cravings for 12 years in Toronto.',

            'main_img' => 'https://resizer.otstatic.com/v2/photos/xlarge/1/25602522.jpg',
            'images' => json_encode([
                'https://resizer.otstatic.com/v2/photos/xlarge/3/31854185.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/3/31854188.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/25684161.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/26009011.jpg',
            ]),
            'open_time' => Carbon::createFromTimeString('10:00:00.000Z')->toTimeString(),
            'close_time' => Carbon::createFromTimeString('21:00:00.000Z')->toTimeString(),
            'slug' => 'kamasutra-indian-restaurant-and-wine-bar-niagara',
            'price' => Price::Cheap,
            'location_id' => $niagaraLocationId,
            'cuisine_id' => $indianCuisine,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Restaurant::create([
            'name' => 'Eldorado Taco',
            'description' => 'Eldorado Taco restaurant is excited to serve you traditional Mexican cuisine, re-imagined with a distinct modern flair, in a stylish setting on Preston street. Striving to bring you some of Ottawa’s best Tacos, margaritas and Tequila. Reserve your table now!',

            'main_img' => 'https://resizer.otstatic.com/v2/photos/wide-huge/2/42557297.jpg',
            'images' => json_encode([
                'https://resizer.otstatic.com/v2/photos/xlarge/1/29501707.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/29501713.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/3/29501715.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/42557295.jpg',
            ]),
            'open_time' => Carbon::createFromTimeString('16:00:00.000Z')->toTimeString(),
            'close_time' => Carbon::createFromTimeString('19:00:00.000Z')->toTimeString(),
            'slug' => 'eldorado-taco-ottawa',
            'price' => Price::Regular,
            'location_id' => $ottawaLocationId,
            'cuisine_id' => $mexicanCuisine,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Restaurant::create([
            'name' => 'La Bartola',
            'description' => 'At La Bartola, we inspire a passion for authentic Mexican flavours. We use simple, fresh, and high-quality local & Mexican ingredients to craft delicious and thoughtful food.',

            'main_img' => 'https://resizer.otstatic.com/v2/photos/wide-huge/2/48981502.jpg',
            'images' => json_encode([
                'https://resizer.otstatic.com/v2/photos/xlarge/2/48981480.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/48981483.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/48981485.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/48981487.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/48981490.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/48981492.jpg',
            ]),
            'open_time' => Carbon::createFromTimeString('12:00:00.000Z')->toTimeString(),
            'close_time' => Carbon::createFromTimeString('21:00:00.000Z')->toTimeString(),
            'slug' => 'la-bartola-ottawa',
            'price' => Price::Expensive,
            'location_id' => $ottawaLocationId,
            'cuisine_id' => $mexicanCuisine,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Restaurant::create([
            'name' => 'El Catrin',
            'description' => 'Reservations are booked for indoors only. Seating time will be limited to two hours maximum.',

            'main_img' => 'https://resizer.otstatic.com/v2/photos/wide-huge/2/28028883.png',
            'images' => json_encode([
                'https://resizer.otstatic.com/v2/photos/xlarge/1/25770621.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/25770622.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/25770624.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/25770625.jpg',
            ]),
            'open_time' => Carbon::createFromTimeString('09:00:00.000Z')->toTimeString(),
            'close_time' => Carbon::createFromTimeString('21:00:00.000Z')->toTimeString(),
            'slug' => 'el-catrin-ottawa',
            'price' => Price::Cheap,
            'location_id' => $ottawaLocationId,
            'cuisine_id' => $mexicanCuisine,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Restaurant::create([
            'name' => '3 Mariachis',
            'description' => 'Specializing in the preparation of high quality Mexican food. Our vibrant décor, carefully selected menu, great staff and exciting entertainment will ensure that you are treated to a unique dining experience.',

            'main_img' => 'https://resizer.otstatic.com/v2/photos/wide-huge/2/32449465.jpg',
            'images' => json_encode([
                'https://resizer.otstatic.com/v2/photos/xlarge/1/32490939.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/32490987.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/32507838.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/41724689.jpg',
            ]),
            'open_time' => Carbon::createFromTimeString('09:00:00.000Z')->toTimeString(),
            'close_time' => Carbon::createFromTimeString('21:00:00.000Z')->toTimeString(),
            'slug' => 'el-catrin-toronto',
            'price' => Price::Cheap,
            'location_id' => $torontoLocationId,
            'cuisine_id' => $mexicanCuisine,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Restaurant::create([
            'name' => 'Casa Madera',
            'description' => 'The first location in Canada, from famed restauranteurs Noble 33, welcomes patrons into an immersive dining experience.',

            'main_img' => 'https://resizer.otstatic.com/v2/photos/wide-huge/3/47744844.jpg',
            'images' => json_encode([
                'https://resizer.otstatic.com/v2/photos/xlarge/2/47745080.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/47745081.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/47745093.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/47745097.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/47745144.jpg',
            ]),
            'open_time' => Carbon::createFromTimeString('15:00:00.000Z')->toTimeString(),
            'close_time' => Carbon::createFromTimeString('21:00:00.000Z')->toTimeString(),
            'slug' => 'casa-madera-toronto',
            'price' => Price::Expensive,
            'location_id' => $torontoLocationId,
            'cuisine_id' => $mexicanCuisine,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Restaurant::create([
            'name' => 'Taco N Tequila',
            'description' => 'As a family owned business, our goal is simple: to consistently deliver fresh and delicious Mexican flavours in a FUN and friendly atmosphere with the best service around!',

            'main_img' => 'https://resizer.otstatic.com/v2/photos/wide-huge/3/47429858.jpg',
            'images' => json_encode([
                'https://resizer.otstatic.com/v2/photos/xlarge/2/47600418.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/47429797.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/47429802.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/47745097.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/47429814.jpg',
            ]),
            'open_time' => Carbon::createFromTimeString('10:00:00.000Z')->toTimeString(),
            'close_time' => Carbon::createFromTimeString('21:00:00.000Z')->toTimeString(),
            'slug' => 'casa-madera-niagara',
            'price' => Price::Cheap,
            'location_id' => $niagaraLocationId,
            'cuisine_id' => $mexicanCuisine,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Restaurant::create([
            'name' => 'El Jefe',
            'description' => 'Lively cantina serving Mexican favorites & potent margaritas in a vibrant, airy space with murals.',

            'main_img' => 'https://resizer.otstatic.com/v2/photos/wide-huge/3/47710768.jpg',
            'images' => json_encode([]),
            'open_time' => Carbon::createFromTimeString('10:00:00.000Z')->toTimeString(),
            'close_time' => Carbon::createFromTimeString('21:00:00.000Z')->toTimeString(),
            'slug' => 'el-jefe-niagara',
            'price' => Price::Cheap,
            'location_id' => $niagaraLocationId,
            'cuisine_id' => $mexicanCuisine,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Restaurant::create([
            'name' => 'Cano Restaurant',
            'description' => 'Our back patio has now officially reopened for FOOD SERVICE only. Drinks can be ordered and consumed at the bar before, during, or after dinner service.',

            'main_img' => 'https://resizer.otstatic.com/v2/photos/wide-huge/2/43463549.jpg',
            'images' => json_encode([
                'https://resizer.otstatic.com/v2/photos/xlarge/2/43463554.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/43463742.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/43463745.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/43463748.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/43463750.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/43463751.jpg',
            ]),
            'open_time' => Carbon::createFromTimeString('13:00:00.000Z')->toTimeString(),
            'close_time' => Carbon::createFromTimeString('21:00:00.000Z')->toTimeString(),
            'slug' => 'cano-restaurant-ottawa',
            'price' => Price::Regular,
            'location_id' => $ottawaLocationId,
            'cuisine_id' => $italianCuisine,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Restaurant::create([
            'name' => 'Blu Ristorante',
            'description' => 'Victorian Building with two floors of dining space and large side and front patio. Tastefully designed to host your special event, romantic dinner, corporate buyout or a celebration of any sort.',

            'main_img' => 'https://resizer.otstatic.com/v2/photos/wide-huge/2/47350167.jpg',
            'images' => json_encode([
                'https://resizer.otstatic.com/v2/photos/xlarge/1/25305566.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/25305567.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/25305568.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/25305569.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/25305570.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/30091570.jpg',
            ]),
            'open_time' => Carbon::createFromTimeString('15:00:00.000Z')->toTimeString(),
            'close_time' => Carbon::createFromTimeString('22:00:00.000Z')->toTimeString(),
            'slug' => 'blu-ristorante-ottawa',
            'price' => Price::Expensive,
            'location_id' => $ottawaLocationId,
            'cuisine_id' => $italianCuisine,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Restaurant::create([
            'name' => 'Stelvio',
            'description' => 'Stelvio on Dundas West is an authentic Italian restaurant serving classic old world fare using traditional recipes and ingredients. Recipes have been fine-tuned to satisfy the palate of the modern guest, and fresh meals are prepared daily.',
            'main_img' => 'https://resizer.otstatic.com/v2/photos/wide-huge/3/50557365.jpg',
            'images' => json_encode([
                'https://resizer.otstatic.com/v2/photos/xlarge/3/26374971.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/26374974.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/26374975.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/26374976.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/50557389.jpg',
            ]),
            'open_time' => Carbon::createFromTimeString('13:00:00.000Z')->toTimeString(),
            'close_time' => Carbon::createFromTimeString('21:00:00.000Z')->toTimeString(),
            'slug' => 'stelvio-ottawa',
            'price' => Price::Regular,
            'location_id' => $ottawaLocationId,
            'cuisine_id' => $italianCuisine,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Restaurant::create([
            'name' => 'Terroni Adelaide',
            'description' => 'Terroni Adelaide’s multi-level location is located in Toronto’s historic York County Court House circa 1853.',
            'main_img' => 'https://resizer.otstatic.com/v2/photos/wide-huge/3/46827195.jpg',
            'images' => json_encode([
                'https://resizer.otstatic.com/v2/photos/xlarge/2/42309468.png',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/42309469.png',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/42309470.png',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/42309472.png',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/42309474.png',
            ]),
            'open_time' => Carbon::createFromTimeString('12:00:00.000Z')->toTimeString(),
            'close_time' => Carbon::createFromTimeString('18:00:00.000Z')->toTimeString(),
            'slug' => 'terroni-adelaide-niagara',
            'price' => Price::Regular,
            'location_id' => $niagaraLocationId,
            'cuisine_id' => $italianCuisine,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Restaurant::create([
            'name' => 'EST Restaurant',
            'description' => 'ēst is a modern, newly reopened restaurant serving Italian-French courses, captivating cocktails and wine.',
            'main_img' => 'https://resizer.otstatic.com/v2/photos/wide-huge/3/49169798.jpg',
            'images' => json_encode([
                'https://resizer.otstatic.com/v2/photos/xlarge/2/49253937.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/49253940.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/49253941.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/49415599.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/49415604.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/49696221.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/1/49999039.jpg',
            ]),
            'open_time' => Carbon::createFromTimeString('09:00:00.000Z')->toTimeString(),
            'close_time' => Carbon::createFromTimeString('21:00:00.000Z')->toTimeString(),
            'slug' => 'est-restaurant-niagara',
            'price' => Price::Cheap,
            'location_id' => $niagaraLocationId,
            'cuisine_id' => $italianCuisine,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Restaurant::create([
            'name' => 'Sofia',
            'description' => 'Tapping into true Italian tastes, the menu starts with a selection of antipasti including a citrus salad and grilled octopus, and a plentiful selection of crudo. ',

            'main_img' => 'https://resizer.otstatic.com/v2/photos/xlarge/1/25558850.jpg',
            'images' => json_encode([
                'https://resizer.otstatic.com/v2/photos/xlarge/25629442.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/25636273.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/25679656.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/25825772.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/26011606.jpg',
            ]),
            'open_time' => Carbon::createFromTimeString('13:00:00.000Z')->toTimeString(),
            'close_time' => Carbon::createFromTimeString('21:00:00.000Z')->toTimeString(),
            'slug' => 'sofia-toronto',
            'price' => Price::Expensive,
            'location_id' => $torontoLocationId,
            'cuisine_id' => $italianCuisine,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Restaurant::create([
            'name' => 'Terroni Sud Forno',
            'description' => 'Spaccio West, near the Lower Junction on the West Toronto Railpath, acts as the backstage to the main show taking place at all Terroni locations.',

            'main_img' => 'https://resizer.otstatic.com/v2/photos/wide-huge/3/49463645.png',
            'images' => json_encode([
                'https://resizer.otstatic.com/v2/photos/xlarge/2/48741813.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/48741816.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/48741821.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/48741826.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/48741827.jpg',
            ]),
            'open_time' => Carbon::createFromTimeString('10:00:00.000Z')->toTimeString(),
            'close_time' => Carbon::createFromTimeString('21:00:00.000Z')->toTimeString(),
            'slug' => 'terroni-sud-forno-produzione-e-spaccio-toronto',
            'price' => Price::Regular,
            'location_id' => $torontoLocationId,
            'cuisine_id' => $italianCuisine,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Restaurant::create([
            'name' => 'il Padrino',
            'description' => 'Welcome to the newest edition to College street iL PADRINO Ristorante has joined the list of Italian restaurants where Chef Connie award winning Italian Chef makes every Italian dish with love like no other. ',

            'main_img' => 'https://resizer.otstatic.com/v2/photos/wide-huge/3/49616181.jpg',
            'images' => json_encode([
                'https://resizer.otstatic.com/v2/photos/xlarge/2/49494556.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/49494562.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/2/49494563.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/3/49494887.jpg',
                'https://resizer.otstatic.com/v2/photos/xlarge/3/49533502.jpg',
            ]),
            'open_time' => Carbon::createFromTimeString('07:00:00.000Z')->toTimeString(),
            'close_time' => Carbon::createFromTimeString('21:00:00.000Z')->toTimeString(),
            'slug' => 'il-padrino-toronto',
            'price' => Price::Cheap,
            'location_id' => $torontoLocationId,
            'cuisine_id' => $italianCuisine,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
//        L4QR31t1xJp6pf1q
    }
}
