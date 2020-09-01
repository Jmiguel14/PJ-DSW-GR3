<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Petition extends Model
{
    protected $fillable=['status'];

    public static function boot() {
        parent::boot();
        static::creating(function ($petition) {
            $petition->user_transmitter_id = Auth::id();
            $petition->user_receiver_id = Auth::id();
        });
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
