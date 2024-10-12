  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('HomePage') }}" class="brand-link">
        <img src="{{ asset('BackEnd/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('BackEnd/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-header">Human Resources</li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-user nav-icon"></i>
                    <p>
                      Admins
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="" class="nav-link">
                            {{-- <i class="fas fa-plus-suquer"></i> --}}
                            <i class="far fa-plus-square nav-icon"></i>
                            <p>Create</p>
                          </a>
                        </li>
                      <li class="nav-item">
                          <a href="" class="nav-link">
                              <i class="fas fa-list nav-icon"></i>
                            <p>Index</p>
                          </a>
                        </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-user nav-icon"></i>
                    <p>
                      Users
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="" class="nav-link">
                            {{-- <i class="fas fa-plus-suquer"></i> --}}
                            <i class="far fa-plus-square nav-icon"></i>
                            <p>Create</p>
                          </a>
                        </li>
                      <li class="nav-item">
                          <a href="" class="nav-link">
                              <i class="fas fa-list nav-icon"></i>
                            <p>Index</p>
                          </a>
                        </li>
                  </ul>
                </li>
                <li class="nav-header">Content</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="fas fa-user nav-icon"></i>
                      <p>
                        Categories
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('categories.create') }}" class="nav-link">
                              {{-- <i class="fas fa-plus-suquer"></i> --}}
                              <i class="far fa-plus-square nav-icon"></i>
                              <p>Create</p>
                            </a>
                          </li>
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                              <p>Index</p>
                            </a>
                          </li>
                    </ul>
                  </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="fas fa-user nav-icon"></i>
                      <p>
                        Jobs
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('jobs.create') }}" class="nav-link">
                              {{-- <i class="fas fa-plus-suquer"></i> --}}
                              <i class="far fa-plus-square nav-icon"></i>
                              <p>Create</p>
                            </a>
                          </li>
                        <li class="nav-item">
                            <a href="{{ route('jobs.index') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                              <p>Index</p>
                            </a>
                          </li>
                    </ul>
                  </li>
                <li class="nav-header">Settings</li>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                    <button type="submit" class="btn btn-sm btn-outline-primary">Logout</button>
                </form>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
