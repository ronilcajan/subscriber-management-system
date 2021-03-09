<aside class="sidebar">
    <div class="scroll-sidebar">
        <div class="user-profile">
            <div class="dropdown user-pro-body">
                <div class="profile-image">
                    <?php 
                        $id= user_id();
                        $db = db_connect();
                        $query = $db->query("SELECT `name`,img,username FROM users JOIN user_profile ON users.id = user_profile.user_id WHERE users.id=$id");
                        $result = $query->getResultArray();
                    ?>
                    <img src="<?= empty($result[0]['img']) ? site_url('/images/user.png') : site_url('uploads').'/'.$result[0]['img'] ?>" alt="user-img" class="img-circle">
                    <a href="javascript:void(0);" class="dropdown-toggle u-dropdown text-blue" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="badge badge-success">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated flipInY">
                        <li><a href="<?= site_url('admin/profile') ?>"><i class="fa fa-user"></i> Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="javascript:void(0);"><i class="fa fa-cog"></i> Account Settings</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?= site_url('logout') ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
                <p class="profile-text m-t-15 font-16"><a href="<?= site_url('admin/profile') ?>"> <?= empty($result[0]['name']) ? $result[0]['username'] : ucwords($result[0]['name']) ?> </a></p>
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
                        <a href="<?= site_url('admin/subscribers') ?>" class="<?= strpos(uri_string(),'new_subscriber') || strpos(uri_string(),'subscriber') ? 'active' : null ?>" aria-expanded="false">
                        <i class="icon-people fa-fw"></i> <span class="hide-menu"> Subscribers</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('admin/accounts') ?>" class="<?= strpos(uri_string(),'new_account') ? 'active' : null ?>" aria-expanded="false">
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
                    <a class="<?= strpos(uri_string(),'user_info') ? 'active' : null ?>" href="<?= site_url('admin/users') ?>" aria-expanded="false">
                        <i class="icon-user-follow fa-fw"></i> <span class="hide-menu"> Users</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>