
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  
  <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="{{asset('img/logo.png')}}"></a></h1>
                    </div>
                </div>
            </div>
        </div>
  </a>
  
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  
  <!-- Nav Item - Products -->
  <li class="nav-item">
  <a class="nav-link" href="{{ route('products') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Sản Phẩm</span></a>
  </li>
  <!-- Nav Item - category -->
  <li class="nav-item">
  <a class="nav-link" href="{{ route('products_category') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Danh Mục</span></a>
  </li>
    <!-- Nav Item - Topseller -->
    <li class="nav-item">
     <a class="nav-link" href="{{ route('products_author') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Ủy Quyền</span></a>
  </li>
  
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  
  <!-- Sidebar Toggler (Sidebar) -->

  
  
</ul>