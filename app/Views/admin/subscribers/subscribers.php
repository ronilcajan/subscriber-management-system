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
                            <a href="<?= site_url('admin/new_subscriber') ?>" class="btn btn-primary waves-effect waves-light btn-circle" title="Add New User">
                                <i class="icon-people"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <p class="text-muted m-b-20">You can add, edit and delete subscribers here.</p>
                <div class="table-responsive">
                    <table  id="subscriberTable" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Fulllname</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($subs as $row):?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><a href="<?= site_url('admin/subscriber_info/').$row['id'] ?>"><?= ucwords($row['name']) ?></a></td>
                                <td><a href="tel:<?= $row['phone'] ?>"><?= $row['phone'] ?></a></td>
                                <td><a href="mailto:<?= $row['email'] ?>"><?= $row['email'] ?></a></td>
                                <td><?= ucwords($row['street'].', '.$row['city'].', '.$row['province']) ?></td>
                                <td><?= $row['status']=='Active' ? '<span class="label label-success">'.$row['status'].'</span>' : '<span class="label label-danger">'.$row['status'].'</span>' ?></td>
                                <td>
                                    <a class="text-primary waves-effect waves-light tooltip-primary m-l-5 m-t-5" href="<?= site_url('admin/subscriber_info/').$row['id']; ?>" data-toggle="tooltip" title="View Subscribers">
                                        <i class="fa fa-user"></i>
                                    </a>
                                    <a class="text-success waves-effect waves-light m-l-5 m-t-5 tooltip-success" href="<?= site_url('admin/subscriber/update/').$row['id']; ?>" data-toggle="tooltip" title="Edit Subscribers">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                    <a class="text-danger waves-effect waves-light m-l-5 m-t-5 tooltip-danger" href="<?= site_url('admin/subscriber/delete/').$row['id']; ?>" data-toggle="tooltip" title="Delete Subscribers">
                                        <i class="fa fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $no++; endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Fulllname</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
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
<?= $this->endSection() ?>