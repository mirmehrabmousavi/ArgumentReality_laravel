@extends('admin.layout.app')

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">افزودن کد</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('admin.storeCode')}}" method="POST" enctype="multipart/form-data" role="form">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">نام</label>
                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="نام" required>
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
