
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
      <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview {{request()->is('admin') ? 'menu-open' :'' }}">
            <a href="#" class="nav-link {{request()->is('admin') ? 'active' :'' }} ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.dashboard')}}" class="nav-link {{request()->is('admin') ? 'active' :'' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{request()->is('categories') ? 'menu-open' :'' }} {{request()->is('addcategory') ? 'menu-open' :'' }} {{request()->is('editcategory/*') ? 'menu-open' :'' }}">
            <a href="#" class="nav-link {{request()->is('categories') ? 'active' :'' }} {{request()->is('addcategory') ? 'active' :'' }} {{request()->is('editcategory/*') ? 'active' :'' }}">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Categories
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.category.addcategory')}}" class="nav-link {{request()->is('addcategory') ? 'active' :'' }} ">
                  <i class="far fa-file nav-icon"></i>
                  <p>Add category</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.category.categories')}}" class="nav-link {{request()->is('categories') ? 'active' :'' }}">
                  <i class="far fa-file nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{request()->is('subcategories') ? 'menu-open' :'' }} {{request()->is('addsubcategory') ? 'menu-open' :'' }} {{request()->is('editsubcategory/*') ? 'menu-open' :'' }}">
            <a href="#" class="nav-link {{request()->is('subcategories') ? 'active' :'' }} {{request()->is('addsubcategory') ? 'active' :'' }} {{request()->is('editsubcategory/*') ? 'active' :'' }}">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Subcategories
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.subcategory.addsubcategory')}}" class="nav-link {{request()->is('addsubcategory') ? 'active' :'' }} ">
                  <i class="far fa-file nav-icon"></i>
                  <p>Add subcategory</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.subcategory.subcategories')}}" class="nav-link {{request()->is('subcategories') ? 'active' :'' }}">
                  <i class="far fa-file nav-icon"></i>
                  <p>Subcategories</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{request()->is('sliders') ? 'menu-open' :'' }} {{request()->is('addslider') ? 'menu-open' :'' }} {{request()->is('editslider/*') ? 'menu-open' :'' }}" >
            <a href="#" class="nav-link {{request()->is('sliders') ? 'active' :'' }} {{request()->is('addslider') ? 'active' :'' }} {{request()->is('editslider/*') ? 'active' :'' }}">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Sliders
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.slider.addslider')}}" class="nav-link {{request()->is('addslider') ? 'active' :'' }}">
                  <i class="far fa-file nav-icon"></i>
                  <p>Add slider</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.slider.sliders')}}" class="nav-link {{request()->is('sliders') ? 'active' :'' }}">
                  <i class="far fa-file nav-icon"></i>
                  <p>Sliders</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{request()->is('products') ? 'menu-open' :'' }} {{request()->is('addproduct') ? 'menu-open' :'' }} {{request()->is('editproduct/*') ? 'menu-open' :'' }}">
            <a href="#" class="nav-link {{request()->is('products') ? 'active' :'' }} {{request()->is('addproduct') ? 'active' :'' }} {{request()->is('editproduct/*') ? 'active' :'' }}">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Products
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.product.addproduct')}}" class="nav-link {{request()->is('addproduct') ? 'active' :'' }}">
                  <i class="far fa-file nav-icon"></i>
                  <p>Add product</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.product.products')}}" class="nav-link {{request()->is('products') ? 'active' :'' }}">
                  <i class="far fa-file nav-icon"></i>
                  <p>Products</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{request()->is('orders') ? 'menu-open' :'' }}">
            <a href="#" class="nav-link {{request()->is('orders') ? 'active' :'' }}">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Orders
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ">
              <li class="nav-item">
                <a href="{{route('admin.order.orders')}}" class="nav-link {{request()->is('orders') ? 'active' :'' }}">
                  <i class="far fa-file nav-icon"></i>
                  <p>Orders</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0/" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
</aside>

    <!-- /.sidebar -->
