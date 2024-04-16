<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('users') ? 'active' : '' }}" href="{{route('users.index')}}">User List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('users/profile') ? 'active' : '' }}" aria-current="page" href="{{route('users.profile')}}" >Profile Page</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('users/change-password') ? 'active' : '' }}" href="{{route('users.change-password')}}">Change Password</a>
            </li>
        </ul>
    </div>
</nav>
