<?php

namespace App\Http\Controllers;

use App\Models\history;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\product;
use App\Models\image;
use App\Models\detail;
use App\Models\category;
use App\Models\user;
use Illuminate\Foundation\Console\Presets\React;
use Symfony\Component\VarDumper\Cloner\Data;

class TransitionController extends Controller
{
    //
    public function userTransition(Request $request){
        $userId = $request->input('user_id');
        $product = new product();


        $queryProduct = history::with(['product.detail','product.image','product.like','product.user','user'])
            ->whereHas('user', function($query) use($userId){
                $query->where('users_id', '=', $userId);
            })
            ->orderBy('created_at','desc')->get();


        $buyer = collect([
            'buy' => $product->buyerinfo($queryProduct)
        ]);




        $queryProduct = product::with(['detail','user','image','like','history','history.user'])
            ->where('users_id', '=' , $userId)
            ->orderBy('created_at','desc')->get();

        $seller = collect([
            'sell' => $product->sellerInfo($queryProduct)
        ]);

        $resQuery = collect();
        $resQuery = $resQuery->push($buyer);
        $resQuery = $resQuery->push($seller);



        return $resQuery;

//       return $queryProduct;

    }


    public function tradeMessage(Request $request){

    }

}
