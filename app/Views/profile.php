<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
<?= view('Myth\Auth\Views\_message_block') ?>
    <div class="row">
        <div class="col-md-3 col-xs-12">
            <div class="white-box">
                <div class="user-bg"> <img width="100%" alt="user" src="<?= empty($info['logo']) ? site_url('images/logo.jpg') : site_url('uploads').'/'.$info['logo'] ?>">
                    <div class="overlay-box">
                        <div class="user-content">
                            <a href="javascript:void(0)">
                                <img src="<?= empty($user['img']) ? site_url('/images/user.png') : site_url('uploads').'/'.$user['img'] ?>" alt="user-img" class="thumb-lg img-circle">
                            </a>
                            <h4 class="text-white"><?= empty($user['name']) ? $user['name'] : ucwords($user['name']) ?></h4>
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
                            <p><a href="tel:<?= $user['phone'] ?>"><?= $user['phone'] ?></a></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row text-center m-t-10">
                        <div class="col-md-12"><strong>Address</strong>
                            <p><?= ucwords($user['address']) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-xs-12">
            <div class="white-box">
                <ul class="nav nav-tabs tabs customtab">
                    <li class="active tab">
                        <a href="#home" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Activity</span> </a>
                    </li>
                    <li class="tab">
                        <a href="#profile" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Profile</span> </a>
                    </li>
                    <li class="tab">
                        <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Settings</span> </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <h3 class="box-title m-b-0">My Activity</h3>
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
                    <div class="tab-pane" id="profile">
                        <?php if(in_groups('admin') || in_groups('staff')):?>
                            <form class="form-horizontal form-material" method="POST" action="<?= site_url('admin/update_profile') ?>" enctype="multipart/form-data">
                        <?php else: ?>
                            <form class="form-horizontal form-material" method="POST" action="<?= site_url('collector/update_profile') ?>" enctype="multipart/form-data">
                        <?php endif ?>
                            <div class="form-group">
                                <label class="col-md-12">Profile Picture</label>
                                <div class="col-md-3">
                                    <input type="file" name="avatar" accept="image/*" id="input-file-now-custom-3" class="dropify" data-height="200" data-default-file="<?= empty($user['img']) ? site_url('images/user.png') : site_url('uploads').'/'.$user['img'] ?>" />    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Username</label>
                                <div class="col-md-12">
                                    <input type="text" name="username" value="<?= $user['username'] ?>" class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Full Name</label>
                                <div class="col-md-12">
                                    <input type="text" name="name" required value="<?= $user['name'] ?>" placeholder="Enter your name" class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" name="email" value="<?= $user['email'] ?>" class="form-control form-control-line" name="example-email" id="example-email"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Phone No</label>
                                <div class="col-md-12">
                                    <input type="text" name="phone" required value="<?= $user['phone'] ?>" placeholder="123 456 7890" class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Address</label>
                                <div class="col-md-12">
                                    <textarea rows="5" name="address" required class="form-control form-control-line" placeholder="Enter address"><?= $user['address'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="settings">
                        <?php if(in_groups('admin')):?>
                            <form class="form-horizontal form-material" method="post" action="<?= site_url('admin/change_password') ?>">
                        <?php elseif(in_groups('staff')):?>
                            <form class="form-horizontal form-material" method="post" action="<?= site_url('staff/change_password') ?>">
                        <?php else: ?>
                            <form class="form-horizontal form-material" method="post" action="<?= site_url('collector/change_password') ?>">
                        <?php endif ?>
                            <div class="form-group">
                                <label class="col-md-12">Username</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" value="<?= $user['username'] ?>" readonly> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Email Address</label>
                                <div class="col-md-12">
                                    <input type="text" name="email" class="form-control" value="<?= $user['email'] ?>" readonly> </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">New Password</label>
                                <div class="col-md-12">
                                    <input type="password" name="new_pass" id="pass" required class="form-control form-control-line" placeholder="Enter a new Password">
                                    <span toggle="#pass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Confirm Password</label>
                                <div class="col-md-12">
                                    <input type="password" required name="conf_pass" id="conf_pass" class="form-control form-control-line" placeholder="Please confirm password">
                                    <span toggle="#conf_pass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success" type="submit">Change Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<?= $this->endSection() ?>