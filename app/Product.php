<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    protected $fillable=['name', 'description', 'price', 'quantity', 'base','category_id','provider_id'];

    public static function boot() {
        parent::boot();
        static::creating(function ($product) {
            $product->user_id = Auth::id();
        });
    }

    public function notifications(){
        return $this->hasMany('App\Notification');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function provider(){
        return $this->belongsTo('App\User');
    }
}
