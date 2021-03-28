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
                        <form action="<?= site_url('admin/updateSystem') ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-body">
                                <h3 class="box-title">System Info</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Business Name</label>
                                            <input type="text" required name="name" value="<?= $info['name'] ?>" class="form-control"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Dashboard Name</label>
                                            <input type="text" required name="dname" value="<?= $info['dname'] ?>" class="form-control"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Tagline</label>
                                            <input type="text" required name="tagline" value="<?= $info['tagline'] ?>" class="form-control"> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Email Address</label>
                                            <input type="email" required name="email" value="<?= $info['email'] ?>" class="form-control"> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Phone Number</label>
                                            <input type="text" required name="phone" value="<?= $info['phone'] ?>" class="form-control"> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Business Address</label>
                                            <input type="text" required name="address" value="<?= $info['address'] ?>" class="form-control"> </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="control-label">Icon</label>
                                                <input type="file" name="icon" accept="image/*" id="input-file-now-custom-1" class="dropify" data-height="150" data-default-file="<?= empty($info['icon']) ? site_url('images/logo-transparent.png') : site_url('uploads').'/'.$info['icon'] ?>" />    
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="control-label">Logo</label>
                                                <input type="file" name="logo" accept="image/*" id="input-file-now-custom-2" class="dropify" data-height="150" data-default-file="<?= empty($info['logo']) ? site_url('images/logo.jpg') : site_url('uploads').'/'.$info['logo'] ?>" />    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-actions m-t-30">
                                <input type='hidden' name='id' value="1">
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