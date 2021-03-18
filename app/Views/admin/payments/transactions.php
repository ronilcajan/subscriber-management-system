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
                <p class="text-muted m-b-20">List of transactions.</p>
                <table  id="accountTable" class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Account</th>
                            <th>Amount Paid</th>
                            <th>Description</th>
                            <th>Payment Date</th>
                            <th>Notes</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($transac as $row): ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><a href="<?= site_url('admin/account_info/').$row['acc_id'] ?>"><?= $row['account_name'] ?></a></td>
                                <td>P <?= number_format($row['payment'],2) ?></td>
                                <td>Payment for <?= date('F d, Y', strtotime($row['description'])) ?>.</td>
                                <td><?= date('F d, Y', strtotime($row['p_date'])) ?></td>
                                <td><?= $row['notes'] ?></td>
                                <td><?= $row['status']=='Paid' ? "<span class='label label-success'>Paid</span>" : "<span class='label label-danger'>Unpaid</span>" ?></td>
                                <td>
                                    <span data-id="<?= $row['id'] ?>" class="tooltip-success" href="javascript:void(0)" data-toggle="tooltip" title="Edit Transaction">
                                        <a href="#transactionModal" class="text-success waves-effect waves-light m-l-5 m-t-5 " data-toggle="modal" >
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>  
                                    </span>
                                    <a data-id="<?= $row['id'] ?>" class="text-danger waves-effect waves-light m-l-5 m-t-5 tooltip-danger" href="javascript:void(0)" data-toggle="tooltip" title="Delete Transaction">
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
                            <th>Amount Paid</th>
                            <th>Description</th>
                            <th>Pament Date</th>
                            <th>Notes</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr> 
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->include('admin/payments/transactionModal') ?>
<?= $this->endSection() ?>