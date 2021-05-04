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
                        <div id="adduser">
                            <a class="btn btn-primary waves-effect waves-light btn-circle" title="Backup Database" href="<?= site_url('admin/backup_now') ?>">
                                <i class="fa fa-cloud-download"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <p class="text-muted m-b-20">You can backup, restore and download database here.</p>
                <table  id="userTable" class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>File</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($db): ?>
                        <?php $no=1; foreach($db as $row): ?>
                            
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['filename']->phone ?></td>
                            <td><?= $row['created_at'] ?></td>
                            <td>
                                <a class="text-primary waves-effect waves-light tooltip-primary" href="<?= site_url('admin/restore/') ?>" data-toggle="tooltip" title="Restore Database">
                                    <i class="fa fa-refresh"></i>
                                </a>
                                <a class="text-danger waves-effect waves-light tooltip-danger" href="<?= site_url('admin/download/') ?>" data-toggle="tooltip" title="Download SQL File">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                        </tr>
                        <?php $no++; endforeach ?>
                        <?php endif ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>File</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr> 
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>