<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background: #eee
        }

        .ratings i {
            font-size: 16px;
            color: red
        }

        .strike-text {
            color: red;
            text-decoration: line-through
        }

        .product-image {
            width: 100%
        }

        .dot {
            height: 7px;
            width: 7px;
            margin-left: 6px;
            margin-right: 6px;
            margin-top: 3px;
            background-color: blue;
            border-radius: 50%;
            display: inline-block
        }

        .spec-1 {
            color: #938787;
            font-size: 15px
        }

        h5 {
            font-weight: 400
        }

        .para {
            font-size: 16px
        }
    </style>
</head>
<body style="text-align: right" dir="rtl">
<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            @foreach($products as $val)
                <div class="row p-2 bg-white border rounded mt-2">
                    <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image"
                                                    src="{{$val->pic}}"></div>
                    <div class="col-md-6 mt-1">
                        <h5>{{$val->title}}</h5>
                        <div class="d-flex flex-row">
                            <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                    class="fa fa-star"></i><i class="fa fa-star"></i></div>
                            <span>110</span>
                        </div>
                        <p class="text-justify mb-0">{{$val->desc}}</p>
                    </div>
                    <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                        <div class="d-flex flex-row align-items-center">
                            <h4 class="mr-1">{{$val->price}} تومان</h4><span class="strike-text">{{$val->price+10000}} تومان</span>
                        </div>
                        <div class="d-flex flex-column mt-4">
                            <a class="btn btn-primary btn-sm" href="{{route('show.ar',['proId' => $val->id,'id' => $code->id])}}">نمایش AR</a>
                            <a class="btn btn-outline-primary btn-sm mt-2" href="#">خرید</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>
