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
                            <th>Transaction ID.</th>
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
                        <?php foreach($transac as $row): ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><a href="<?= site_url('admin/account_info/').$row['acc_id'] ?>"><?= $row['account_name'] ?></a></td>
                                <td>P <?= number_format($row['payment'],2) ?></td>
                                <td>Payment for <?= date('F d, Y', strtotime($row['description'])) ?>.</td>
                                <td><?= date('F d, Y', strtotime($row['p_date'])) ?></td>
                                <td><?= $row['notes'] ?></td>
                                <td><?= $row['status']=='Pending' ? "<span class='label label-warning'>Pending</span>" : "<span class='label label-success'>Approved</span>" ?></td>
                                <td>
                                    <span class="tooltip-success" data-toggle="tooltip" title="Edit Transaction" data-id="<?= $row['id'] ?>" onclick="getTransactions(this)" 
                                    data-account="<?= $row['account_name'] ?>" data-date="<?= $row['p_date'] ?>" data-payment="<?= $row['payment'] ?>" data-notes="<?= $row['notes'] ?>">
                                        <a href="#transactionModal" class="text-success waves-effect waves-light m-l-5 m-t-5 " data-toggle="modal" >
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>  
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach ?>
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