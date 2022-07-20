<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $fileHtml = '
            <!DOCTYPE html>
            <html>
            <script src="arasset/libs/aframe-master.js"></script>
            <script src="arassetlibs/aframe-ar.js"></script>
            <script src="arasset/libs/aframe-extras.loaders.6.1.1.js"></script>
            <script src="https://kit.fontawesome.com/c9500776a0.js" crossorigin="anonymous"></script>
            <script src="arasset/misc/codeBtn.js"></script>
            <!-- load the marker config -->
            <script src="arasset/data/hiro_0_multi.js"></script>

            <script>
                localStorage.setItem(\'ARjsMultiMarkerFile\', hiro??_0_marker);
            </script>

            <body style="margin : 0px; overflow: hidden;">
                <div style="position: fixed; top: 5%; z-index: 10; text-align: center; width: 100%">
                    <p>drone by <a href="https://sketchfab.com/3d-models/mech-drone-8d06874aac5246c59edb4adbe3606e0e">Willy Decarpentrie</a>
                        <a href="https://creativecommons.org/licenses/by/4.0/">(license)</a></p>
                </div>

                <a-scene embedded arjs="detectionMode: mono_and_matrix;">
                    <a-assets>
                        <a-asset-item id="drone-model" src="arasset/aframe/assets/models/mech_drone/scene.gltf" crossorigin="anonymous">
                        </a-asset-item>
                    </a-assets>
                    <a-marker preset="area">
                        <a-gltf-model src="#drone-model" position="0 0.5 0" scale="0.005 0.005 0.005" rotation="0 180 0"
                            animation-mixer="clip: *;"></a-gltf-model>
                    </a-marker>
                    <a-entity camera></a-entity>
                </a-scene>
            </body>
            <script>
                // show-code button
                setCodeBtnUrl("multimarkers/hiro_0_model.html");
            </script>
            </html>
        ';

        $e =Storage::put('file.html', $fileHtml);

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
