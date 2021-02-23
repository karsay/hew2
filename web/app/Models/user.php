<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    //
    protected $table = 'users';
    protected $primaryKey = 'users_id';

    public function product()
    {
        return $this->hasMany('App\Models\product','users_id');
    }
}
