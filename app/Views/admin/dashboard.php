<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
<?= view('Myth\Auth\Views\_message_block') ?>
    <div class="row colorbox-group-widget">
        <div class="col-md-3 col-sm-6 info-color-box">
            <div class="white-box">
                <div class="media bg-primary">
                    <div class="media-body">
                        <h3 class="info-count"><?= $clients ?> <span class="pull-right"><i class="mdi mdi-account-multiple-outline"></i></span></h3>
                        <p class="info-text font-12">Subscribers</p>
                        <p class="info-ot font-15">Accounts<span class="label label-rounded"><?= $accounts ?></span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 info-color-box">
            <div class="white-box">
                <div class="media bg-success">
                    <div class="media-body">
                        <h3 class="info-count"><?= $unpaid ?> <span class="pull-right"><i class="mdi  mdi-checkbox-marked-circle-outline"></i></span></h3>
                        <p class="info-text font-12">Unpaid</p>
                        <p class="info-ot font-15">Paid<span class="label label-rounded"><?= $paid ?> </span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 info-color-box">
            <div class="white-box">
                <div class="media bg-danger">
                    <div class="media-body">
                        <h3 class="info-count">P <?= number_format($month['payment'],2) ?> <span class="pull-right"><i class="mdi mdi-coin"></i></span></h3>
                        <p class="info-text font-12">This Month</p>
                        <p class="info-ot font-15">Today's Collection<span class="label label-rounded">P <?= number_format($daily['payment'],2) ?></span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 info-color-box">
            <div class="white-box">
                <div class="media bg-warning">
                    <div class="media-body">
                        <h3 class="info-count">P <?= number_format($total['payment'],2) ?> <span class="pull-right"><i class="mdi mdi-coin"></i></span></h3>
                        <p class="info-text font-12">Total Income</p>
                        <p class="info-ot font-15">This Year<span class="label label-rounded">P <?= number_format($year['payment'],2) ?></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9 col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Due Payments</h3>
                <p class="text-muted m-b-20">List of all subscribers that needs to pay</p>
                <table  id="accountTable" class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Account</th>
                            <th>Area of Coverage</th>
                            <th>Subscribers</th>
                            <th>Monthly</th>
                            <th>Schedule</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($subs as $row): ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><a href="<?= site_url('admin/account_info/').$row['acc_id'] ?>"><?= $row['account_name'] ?></a></td>
                                <td><?= ucwords($row['area_coverage']) ?></td>
                                <td><a href="<?= site_url('admin/subscriber_info/').$row['subscriber_id'] ?>"><?= $row['name'] ?></a></td>
                                <td>P <?= number_format($row['monthly'],2) ?></td>
                                <td><?= $row['schedule'] ?>th day</td>
                                <td>
                                    <?php 
                                        $now = strtotime(date('Y-m-d'));
                                        $due_date = strtotime($row['due_date']);
                                    
                                        if ($now > $due_date) 
                                            echo "<span class='text-danger'>".date('F d, Y', strtotime($row['due_date']))."</span>"; 
                                        else
                                            echo date('F d, Y', strtotime($row['due_date'])); 
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        $now = strtotime(date('Y-m-d'));
                                        $due_date = strtotime($row['due_date']);
                                    
                                        if ($now > $due_date) 
                                            echo "<span class='label label-danger'>Unpaid</span>"; 
                                        else
                                        echo "<span class='label label-success'>Paid</span>"; 
                                    ?>
                                </td>
                                <td>
                                    <?php if ($now > $due_date): ?>
                                    <span class="tooltip-danger" data-toggle="tooltip" title="Pay Now" onclick="showPment(this)" date-due="<?= $row['monthly'] ?>" data-id="<?= $row['acc_id'] ?>" data-account="<?= $row['account_name'] ?>">
                                        <a class="text-danger waves-effect waves-light m-l-5 m-t-5" href="#payModal" data-toggle="modal" >
                                            <i class="fa fa-product-hunt"></i>
                                        </a>
                                    </span>
                                    <?php else: ?>
                                        <span class="tooltip-primary" data-toggle="tooltip" title="Pay Now" onclick="showPment(this)" date-due="<?= $row['monthly'] ?>" data-id="<?= $row['acc_id'] ?>" data-account="<?= $row['account_name'] ?>">
                                        <a class="text-primary waves-effect waves-light m-l-5 m-t-5" href="#payModal" data-toggle="modal" >
                                            <i class="fa fa-product-hunt"></i>
                                        </a>
                                    </span>
                                    <?php endif ?>
                                    <a class="text-success waves-effect waves-light m-l-5 m-t-5 tooltip-success sendEmail" href="<?= site_url('admin/send_email/').$row['acc_id']; ?>" data-toggle="tooltip" title="Send Email Notification">
                                        <i class="fa fa-envelope-o"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php $no++; endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Account</th>
                            <th>Area of Coverage</th>
                            <th>Subscribers</th>
                            <th>Monthly</th>
                            <th>Schedule</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr> 
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <div class="white-box" >
                <h3 class="box-title m-b-0">Latest Activity</h3>
                <ul class="custom-timeline" >
                    <?php foreach($acti as $row): ?>
                    <li>
                        <?php if(strpos($row['activity_type'] , 'New' ) !== False){
                            echo "<a class='text-success' href='javascript:void(0);'>".$row['activity_type']." - </a><a href='javascript:void(0);' class='float-right text-success'>".timeago($row['created_at'])."</a>";
                        }elseif(strpos($row['activity_type'] ,'Update') !== False){
                            echo "<a class='text-primary' href='javascript:void(0);'>".$row['activity_type']." - </a><a href='javascript:void(0);' class='float-right text-primary'>".timeago($row['created_at'])."</a>";
                        }else{
                            echo "<a class='text-danger' href='javascript:void(0);'>".$row['activity_type']." - </a><a href='javascript:void(0);' class='float-right text-danger'>".timeago($row['created_at'])."</a>";
                        }
                        ?>
                        <p><?= $row['events'] ?></p>
                        <p>By: <?= $row['username'] ?></p>
                    </li>
                    <?php endforeach ?>
                    <?php 
                        function timeago($date) {
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
                </ul>
            </div>
        </div>
    </div>
</div>
<?= $this->include('admin/payments/payModal') ?>
<?= $this->endSection() ?>