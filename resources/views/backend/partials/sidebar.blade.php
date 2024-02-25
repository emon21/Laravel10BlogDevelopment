<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('backend') }}/dist/img/AdminLTELogo.png " alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ $setting->site_name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="@if(Auth::user()->image) {{ asset(Auth::user()->image) }} @else {{ asset('profile/default.jpg') }} @endif" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Hi,{{ Auth::user()->name }}</a>
          </div>
        </div>

         <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="{{ route('admin.home') }}" class="nav-link {{ (request()->routeIs('admin.home')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('category.index') }}" class="nav-link {{ (request()->routeIs('category.index')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Category
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('post.index') }}" class="nav-link {{ (request()->routeIs('post.index')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Post
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('tag.index') }}" class="nav-link {{ (request()->routeIs('tag.index')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Tag
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>

          <li class="nav-header">Your Acount</li>
          <li class="nav-item">
            <a href="{{ route('profile') }}" class="nav-link {{ (request()->routeIs('profile')) ? 'active' : '' }}">
              <i class="nav-icon far fa-user"></i>
              <p>Your Profile</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link {{ (request()->routeIs('user.index')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User
                <span class="right badge badge-success">New</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('setting.index') }}" class="nav-link {{ (request()->routeIs('setting.index')) ? 'active' : '' }}">
                <i class="fa fa-cog" aria-hidden="true"></i>
              <p>
                Setting

              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      </div>

      <!-- /.sidebar -->
  </aside>
