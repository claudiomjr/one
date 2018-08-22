<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'email', 'password','date_of_birth','country_id','document_path','active','user_status_id','token',
    ];

    public function country()
    {
        return $this->belongsTo('App\Countries', 'country_id', 'id');
    }
    public function status()
    {
        return $this->belongsTo('App\UserStatus', 'user_status_id', 'id');
    }

    // public function country()
    // {
    //     return $this->belongsTo('App\Countries');
    // }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
