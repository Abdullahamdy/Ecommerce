<?php

namespace App\Models;
use ChristianKuri\LaravelFavorite\Traits\Favoriteable;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;
class Product extends Model
{
    use Favoriteable, Rateable;
    protected $guarded = [];

    public function image()
    {
        return $this->morphMany('App\Models\Image', 'imagable');
    }

    public function categories(){
        return $this->belongsTo('App\Models\Category','cat_id');
    }

    public function rating()
    {
      return $this->morphMany(Rating::class,'rateable');
    }
}


