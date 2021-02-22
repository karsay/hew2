<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail extends Model
{
    //
    protected $table = 'details';
    protected $primaryKey = 'products_id';

    public function product()
    {
        return $this->belongsTo('App\Models\product');
    }

}
