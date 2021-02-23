<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $table = 'categories';
    protected $primaryKey = 'categories_id';

    public  function detail(){
        return $this->hasOne('App\Models\detail', 'categories_id');
    }
}
