<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\image;
use App\Models\detail;
use App\Models\category;
use App\Models\user;


class ProductController extends Controller
{
    //

    public function topShow(){


        $product = new product();
        $query = collect();

        $queryProduct = product::with('detail')
            ->with('user')
            ->with('image')
            ->with('like')
            ->orderBy('created_at','desc')
            ->get();

        $query->push($product->showNewProducts($queryProduct));

        $collect = collect([
            'category1' => $product->showCateProducts($queryProduct,6)
        ]);
        $query->push($collect);

        $collect = collect([
            'category2' => $product->showCateProducts($queryProduct,5)
        ]);
        $query->push($collect);

        $collect = collect([
            'category3' => $product->showCateProducts($queryProduct,2)
        ]);
        $query->push($collect);



        return $query;

    }

    public function showNewProducts(){


        $product = new product();

        $queryProduct = product::with('detail')
            ->with('user')
            ->with('image')
            ->with('like')
            ->orderBy('created_at','desc')
            ->get();


        return $product->showNewAllProducts($queryProduct);
    }



    public function selectProduct($id){


        $product = new product();

        $queryProduct = product::with('detail')
            ->with(['user','image','like'])
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
            return ollect(
                [
                    "saveresult" => false,
                    "resultDtail" => $e

                ]
            );
        }


    }



}
