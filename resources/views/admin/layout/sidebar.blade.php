<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
      <a class="sidebar-brand brand-logo" href="index.html"><img src="admin/assets/images/logo.svg" alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.html"><img src="admin/assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="admin/assets/images/faces/face1.jpg" alt="profile" />
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column pr-3">
            <span class="font-weight-medium mb-2">Henry Klein</span>
            <span class="font-weight-normal">${{$order_total_price}}</span>
          </div>
          {{-- <span class="badge badge-danger text-white ml-3 rounded">3</span> --}}
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{Route('admin.index')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{Route('category.index')}}">
          <i class="mdi mdi-equal-box menu-icon"></i>
          <span class="menu-title">Categories</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{Route('food.index')}}">
          <i class="mdi mdi-cow menu-icon"></i>
          <span class="menu-title">Foods</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{Route('order.index')}}">
          <i class="mdi mdi-cart-outline menu-icon"></i>
          <span class="menu-title">Orders</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{Route('user.index')}}">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">Customer</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="pages/forms/basic_elements.html">
          <i class="mdi mdi-format-list-bulleted menu-icon"></i>
          <span class="menu-title">Forms</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/charts/chartjs.html">
          <i class="mdi mdi-chart-bar menu-icon"></i>
          <span class="menu-title">Charts</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/tables/basic-table.html">
          <i class="mdi mdi-table-large menu-icon"></i>
          <span class="menu-title">Tables</span>
        </a>
      </li>
      <li class="nav-item">
        <span class="nav-link" href="#">
          <span class="menu-title">Docs</span>
        </span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://www.bootstrapdash.com/demo/breeze-free/documentation/documentation.html">
          <i class="mdi mdi-file-document-box menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
      <li class="nav-item sidebar-actions">
        <div class="nav-link">
          <div class="mt-4">
            <div class="border-none">
              <p class="text-black">Notification</p>
            </div>
            <ul class="mt-4 pl-0">
              <li>Sign Out</li>
            </ul>
          </div>
        </div>
      </li> --}}
    </ul>
  </nav>