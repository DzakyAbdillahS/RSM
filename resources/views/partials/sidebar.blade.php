<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <img src="{{ url('template/dist/img/logo-rsm.jpg') }}" alt="RSM Logo" class="ml-5 mt-4 brand-image img-circle elevation-3" style="opacity: .9; width:150px; height:150px;">
    <a href="index3.html" class="brand-link">
        <h5 class="brand-text font-weight-bold text-center">PT. Riau Samudra Mandiri</h5>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->nama }}</a>
            </div>
        </div>

      <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/home" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                    {{-- <li class="nav-item">
                    <a href="/barang" class="nav-link">
                    <i class="nav-icon fas fa-inbox"></i>
                    <p>
                        Barang
                    </p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="/pekerjaan" class="nav-link">
                        <i class="nav-icon fas fa-wrench"></i>
                        <p>
                            Pekerjaan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/harga-material" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Harga Material
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
