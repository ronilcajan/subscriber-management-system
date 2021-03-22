<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-xs-12">
            <div class="white-box">
                <div class="user-bg"> <img width="100%" alt="user" src="<?= site_url() ?>images/logo.jpg">
                    <div class="overlay-box">
                        <div class="user-content">
                            <a href="javascript:void(0)">
                            <img src="<?= empty($user['img']) ? site_url('/images/user.png') : site_url('uploads').'/'.$user['img'] ?>" alt="user-img" class="thumb-lg img-circle">
                            </a>
                            <h4 class="text-white"><?= empty($user['name']) ? $user['username'] : ucwords($user['name']) ?></h4>
                            <h5 class="text-white"><?= $user['email'] ?></h5>
                            <?= $user['active']==1 ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>' ?>
                        </div>
                    </div>
                </div>
                <div class="user-btm-box">
                    <div class="row text-center m-t-10">
                        <div class="col-md-6 b-r"><strong>Username</strong>
                            <p><?= $user['username'] ?></p>
                        </div>
                        <div class="col-md-6"><strong>Phone</strong>
                            <p><a href="tel:092321321"><?= $user['phone'] ?></a></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row text-center m-t-10">
                        <div class="col-md-12"><strong>Address</strong>
                            <p><?= $user['address'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-xs-12">
            <div class="white-box">
            <h3 class="box-title m-b-0">User Activity</h3>
                <p class="text-muted m-b-20">Check user activity.</p>
                <table  id="myTable" class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Events</th>
                            <th>Activity Type</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($acti as $row){ ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $row['username'] ?></td>
                                    <td><?= $row['events'] ?></td>
                                    <td><?php
                                        if(strpos($row['activity_type'] , 'New' ) !== False){

                                            echo "<span class='label label-success'>".$row['activity_type']."</span>";

                                        }elseif(strpos($row['activity_type'] ,'Update') !== False){

                                            echo "<span class='label label-info'>".$row['activity_type']."</span>";

                                        }else{
                                            echo "<span class='label label-danger'>".$row['activity_type']."</span>";
                                        }
                                        ?>
                                    </td>
                                    <td><?= $row['created_at'] ?></td>
                                </tr>
                            <?php $no++; } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Events</th>
                            <th>Activity Type</th>
                            <th>Date</th>
                        </tr> 
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<?= $this->endSection() ?>