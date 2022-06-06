<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle">
<i class="hamburger align-self-center"></i>
</a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">


            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                    @if (Auth::user()->profile_pic)
                    <img src="{{ asset('images/uploads/profiles-thumb/' .auth()->user()->profile_pic) }}" class="avatar img-fluid rounded-circle mr-1" alt="{{ auth()->user()->name }}" />
                    @else
                    <img src="{{ Auth::user()->getAvatar() }}" class="avatar img-fluid rounded-circle mr-1" alt="Chris Wood" />
                    @endif
                        <span class="text-dark">{{ auth()->user()->name }}</span>
                    </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('show.profile', [auth()->user()->id]) }}"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Sign out
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
