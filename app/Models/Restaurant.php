<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Restaurant extends Model
{
    use HasFactory;

    public function typologies(){
        return $this->belongsToMany(Typology::class);
    }

    public function dishes(){
        return $this->hasMany(Dish::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function generateSlug($str){
        $slug = Str::slug($str, '-');
        $original_slug = $slug;

        $slug_exixts = Restaurant::where('slug', $slug)->first();$c = 1;
        while($slug_exixts){$slug = $original_slug . '-' . $c;$slug_exixts = Restaurant::where('slug', $slug)->first();$c++;}
        return $slug;

    }

}