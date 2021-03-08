<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class trademassa extends Model
{
    //

    protected $table = 'trademassas';
    protected $primaryKey = 'trademassas_id';

    //
    public function user()
    {
        return $this->belongsTo('App\Models\user','users_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\product','products_id');
    }

    public function showTradeMessage($collect){
        $queryCollect = collect();

        foreach ($collect as $item){
            $itemcollect = collect([
                "user_id" => $item->user->users_id,
                "user_name" => $item->user->users_name,
                "user_image" => $item->user->users_images_path,
                "trademassas_message" => $item->trademassas_message,
                "date" => $item->trademassas_date
            ]);
            $queryCollect->push($itemcollect);
        }

        return $queryCollect;
    }
}
