<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo e(url('admin/dashboard')); ?>" class="brand-link">
    <img src="<?php echo e(asset('frontend/images/logo-white.png')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Taparia Tools</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo e(asset('backend/images/user-160x160.jpg')); ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">User</a>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
             <li class="nav-item">
              <a href="<?php echo e(route('dashboard')); ?>" class="nav-link <?php echo e(Request::is('admin/dashboard') ? 'active' : ''); ?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
              </a>
          </li>          
            <li class="nav-item">
              <a href="<?php echo e(route('category.index')); ?>" class="nav-link <?php echo e(request()->is('admin/category*') ? 'active' : ''); ?>">
                  <i class="nav-icon fas fa-th-list"></i>
                  <p>Category</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('subcategory.index')); ?>" class="nav-link <?php echo e(request()->is('admin/subcategory*') ? 'active' : ''); ?>">
                <i class="nav-icon fas fa-th-large"></i>
                <p>Sub Category</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('childsubcategory.index')); ?>" class="nav-link <?php echo e(request()->is('admin/childsubcategory*') ? 'active' : ''); ?>">
                <i class="nav-icon fas fa-th-large"></i>
                <p>Child Sub Category</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('products.index')); ?>" class="nav-link <?php echo e(request()->is('admin/products*') ? 'active' : ''); ?>">
                <i class="nav-icon fas fa-table"></i>
                <p>Products</p>
            </a>
        </li>
          <li class="nav-item">
            <a href="<?php echo e(route('reportsAndDownloads.index')); ?>" class="nav-link <?php echo e(request()->is('admin/reports-downloads*') ? 'active' : ''); ?>">
                <i class="nav-icon fas fa-file-pdf"></i>
                <p>Reports & Downloads</p>
            </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside><?php /**PATH C:\xampp\htdocs\tapariatools.tapariatools.com\resources\views/backend/layout/sidebar.blade.php ENDPATH**/ ?>