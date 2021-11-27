 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">Shoping-Bazzar</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                     alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
                                       with font-awesome or any other icon font library -->
                 <li class="nav-item menu-open">
                     <a href="#" class="nav-link active">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('createCategory') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Create Category</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('showCategory') }}" class="nav-link active">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Category List</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('createProduct') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Create Product</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('showProduct') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Product List</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="pages/widgets.html" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             Widgets
                             <span class="right badge badge-danger">New</span>
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-copy"></i>
                         <p>
                             Layout Options
                             <i class="fas fa-angle-left right"></i>
                             <span class="badge badge-info right">6</span>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ asset('pages/layout/top-nav.html') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Top Navigation</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ asset('pages/layout/top-nav-sidebar.html') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Top Navigation + Sidebar</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ asset('pages/layout/boxed.html') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Boxed</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ asset('pages/layout/fixed-sidebar.html') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Fixed Sidebar</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ asset('pages/layout/fixed-sidebar-custom.html') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Fixed Sidebar <small>+ Custom Area</small></p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ asset('pages/layout/fixed-topnav.html') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Fixed Navbar</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ asset('pages/layout/fixed-footer.html') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Fixed Footer</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ asset('pages/layout/collapsed-sidebar.html') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Collapsed Sidebar</p>
                             </a>
                         </li>
                     </ul>
                 </li>


             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
