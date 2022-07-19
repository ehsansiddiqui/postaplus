<style>.form-horizontal .form-group {
        margin-right: 25%;
        margin-left: -8%;
    }</style>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12"> 
            <!-- START DATATABLE EXPORT -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">CLASS BOOKING</h3>&nbsp;


<!--     <a href="<?= site_url('/add') ?>"><i class="fa fa-plus icon-bk"></i></a>-->

                    <div class="btn-group pull-right">
                        <button class="btn btn-primary dropdown-toggle bk" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                        <ul class="dropdown-menu">


                            <li><a href="#" onClick ="$('#customers2').tableExport({type: 'csv', escape: 'false'});"><img src='<?= base_url() ?>assets/img/icons/csv.png' width="24"/> CSV</a></li>

                        </ul>
                    </div>    



                </div>
                <div class="panel-body">
                    <div class="block">



                        <div class="panel-body">

                            <form id="form" role="form" class="form-horizontal" action="<?= site_url('booking/sort_by_date') ?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Start Date:</label>  
                                    <div class="col-md-2">
                                        <?php if (@$start_date != NULL) { ?>
    <!--            <input type='text' name="date" class='form-control datepicker-here' data-language='en'  required=""/> -->
                                            <input type="text" name="start_date"   data-language="en" class="form-control datepicker-here" id="minMaxExample" value="<?= date('m/d/Y', strtotime(@$start_date)) ?>" required="">
                                        <?php } else { ?>
                                            <input type="text" name="start_date"   data-language="en" class="form-control datepicker-here" id="minMaxExample"  required="">
                                        <?php } ?>   

                                        <span class="help-block"></span>
                                    </div>


                                    <label class="col-md-2 control-label" style="margin-left: -7%;">End Date:</label>  
                                    <div class="col-md-2">
                                        <?php if (@$end_date != NULL) { ?>
    <!--            <input type='text' name="date" class='form-control datepicker-here' data-language='en'  required=""/> -->
                                            <input type="text" name="end_date"  data-language="en" class="form-control datepicker-here" id="minMaxExample" value="<?= date('m/d/Y', strtotime(@$end_date)) ?>" required="">
                                        <?php } else { ?>
                                            <input type="text" name="end_date"   data-language="en" class="form-control datepicker-here" id="minMaxExample"  required="">
                                        <?php } ?>   

                                        <span class="help-block"></span>
                                    </div>

                                    <div class="col-md-2 btn-group">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Sort By Date">
                                    </div> 
                                    <div class="col-md-2 btn-group" style="margin-left: -2%;">
                                        <a href="<?= site_url('booking/class_booking_per_studio') ?>"><button type="button" class="btn btn-primary">Reset</button> </a>

                                    </div> </div>


                            </form>

                        </div> 
                        <table id="customers2" class="table datatable">
                            <thead>
                                <tr>
                                    <th>SINO</th>
                                    <th>User</th>
    <!--                                                <th> Class Description</th>-->
                                    <th> Type</th>
                                    <th>Instructor</th>
                                    <th>Level</th>
                                    <th>Booked Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result) {
                                    $i = 1;
                                    foreach ($result as $row):
                                        ?>   
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $row->first_name; ?></td>
            <!--                                                <td><?= $row->description; ?></td>-->
                                            <td><?= $row->activity_name; ?></td>
                                            <td><?= $row->instructor_name; ?></td>
                                            <td><?= $row->level_name; ?></td>
                                            <td><?= $row->date; ?></td>



                                            <?php if ($row->class_status == 'Y') { ?>
                                                <td>                      
                                                    Booked                   
                                                </td>


                                            <?php }if ($row->class_status == 'N') { ?>
                                                <td>
                                                    Cancelled                        
                                                <?php } ?>



                                        </tr>
                                        <?php
                                        $i++;
                                    endforeach;
                                }
                                ?>
                            </tbody>
                        </table>                                    
                    </div>
                </div>

            </div>
        </div>

    </div>         
    <!-- END PAGE CONTENT WRAPPER -->

