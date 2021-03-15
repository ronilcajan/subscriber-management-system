<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row colorbox-group-widget">
        <div class="col-md-3 col-sm-6 info-color-box">
            <div class="white-box">
                <div class="media bg-primary">
                    <div class="media-body">
                        <h3 class="info-count">154 <span class="pull-right"><i class="mdi mdi-checkbox-marked-circle-outline"></i></span></h3>
                        <p class="info-text font-12">Bookings</p>
                        <p class="info-ot font-15">Target<span class="label label-rounded">198</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 info-color-box">
            <div class="white-box">
                <div class="media bg-success">
                    <div class="media-body">
                        <h3 class="info-count">68 <span class="pull-right"><i class="mdi mdi-comment-text-outline"></i></span></h3>
                        <p class="info-text font-12">Complaints</p>
                        <p class="info-ot font-15">Total Pending<span class="label label-rounded">154</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 info-color-box">
            <div class="white-box">
                <div class="media bg-danger">
                    <div class="media-body">
                        <h3 class="info-count">&#36;9475 <span class="pull-right"><i class="mdi mdi-coin"></i></span></h3>
                        <p class="info-text font-12">Profit</p>
                        <p class="info-ot font-15">Pending<span class="label label-rounded">236</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 info-color-box">
            <div class="white-box">
                <div class="media bg-warning">
                    <div class="media-body">
                        <h3 class="info-count">&#36;124,356 <span class="pull-right"><i class="mdi mdi-coin"></i></span></h3>
                        <p class="info-text font-12">Total Profit</p>
                        <p class="info-ot font-15">Pending<span class="label label-rounded">782</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9 col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Payments</h3>
                <p class="text-muted m-b-20">Swipe Mode, ModeSwitch, Minimap, Sortable, SortableSwitch</p>
                <div class="table-responsive">
                    <table  id="accountTable" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Account</th>
                                <th>Area of Coverage</th>
                                <th>Subscribers</th>
                                <th>Monthly</th>
                                <th>Schedule</th>
                                <th>Due Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($subs as $row): ?>
                                <?php 
                                    $now = strtotime(date('Y-m-d'));
                                    $due_date = strtotime($row['due_date']);
                                
                                    if ($now > $due_date):?>
                                
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><a href="<?= site_url('admin/account_info/').$row['acc_id'] ?>"><?= $row['account_name'] ?></a></td>
                                    <td><?= ucwords($row['area_coverage']) ?></td>
                                    <td><a href="<?= site_url('admin/subscriber_info/').$row['subscriber_id'] ?>"><?= $row['name'] ?></a></td>
                                    <td>P <?= number_format($row['monthly'],2) ?></td>
                                    <td><?= $row['schedule'] ?>th day</td>
                                    <td><?= date('M. d, Y', strtotime($row['due_date'])) ?></td>
                                    <td>
                                        <span class="tooltip-danger" data-toggle="tooltip" title="Pay Now">
                                            <a class="text-danger waves-effect waves-light m-l-5 m-t-5" href="#payModal" data-toggle="modal" >
                                                <i class="fa fa-product-hunt"></i>
                                            </a>
                                        </span>
                                        <a class="text-success waves-effect waves-light m-l-5 m-t-5 tooltip-success" href="<?= site_url('admin/update_account/').$row['acc_id']; ?>" data-toggle="tooltip" title="Send Email Notification">
                                            <i class="fa fa-envelope-o"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endif ?>
                            <?php $no++; endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Account</th>
                                <th>Area of Coverage</th>
                                <th>Subscribers</th>
                                <th>Monthly</th>
                                <th>Schedule</th>
                                <th>Due Date</th>
                                <th>Action</th>
                            </tr> 
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Activity</h3>
                <p class="text-muted m-b-20">Swipe Mode, ModeSwitch.</p>
                <ul class="custom-timeline">
                    <li>
                        <a target="_blank" href="https://www.totoprayogo.com/#">New Web Design</a>
                        <a href="#" class="float-right">21 March, 2014</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....</p>
                    </li>
                    <li>
                        <a href="#">21 000 Job Seekers</a>
                        <a href="#" class="float-right">4 March, 2014</a>
                        <p>Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
                    </li>
                    <li>
                        <a href="#">Awesome Employers</a>
                        <a href="#" class="float-right">1 April, 2014</a>
                        <p>Fusce ullamcorper ligula sit amet quam accumsan aliquet. Sed nulla odio, tincidunt vitae nunc vitae, mollis pharetra velit. Sed nec tempor nibh...</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>