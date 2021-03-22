<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row">
    
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0"><?= $title ?></h3>
                <p class="text-muted m-b-20">Here you can view system acitivity.</p>
                    <table id="myTable" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User ID</th>
                                <th>IP Address</th>
                                <th>Email/Username</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($logins as $row){ ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $row['user_id'] ?></td>
                                    <td><?= $row['ip_address'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['success']==1 ? "<span class='label label-success'>Success</span>" : "<span class='label label-warning'>Failed</span>" ?></td>
                                    <td><?= $row['date'] ?></td>
                                </tr>
                            <?php $no++; } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <th>No</th>
                                <th>User ID</th>
                                <th>IP Address</th>
                                <th>Email/Username</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </tfoot>
                    </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>