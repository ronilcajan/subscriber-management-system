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
                        <div id="addsubscriber">
                            <a href="<?= site_url('admin/new_account') ?>" class="btn btn-primary waves-effect waves-light btn-circle" title="Add New Account">
                                <i class="icon-user-following"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <p class="text-muted m-b-20">You can add, edit and delete accounts here.</p>
                <table  id="accountTable" class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Account</th>
                            <th>Area of Coverage</th>
                            <th>Subscribers</th>
                            <th>Monthly</th>
                            <th>Schedule</th>
                            <th>Active</th>
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
                                <td><?= $row['schedule'] ?>th day of the month</td>
                                <td><?= $row['acc_status']=='Active' ? '<input type="checkbox" checked class="js-switch" data-color="#99d683" data-size="small" data-id="'.$row['acc_id'].'" onchange="changeAccStatus(this)" />' : '<input type="checkbox"  data-id="'.$row['acc_id'].'" onchange="changeAccStatus(this)" class="js-switch" data-color="#99d683" data-size="small" />' ?></td>
                                <td>
                                    <a class="text-primary waves-effect waves-light tooltip-primary m-l-5 m-t-5" href="<?= site_url('admin/account_info/').$row['acc_id']; ?>" data-toggle="tooltip" title="View Account">
                                        <i class="fa fa-user"></i>
                                    </a>
                                    <a class="text-success waves-effect waves-light m-l-5 m-t-5 tooltip-success" href="<?= site_url('admin/update_account/').$row['acc_id']; ?>" data-toggle="tooltip" title="Edit Account">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                    <a class="text-danger waves-effect waves-light m-l-5 m-t-5 tooltip-danger" onclick="return confirm('Are you sure you want to delete this account?');" href="<?= site_url('admin/account/delete/').$row['acc_id']; ?>" data-toggle="tooltip" title="Delete Account">
                                        <i class="fa fa fa-times"></i>
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
                            <th>Active</th>
                            <th>Action</th>
                        </tr> 
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>