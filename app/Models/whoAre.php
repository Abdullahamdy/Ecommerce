<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class whoAre extends Model
{

    protected $fillable = ['message','url_video','name'];
    public function image()
    {
        return $this->morphMany('App\Models\Image', 'imagable');
    }
}
