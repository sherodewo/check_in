<div class="app-main">
    <div class="app-sidebar sidebar-shadow">
        <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">

            </div>
        </div>
<div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading">Dashboards</li>
            <li>
                <a href="/home" class="mm-active">
                    <i class="metismenu-icon pe-7s-rocket"></i>
                    Dashboard
                </a>
            </li>
            <li class="app-sidebar__heading">UI Components</li>
            <li>
                @if ((Auth::user()->user_role->role->name == "super_admin"))
                <a href="#">
                    <i class="metismenu-icon pe-7s-diamond"></i>
                    Elements
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <a href="/user">
                            <i class="metismenu-icon"></i>
                            User
                        </a>
                    </li>
                    <li>
                        <a href="/role">
                            <i class="metismenu-icon">
                            </i>Role
                        </a>
                    </li>
                    <li>
                        <a href="/userrole">
                            <i class="metismenu-icon">
                            </i>User Role
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-box1"></i>
                    Product
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li>
                        <a href="/hotel">
                            <i class="metismenu-icon">
                            </i>Hotel
                        </a>
                    </li>
                    <li>
                        <a href="/roomtype">
                            <i class="metismenu-icon">
                            </i>Room Type
                        </a>
                    </li>
                    <li>
                        <a href="/province">
                            <i class="metismenu-icon">
                            </i>Province
                        </a>
                    </li>
                    <li>
                        <a href="/city">
                            <i class="metismenu-icon">
                            </i>City
                        </a>
                    </li>
                    <li>
                        <a href="/district">
                            <i class="metismenu-icon">
                            </i>Districts
                        </a>
                    </li>
                    <li>
                        <a href="/facility">
                            <i class="metismenu-icon">
                            </i>Facilities
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
</div>
