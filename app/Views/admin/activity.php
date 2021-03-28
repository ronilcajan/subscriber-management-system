<?= $this->extend('templates/layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0"><?= $title ?></h3>
                <p class="text-muted m-b-20">Here you can view system acitivity.</p>
                    <table id="myTable" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Events</th>
                                <th>Activity Type</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; foreach($acti as $row){ ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $row['username'] ?></td>
                                    <td><?= $row['events'] ?></td>
                                    <td><?php
                                        if(strpos($row['activity_type'] , 'New' ) !== False){

                                            echo "<span class='label label-success'>".$row['activity_type']."</span>";

                                        }elseif(strpos($row['activity_type'] ,'Update') !== False){

                                            echo "<span class='label label-info'>".$row['activity_type']."</span>";
                                        
                                        }elseif(strpos($row['activity_type'] ,'Approved') !== False){

                                            echo "<span class='label label-info'>".$row['activity_type']."</span>";

                                        }else{
                                            echo "<span class='label label-danger'>".$row['activity_type']."</span>";
                                        }
                                        ?>
                                    </td>
                                    <td><?= $row['created_at'] ?></td>
                                </tr>
                            <?php $no++; } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Events</th>
                                <th>Activity Type</th>
                                <th>Date</th>
                            </tr>
                        </tfoot>
                    </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>