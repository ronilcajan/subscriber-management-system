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
                        <form action="<?= site_url('admin/account_update') ?>" method="POST">
                            <div class="form-body">
                                <h3 class="box-title m-t-40">Person Info</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Subscribers Name</label>
                                            <select class="form-control select2" name="subs_id">
                                                <option>Select</option>
                                                <optgroup label="Subscribers">
                                                    <?php foreach($subs as $row): ?>
                                                        <?php if($acc['subscriber_id']==$row['id']):?>
                                                            <option value="<?= $row['id'] ?>" selected><?= ucwords($row['name']) ?></option>
                                                        <?php else: ?>
                                                            <option value="<?= $row['id'] ?>"><?= ucwords($row['name']) ?></option>
                                                        <?php endif ?>
                                                        
                                                    <?php endforeach ?>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="box-title m-t-40">Account Info</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Account Name</label>
                                            <input type="text" id="account_name" required name="account_name" value="<?= $acc['account_name'] ?>" class="form-control"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Area Coverage</label>
                                            <input type="text" required id="area_coverage" value="<?= $acc['area_coverage'] ?>" name="area_coverage" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Google Coordinate</label>
                                            <input type="text" id="google_coor" value="<?= $acc['google_coordinate'] ?>" name="google_coor" class="form-control"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Antenna Name/Model</label>
                                            <input type="text" id="antenna" name="antenna" value="<?= $acc['antenna_model'] ?>" class="form-control"></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="control-label">Date Started</label>
                                            <input type="text" id="date_started" name="date_started" required value="<?= $acc['date_started'] ?>" class="form-control mydatepicker" readonly placeholder="mm/dd/yyyy"></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="control-label">Due Date</label>
                                            <input type="text" id="due_date" name="due_date" required value="<?= $acc['due_date'] ?>" class="form-control mydatepicker" placeholder="mm/dd/yyyy"></div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="control-label">Schedule</label>
                                            <input type="text" id="schedule" name="schedule" value="<?= $acc['schedule'] ?>th day of the month" readonly class="form-control">
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
                                            <input type="radio" <?= $acc['subs_option']=='1' ? 'checked' : null ?> class="check" id="option-1" value="1" name="options" data-radio="iradio_square-blue" style="margin-top:-40px">
                                            <label for="option-1" class="option-desc">Option 1: Cashout worth 5000, covers antenna, router, <br> 20m UTP, 1 length G.I. Pipe and labor Expenses/charges.</label>
                                        </div>
                                        <label for="option-1" class="option-desc"><small><i>*Extra UTP and G.I. Pipe will shouldered by the subscriber if needed.</i></small></label>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label>Monthly Subscription</label>
                                        <div class="form-group">
                                            <input type="radio" <?= $acc['monthly']=='1000' && $acc['subs_option']=='1' ? 'checked' : null ?> required value="1000" id="m-1" name="monthly">
                                            <label for="m-1">1000</label><br>
                                            <input type="radio" <?= $acc['monthly']=='1500' && $acc['subs_option']=='1' ? 'checked' : null ?> required value="1500" id="m-2" name="monthly">
                                            <label for="m-2">1500</label><br>
                                            <input type="radio" <?= $acc['monthly']=='2000' && $acc['subs_option']=='1' ? 'checked' : null ?> required value="2000" id="m-3" name="monthly">
                                            <label for="m-3">2000</label><br>
                                            <input type="radio" <?= $acc['monthly']=='3000' && $acc['subs_option']=='1' ? 'checked' : null ?> required value="3000" id="m-4" name="monthly">
                                            <label for="m-4">3000</label><br>
                                            
                                            <?php if($acc['monthly']!='1000' && $acc['monthly']!='1500' && $acc['monthly']!='2000' && $acc['monthly']!='3000' && $acc['subs_option']=='1'): ?>
                                                <input type="radio" required value="other" checked id="m-5" name="monthly">
                                                <label for="m-5">Other</label><br>
                                                <input type="text" class="form-control" id="custom_m" name="custom" placeholder="Enter Monthly" value="<?= $acc['monthly'] ?>" />
                                            <?php else: ?>
                                                <input type="radio" required value="other" id="m-5" name="monthly">
                                                <label for="m-5">Other</label><br>
                                                <input type="text" class="form-control" id="custom_m" name="custom" placeholder="Enter Monthly" style="display:none" />
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label>Device User</label>
                                        <div class="form-group">
                                            <input type="radio" <?= $acc['device_user']=='multiple' && $acc['subs_option']=='1' ? 'checked' : null ?> required class="check" value="multiple" id="device" name="device_user" data-radio="iradio_square-blue">
                                            <label for="device">multiple</label><br>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label>Business Affiliates</label>
                                        <div class="form-group">
                                            <input type="radio" <?= $acc['b_affiliates']=='yes' && $acc['subs_option']=='1' ? 'checked' : null ?> required class="check" value="yes" id="yes" name="business_aff" data-radio="iradio_square-blue">
                                            <label for="yes">Yes</label><br>
                                            <input type="radio" <?= $acc['b_affiliates']=='no' && $acc['subs_option']=='1' ? 'checked' : null ?> required class="check" value="no" id="no" name="business_aff" data-radio="iradio_square-blue">
                                            <label for="no">No</label><br>
                                            <label><small><i>If Yes, add 2800 for antenna. Profit share in 20%.</i></small></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label>DL & UL Speed</label>
                                        <div class="form-group">
                                            <input type="radio" <?= $acc['speed']=='10mbps' && $acc['subs_option']=='1' ? 'checked' : null ?> required class="check" value="10mbps" id="speed-1" name="speed" data-radio="iradio_square-blue">
                                            <label for="speed-1">Up to 10mbps</label><br>
                                            <input type="radio" <?= $acc['speed']=='15mbps' && $acc['subs_option']=='1' ? 'checked' : null ?> required class="check" value="15mbps" id="speed-2" name="speed" data-radio="iradio_square-blue">
                                            <label for="speed-2">15mbps</label><br>
                                            <input type="radio" <?= $acc['speed']=='20mbps' && $acc['subs_option']=='1' ? 'checked' : null ?> required class="check" value="20mbps" id="speed-3" name="speed" data-radio="iradio_square-blue">
                                            <label for="speed-3">20mbps</label><br>
                                            <input type="radio" <?= $acc['speed']=='30mbps' && $acc['subs_option']=='1' ? 'checked' : null ?> required class="check" value="30mbps" id="speed-4" name="speed" data-radio="iradio_square-blue">
                                            <label for="speed-4">30mbps</label><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <label for="option-2" class="option-desc m-l-20"><strong>INSTALLATION FEE: 2500</strong></label>
                                        <div class="form-group">
                                            <input type="radio" <?= $acc['subs_option']=='2' ? 'checked' : null ?> class="check" id="option-2" value="2" name="options" data-radio="iradio_square-blue">
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
                                            <input type="radio" <?= $acc['monthly']=='1500' && $acc['subs_option']=='2' ? 'checked' : null ?> required value="1000" id="mp-1" name="monthly">
                                            <label for="mp-1">1500</label><br>
                                            <input type="radio" <?= $acc['monthly']=='2500' && $acc['subs_option']=='2' ? 'checked' : null ?> required value="2500" id="mp-2" name="monthly">
                                            <label for="mp-2">2500</label><br>
                                            <input type="radio" <?= $acc['monthly']=='3500' && $acc['subs_option']=='2' ? 'checked' : null ?> required value="3500" id="mp-3" name="monthly">
                                            <label for="mp-3">3500</label><br>

                                            <?php if($acc['monthly']!='1500' && $acc['monthly']!='2500' && $acc['monthly']!='3500' && $acc['subs_option']=='2'): ?>
                                                <input type="radio" required value="other1" checked id="mp-5" name="monthly">
                                                <label for="mp-5">Other</label><br>
                                                <input type="text" class="form-control" id="custom_m1" name="custom1" placeholder="Enter Monthly" value="<?= $acc['monthly'] ?>" />
                                            <?php else: ?>
                                                <input type="radio" required value="other1" id="mp-5" name="monthly">
                                                <label for="mp-5">Other</label><br>
                                                <input type="text" class="form-control" id="custom_m1" name="custom1" placeholder="Enter Monthly" style="display:none" />
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label>Device User</label>
                                        <div class="form-group">
                                            <input type="radio" <?= $acc['device_user']=='multiple' && $acc['subs_option']=='2' ? 'checked' : null ?> required class="check" value="multiple" id="device" name="device_user" data-radio="iradio_square-blue">
                                            <label for="device">multiple</label><br>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label>Business Affiliates</label>
                                        <div class="form-group">
                                            <input type="radio" <?= $acc['b_affiliates']=='yes' && $acc['subs_option']=='2' ? 'checked' : null ?> required class="check" value="yes" id="yes" name="business_aff" data-radio="iradio_square-blue">
                                            <label for="yes">Yes</label><br>
                                            <input type="radio" <?= $acc['b_affiliates']=='no' && $acc['subs_option']=='2' ? 'checked' : null ?> required class="check" value="no" id="no" name="business_aff" data-radio="iradio_square-blue">
                                            <label for="no">No</label><br>
                                            <label><small><i>If Yes, add 2800 for antenna. Profit share in 20%.</i></small></label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label>DL & UL Speed</label>
                                        <div class="form-group">
                                            <input type="radio" <?= $acc['speed']=='10mbps' && $acc['subs_option']=='2' ? 'checked' : null ?> required class="check" value="10mbps" id="speed-1" name="speed" data-radio="iradio_square-blue">
                                            <label for="speed-1">Up to 10mbps</label><br>
                                            <input type="radio" <?= $acc['speed']=='15mbps' && $acc['subs_option']=='2' ? 'checked' : null ?> required class="check" value="15mbps" id="speed-2" name="speed" data-radio="iradio_square-blue">
                                            <label for="speed-2">15mbps</label><br>
                                            <input type="radio" <?= $acc['speed']=='20mbps' && $acc['subs_option']=='2' ? 'checked' : null ?> required class="check" value="20mbps" id="speed-3" name="speed" data-radio="iradio_square-blue">
                                            <label for="speed-3">20mbps</label><br>
                                            <input type="radio" <?= $acc['speed']=='30mbps' && $acc['subs_option']=='2' ? 'checked' : null ?> required class="check" value="30mbps" id="speed-4" name="speed" data-radio="iradio_square-blue">
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
                                            <input type="radio" <?= $acc['subs_option']=='3' ? 'checked' : null ?> class="check" id="option-3" value="3" name="options" data-radio="iradio_square-blue">
                                            <label for="option-3" class="option-desc">Option 3: WIFI Hotspot Business affiliates with cashout worth <br> 5000, covers antenna, router, 20m UTP, 1 length G.I. <br> Pipe and labor expenses/charges.</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label>Monthly Subscription</label>
                                        <div class="form-group">
                                            <input type="radio" <?= $acc['monthly']=='300' && $acc['subs_option']=='3' ? 'checked' : null ?> required value="300" id="ml-1" name="monthly">
                                            <label for="ml-1">300</label><br>

                                            <?php if($acc['monthly']!='300' && $acc['subs_option']=='3'): ?>
                                                <input type="radio" required value="other2" checked id="ml-5" name="monthly">
                                                <label for="ml-5">Other</label><br>
                                                <input type="text" class="form-control" id="custom_m2" name="custom2" placeholder="Enter Monthly" value="<?= $acc['monthly'] ?>" />
                                            <?php else: ?>
                                                <input type="radio" required value="other2" id="ml-5" name="monthly">
                                                <label for="ml-5">Other</label><br>
                                                <input type="text" class="form-control" id="custom_m2" name="custom2" placeholder="Enter Monthly" style="display:none" />
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label>Device User</label>
                                        <div class="form-group">
                                            <input type="radio" <?= $acc['device_user']=='per device' && $acc['subs_option']=='3' ? 'checked' : null ?> required class="check" value="per device" id="device" name="device_user" data-radio="iradio_square-blue">
                                            <label for="device">per device</label><br>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label>Business Affiliates</label>
                                        <div class="form-group">
                                            <input type="radio" <?= $acc['b_affiliates']=='yes' && $acc['subs_option']=='3' ? 'checked' : null ?> required class="check" value="yes" id="yes" name="business_aff" data-radio="iradio_square-blue">
                                            <label for="yes">Yes</label><br>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-6">
                                        <label>DL & UL Speed</label>
                                        <div class="form-group">
                                            <input type="radio"  <?= $acc['speed']=='3mbps' && $acc['subs_option']=='3' ? 'checked' : null ?> required class="check" value="3mbps" id="speed-1" name="speed" data-radio="iradio_square-blue">
                                            <label for="speed-1">Up to 3mbps</label><br>
                                        </div>
                                    </div>
                                </div>
                            </div> <hr>
                            <div class="form-actions m-t-30">
                                <input type="hidden" value="<?= $acc['id'] ?>" name="id">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save Changes</button>
                                <a type="button" href="<?= site_url('admin/accounts') ?>" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>