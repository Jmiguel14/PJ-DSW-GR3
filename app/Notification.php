<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable=['message'];

    public function product(){
        return $this->belongsTo('App\Product');
    }
}
