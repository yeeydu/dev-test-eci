<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prices;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    public function index()
    {
        return view('index');
    }

    /**
     * Get product price function
     */
    public function getProductPrice(Request $request)
    {
        $sku = $request->input('sku');
        $account_id = $request->input('account_id');
        
        $prices = Prices::all();
        $dbPrices = Prices::where('product_id', $sku)
            ->where(function ($query) use ($account_id) {
                $query->where('account_id', $account_id)
                    ->orWhereNull('account_id');
            })
            ->orderBy('value', 'asc')
            ->pluck('value')
            ->first();
            
            
    
        $name = "yeeyson";

        // information stored in JSON file
        $jsonFile = file_get_contents(storage_path('live_prices.json'));
        //$jsonFile = File::get('live_prices.json');
        $products = json_decode($jsonFile, true);

        // Search 
        $product = collect($products)->firstWhere('sku', $sku);

        var_dump($prices);
        dd($prices);
        dump($prices);

        
        return view('index', ['name' => $name,  'dbPrices' => $dbPrices, 'prices' => $prices, 'product' => $product]);
    }
}
