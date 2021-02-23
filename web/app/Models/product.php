<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class product extends Model
{
    //
    protected $table = 'products';
    protected $primaryKey = 'products_id';


    public function user()
    {
        return $this->belongsTo('App\Models\user','users_id');
    }

    public function detail(){
        return $this->hasOne('App\Models\detail','products_id');
    }

    public  function image(){
        return $this->hasMany('App\Models\image', 'products_id');
    }

    public  function like(){
        return $this->hasMany('App\Models\like', 'products_id');
    }




    public function getLikesProduct(Collection $collection){

        $pdi = [];
        $i=0;
        foreach ($collection as $item) {

            $pdi[$i] = $item->like->count();
            $i++;
        }

        return $pdi;
    }

    public function showNewProducts(Collection $collection){

        $collectionQuery = collect();


        foreach ($collection as $item) {


            $collectionGetQuery = collect(
                [
                    'product_id' => $item->products_id,
                    'user_id' => $item->users_id,
                    'product_price' => $item->detail->details_price,
                    'user_image' => $item->user->users_images_path,
                    'likes' => $item->like->count(),
                    'data' => $item->created_at,
                ]
            );

            $collectionQuery->push($collectionGetQuery);

        }



        return $collectionQuery;
    }

    public function showCateProducts(Collection $collection, int $cateNum){

        $collectionQuery = collect();
        $i = 0;



        foreach ($collection as $item) {

            if($cateNum == $item->detail->categories_id){
                $collectionGetQuery = collect(
                    [
                        'product_id' => $item->products_id,
                        'user_id' => $item->users_id,
                        'category_id' => $item->detail->categories_id,
                        'category_name' => category::find($item->detail->categories_id)->categories_name,
                        'product_price' => $item->detail->details_price,
                        'user_image' => $item->user->users_images_path,
                        'likes' => $item->like->count(),
                        'data' => $item->created_at,
                    ]
                );

                $collectionQuery->push($collectionGetQuery);
                if ($i > 2){
                    break;
                }
                $i++;
            }
        }

        return $collectionQuery;


    }


}
