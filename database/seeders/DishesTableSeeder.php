<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes = config('dishes');

        foreach($dishes as $dish){
            $new_dish = new Dish();
            $new_dish->restaurant_id = $dish['restaurant_id'];
            $new_dish->name = $dish['name'];
            $new_dish->slug = Dish::generateSlug($new_dish->name);
            $new_dish->image_path = $dish['image_path'];
            $new_dish->image_original_name = $dish['image_original_name'];
            $new_dish->price = $dish['price'];
            $new_dish->description = $dish['description'];
            $new_dish->ingredients = implode(", ", $dish['ingredients']) ;
            $new_dish->visible = $dish['visibility'];
            $new_dish->vote = $dish['vote'];
            $new_dish->save();
        }

    }
}
