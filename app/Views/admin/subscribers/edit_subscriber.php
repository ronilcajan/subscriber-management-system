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
                        <form action="<?= site_url('admin/update_subs') ?>" method="POST">
                            <div class="form-body">
                                <h3 class="box-title">Person Info</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Subscriber's Name</label>
                                            <input type="text" required id="name" name="name" value="<?= $subs['name'] ?>" class="form-control"></div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Contact Number</label>
                                            <input type="text" required name="phone" value="<?= $subs['phone'] ?>" class="form-control"> </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Email Address</label>
                                            <input type="email" required name="email" value="<?= $subs['email'] ?>" class="form-control"> </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Facebook Name</label>
                                            <input type="text" required id="fb_name" value="<?= $subs['fb_name'] ?>" name="fb_name" class="form-control"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Facebook Url/link</label>
                                            <input type="text" id="fb_url" name="fb_url" value="<?= $subs['fb_url'] ?>" class="form-control"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Recommended by</label>
                                            <input type="text"  id="recommended_by" value="<?= $subs['recommended_by'] ?>" name="recommended_by" class="form-control"></div>
                                    </div>                        
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <h3 class="box-title m-t-40">Address Info</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <label>Street</label>
                                            <input type="text" required name="street" class="form-control" value="<?= $subs['street'] ?>"> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" required name="city" value="<?= $subs['city'] ?>" class="form-control"> </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>State/Province</label>
                                            <input type="text" class="form-control" name="province" value="<?= $subs['province'] ?>" readonly> </div>
                                    </div>
                                    <!--/span-->
                                </div>
                            </div> <hr>
                            <div class="form-actions m-t-30">
                                <input name="id" value="<?= $subs['id'] ?>" type="hidden">
                                <input name="acc_id" value="<?= $subs['acc_id'] ?>" type="hidden">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save Changes</button>
                                <a class="btn btn-default" href="<?= site_url('admin/subscribers') ?>">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>