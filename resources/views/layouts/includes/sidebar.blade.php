<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#" {{ \Route::currentRouteNamed('users.index') ? 'active' : '' }}>User List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#" {{ \Route::currentRouteNamed('about') ? 'active' : '' }}>Profile Page</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" {{ \Route::currentRouteNamed('about') ? 'active' : '' }}>Change Password</a>
            </li>
        </ul>
    </div>
</nav>
