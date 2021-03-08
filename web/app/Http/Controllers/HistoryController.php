<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\history;
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

class HistoryController extends Controller
{
    //
    public function shippingStateUpdate(Request $request){
        $productId = $request->input('product_id');

        try {
            $queryProduct = history::find($productId);
            $shippingState = $queryProduct->histories_shipping_state + 1;
            $queryProduct->histories_shipping_state = $shippingState;
            $queryProduct->save();

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
}
