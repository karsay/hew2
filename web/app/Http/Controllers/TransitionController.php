<?php

namespace App\Http\Controllers;

use App\Models\history;
use App\Models\trademassa;
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

        try {
            $productId = $request->input('product_id');
            $userId = $request->input('user_id');
            $tradeMassage = $request->input('trade_massage');


            $tradeMessa = new trademassa();
            $tradeMessa->products_id = $productId;
            $tradeMessa->users_id = $userId;
            $tradeMessa->trademassas_message = $tradeMassage;
            $tradeMessa->trademassas_date = new Carbon();
            $tradeMessa->save();

            $resultQuery = collect([
                "result" => true
            ]);
        }catch (\Exception $e){
            $resultQuery = collect([
                "result" => false
            ]);
        }

        return $resultQuery;



    }

    public function showTradeMessage(Request $request){
        $productId = $request->input('product_id');

        $queryProduct = trademassa::with('user')
            ->where("products_id", "=", $productId)->get();

        $tradeMessa = new trademassa();

        return $tradeMessa->showTradeMessage($queryProduct);
        //return $queryProduct;
    }

}
