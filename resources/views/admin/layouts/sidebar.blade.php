<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{url('/')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{url('/')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block text-capitalize">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li @class([
                'nav-item',
                'menu-open' => request()->is('*setup/*'),
              ])>
          <a href="#" 
            @class([
                   'nav-link',
                   'active' => request()->is('*setup/*'),
                   ])>
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Setup
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.category.index') }}" 
                @class([
                   'nav-link',
                   'active' => request()->is('*/setup/category*'),
                   ])>
                <i class="far fa-circle nav-icon"></i>
                <p>Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.country.index') }}"
              @class([
                   'nav-link',
                   'active' => request()->is('*/setup/country*'),
                   ])>
                <i class="far fa-circle nav-icon"></i>
                <p>Country</p>
              </a>
            </li>
                        <li class="nav-item">
              <a href="{{ route('admin.subcategory.index') }}"
              @class([
                   'nav-link',
                   'active' => request()->is('*/setup/subcategory*'),
                   ])>
                <i class="far fa-circle nav-icon"></i>
                <p>Subcategory</p>
              </a>
            </li>
           {{--  <li class="nav-item">
              <a href="{{ route('admin.city.index') }}"
              @class([
                   'nav-link',
                   'active' => request()->is('*/setup/city*'),
                   ])>
                <i class="far fa-circle nav-icon"></i>
                <p>City</p>
              </a>
            </li>
 --}}          </ul>
        </li>
      </ul>
    </nav>
        <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li @class([
                'nav-item',
                'menu-open' => request()->is('*post/*'),
              ])>
          <a href="{{ route('User.post.index') }}" 
            @class([
                   'nav-link',
                   'active' => request()->is('*post/*'),
                   ])>
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Post a news
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
        </li>
      </ul>
    </nav>
   {{--  <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li @class([
                'nav-item',
                'menu-open' => request()->is('*newspaper/*'),
              ])>
          <a href="{{ route('User.newspaper.index') }}" 
            @class([
                   'nav-link',
                   'active' => request()->is('*newspaper/*'),
                   ])>
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Post a news
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
        </li>
      </ul>
    </nav> --}}
  </div>
</aside>