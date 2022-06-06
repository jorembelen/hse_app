<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/dashboard">
            <h2 class="align-middle mr-3">HSE</h2></a>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>
                    @if(auth()->user()->role == 'admin' || auth()->user()->role == 'super_admin')
            <li class="sidebar-item">
                <a href="#management" data-toggle="collapse" class="sidebar-link">
                    <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Management</span>
                </a>
                <ul id="management" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="/admin/locations#!"> Locations</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="/admin/employees#!"> Employees</a></li>
                    {{-- <li class="sidebar-item"><a class="sidebar-link" href="/admin/vaccines#!"> Vaccines</a></li> --}}
                    @if(auth()->user()->role == 'super_admin')
                    <li class="sidebar-item"><a class="sidebar-link" href="/admin/import#!"> Import Employees</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="/admin/import-locations#!"> Import Locations</a></li>
                    @endif
                    <li class="sidebar-item"><a class="sidebar-link" href="/admin/users#!"> Users</a></li>
                </ul>
            </li>
                    @endif

                @if(auth()->user()->role == 'admin' || auth()->user()->role == 'manager' || auth()->user()->role == 'super_admin'
                || auth()->user()->role == 'member' || auth()->user()->role == 'gm' || auth()->user()->role == 'hsem')
            <li class="sidebar-item">
                <a href="#projects" data-toggle="collapse" class="sidebar-link">
                    <i class="align-middle" data-feather="slack"></i> <span class="align-middle">Incidents</span>
                </a>
                <ul id="projects" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
                    <a class="sidebar-link" href="/admin/notification#!"> Notification</a>
                    <a class="sidebar-link" href="/admin/investigation#!"> Investigation</a>
                    <a class="sidebar-link" href="/recommendations#!"> Recommendations</a>
                </ul>
            </li>
            @endif
            @if(auth()->user()->role == 'user' || auth()->user()->role == 'site_member')
            <li class="sidebar-item">
                <a href="#projects" data-toggle="collapse" class="sidebar-link">
                    <i class="align-middle" data-feather="slack"></i> <span class="align-middle">Incidents</span>
                </a>
                <ul id="projects" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
                    <a class="sidebar-link" href="/incidents#!"> Notification</a>
                    <a class="sidebar-link" href="/reports#!"> Investigation</a>
                </ul>
            </li>
            @endif

         @include('includes.hse-member')
     
            @if(auth()->user()->role == 'admin' || auth()->user()->role == 'super_admin' || auth()->user()->role == 'gm' || auth()->user()->role == 'hsem')
            <li class="sidebar-item">
                <a href="#review" data-toggle="collapse" class="sidebar-link">
                    <i class="align-middle" data-feather="feather"></i> <span class="align-middle">Review</span>
                </a>
                <ul id="review" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="/admin/review#!"> Summary</a></li>
                </ul>
            </li>
            @endif
        {{-- End  --}}
    </div>
</nav>