<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prices;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Get product price function
     */
    public function getProductPrice(Request $request)
    {

        $sku = $request->input('sku');
        $account_id = $request->input('account_id');

        // from JSON file
        $jsonFile = Storage::get('live_prices.json');
        $products = json_decode($jsonFile, true);

        $filteredJsonData = collect($products)
            ->where('sku', $sku)
            ->where('account', $account_id)
            ->first();

            
        // from database
        $dbPrices = DB::table('prices')
            ->where('product_id', '=', $sku)
            ->orWhere(function ($query) use ($request) {
                $account_id = $request->input('account_id');
                $query->where('account_id', $account_id);
            })->orderBy('value', 'asc')
            ->first();

        // Determine the final price based on the logic
        $finalPrice = $filteredJsonData ? $filteredJsonData  : 
        ($dbPrices ? $dbPrices: null);

        return view('product', ['finalPrice' => $finalPrice]);

    }
}
