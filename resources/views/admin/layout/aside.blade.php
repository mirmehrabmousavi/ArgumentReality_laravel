<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="https://www.gravatar.com/avatar/52f0fbcbedee04a121cba8dad1174462?s=200&d=mm&r=g" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{auth()->user()->email}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                داشبوردها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.home')}}" class="nav-link active">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>داشبورد</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('index')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>صفحه اصلی</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">عملیات</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p>
                                کد ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.indexCode')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>کد ها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.createCode')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>افزودن کد</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{--<li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p>
                                دسته بندی ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.indexCategory')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>دسته بندی ها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.createCategory')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>افزودن دسته بندی</p>
                                </a>
                            </li>
                        </ul>
                    </li>--}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-shopping-bag"></i>
                            <p>
محصولات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.indexProduct')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>محصولات</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.createProduct')}}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>افزودن محصول</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.pays')}}" class="nav-link">
                            <i class="nav-icon fa fa-dollar"></i>
                            <p>
                                سفارشات
                                <span class="right badge badge-danger">جدید</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.file-manager')}}" class="nav-link">
                            <i class="nav-icon fa fa-dollar"></i>
                            <p>
                                مدیریت فایل
                                <span class="right badge badge-danger">جدید</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="nav-icon fa fa-power-off"></i>
                            <p>خروج</p>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
