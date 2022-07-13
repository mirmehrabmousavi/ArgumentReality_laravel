<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Code;
use App\Models\Product;

class IndexController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function showCode($id)
    {
        $code = Code::findOrFail($id);
        $products = Product::latest()->paginate(8);
        $cats = Category::all();
        return view('code',compact('code','products','cats'));
    }

    public function showAr($id, $proId)
    {
        $product = Product::findOrFail($proId);
        $code = Code::findOrFail($id);
        return view('ar',compact('product','code'));
    }

    public function showProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('product',compact('product'));
    }
}
