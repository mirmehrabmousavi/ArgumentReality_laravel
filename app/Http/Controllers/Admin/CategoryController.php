<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function indexCategory()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index',compact('categories'));
    }

    public function createCategory()
    {
        $categories = Category::where('parent_id', null)->orderby('category_name', 'asc')->get();
        return view('admin.categories.create', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'parent_id' => 'nullable'
        ]);

        Category::create([
            'category_name' => $request->category_name,
            'parent_id' =>$request->parent_id
        ]);

        $notification = [
            'message' => 'با موفقیت ذخیره شد',
            'alert-type' => 'success'
        ];

        return redirect(route('admin.indexCategory'))->with($notification);
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('parent_id', null)->where('id', '!=', $category->id)->orderby('category_name', 'asc')->get();
        return view('admin.categories.edit',compact('category','categories'));
    }

    public function updateCategory($id, Request $request)
    {
        $category = Category::findOrFail($id);
        $request->validate([
            'category_name'     => 'required',
            'parent_id'=> 'nullable'
        ]);
        if($request->category_name != $category->category_name || $request->parent_id != $category->parent_id)
        {
            if(isset($request->parent_id))
            {
                $checkDuplicate = Category::where('category_name', $request->category_name)->where('parent_id', $request->parent_id)->first();
                if($checkDuplicate)
                {
                    return redirect()->back()->with('error', 'دسته بندی وجود دارد.');
                }
            }
            else
            {
                $checkDuplicate = Category::where('category_name', $request->category_name)->where('parent_id', null)->first();
                if($checkDuplicate)
                {
                    return redirect()->back()->with('error', 'دسته بلندی وجود دارد.');
                }
            }
        }

        $category->category_name = $request->category_name;
        $category->parent_id = $request->parent_id;
        $category->save();

        $notification = [
            'message' => 'با موفقیت بروزرسانی شد',
            'alert-type' => 'success'
        ];

        return redirect(route('admin.indexCategory'))->with($notification);
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        if(count($category->subcategory))
        {
            $subcategories = $category->subcategory;
            foreach($subcategories as $cat)
            {
                $cat = Category::findOrFail($cat->id);
                $cat->parent_id = null;
                $cat->save();
            }
        }
        $category->delete();

        $notification = [
            'message' => 'با موفقیت حذف شد',
            'alert-type' => 'success'
        ];

        return redirect(route('admin.indexCategory'))->with($notification);
    }
}
