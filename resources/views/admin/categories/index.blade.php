@extends('admin.layout.app')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">دسته بندی ها</h3>

                <div class="card-tools">
                    <a href="{{route('admin.createCategory')}}" class="btn btn-outline-primary float-right">افزودن</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                    <th>#</th>
                    <th>نام</th>
                    <th>والد</th>
                    <th></th>
                    </th>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <td>{{$category->category_name}}</td>
                            <td>{{($category->parent_id == null) ? 'بدون والد' : $category->parent_id}}</td>
                            <td>
                                <a href="{{Route('admin.editCategory', $category->id)}}" class="btn btn-primary">ویرایش</a>
                                <a class="btn btn-danger" href="{{ route('admin.deleteCategory',['id' => $category->id]) }}" onclick="event.preventDefault();
                                                     document.getElementById('del').submit();">حذف</a>
                                <form id="del" action="{{ route('admin.deleteCategory',['id' => $category->id]) }}"
                                      method="POST" class="d-none">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$categories->links('pagination.paginate')}}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

@endsection
