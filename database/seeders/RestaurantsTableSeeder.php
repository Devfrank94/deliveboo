<?php

namespace Database\Seeders;
use App\Models\Restaurant;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = config('restaurants');

        foreach ($restaurants as $restaurant){
            $new_restaurant = new Restaurant;
            $new_restaurant->name = $restaurant['name'];
            $new_restaurant->slug = Restaurant::generateSlug($new_restaurant->name);
            $new_restaurant->image_path = $restaurant['image_path'];
            $new_restaurant->image_original_name = $restaurant['image_original_name'];
            $new_restaurant->address = $restaurant['address'];
            $new_restaurant->p_iva = $restaurant['p_iva'];
            $new_restaurant->visible = $restaurant['visible'];
            $new_restaurant->save();
            }
    }
}
