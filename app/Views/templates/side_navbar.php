<aside class="sidebar">
    <div class="scroll-sidebar">
        <div class="user-profile">
            <div class="dropdown user-pro-body">
                <div class="profile-image">
                    <img src="../plugins/images/users/hanna.jpg" alt="user-img" class="img-circle">
                    <a href="javascript:void(0);" class="dropdown-toggle u-dropdown text-blue" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="badge badge-success">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated flipInY">
                        <li><a href="javascript:void(0);"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-inbox"></i> Inbox</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-cog"></i> Account Settings</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?= site_url('logout') ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
                <p class="profile-text m-t-15 font-16"><a href="javascript:void(0);"> Hanna Gover</a></p>
            </div>
        </div>
        <nav class="sidebar-nav">
            <ul id="side-menu">
                <li>
                    <a href="<?= site_url('admin/dashboard') ?>" aria-expanded="false">
                        <i class="icon-grid fa-fw"></i> <span class="hide-menu"> Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('admin/clients') ?>" aria-expanded="false">
                        <i class="icon-people fa-fw"></i> <span class="hide-menu"> Clients</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('admin/accounts') ?>" aria-expanded="false">
                        <i class="icon-user-following fa-fw"></i> <span class="hide-menu"> Accounts</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect <?= strpos(uri_string(),'payments') || strpos(uri_string(),'transactions') || strpos(uri_string(),'collections') ? 'active' : null ?>" href="javascript:void(0);" aria-expanded="false">
                        <i class="icon-wallet fa-fw"></i> <span class="hide-menu"> Payments </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li> <a href="<?= site_url('admin/payments') ?>">View Payments</a> </li>
                        <li> <a href="<?= site_url('admin/transactions') ?>">Transcations</a> </li>
                        <li> <a href="<?= site_url('admin/collections') ?>">Collections</a> </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= site_url('admin/activity') ?>" aria-expanded="false">
                        <i class="icon-globe fa-fw"></i> <span class="hide-menu"> Activity Logs</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('admin/users') ?>" aria-expanded="false">
                        <i class="icon-user-follow fa-fw"></i> <span class="hide-menu"> Users</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>