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

    public  function likeCount(){
        return $this->like()->count();
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
                    'product_is_selled' => $item->products_is_selled,
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
                        'product_is_selled' => $item->products_is_selled,
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

    public function detailProduct(Collection $collection){

        $query = collect();
//        $imgpath = [];
//        $i = 0;
//
//        foreach ($collection as $item){
//            $imgpath[$i] = $item->images_path;
//            $i++;
//        }


        foreach ($collection as $item) {


            $collectionGetQuery = collect(
                [
                    'product_id' => $item->products_id,
                    'user_id' => $item->users_id,
                    "products_date" => $item->products_date,
                    "product_title"=> $item->detail->details_title,
                    "category_id" => $item->detail->categories_id,
                    'category_name' => category::find($item->detail->categories_id)->categories_name,
                    "product_description" => $item->detail->details_description,
                    "product_state" => $item->detail->details_state,
                    "product_shipping_fee" => $item->detail->details_shipping_fee,
                    "product_date" => $item->detail->shipping_date,
                    'product_price' => $item->detail->details_price,
                    "users_gender" => $item->user->users_gender,
                    "users_birthday" => $item->user->users_birthday,
                    'user_image' => $item->user->users_images_path,
                    "users_profile" => $item->user->users_profile,
                    "image_path1" => $item->image->images_path[0],
                    "image_path2" => $item->image->images_path[1],
                    "image_path3" => $item->image->images_path[2],
                    'likes' => $item->like->count(),
                    'data' => $item->created_at,
                ]
            );


        }

        return $collectionGetQuery;

    }


}
