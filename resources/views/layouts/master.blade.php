<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Employee | @yield("title")</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('dist/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/responsive.bootstrap4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper" id="app">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('images/logo.png') }}" alt="Employee Logo" class="brand-image">
      <span class="brand-text font-weight-light">Employee</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/logo.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->username }}</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" id="app">
          <li class="nav-item">
            <a href="{{ route("home") }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <router-link to="/employees" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Employees
              </p>
            </router-link>
          </li>
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route("countries.index") }}" class="nav-link">
                    <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Countries
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("states.index") }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                        <p>
                            States
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("departments.index") }}" class="nav-link">
                    <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                            Departments
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("cities.index") }}" class="nav-link">
                    <i class="nav-icon fas fa-map"></i>
                        <p>
                            Cities
                        </p>
                    </a>
                </li>

            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                user
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                        <p>
                            user
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/profile" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                        <p>
                            Roles
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/profile" class="nav-link">
                    <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                            Permissions
                        </p>
                    </a>
                </li>

            </ul>
          </li>
          <li class="nav-item">
            <form action="{{ route("logout") }}" method="POST">
                @csrf
            <button type="submit" class="btn nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout 
              </p>
            </button>
            </form>
          </li>
      </ul>
      </nav>
    </div>
  </aside>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <router-view></router-view>
            {{-- @yield("content") --}}
        </div>
      </div>
    </div>
  </div>	
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
	<script src="{{ asset('dist/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('dist/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('dist/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('dist/js/responsive.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('dist/js/jquery.min.js') }}"></script>
    <footer class="main-footer text-sm">
		<strong>Copyright &copy; {{ date('Y')}} <a href="https://employee.io">Employee</a>.</strong> All rights reserved.
	</footer>
	</div>
</body>
</html>
