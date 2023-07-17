<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Dish extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'restaurant_id',
        'slug',
        'description',
        'ingredients',
        'image_path',
        'price',
        'vote',
        'visible'
    ];

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }

    public static function generateSlug($str){

        $slug = Str::slug($str, '-');
        $original_slug = $slug;
        $slug_exixts = Dish::where('slug', $slug)->first();
        $c = 1;
        while($slug_exixts){
            $slug = $original_slug . '-' . $c;
            $slug_exixts = Dish::where('slug', $slug)->first();
            $c++;
        }

        return $slug;
    }

}




