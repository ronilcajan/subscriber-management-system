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
                    <table  id="myTable" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Movie Title</th>
                                <th>Rank</th>
                                <th>Year</th>
                                <th>
                                    <abbr >Rating</abbr>
                                </th>
                                <th>Gross</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="title"><a href="javascript:void(0)">Avatar</a></td>
                                <td>1</td>
                                <td>2009</td>
                                <td>83%</td>
                                <td>$2.7B</td>
                            </tr>
                            <tr>
                                <td class="title"><a href="javascript:void(0)">Titanic</a></td>
                                <td>2</td>
                                <td>1997</td>
                                <td>88%</td>
                                <td>$2.1B</td>
                            </tr>
                            <tr>
                                <td class="title"><a href="javascript:void(0)">The Avengers</a></td>
                                <td>3</td>
                                <td>2012</td>
                                <td>92%</td>
                                <td>$1.5B</td>
                            </tr>
                            <tr>
                                <td class="title"><a href="javascript:void(0)">Harry Potter and the Deathly Hallows—Part 2</a></td>
                                <td>4</td>
                                <td>2011</td>
                                <td>96%</td>
                                <td>$1.3B</td>
                            </tr>
                            <tr>
                                <td class="title"><a href="javascript:void(0)">Frozen</a></td>
                                <td>5</td>
                                <td>2013</td>
                                <td>89%</td>
                                <td>$1.2B</td>
                            </tr>
                            <tr>
                                <td class="title"><a href="javascript:void(0)">Iron Man 3</a></td>
                                <td>6</td>
                                <td>2013</td>
                                <td>78%</td>
                                <td>$1.2B</td>
                            </tr>
                            <tr>
                                <td class="title"><a href="javascript:void(0)">Transformers: Dark of the Moon</a></td>
                                <td>7</td>
                                <td>2011</td>
                                <td>36%</td>
                                <td>$1.1B</td>
                            </tr>
                            <tr>
                                <td class="title"><a href="javascript:void(0)">The Lord of the Rings: The Return of the King</a></td>
                                <td>8</td>
                                <td>2003</td>
                                <td>95%</td>
                                <td>$1.1B</td>
                            </tr>
                            <tr>
                                <td class="title"><a href="javascript:void(0)">Skyfall</a></td>
                                <td>9</td>
                                <td>2012</td>
                                <td>92%</td>
                                <td>$1.1B</td>
                            </tr>
                            <tr>
                                <td class="title"><a href="javascript:void(0)">Transformers: Age of Extinction</a></td>
                                <td>10</td>
                                <td>2014</td>
                                <td>18%</td>
                                <td>$1.0B</td>
                            </tr>
                        </tbody>
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