<?php

namespace Database\Seeders;

use App\Models\Typology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typologies = config('typologies');

        foreach ($typologies as $typology){
            $new_typology = new Typology;
            $new_typology->name = $typology['name'];
            $new_typology->slug = Typology::generateSlug($new_typology->name);
            $new_typology->save();
        }
    }
}

