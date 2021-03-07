<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\product;
use App\Models\image;
use App\Models\detail;
use App\Models\category;
use App\Models\user;
use Illuminate\Foundation\Console\Presets\React;
use Symfony\Component\VarDumper\Cloner\Data;

class ProductController extends Controller
{
    //

    public function topShow(){


        $product = new product();
        $query = collect();

        $queryProduct = product::with(['detail','user','image','like'])
            ->orderBy('created_at','desc')
            ->get();

        $query->push($product->showNewProducts($queryProduct));

        [$collectionQuery, $categoryName] = $product->showCateProducts($queryProduct,6);

        $collect = collect([
            'category1' => [
                "category_name"=> $categoryName,
                "products" => $collectionQuery
            ]
        ]);
        $query->push($collect);


        [$collectionQuery, $categoryName] = $product->showCateProducts($queryProduct,5);

        $collect = collect([
            'category2' => [
                "category_name"=> $categoryName,
                "products" => $collectionQuery
            ]
        ]);
        $query->push($collect);



        [$collectionQuery, $categoryName] = $product->showCateProducts($queryProduct,7);

        $collect = collect([
            'category3' => [
                "category_name"=> $categoryName,
                "products" => $collectionQuery
            ]
        ]);
        $query->push($collect);



        return $query;

    }

    public function showNewProducts(){


        $product = new product();

        $queryProduct = product::with(['detail','user','image','like'])
            ->orderBy('created_at','desc')
            ->get();


        return $product->showNewAllProducts($queryProduct);
    }



    public function selectProduct($id){


        $product = new product();

        $queryProduct = product::with(['detail','user','image','like'])
            ->where('products_id','=',$id)
            ->orderBy('created_at','desc')
            ->get();


        return $product->detailProduct($queryProduct);
        //return $queryProduct;

    }

    public function sellProduct(Request $request){
        $product = new product();

        $userId = $request->input('users_id');
        $productDate = Carbon::now();

        try {
            $product->users_id = $userId;
            $product->products_date = $productDate;
            $product->created_at = $productDate;
            $product->updated_at = $productDate;
            $product->save();

            $query = product::where('users_id','=',$userId)
                ->whereTime('created_at','=',$productDate)->get()->first();

            return  $product->insertProduct($request, $query->products_id);

        }catch (\Exception $e){
            return collect(
                [
                    "saveresult" => false,
                    "resultDtail" => $e
                ]
            );
        }

    }

    public function searchNarrowDown(Request $request){

        $keyword = $request->input('keywords');
        $category_key = $request->input('category_key') + 1;
        $state_key = $request->input('state_key');
        $sort_key = $request->input('sort_key');
        $sales_key = $request->input('sales_key');
        $shipping_fee_key = $request->input('shipping_fee_key');


        $queryProduct = product::with(['detail','user','image','like'])
            ->whereHas('detail', function($query) use($keyword, $category_key,$state_key, $sort_key, $shipping_fee_key){
                if($keyword != null){
                    $search_split = mb_convert_kana($keyword, 's');
                    $search_split2 = preg_split('/[\s]+/', $search_split);

                    foreach ($search_split2 as $value){
                        $query->where('details_title', 'like', '%' . $value . '%');
                    }
                }

                if($category_key != 'search'){
                    $query->where('categories_id', '=', $category_key);
                }

                if($state_key != 'search'){
                    $query->where('details_state', '=', $state_key);
                }


                if($shipping_fee_key == 1){
                    $query->where('details_shipping_fee', '=', 0);
                }elseif ($shipping_fee_key==2){
                    $query->where('details_shipping_fee', '=', 1);
                }


            })

            ->where(function($query) use($sales_key){
                if($sales_key == 1){
                    $query->where("products_is_selled", "=", 0);
                }elseif ($sales_key == 2){
                    $query->where("products_is_selled", "=", 1);
                }
            })

            ->get();



        $product = new product();
        $sortQuery = $product->showNewAllProducts($queryProduct);

        switch ($sort_key){
            case 0:
                $sortQuery = $sortQuery->sortByDesc('date');
                break;

            case 1:
                $sortQuery = $sortQuery->sortBy('date');
                break;

            case 2:
                $sortQuery = $sortQuery->sortByDesc('product_price');
                break;

            case 3:
                $sortQuery = $sortQuery->sortBy('product_price');
                break;

        }

        return $sortQuery->values()->all();
    }



    public function searchProducts(Request $request){


        $keyword = $request->input('keywords');


        $queryProduct = product::with(['detail','user','image','like'])
            ->whereHas('detail', function($query) use($keyword){
                $search_split = mb_convert_kana($keyword, 's');
                $search_split2 = preg_split('/[\s]+/', $search_split);

                foreach ($search_split2 as $value){
                    $query->where('details_title', 'like', '%' . $value . '%');
                }

            })
            ->orderBy('created_at','desc')->get();

        $product = new product();

        return $product->showNewAllProducts($queryProduct);
//        return $queryProduct;

    }
}

