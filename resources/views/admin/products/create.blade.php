@extends('admin.layout.app')

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">افزودن محصول</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('admin.storeProduct')}}" method="POST" enctype="multipart/form-data" role="form">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">نام</label>
                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="نام" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">دسته بندی</label>
                        <select name="category_id" class="form-control">
                            <option value="">None</option>
                            @if($categories)
                                @foreach($categories as $category)
                                    <?php $dash=''; ?>
                                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                    @if(count($category->subcategory))
                                        @include('admin.categories.subCategoryList',['subcategories' => $category->subcategory])
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">قیمت</label>
                        <input type="text" class="form-control" name="price" id="exampleInputEmail1" placeholder="قیمت" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">عکس</label>
                        <input type="file" class="form-control" name="pic" id="exampleInputEmail1" placeholder="عکس" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">مدل</label>
                        <input type="file" class="form-control" name="file" id="exampleInputEmail1" placeholder="مدل">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">زمان انتظار</label>
                        <input type="text" class="form-control" name="time" id="exampleInputEmail1" placeholder="زمان انتظار" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">توضیحات</label>
                        <textarea class="form-control" name="desc" cols="30" rows="3" placeholder="توضیحات"></textarea>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">ذخیره</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection
