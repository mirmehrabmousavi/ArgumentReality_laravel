<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function indexProduct()
    {
        $pro = Product::latest()->paginate(8);
        return view('admin.products.index',compact('pro'));
    }

    public function createProduct()
    {
        $categories = Category::all();
        return view('admin.products.create',compact('categories'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
           'title' => 'required',
           'price' => 'required',
           'time' => 'required',
           'desc' => 'required',
        ]);

        $pro = new Product();
        $pro->title = $request->title;
        $pro->category_id = $request->category_id;
        $pro->price = $request->price;
        $pro->pic = $request->pic;
        $pro->file = $request->file;
        $pro->time = $request->time;
        $pro->desc = $request->desc;
        $pro->save();

        $notification = [
            'message' => 'با موفقیت ذخیره شد',
            'alert-type' => 'success'
        ];

        return redirect(route('admin.indexProduct'))->with($notification);
    }

    public function editProduct($id)
    {
        $pro = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit',compact('pro','categories'));
    }

    public function updateProduct(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'time' => 'required',
            'desc' => 'required',
        ]);

        $pro = Product::findOrFail($id);
        $pro->title = $request->title;
        $pro->category_id = $request->category_id;
        $pro->price = $request->price;
        @unlink(public_path($pro->pic));
        $pro->pic = $request->pic;
        @unlink(public_path($pro->file));
        $pro->file = $request->file;
        $pro->time = $request->time;
        $pro->desc = $request->desc;
        $pro->save();

        $notification = [
            'message' => 'با موفقیت بروزرسانی شد',
            'alert-type' => 'success'
        ];

        return redirect(route('admin.indexProduct'))->with($notification);
    }

    public function deleteProduct($id)
    {
        $pro = Product::findOrFail($id);
        @unlink(public_path($pro->pic));
        @unlink(public_path($pro->file));
        $pro->delete();

        $notification = [
            'message' => 'با موفقیت حذف شد',
            'alert-type' => 'success'
        ];

        return redirect(route('admin.indexProduct'))->with($notification);
    }
}
