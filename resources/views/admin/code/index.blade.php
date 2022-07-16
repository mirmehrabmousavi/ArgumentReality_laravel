@extends('admin.layout.app')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">محصولات</h3>

                <div class="card-tools">
                    <a href="{{route('admin.createCode')}}" class="btn btn-outline-primary float-right">افزودن</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>QR</th>
                        <th>نام</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($codes as $val)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <th >{!! \SimpleSoftwareIO\QrCode\Facades\QrCode::generate(route('show.code',['id' => $val->id])); !!}</th>
                            <td>{{$val->title}}</td>
                            <td>
                                <a href="{{Route('show.code', $val->id)}}" class="btn btn-success">نمایش</a>
                                <a href="{{Route('admin.editCode', $val->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i> ویرایش</a>
                                <a class="btn btn-danger" href="{{ route('admin.deleteCode',['id' => $val->id]) }}" onclick="event.preventDefault();
                                                     document.getElementById('del').submit();"><i class="fa fa-remove"></i> حذف</a>
                                <form id="del" action="{{ route('admin.deleteCode',['id' => $val->id]) }}"
                                      method="POST" class="d-none">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$codes->links('pagination.paginate')}}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

@endsection
