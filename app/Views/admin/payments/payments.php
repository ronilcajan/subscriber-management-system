<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <?= view('Myth\Auth\Views\_message_block') ?>
            <div class="white-box">
                <div class="row">
                    <div class="col-sm-12" style="relative">
                        <h4 class="box-title"><?= $title ?></h4>
                    </div>
                </div>
                <p class="text-muted m-b-20">You can add, edit and delete subscribers here.</p>
                <div class="table-responsive">
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
                                    <td><?= date('M. d, Y', strtotime($row['due_date'])) ?></td>
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
                                        <span class="tooltip-danger" data-toggle="tooltip" title="Pay Now">
                                            <a class="text-danger waves-effect waves-light m-l-5 m-t-5" href="#payModal" data-toggle="modal" >
                                                <i class="fa fa-product-hunt"></i>
                                            </a>
                                        </span>
                                        <?php else: ?>
                                            <span class="tooltip-primary" data-toggle="tooltip" title="Pay Now">
                                            <a class="text-primary waves-effect waves-light m-l-5 m-t-5" href="#payModal" data-toggle="modal" >
                                                <i class="fa fa-product-hunt"></i>
                                            </a>
                                        </span>
                                        <?php endif ?>
                                        <a class="text-success waves-effect waves-light m-l-5 m-t-5 tooltip-success" href="<?= site_url('admin/update_account/').$row['acc_id']; ?>" data-toggle="tooltip" title="Send Email Notification">
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
        </div>
    </div>
</div>
<?= $this->include('admin/payments/payModal') ?>
<?= $this->endSection() ?>