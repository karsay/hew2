<?php

namespace App\Http\Controllers;

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
            ->limit(3)
            ->get();

        //return $product->showTopProducts($queryProduct);
        $query->push($product->showNewProducts($queryProduct));
        $query->push($product->showCateProducts($queryProduct,6));
        $query->push($product->showCateProducts($queryProduct,5));
        $query->push($product->showCateProducts($queryProduct,2));


        return $query;

    }

    public function showAllProducts(){


        $product = new product();

        $queryProduct = product::with('detail')
            ->with('user')
            ->with('image')
            ->with('like')
            ->orderBy('created_at','desc')
            ->limit(3)
            ->get();


        return $product->showNewProducts($queryProduct);

    }

    public function selectProduct($id){


        $product = new product();

        $queryProduct = product::with('detail')
            ->with(['user','image','like'])
            ->where('products_id','=',$id)
            ->orderBy('created_at','desc')
            ->limit(3)
            ->get();


        return $product->detailProduct($queryProduct);
        //return $queryProduct;

    }



}
