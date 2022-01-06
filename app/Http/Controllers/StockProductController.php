<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockProduct;

class StockProductController extends Controller
{
    public function storeStockProduct(Request $request)
    {
        $stockProduct = new stockProduct();
        $stockProduct->type_product = $request->type_product;
        $stockProduct->product_name = $request->product_name;
        $stockProduct->date = $request->date;
        $stockProduct->quantity = $request->quantity;
        $stockProduct->pic_store = $request->pic_store;
        $stockProduct->save();
        return response()->json([
            'status' => true,
            'data' => $stockProduct
        ]);
    }
}
