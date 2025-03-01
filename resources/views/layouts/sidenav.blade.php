<a href="index3.html" class="brand-link">
    <span class="brand-text text-light">I-MAN</span>
</a>

<div class="sidebar">
    <div class="dropdown bg-light mt-1 " style="box-shadow: 0px 0px 2px 0px">
        <button class="btn btn-secondry btn-sm dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{asset('public/assets/images/user_active.png')}}" class="rounded-circle" alt="..."> Welcome - {{session('LOGIN_NAME')}}
           
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
            @if (session('ADMIN_LOGIN'))
                <li class="nav-item">
                    {{-- <a class="dropdown-item active" aria-current="page" href="{{url('logout')}}">{{session('ADMIN_NAME')}} Logout</a> --}}
                    <a class="dropdown-item active" aria-current="page" href="logout">{{session('ADMIN_NAME')}} Logout</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="dropdown-item active" aria-current="page" href="logout">{{session('BILLING_NAME')}} Logout</a>
                </li>
            @endif
        </ul>
    </div>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            @if (session('ADMIN_LOGIN'))
                <li class="nav-item menu-open">
                    <a href="dashboard" class="nav-link "><i class="nav-icon fas fa-th"></i><p>Dashboard</p></a>
                </li>
                <li class="nav-item ">
                    <a href="admin" class="nav-link "><i class="nav-icon fas fa-users-cog"></i><p>Admin</p></a>
                </li>
                <li class="nav-item ">
                    <a href="user" class="nav-link "><i class="nav-icon fas fa-users"></i><p>User</p></a>
                </li>
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>Navigation<i class="fas fa-angle-left right"></i><span class="badge badge-info right">6</span></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="fas fa-angle-right nav-icon"></i><p>Manage Category </p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
            @endif
            <li class="nav-item ">
                <a href="billing" class="nav-link "><i class="nav-icon fas fa-th"></i><p>Billing</p></a>
            </li>
            <li class="nav-header text-light">Manage & Utilities</li>
            <li class="nav-item">
                <a href="category" class="nav-link">
                    <i class="fas fa-angle-right nav-icon"></i><p>Category </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="sub-category" class="nav-link">
                    <i class="fas fa-angle-right nav-icon"></i><p>Sub Category </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="size-color" class="nav-link">
                    <i class="fas fa-angle-right nav-icon"></i><p>Size & Color</p>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="color" class="nav-link">
                    <i class="fas fa-angle-right nav-icon"></i><p>Color</p>
                </a>
            </li> --}}

            <li class="nav-header text-light">Stock Management</li>
                <li class="nav-item">
                    <a href="product" class="nav-link">
                        <i class="fas fa-angle-right nav-icon"></i><p>Product</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="barcode" class="nav-link">
                        <i class="fas fa-angle-right nav-icon"></i><p>Barcodes</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="manage-stock" class="nav-link">
                        <i class="fas fa-angle-right nav-icon"></i><p>Stock</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="customer" class="nav-link">
                        <i class="fas fa-angle-right nav-icon"></i><p>Customer</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="business-details" class="nav-link">
                        <i class="fas fa-angle-right nav-icon"></i><p>Business </p>
                    </a>
                </li>
        </ul>
    </nav>

</div>



