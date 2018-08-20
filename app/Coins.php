<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coins extends Model
{
    //
    //use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'abbrev', 'fixed_value','image','wallet_address'
    ];
}
