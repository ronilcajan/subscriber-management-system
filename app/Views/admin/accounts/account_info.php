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
                                <img src="<?= empty($acc['img']) ? site_url('/images/user.png') : site_url('uploads').'/'.$acc['img'] ?>" alt="user-img" class="thumb-lg img-circle">
                            </a>
                            <h4 class="text-white"><?= empty($acc['name']) ? $acc['name'] : ucwords($acc['name']) ?></h4>
                            <h5 class="text-white"><?= $acc['email'] ?></h5>
                            <?= $acc['stats']=='Active' ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>' ?>
                            
                        </div>
                    </div>
                </div>
                <div class="user-btm-box">
                    <div class="row text-center m-t-10">
                        <div class="col-md-12 b-r"><strong>Date Started</strong>
                            <p><?= date('M. d, Y', strtotime($acc['date_started'])) ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row text-center m-t-10">
                        <div class="col-md-6 b-r"><strong>Account Name</strong>
                            <p><?= $acc['account_name'] ?></p>
                        </div>
                        <div class="col-md-6"><strong>Area of Coverage</strong>
                            <p><?= ucwords($acc['area_coverage']) ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row text-center m-t-10">
                        <div class="col-md-6 b-r"><strong>Google Coordinates</strong>
                            <p><?= $acc['google_coordinate'] ?></p>
                        </div>
                        <div class="col-md-6"><strong>Antenna/Model</strong>
                            <p><?= $acc['antenna_model'] ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row text-center m-t-10">
                        <div class="col-md-12"><strong>Option Selected</strong>
                            <p>Option <?= $acc['subs_option'] ?></p>
                        </div>
                    </div>
                    <div class="row text-center m-t-10">
                        <div class="col-md-6 b-r"><strong>Monthly</strong>
                            <p>P <?= number_format($acc['monthly'],2) ?></p>
                        </div>
                        <div class="col-md-6"><strong>Device User</strong>
                            <p><?= $acc['device_user'] ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row text-center m-t-10">
                        <div class="col-md-6 b-r"><strong>Business Affiliates</strong>
                            <p><?= ucwords($acc['b_affiliates']) ?></p>
                        </div>
                        <div class="col-md-6"><strong>DL & UL Speed</strong>
                            <p><?= $acc['speed'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-xs-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Transaction History</h3>
                <table  id="acctransactionTable" class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Notes</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($transac as $row): ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= date('F d, Y', strtotime($row['p_date'])) ?></td>
                                <td>P <?= number_format($row['payment'],2) ?></td>
                                <td>Payment for <?= date('F d, Y', strtotime($row['description'])) ?>.</td>
                                <td><?= $row['notes'] ?></td>
                                <td><?= $row['status']=='Paid' ? "<span class='label label-success'>Paid</span>" : "<span class='label label-danger'>Unpaid</span>" ?></td>
                            </tr>
                        <?php $no++; endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Notes</th>
                            <th>Status</th>
                        </tr> 
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<?= $this->endSection() ?>