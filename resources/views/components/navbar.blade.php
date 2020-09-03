  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{asset('assets/img/AdminLTELogo.png')}}" alt="Studio Fotográfico" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Studio Fotográfico</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/img/boxed-bg.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('home') }}" class="d-block"></a>
          <span class="badge badge-primary"></span>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="hidden" placeholder="Search" aria-label="Search">
          <div class="input-group-append">

          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item {{ Request::is('/') ? 'menu-open' : '' }}">
            <a href="{{ route('home') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if ((Auth::user()->role->name == 'Administrador'))
          <li class="nav-item {{ Request::is('albuns') || Request::is('albuns/create') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('albuns') ? 'active' : '' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Álbuns
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('albuns.index') }}" class="nav-link {{ Request::is('albuns') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar Álbuns</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('albuns.create') }}" class="nav-link {{ Request::is('cards/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Criar nono Álbum</p>
                </a>
              </li>
            </ul>
          </li>
            @endif
          <li class="nav-item {{ Request::is('orders') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('orders') ? 'active' : '' }}">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Pedidos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('orders.index') }}" class="nav-link {{ Request::is('orders') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar Pedidos</p>
                </a>
              </li>
            </ul>
          </li>

            @if (Auth::user()->role->name == 'Administrador'))
            <li class="nav-item {{ Request::is('users*') ? 'menu-is-opening menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuários
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar Usuários</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('users.create') }}" class="nav-link {{ Request::is('users/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cadastrar novo</p>
                </a>
              </li>

            </ul>
          </li>
            @endif

          <li class="nav-header"></li>

          <li class="nav-item">
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
              <p>Sair da conta</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
