<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-file-invoice"></i></div>
            <div class="sidebar-brand-text mx-3"><span>prinso-invoice</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">

            <li class="nav-item"><a class="nav-link active" href="{{ url('/') }}"><i class="fas fa-tachometer-alt"></i><span>الرئيسية</span></a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="profile.html"><i class="fas fa-user"></i><span>البروفايل</span></a></li> -->
            <li class="nav-item"><a class="nav-link" href="{{ url('/invoices') }}"><i class="far fa-newspaper"></i><span>ادارة الفواتير</span></a><a class="nav-link" href="{{ url('/delivery') }}"><i class="fas fa-car-side"></i><span>ادارة التوصيل</span></a><a class="nav-link" href="{{ url('/items') }}"><i class="fas fa-shopping-bag"></i><span>ادارة المنتجات</span></a><a class="nav-link" href="{{ url('/customers') }}"><i class="fas fa-users"></i><span>ادارة الزبائن</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}"><i class="far fa-user-circle"></i><span>الدخول</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}"><i class="fas fa-user-circle"></i><span>التسجيل</span></a></li>
            <li class="nav-item"><a class="nav-link" href="404.html"><i class="fas fa-exclamation-circle"></i><span>صفحة مفقودة</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/404') }}"><i class="fas fa-window-maximize"></i><span>صفحة فارغة</span></a></li>
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>