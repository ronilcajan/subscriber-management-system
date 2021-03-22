<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <?= view('Myth\Auth\Views\_message_block') ?>
            <div class="panel panel-info">
                <div class="panel-heading"><?= $title ?></div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form action="<?= site_url('admin/add_subs') ?>" method="POST">
                            <div class="form-body">
                                <h3 class="box-title">System Info</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Name</label>
                                            <input type="text" required id="name" name="name" value="<?= old('name') ?>" class="form-control"></div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Tagline</label>
                                            <input type="text" required name="phone" value="<?= old('phone') ?>" class="form-control"> </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="control-label">Icon</label>
                                                <input type="file" name="avatar" accept="image/*" id="input-file-now-custom-3" class="dropify" data-height="150" data-default-file="<?= empty($user['img']) ? site_url('images/user.png') : site_url('uploads').'/'.$user['img'] ?>" />    
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="control-label">Logo</label>
                                                <input type="file" name="avatar" accept="image/*" id="input-file-now-custom-3" class="dropify" data-height="150" data-default-file="<?= empty($user['img']) ? site_url('images/user.png') : site_url('uploads').'/'.$user['img'] ?>" />    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-actions m-t-30">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save Changes</button>
                                <a type="button" href="<?= site_url('admin/dashboard') ?>" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>