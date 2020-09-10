<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Booking extends Authenticatable
{

    protected $table = 'booking';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bookdate', 'booktime','service','address','user_id','status'
    ];

    public function servicedata()
    {
        return $this->hasOne('App\Models\UserServices','id', 'service');
    }
}
