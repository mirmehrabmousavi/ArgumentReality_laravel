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
        if ($request->file('pic') && !empty($request->file('pic'))) {
            $file = $request->file('pic');
            @unlink(public_path('upload/product/' . $request->file('pic')));
            $filename1 = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/product'), $filename1);
            $pic = '/upload/product/' . $filename1;
        }
        if ($request->file('file') && !empty($request->file('file'))) {
            $file = $request->file('file');
            @unlink(public_path('upload/product/file/' . $request->file('file')));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/product/file'), $filename);
            $file = '/upload/product/file/' . $filename;
        }
        $pro->pic = $pic;
        $pro->file = $file;
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
        if ($request->file('pic') == null) {
            $pro->pic = $pro->pic;
        }else{
            if ($request->file('pic') && !empty($request->file('pic'))) {
                $file = $request->file('pic');
                @unlink(public_path('upload/product/' . $request->file('pic')));
                $filename1 = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/product'), $filename1);
                $pic = '/upload/product/' . $filename1;
            }
            $pro->pic = $pic;
        }
        if ($request->file('file') == null) {
            $pro->file = $pro->file;
        }else{
            if ($request->file('file') && !empty($request->file('file'))) {
                $file = $request->file('file');
                @unlink(public_path('upload/product/file/' . $request->file('file')));
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/product/file'), $filename);
                $file = '/upload/product/file/' . $filename;
            }
            $pro->file = $file;
        }
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
