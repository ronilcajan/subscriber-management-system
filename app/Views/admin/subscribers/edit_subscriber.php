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
                                <h3 class="box-title m-t-40">Account Info</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Account Name</label>
                                            <input type="text" id="account_name" required name="account_name" value="<?= $subs['account_name'] ?>" class="form-control"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Area Coverage</label>
                                            <input type="text" required id="area_coverage" value="<?= $subs['area_coverage'] ?>" name="area_coverage" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Google Coordinate</label>
                                            <input type="text" id="google_coor" value="<?= $subs['google_coordinate'] ?>" name="google_coor" class="form-control"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Antenna Name/Model</label>
                                            <input type="text" id="antenna" name="antenna" value="<?= $subs['antenna_model'] ?>" class="form-control"></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="control-label">Date Started</label>
                                            <input type="text" onchange="calculateDate(this)" id="date_started" name="date_started" required readonly value="<?= $subs['date_started'] ?>" class="form-control mydatepicker" placeholder="mm/dd/yyyy"></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="control-label">Due Date</label>
                                            <input type="text" id="due_date" onchange="calculateDay(this)" name="due_date" required value="<?= $subs['due_date'] ?>" readonly class="form-control" placeholder="mm/dd/yyyy"></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="control-label">Schedule</label>
                                            <input type="text" id="schedule" name="schedule" value="<?= $subs['schedule'] ?>" readonly class="form-control">
                                            <small id="emailHelp" class="form-text text-muted">Payment Schedule</small>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="box-title m-t-40">Subscription Options</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <label for="option-1" class="option-desc m-l-20"><strong>INSTALLATION FEE: 1500</strong></label>
                                        <div class="form-group">
                                            <input type="radio" <?= $subs['subs_option']=='1' ? 'checked' : null ?> class="check" id="option-1" value="1" name="options" data-radio="iradio_square-blue" style="margin-top:-40px">
                                            <label for="option-1" class="option-desc">Option 1: Cashout worth 5000, covers antenna, router, <br> 20m UTP, 1 length G.I. Pipe and labor Expenses/charges.</label>
                                        </div>
                                        <label for="option-1" class="option-desc"><small><i>*Extra UTP and G.I. Pipe will shouldered by the subscriber if needed.</i></small></label>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label>Monthly Subscription</label>
                                        <div class="form-group">
                                            <input type="radio" <?= $subs['monthly']=='1000' && $subs['subs_option']=='1' ? 'checked' : null ?> required class="check" value="1000" id="m-1" name="monthly" data-radio="iradio_square-blue">
                                            <label for="m-1">1000</label><br>
                                            <input type="radio" <?= $subs['monthly']=='1500' && $subs['subs_option']=='1' ? 'checked' : null ?> class="check" value="1500" id="m-2" name="monthly" data-radio="iradio_square-blue">
                                            <label for="m-2">1500</label><br>
                                            <input type="radio" <?= $subs['monthly']=='2000' && $subs['subs_option']=='1' ? 'checked' : null ?> required class="check" value="2000" id="m-3" name="monthly" data-radio="iradio_square-blue">
                                            <label for="m-3">2000</label><br>
                                            <input type="radio" <?= $subs['monthly']=='3000' && $subs['subs_option']=='1' ? 'checked' : null ?> required class="check" value="3000" id="m-4" name="monthly" data-radio="iradio_square-blue">
                                            <label for="m-4">3000</label><br>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label>Device User</label>
                                        <div class="form-group">
                                            <input type="radio" <?= $subs['device_user']=='multiple' && $subs['subs_option']=='1' ? 'checked' : null ?> required class="check" value="multiple" id="device" name="device_user" data-radio="iradio_square-blue">
                                            <label for="device">multiple</label><br>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label>Business Affiliates</label>
                                        <div class="form-group">
                                            <input type="radio" <?= $subs['b_affiliates']=='yes' && $subs['subs_option']=='1' ? 'checked' : null ?> required class="check" value="yes" id="yes" name="business_aff" data-radio="iradio_square-blue">
                                            <label for="yes">Yes</label><br>
                                            <input type="radio" <?= $subs['b_affiliates']=='no' && $subs['subs_option']=='1' ? 'checked' : null ?> required class="check" value="no" id="no" name="business_aff" data-radio="iradio_square-blue">
                                            <label for="no">No</label><br>
                                            <label><small><i>If Yes, add 2800 for antenna. Profit share in 20%.</i></small></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label>DL & UL Speed</label>
                                        <div class="form-group">
                                            <input type="radio" <?= $subs['speed']=='10mbps' && $subs['subs_option']=='1' ? 'checked' : null ?> required class="check" value="10mbps" id="speed-1" name="speed" data-radio="iradio_square-blue">
                                            <label for="speed-1">Up to 10mbps</label><br>
                                            <input type="radio" <?= $subs['speed']=='15mbps' && $subs['subs_option']=='1' ? 'checked' : null ?> required class="check" value="15mbps" id="speed-2" name="speed" data-radio="iradio_square-blue">
                                            <label for="speed-2">15mbps</label><br>
                                            <input type="radio" <?= $subs['speed']=='20mbps' && $subs['subs_option']=='1' ? 'checked' : null ?> required class="check" value="20mbps" id="speed-3" name="speed" data-radio="iradio_square-blue">
                                            <label for="speed-3">20mbps</label><br>
                                            <input type="radio" <?= $subs['speed']=='30mbps' && $subs['subs_option']=='1' ? 'checked' : null ?> required class="check" value="30mbps" id="speed-4" name="speed" data-radio="iradio_square-blue">
                                            <label for="speed-4">30mbps</label><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <label for="option-2" class="option-desc m-l-20"><strong>INSTALLATION FEE: 2500</strong></label>
                                        <div class="form-group">
                                            <input type="radio" <?= $subs['subs_option']=='2' ? 'checked' : null ?> class="check" id="option-2" value="2" name="options" data-radio="iradio_square-blue">
                                            <label for="option-2" class="option-desc">Option 2: No cashout. Lock-in contract is 18 months for basic <br> antenna only(<i>Litebeam m5 AC Gen2, Loco m5. AC, Comfast 2.4ghz</i>)</label>
                                        </div>
                                        <label for="option-2" class="option-desc"><small><i>
                                            Lock-in Contract for high-end antenna reciever will be computed according to the cost of it.<br>
                                            *Antenna, UTP, Router & G.I. Pipe remains solely owned by Nodtech if contract duration not me.</i></small>
                                        </label>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label>Monthly Subscription</label>
                                        <div class="form-group">
                                            <input type="radio" <?= $subs['monthly']=='1000' && $subs['subs_option']=='2' ? 'checked' : null ?> required class="check" value="1000" id="m-1" name="monthly" data-radio="iradio_square-blue">
                                            <label for="m-1">1000</label><br>
                                            <input type="radio" <?= $subs['monthly']=='2500' && $subs['subs_option']=='2' ? 'checked' : null ?> required class="check" value="2500" id="m-2" name="monthly" data-radio="iradio_square-blue">
                                            <label for="m-2">2500</label><br>
                                            <input type="radio" <?= $subs['monthly']=='3500' && $subs['subs_option']=='2' ? 'checked' : null ?> required class="check" value="3500" id="m-3" name="monthly" data-radio="iradio_square-blue">
                                            <label for="m-3">3500</label><br>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label>Device User</label>
                                        <div class="form-group">
                                            <input type="radio" <?= $subs['device_user']=='multiple' && $subs['subs_option']=='2' ? 'checked' : null ?> required class="check" value="multiple" id="device" name="device_user" data-radio="iradio_square-blue">
                                            <label for="device">multiple</label><br>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label>Business Affiliates</label>
                                        <div class="form-group">
                                            <input type="radio" <?= $subs['b_affiliates']=='yes' && $subs['subs_option']=='2' ? 'checked' : null ?> required class="check" value="yes" id="yes" name="business_aff" data-radio="iradio_square-blue">
                                            <label for="yes">Yes</label><br>
                                            <input type="radio" <?= $subs['b_affiliates']=='no' && $subs['subs_option']=='2' ? 'checked' : null ?> required class="check" value="no" id="no" name="business_aff" data-radio="iradio_square-blue">
                                            <label for="no">No</label><br>
                                            <label><small><i>If Yes, add 2800 for antenna. Profit share in 20%.</i></small></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label>DL & UL Speed</label>
                                        <div class="form-group">
                                            <input type="radio" <?= $subs['speed']=='10mbps' && $subs['subs_option']=='2' ? 'checked' : null ?> required class="check" value="10mbps" id="speed-1" name="speed" data-radio="iradio_square-blue">
                                            <label for="speed-1">Up to 10mbps</label><br>
                                            <input type="radio" <?= $subs['speed']=='15mbps' && $subs['subs_option']=='2' ? 'checked' : null ?> required class="check" value="15mbps" id="speed-2" name="speed" data-radio="iradio_square-blue">
                                            <label for="speed-2">15mbps</label><br>
                                            <input type="radio" <?= $subs['speed']=='20mbps' && $subs['subs_option']=='2' ? 'checked' : null ?> required class="check" value="20mbps" id="speed-3" name="speed" data-radio="iradio_square-blue">
                                            <label for="speed-3">20mbps</label><br>
                                            <input type="radio" <?= $subs['speed']=='30mbps' && $subs['subs_option']=='2' ? 'checked' : null ?> required class="check" value="30mbps" id="speed-4" name="speed" data-radio="iradio_square-blue">
                                            <label for="speed-4">30mbps</label><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <div class="row">
                                            <label for="option-3" class="option-desc m-l-20"><strong>INSTALLATION FEE: 1500</strong></label>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="radio" <?= $subs['subs_option']=='3' ? 'checked' : null ?> class="check" id="option-3" value="3" name="options" data-radio="iradio_square-blue">
                                            <label for="option-3" class="option-desc">Option 3: WIFI Hotspot Business affiliates with cashout worth <br> 5000, covers antenna, router, 20m UTP, 1 length G.I. <br> Pipe and labor expenses/charges.</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label>Monthly Subscription</label>
                                        <div class="form-group">
                                            <input type="radio" <?= $subs['monthly']=='300' && $subs['subs_option']=='3' ? 'checked' : null ?> required class="check" value="300" id="m-1" name="monthly" data-radio="iradio_square-blue">
                                            <label for="m-1">300</label><br>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label>Device User</label>
                                        <div class="form-group">
                                            <input type="radio" <?= $subs['device_user']=='per device' && $subs['subs_option']=='3' ? 'checked' : null ?> required class="check" value="per device" id="device" name="device_user" data-radio="iradio_square-blue">
                                            <label for="device">per device</label><br>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label>Business Affiliates</label>
                                        <div class="form-group">
                                            <input type="radio" <?= $subs['b_affiliates']=='yes' && $subs['subs_option']=='3' ? 'checked' : null ?> required class="check" value="yes" id="yes" name="business_aff" data-radio="iradio_square-blue">
                                            <label for="yes">Yes</label><br>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label>DL & UL Speed</label>
                                        <div class="form-group">
                                            <input type="radio"  <?= $subs['speed']=='3mbps' && $subs['subs_option']=='3' ? 'checked' : null ?> required class="check" value="3mbps" id="speed-1" name="speed" data-radio="iradio_square-blue">
                                            <label for="speed-1">Up to 3mbps</label><br>
                                        </div>
                                    </div>
                                </div>
                            </div> <hr>
                            <div class="form-actions m-t-30">
                                <input name="id" value="<?= $subs['id'] ?>" type="hidden">
                                <input name="acc_id" value="<?= $subs['acc_id'] ?>" type="hidden">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save Changes</button>
                                <a class="btn btn-default" href="<?= site_url('admin/accounts') ?>">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>