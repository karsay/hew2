<?php

namespace App\Models;

use Carbon\Carbon;
use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\image;

class product extends Model
{
    //
    protected $table = 'products';
    protected $primaryKey = 'products_id';

    protected $fillable = ['product_is_selled', 'product_is_deleted'];

    protected $casts = [
        'product_is_selled' => 'integer',
    ];

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

    public  function history(){
        return $this->hasOne('App\Models\history','products_id');
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



        $i = 0;
        $collectAll = collect();

        foreach ($collection as $item) {
            $i++;

            $collectionGetQuery = collect(
                [

                    'product_id' => $item->products_id,
                    "product_title"=> $item->detail->details_title,
                    'product_price' => $item->detail->details_price,
                    'product_image' => $item->image[0]->images_path,
                    'product_is_selled' => $item->products_is_selled,
                    'likes' => $item->like->count(),
                    'date' => $item->products_date,
                ]
            );

            $collectAll->push($collectionGetQuery);

            if($i > 4){
                break;
            }


        }

        $collectionQuery = collect(
            [
                'newProducts' =>$collectAll
            ]
        );




        return $collectionQuery;
    }

    public function showNewAllProducts(Collection $collection){


        $collectAll = collect();

        foreach ($collection as $item) {


            $collectionGetQuery = collect(
                [

                    'product_id' => $item->products_id,
                    "product_title"=> $item->detail->details_title,
                    'product_price' => $item->detail->details_price,
                    'product_image' => $item->image[0]->images_path,
                    'product_is_selled' => $item->products_is_selled,
                    'likes' => $item->like->count(),
                    'date' => $item->products_date,
                ]
            );

            $collectAll->push($collectionGetQuery);



        }



        return $collectAll;
    }




    public function showCateProducts(Collection $collection, int $cateNum){

        $collectionQuery = collect();
        $i = 0;

        $categoryName = '';

        foreach ($collection as $item) {

            if($cateNum == $item->detail->categories_id){

                $categoryName = category::find($item->detail->categories_id)->categories_name;

                $collectionGetQuery = collect(
                    [
                        'product_id' => $item->products_id,
                        "product_title"=> $item->detail->details_title,
                        'product_image' => $item->image[0]->images_path,
                        'product_price' => $item->detail->details_price,
                        'product_is_selled' => $item->products_is_selled,
                        'likes' => $item->like->count(),
                        'date' => $item->products_date,
                    ]
                );

                $i++;
                $collectionQuery->push($collectionGetQuery);
                if ($i > 4){
                    break;
                }

            }
        }
        return [$collectionQuery, $categoryName];
    }

    public function detailProduct(Collection $collection){

        $collectionGetQuery = collect();
        $i = 1;

        $collectionImageHoge = collect();
        if($collection->count() > 0){

            foreach ($collection as $item) {
                foreach ($item->image as $item1){
                    $clt = collect(
                        [
                            'image_path' => $item->image[$i-1]->images_path
                        ]
                    );
                    $i++;
                    $collectionImageHoge->push($clt);
                }



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
                        "product_area" => $item->detail->details_area,
                        "product_date" => $item->detail->shipping_date,
                        'product_price' => $item->detail->details_price,
                        'user_name' => $item->user->users_name,
                        "users_gender" => $item->user->users_gender,
                        "users_birthday" => $item->user->users_birthday,
                        'user_image' => $item->user->users_images_path,
                        "users_profile" => $item->user->users_profile,
                        "product_image" => $collectionImageHoge,
                        'likes' => $item->like->count(),
                        'date' => $item->products_date,
                    ]
                );

            }
        }else{
            $collectionGetQuery = collect([
                "prodcut" => null
            ]);
        }


        return $collectionGetQuery;

    }



    public function insertProduct($request, $productId){

        $collect = collect();


        try {
            $detail = new detail();
            $detail->products_id = $productId;
            $detail->details_title = $request->input('details_title');
            $detail->categories_id = $request->input('categories_id');
            $detail->details_description = $request->input('details_description');
            $detail->details_price = $request->input('details_price');
            $detail->details_state = $request->input('details_state');
            $detail->details_shipping_fee = $request->input('details_shipping_fee');
            $detail->details_area = $request->input('details_area');
            $detail->shipping_date = $request->input('shipping_date');
            $detail->created_at = Carbon::now();
            $detail->updated_at = Carbon::now();
            $detail->save();



            try {
                foreach ($request->image as $item)
                {
                    $image = new image();
                    $replaceImage = str_replace('data:image/jpeg;base64,', '', $item);
                    $replaceImage = str_replace(' ', '+', $replaceImage);
                    $imageName = md5($replaceImage).'.'.'jpeg';
                    $imagePath = 'public/' . $imageName;
                    Storage::put($imagePath, base64_decode($replaceImage));
                    $image->images_path = $imageName;
                    $image->products_id = $productId;
                    $image->images_date = Carbon::now();
                    $image->save();
                }

                $collectResult = collect(
                    ["saveresult" => true]
                );

                $collect->push($collectResult);
            }catch (\Exception $e){
                $collectResult = collect(
                    [
                        "saveresult" => false,
                        "resultDtail" => $e
                    ]
                );

                $collect->push($collectResult);

                DB::table('details')->where('products_id', '=', $productId)->delete();
                DB::table('products')->where('products_id', '=', $productId)->delete();
            }

        }catch (\Exception $e){

            $collectResult = collect(
                [
                    "saveresult" => false,
                    "resultDtail" => $e

                ]
            );

            $collect->push($collectResult);

            DB::table('products')->where('products_id', '=', $productId)->delete();
        }




        return $collect;
    }


    public function search(Collection $collection){


        $collectAll = collect();


        foreach ($collection as $item) {
            $collectionGetQuery = collect(
                [

                    'product_id' => $item->products_id,
                    "product_title"=> $item->detail->details_title,
                    'product_price' => $item->detail->details_price,
                    'product_image' => $item->image[0]->images_path,
                    'product_is_selled' => $item->products_is_selled,
                    'likes' => $item->like->count(),
                    'date' => $item->products_date,
                ]
            );

            $collectAll->push($collectionGetQuery);


        }

        return $collectAll;
    }

    public function updateBuy($productId, $userId){


        $queryProduct = product::find($productId);
        $queryProduct->products_is_selled = 1;
        $queryProduct->save();


        $result = collect();
        try {
            $history = new history();
            $history->products_id = $productId;
            $history->users_id = $userId;
            $history->histories_date = Carbon::now();
            $history->histories_is_paid = true;
            $history->histories_shipping_state = 1;
            $history->save();

            $result = collect(
                [
                    "result" => true,
                ]
            );
        }catch (\Exception $e){
            $result = collect(
                [
                    "result" => false,
                ]
            );
        }

        return $result;


    }


    public function buyerInfo($collection){

        $collectAll = collect();

        foreach ($collection as $item) {
            $collectionGetQuery = collect(
                [

                    'product_id' => $item->product->products_id,
                    'product_price' => $item->product->detail->details_price,
                    'product_image' => $item->product->image[0]->images_path,
                    'product_is_selled' => $item->product->products_is_selled,
                    'likes' => $item->product->like->count(),
                    'date' => $item->product->products_date,
                    'histories_shipping_state' => $item->histories_shipping_state,
                    'user_id' => $item->product->user->users_id,
                    'user_name' => $item->product->user->users_name,

                ]
            );

            $collectAll->push($collectionGetQuery);

        }

        return $collectAll;
    }


    public function sellerInfo($collection){

        $collectAll = collect();


        foreach ($collection as $item) {

            if ($item->history != null){
                $sellerUserId = $item->history->users_id;
                $sellerUserName = $item->history->user->users_name;
                $sellerShippingState = $item->history->histories_shipping_state;
            }else{
                $sellerUserId = null;
                $sellerUserName = null;
                $sellerShippingState = null;
            }


            $collectionGetQuery = collect(
                [

                    'product_id' => $item->products_id,
                    'product_price' => $item->detail->details_price,
                    'product_image' => $item->image[0]->images_path,
                    'product_is_selled' => $item->products_is_selled,
                    'likes' => $item->like->count(),
                    'date' => $item->products_date,
                    'histories_shipping_state' => $sellerShippingState,
                    'user_id' => $sellerUserId,
                    'user_name' => $sellerUserName,

                ]
            );

            $collectAll->push($collectionGetQuery);

        }

        return $collectAll;
    }




}
