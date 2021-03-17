<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
<?= view('Myth\Auth\Views\_message_block') ?>
    <div class="row">
        <div class="col-md-3 col-xs-12">
            <div class="white-box">
                <div class="user-bg"> <img width="100%" alt="user" src="<?= site_url() ?>images/logo.jpg">
                    <div class="overlay-box">
                        <div class="user-content">
                            <a href="javascript:void(0)">
                                <img src="<?= empty($subs['img']) ? site_url('/images/user.png') : site_url('uploads').'/'.$subs['img'] ?>" alt="user-img" class="thumb-lg img-circle">
                            </a>
                            <h4 class="text-white"><?= empty($subs['name']) ? $subs['username'] : ucwords($subs['name']) ?></h4>
                            <h5 class="text-white"><?= $subs['email'] ?></h5>
                            <?= $subs['stats']=='Active' ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>' ?>
                            
                        </div>
                    </div>
                </div>
                <div class="user-btm-box">
                    <div class="row text-center b-b">
                        <p><?= !empty($subs['fb_url']) ? '<a href="'.$subs['fb_url'].'" target="_blank" class="btn btn-facebook waves-effect btn-circle waves-light"><i class="fa fa-facebook"></i></a>' : null ?></p>
                    </div>
                    <div class="row text-center m-t-10">
                        <div class="col-md-6 b-r"><strong>Facebook Name</strong>
                            <p><?= $subs['fb_name'] ?></p>
                        </div>
                        <div class="col-md-6"><strong>Phone</strong>
                            <p><a href="tel:<?= $subs['phone'] ?>"><?= $subs['phone'] ?></a></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row text-center m-t-10">
                        <div class="col-md-12"><strong>Address</strong>
                            <p><?= ucwords($subs['street'].', '.$subs['city'].', '.$subs['province']) ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row text-center m-t-10">
                        <div class="col-md-12"><strong>Recommended By</strong>
                            <p><?= ucwords($subs['recommended_by']) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-xs-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Subscriber Accounts</h3>
                <div class="table-responsive">
                    <table  id="subscriberTable" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Account Name</th>
                                <th>Area of Coverage</th>
                                <th>Monthly</th>
                                <th>Schedule</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($acc)): ?>
                        <?php $no=1; foreach($acc as $row): ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><a href="<?= site_url('admin/account_info/').$row['acc_id'] ?>"><?= ucwords($row['account_name']) ?></a></td>
                                <td><?= ucwords($row['area_coverage']) ?></td>
                                <td>P <?= number_format($row['monthly'],2) ?></td>
                                <td>5th day of the month</td>
                                <td><?= $row['stats']=='Active' ? '<input type="checkbox" checked class="js-switch" data-color="#99d683" data-size="small" data-id="'.$row['acc_id'].'" onchange="changeAccStatus(this)" />' : '<input type="checkbox"  data-id="'.$row['acc_id'].'" onchange="changeAccStatus(this)" class="js-switch" data-color="#99d683" data-size="small" />' ?></td>
                                <td>
                                    <a class="text-primary waves-effect waves-light tooltip-primary m-l-5 m-t-5" href="<?= site_url('admin/account_info/').$row['acc_id']; ?>" data-toggle="tooltip" title="View Account">
                                            <i class="fa fa-user"></i>
                                    </a>
                                    <a class="text-success waves-effect waves-light m-l-5 m-t-5 tooltip-success" href="<?= site_url('admin/update_account/').$row['acc_id']; ?>" data-toggle="tooltip" title="Edit Account">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                    <a class="text-danger waves-effect waves-light m-l-5 m-t-5 tooltip-danger" href="<?= site_url('admin/account/delete/').$row['acc_id']; ?>" data-toggle="tooltip" title="Delete Account">
                                        <i class="fa fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php $no++; endforeach ?>
                        <?php endif ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Account Name</th>
                                <th>Area of Coverage</th>
                                <th>Monthly</th>
                                <th>Schedule</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr> 
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<?= $this->endSection() ?>