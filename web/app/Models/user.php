<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class user extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'users_id';
    protected $fillable = [
    'users_name', 'users_email', 'users_gender',
    'users_birthday', 'users_postal_code', 'users_state',
    'users_city', 'users_suburb'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function product()
    {
      return $this->hasMany('App\Models\product','users_id');
    }
}
