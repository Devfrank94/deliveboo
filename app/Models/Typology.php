<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Typology extends Model
{
    use HasFactory;

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }
    public static function generateSlug($str){
        $slug = Str::slug($str, '-');
        $original_slug = $slug;

        $slug_exixts = Typology::where('slug', $slug)->first();$c = 1;
        while($slug_exixts){$slug = $original_slug . '-' . $c;$slug_exixts = Typology::where('slug', $slug)->first();$c++;}
        return $slug;

    }

}
