<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Dashboard</h3>
    </div>

    <ul class="list-unstyled components">
        <p>Admin Roles</p>
        <li class="<?= isset($users) ? 'active' : ''?>">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Users</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="/admin/users">Manage Users</a>
                </li>
                <li>
                    <a href="/admin/users/talented">Talented</a>
                </li>
                <li>
                    <a href="/admin/users/organizations">Organizations</a>
                </li>
                <li>
                    <a href="/admin/users/visitors">Visitors</a>
                </li>
                <li>
                    <a href="/admin/users/admins">Admins</a>
                </li>
            </ul>
        </li>
        <li class="<?= isset($events) ? 'active' : ''?>">
            <a href="/admin/events">Events</a>
        </li>
        <li class="<?= isset($materials) ? 'active' : ''?>">
            <a href="/admin/materials">Materials</a>
        </li>
        <li class="<?= isset($talents) ? 'active' : ''?>">
            <a href="/admin/talents">Manage Talents</a>
        </li>
        <li>
            <a href="/admin/notifications">Notifications</a>
        </li>
        
    </ul>
</nav>