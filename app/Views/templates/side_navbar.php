<aside class="sidebar">
    <div class="scroll-sidebar">
        <div class="user-profile">
            <div class="dropdown user-pro-body">
                <div class="profile-image">
                    <?php 
                        $id= user_id();
                        $db = db_connect();
                        $query = $db->query("SELECT `name`,img,username FROM users JOIN user_profile ON users.id = user_profile.user_id WHERE users.id=$id");
                        $result = $query->getRow();
                    ?>
                    <img src="<?= empty($result->img) ? site_url('/images/user.png') : site_url('uploads').'/'.$result->img ?>" alt="user-img" class="img-circle">
                    <a href="javascript:void(0);" class="dropdown-toggle u-dropdown text-blue" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="badge badge-success">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </a>
                    <?php if(in_groups('admin') || in_groups('staff')): ?>
                    <ul class="dropdown-menu animated flipInY">
                        <li><a href="<?= site_url('admin/profile') ?>"><i class="fa fa-user"></i> Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?= site_url('admin/profile') ?>"><i class="fa fa-cog"></i> Account Settings</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?= site_url('logout') ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                    <?php else: ?>
                    <ul class="dropdown-menu animated flipInY">
                        <li><a href="<?= site_url('collector/profile') ?>"><i class="fa fa-user"></i> Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?= site_url('collector/profile') ?>"><i class="fa fa-cog"></i> Account Settings</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?= site_url('logout') ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                    <?php endif ?>
                </div>
                <?php if(in_groups('admin') || in_groups('staff')): ?>
                    <p class="profile-text m-t-15 font-16"><a href="<?= site_url('admin/profile') ?>"> <?= empty($result->name) ? $result->username : ucwords($result->name) ?> </a></p>
                <?php else: ?>
                    <p class="profile-text m-t-15 font-16"><a href="<?= site_url('collector/profile') ?>"> <?= empty($result->name) ? $result->username : ucwords($result->name) ?> </a></p>
                <?php endif ?>
                
            </div>
        </div>
        <nav class="sidebar-nav">
            <?php if(in_groups('admin')): ?>
            <ul id="side-menu">
                <li>
                    <a href="<?= site_url('admin/dashboard') ?>" aria-expanded="false">
                        <i class="icon-grid fa-fw"></i> <span class="hide-menu"> Dashboard</span>
                    </a>
                </li>
                <li>
                        <a href="<?= site_url('admin/subscribers') ?>" class="<?= strpos(uri_string(),'new_subscriber') || strpos(uri_string(),'subscriber') ? 'active' : null ?>" aria-expanded="false">
                        <i class="icon-people fa-fw"></i> <span class="hide-menu"> Subscribers</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('admin/accounts') ?>" class="<?= strpos(uri_string(),'new_account') || strpos(uri_string(),'account') ? 'active' : null ?>" aria-expanded="false">
                        <i class="icon-user-following fa-fw"></i> <span class="hide-menu"> Accounts</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect <?= strpos(uri_string(),'payments') || strpos(uri_string(),'transactions') || strpos(uri_string(),'collections') ? 'active' : null ?>" href="javascript:void(0);" aria-expanded="false">
                        <i class="icon-wallet fa-fw"></i> <span class="hide-menu"> Payments <span class="label label-rounded label-primary pull-right">2</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li> <a href="<?= site_url('admin/payments') ?>">View Payments</a> </li>
                        <li> <a href="<?= site_url('admin/transactions') ?>">Transactions</a> </li>
                        <li> <a href="<?= site_url('admin/collections') ?>">Collections</a> </li>
                    </ul>
                </li>
                <li>
                    <a class="waves-effect <?= strpos(uri_string(),'activity') || strpos(uri_string(),'attempts') ? 'active' : null ?>" href="javascript:void(0);" aria-expanded="false">
                        <i class="icon-globe fa-fw"></i> <span class="hide-menu"> Activity Logs <span class="label label-rounded label-primary pull-right">2</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li> <a href="<?= site_url('admin/activity') ?>">System Activity</a> </li>
                        <li> <a href="<?= site_url('admin/attempts') ?>">Login Attempts</a> </li>
                    </ul>
                </li>
                <li>
                    <a class="<?= strpos(uri_string(),'user_info') ? 'active' : null ?>" href="<?= site_url('admin/users') ?>" aria-expanded="false">
                        <i class="icon-user-follow fa-fw"></i> <span class="hide-menu"> Users</span>
                    </a>
                </li>
            </ul>
            <?php elseif(in_groups('staff')): ?>
            <ul id="side-menu">
                <li>
                    <a href="<?= site_url('admin/dashboard') ?>" aria-expanded="false">
                        <i class="icon-grid fa-fw"></i> <span class="hide-menu"> Dashboard</span>
                    </a>
                </li>
                <li>
                        <a href="<?= site_url('admin/subscribers') ?>" class="<?= strpos(uri_string(),'new_subscriber') || strpos(uri_string(),'subscriber') ? 'active' : null ?>" aria-expanded="false">
                        <i class="icon-people fa-fw"></i> <span class="hide-menu"> Subscribers</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('admin/accounts') ?>" class="<?= strpos(uri_string(),'new_account') || strpos(uri_string(),'account') ? 'active' : null ?>" aria-expanded="false">
                        <i class="icon-user-following fa-fw"></i> <span class="hide-menu"> Accounts</span>
                    </a>
                </li>
            </ul>
            <?php else: ?>
            <ul id="side-menu">
                <li>
                    <a href="<?= site_url('collector/dashboard') ?>" aria-expanded="false">
                        <i class="icon-grid fa-fw"></i> <span class="hide-menu"> Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('collector/collections') ?>" class="<?= strpos(uri_string(),'new_account') || strpos(uri_string(),'account') ? 'active' : null ?>" aria-expanded="false">
                        <i class="icon-user-following fa-fw"></i> <span class="hide-menu"> Collections</span>
                    </a>
                </li>
            </ul>
            <?php endif ?>
        </nav>
    </div>
</aside>