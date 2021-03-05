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
                            <button type="button" class="btn btn-primary waves-effect waves-light btn-circle" data-toggle="modal"  data-target="#user-modal" title="Add New User">
                                <i class="icon-user-follow"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <p class="text-muted m-b-20">You can add, edit and delete users here.</p>
                <div class="table-responsive">
                    <table  id="userTable" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($users): ?>
                            <?php $no=1; foreach($users as $user): ?>
                               
                            <tr>
                                <td><?= $no ?></td>
                                <td><a href="<?= site_url('admin/user_info/').$user->id; ?>"><?= $user->username ?></a></td>
                                <td>
                                    <a href="<?= site_url('admin/user_info/').$user->id; ?>">
                                        <?= !empty($user->fullname) ? '<img width="30" src="'.site_url('/uploads/').$user->img.'" alt="user" class="img-circle"> '.$user->fullname : null ?>
                                    </a>
                                </td>
                                <td><a href="tel:09213213"><?= $user->phone ?></a></td>
                                <td><a href="mailto:ron@gmail.com"><?= $user->email ?></a></td>
                                <td><span class="label label-success"><?= $user->role ?></span></td>
                                <td>
                                    <a class="text-primary waves-effect waves-light tooltip-primary" href="<?= site_url('admin/user_info/').$user->id; ?>" data-toggle="tooltip" title="View User">
                                        <i class="fa fa-user"></i>
                                    </a>
                                    <span id="edit-user" data-toggle="modal" data-target="#edit-modal" data-id="<?= $user->id ?>" data-role="<?= $user->role_id ?>" data-email="<?= $user->email ?>" data-username="<?= $user->username ?>">
                                        <a class="text-success waves-effect waves-light m-l-5 m-t-5 tooltip-success" data-toggle="tooltip" title="Edit User">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                    </span>
                                    <a class="text-danger waves-effect waves-light m-l-5 m-t-5 tooltip-danger" href="<?= site_url('admin/users/delete/').$user->id; ?>" data-toggle="tooltip" title="Delete User">
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
                                <th>Username</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr> 
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->include('admin/users/modal') ?>
<?= $this->endSection() ?>