<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{route('users.index')}}" {{ \Route::currentRouteNamed('users.index') ? 'active' : '' }}>User List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{route('users.show', auth()->id())}}" {{ \Route::currentRouteNamed('users.show', auth()->id()) ? 'active' : '' }}>Profile Page</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('users.change-password')}}" {{ \Route::currentRouteNamed('users.change-password') ? 'active' : '' }}>Change Password</a>
            </li>
        </ul>
    </div>
</nav>
