  <nav class="app-header navbar navbar-expand bg-body">
      <div class="container-fluid">

          <!-- Left -->
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" data-lte-toggle="sidebar" href="#">
                      <i class="bi bi-list"></i>
                  </a>
              </li>

              <li class="nav-item d-none d-md-block">
                  <a href="#" class="nav-link">Dashboard</a>
              </li>
          </ul>

          <!-- Right -->
          <ul class="navbar-nav ms-auto">

              <!-- Fullscreen -->
              <li class="nav-item">
                  <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                      <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                      <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display:none"></i>
                  </a>
              </li>

              <!-- User -->
              <li class="nav-item dropdown user-menu">
                  <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                      <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                  </a>

                  <ul class="dropdown-menu dropdown-menu-end">
                      <li class="user-footer p-2">
                          @method('POST')
                          @csrf
                          <a href="{{ route('logout') }}" class="btn btn-outline-danger w-100">Logout</a>
                      </li>
                  </ul>
              </li>

          </ul>

      </div>
  </nav>
