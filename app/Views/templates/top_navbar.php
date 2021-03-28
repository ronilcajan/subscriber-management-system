
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
            <?php 
                    $notif = $db->query("SELECT *, COUNT(transactions.id) as num, transactions.created_at as created FROM transactions JOIN accounts ON accounts.id=transactions.account_id 
                                        WHERE transactions.status='Pending' ORDER By p_date DESC");
                    $res = $notif->getRow();
                    $show = $notif->getResultArray();
                ?>
            <li class="dropdown">
                <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown" href="javascript:void(0);">
                    <i class="icon-bell"></i>
                    <span class="badge badge-xs badge-danger"><?= empty($res->num) ? null : $res->num ?></span>
                </a>
               
                <ul class="dropdown-menu mailbox animated slideInUp">
                    <li>
                        <div class="drop-title"><?= empty($res->num) ? 'No Payment/s Collected.' : $res->num.' Payment/s Collected.' ?> </div>
                    </li>
                    <li>
                        <div class="message-center">
                            <?php if(!$show[0]['id']==null): ?>
                            <?php foreach($show as $row): ?>
                            <a href="javascript:void(0);">
                            <div class="user-img">
                                    <img src="<?= site_url() ?>images/user.png" alt="user" class="img-circle">
                                    <span class="profile-status busy pull-right"></span>
                                </div>
                                <div class="mail-contnet">
                                    <h5><?= ucwords($row['account_name']) ?></h5>
                                    <span class="mail-desc">Payment collected.</span>
                                    <span class="time"><?= timeago1($row['created']) ?></span>
                                </div>
                            </a>
                            <?php endforeach ?>
                            <?php else: ?>
                                <a href="javascript:void(0);">
                                    <div class="user-img">
                                        <img src="<?= site_url() ?>images/user.png" alt="user" class="img-circle">
                                        <span class="profile-status busy pull-right"></span>
                                    </div>
                                    <div class="mail-contnet">
                                        <span class="mail-desc">Nothing to show.</span>
                                    </div>
                                </a>
                            <?php endif ?>
                            <?php 
                        function timeago1($date) {
                            $timestamp = strtotime($date);	
                            
                            $strTime = array("second", "minute", "hour", "day", "month", "year");
                            $length = array("60","60","24","30","12","10");
                     
                            $currentTime = time();
                            if($currentTime >= $timestamp) {
                                 $diff     = time()- $timestamp;
                                 for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
                                 $diff = $diff / $length[$i];
                                 }
                     
                                 $diff = round($diff);
                                 return $diff . " " . $strTime[$i] . "(s) ago ";
                            }
                         }
                    ?>
                        </div>
                        
                    </li>
                    <li>
                        <a class="text-center" href="<?= site_url('admin/collections') ?>">
                            <strong>See all</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <?php if(in_groups('admin')):?>
                <li class="right-side-toggle">
                    <a class="right-side-toggler waves-effect waves-light b-r-0 font-20" href="<?= site_url() ?>admin/system_info">
                        <i class="icon-settings"></i>
                    </a>
                </li>
            <?php endif ?>
            
        </ul>
    </div>
</nav>
