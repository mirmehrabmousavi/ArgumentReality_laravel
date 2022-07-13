@extends('admin.layout.app')

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">افزودن دسته بندی</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('admin.storeCategory')}}" method="POST" role="form">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">نام دسته بندی</label>
                        <input type="text" class="form-control" name="category_name" id="exampleInputEmail1" placeholder="دسته بندی را وارد کنید" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">نام دسته بندی</label>
                        <select name="parent_id" class="form-control">
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
