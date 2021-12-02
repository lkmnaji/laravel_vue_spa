<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return response()->json(
            [
                'status' => 'success',
                'data' => $product
            ]
        );
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->save();
        return response()->json(
            [
                'status' => 'success',
                'message' => 'add data product successfully',
                'data' => $product
            ]
        );
    }

    public function edit ($id)
    {
        $product = Product::find($id);

        return response()->json(
            [
                'status' => 'true',
            'data' => $product
            ]
        );
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);
        if(!$product){
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'data not found'
                ]
            );
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->save();
        return response()->json(
            [
                'status' => 'success',
                'message' => 'update data product successfully',
                'data' => $product
            ]
        );
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if(!$product){
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'data product not found'
                ]
            );
        }
        $product->delete();
        return response()->json(
            [
                'status' => 'success',
                'message' => 'delete data product successfully',
                'data' => $product
            ]
        );
    }
}