@extends('admin.layout.app')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">محصولات</h3>

                <div class="card-tools">
                    <a href="{{route('admin.createProduct')}}" class="btn btn-outline-primary float-right">افزودن</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>نام</th>
                        <th>دسته بندی</th>
                        <th>قیمت</th>
                        <th>عکس</th>
                        <th>مدل</th>
                        <th>زمان انتظار</th>
                        <th>توضیحات</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pro as $val)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <td>{{$val->title}}</td>
                            <td>{{$val->category_id}}</td>
                            <td>{{$val->price}}</td>
                            <td><img src="{{$val->pic}}" alt="" width="50" height="35"></td>
                            <td>{{$val->file}}</td>
                            <td>{{$val->time}}</td>
                            <td>{{substr($val->desc,0,40)}}</td>
                            <td>
                                <a href="{{$val->url}}" class="btn btn-success">نمایش AR</a>
                                <a href="{{Route('admin.editProduct', $val->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i> ویرایش</a>
                                <a class="btn btn-danger" href="{{ route('admin.deleteProduct',['id' => $val->id]) }}" onclick="event.preventDefault();
                                                     document.getElementById('del').submit();"><i class="fa fa-remove"></i> حذف</a>
                                <form id="del" action="{{ route('admin.deleteProduct',['id' => $val->id]) }}"
                                      method="POST" class="d-none">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$pro->links('pagination.paginate')}}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

@endsection
