
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <a class="navbar-toggle font-20 hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">
            <i class="fa fa-bars"></i>
        </a>
        <div class="top-left-part">
            <a class="logo" href="<?= site_url() ?>">
                <b>
                    <?php $db = db_connect();
                        $query = $db->query("SELECT `icon`,`dname` FROM system_info WHERE id=1");
                        $result = $query->getRow();
                    ?>
                    <img src="<?= empty($result->icon) ? site_url().'images/logo-transparent.png' : site_url('uploads/').$result->icon ?>" alt="home" width="40" />
                </b>
                <span>
                   <strong class="text-white"><?= empty($result->dname) ? 'Waga Network' : $result->dname ?></strong>
                </span>
            </a>
        </div>
        <ul class="nav navbar-top-links navbar-left hidden-xs">
            <li>
                <a href="javascript:void(0)" class="sidebartoggler font-20 waves-effect waves-light"><i class="icon-arrow-left-circle"></i></a>
            </li>
        </ul>
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li class="dropdown">
                <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown" href="javascript:void(0);">
                    <i class="icon-bell"></i>
                    <span class="badge badge-xs badge-danger">3</span>
                </a>
                <ul class="dropdown-menu mailbox animated slideInUp">
                    <li>
                        <div class="drop-title">4 collections to approve.</div>
                    </li>
                    <li>
                        <div class="message-center">
                            <a href="javascript:void(0);">
                                
                            <div class="user-img">
                                    <img src="../plugins/images/users/2.jpg" alt="user" class="img-circle">
                                    <span class="profile-status busy pull-right"></span>
                                </div>
                                <div class="mail-contnet">
                                    <h5>Pavan kumar</h5>
                                    <span class="mail-desc">Just see the my admin!</span>
                                    <span class="time">9:30 AM</span>
                                </div>
                            </a>
                            <a href="javascript:void(0);">
                                <div class="user-img">
                                    <img src="../plugins/images/users/2.jpg" alt="user" class="img-circle">
                                    <span class="profile-status busy pull-right"></span>
                                </div>
                                <div class="mail-contnet">
                                    <h5>Sonu Nigam</h5>
                                    <span class="mail-desc">I've sung a song! See you at</span>
                                    <span class="time">9:10 AM</span>
                                </div>
                            </a>
                            <a href="javascript:void(0);">
                                <div class="user-img">
                                    <img src="../plugins/images/users/3.jpg" alt="user" class="img-circle"><span class="profile-status away pull-right"></span>
                                </div>
                                <div class="mail-contnet">
                                    <h5>Arijit Sinh</h5>
                                    <span class="mail-desc">I am a singer!</span>
                                    <span class="time">9:08 AM</span>
                                </div>
                            </a>
                            <a href="javascript:void(0);">
                                <div class="user-img">
                                    <img src="../plugins/images/users/4.jpg" alt="user" class="img-circle">
                                    <span class="profile-status offline pull-right"></span>
                                </div>
                                <div class="mail-contnet">
                                    <h5>Pavan kumar</h5>
                                    <span class="mail-desc">Just see the my admin!</span>
                                    <span class="time">9:02 AM</span>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <a class="text-center" href="javascript:void(0);">
                            <strong>See all notifications</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="right-side-toggle">
                <a class="right-side-toggler waves-effect waves-light b-r-0 font-20" href="<?= site_url() ?>admin/system_info">
                    <i class="icon-settings"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>