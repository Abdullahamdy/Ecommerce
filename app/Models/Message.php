<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{


    protected $fillable = ['message', 'user_id', 'receiver', 'is_seen', 'file'];

    public function user() {
        return $this->belongsTo('\App\User');
    }

}
