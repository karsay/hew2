<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class history extends Model
{

    protected $table = 'histories';
    protected $primaryKey = 'products_id';

    //
    public function user()
    {
        return $this->belongsTo('App\Models\user','users_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\product','products_id');
    }
}
