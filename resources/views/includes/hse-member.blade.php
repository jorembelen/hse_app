

    @if(auth()->user()->role == 'hse-member')
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