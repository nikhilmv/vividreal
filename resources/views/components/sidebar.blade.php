<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li> -->
        <!-- <li class="nav-item">
            <a href="{{ route('admin.user.index') }}" class="nav-link {{ Route::is('admin.user.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>Users
                    <span class="badge badge-info right"> </span>
                </p>
            </a>
        </li> -->
        <!-- <li class="nav-item">
            <a href="{{ route('admin.role.index') }}" class="nav-link {{ Route::is('admin.role.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-tag"></i>
                <p>Role
                    <span class="badge badge-success right"> </span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.permission.index') }}" class="nav-link {{ Route::is('admin.permission.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-hat-cowboy"></i>
                <p>Permission
                    <span class="badge badge-danger right"> </span>
                </p>
            </a>
        </li> -->
  
        <li class="nav-item">
            <a href="{{ route('admin.company.index') }}" class="nav-link {{ Route::is('admin.company.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-pdf"></i>
                <p>Company
                    <span class="badge badge-primary right"> </span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.employee.index') }}" class="nav-link {{ Route::is('admin.employee.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>Employees
                    <span class="badge badge-warning right"> </span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.profile.edit') }}" class="nav-link {{ Route::is('admin.profile.edit') ? 'active' : '' }}">
                <i class="nav-icon fas fa-id-card"></i>
                <p>Profile</p>
            </a>
        </li>
    </ul>
</nav>
