<div class="wrapper">
    <nav id="sidebar" class="active">
       
        <ul class="list-unstyled components text-secondary">
            <li>
                <a href="{{url('home')}}"><i class="fas fa-home"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{url('user_list')}}"><i class="fas fa-file-alt"></i> Users</a>
            </li>
            <li>
                <a href="{{url('category_page')}}"><i class="fas fa-table"></i> Category</a>
            </li>
            <li>
                <a href="{{url('borrow_request')}}"><i class="fas fa-chart-bar"></i> Borrow request</a>
            </li>
            {{-- <li>
                <a href="admin/icons.html"><i class="fas fa-icons"></i> Icons</a>
            </li> --}}
            <li>
                {{-- <a href="#uielementsmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-layer-group"></i> UI Elements</a>
                <ul class="collapse list-unstyled" id="uielementsmenu">
                    <li>
                        <a href="admin/ui-buttons.html"><i class="fas fa-angle-right"></i> Buttons</a>
                    </li>
                    <li>
                        <a href="admin/ui-badges.html"><i class="fas fa-angle-right"></i> Badges</a>
                    </li>
                    <li>
                        <a href="ui-cards.html"><i class="fas fa-angle-right"></i> Cards</a>
                    </li>
                    <li>
                        <a href="admin/ui-alerts.html"><i class="fas fa-angle-right"></i> Alerts</a>
                    </li>
                    <li>
                        <a href="admin/ui-tabs.html"><i class="fas fa-angle-right"></i> Tabs</a>
                    </li>
                    <li>
                        <a href="admin/ui-date-time-picker.html"><i class="fas fa-angle-right"></i> Date & Time Picker</a>
                    </li>
                </ul> --}}
            </li>
            <li>
                <a href="#authmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-user-shield"></i> Books </a>
                <ul class="collapse list-unstyled" id="authmenu">
                    <li>
                        <a href="{{url('add_book')}}"><i class="fas fa-lock"></i>Add book</a>
                    </li>
                    <li>
                        <a href="{{url('show_book')}}"><i class="fas fa-user-plus"></i> Show books</a>
                    </li>
                    {{-- <li>
                        <a href="admin/forgot-password.html"><i class="fas fa-user-lock"></i> Forgot password</a>
                    </li> --}}
                </ul>
            </li>
            {{-- <li>
                <a href="#pagesmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-copy"></i> Pages</a>
                <ul class="collapse list-unstyled" id="pagesmenu">
                    <li>
                        <a href="admin/blank.html"><i class="fas fa-file"></i> Blank page</a>
                    </li>
                    <li>
                        <a href="admin/404.html"><i class="fas fa-info-circle"></i> 404 Error page</a>
                    </li>
                    <li>
                        <a href="admin/500.html"><i class="fas fa-info-circle"></i> 500 Error page</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="admin/users.html"><i class="fas fa-user-friends"></i>Users</a>
            </li>
            <li>
                <a href="admin/settings.html"><i class="fas fa-cog"></i>Settings</a>
            </li>
        </ul> --}}
    </nav>