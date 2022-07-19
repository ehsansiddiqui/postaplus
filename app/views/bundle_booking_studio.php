<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12"> 
            <!-- START DATATABLE EXPORT -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">BUNDLE BOOKING STUDIO</h3>&nbsp;

<!--     <a href="<?= site_url('/add') ?>"><i class="fa fa-plus icon-bk"></i></a>-->

                    <div class="btn-group pull-right">
                        <button class="btn btn-primary dropdown-toggle bk" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                        <ul class="dropdown-menu">
                            <li><a href="#" onClick ="$('#customers2').tableExport({type: 'json', escape: 'false'});"><img src='<?= base_url() ?>assets/img/icons/json.png' width="24"/> JSON</a></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type: 'json', escape: 'false', ignoreColumn: '[2,3]'});"><img src='<?= base_url() ?>assets/img/icons/json.png' width="24"/> JSON (ignoreColumn)</a></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type: 'json', escape: 'true'});"><img src='<?= base_url() ?>assets/img/icons/json.png' width="24"/> JSON (with Escape)</a></li>
                            <li class="divider"></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type: 'xml', escape: 'false'});"><img src='<?= base_url() ?>assets/img/icons/xml.png' width="24"/> XML</a></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type: 'sql'});"><img src='<?= base_url() ?>assets/img/icons/sql.png' width="24"/> SQL</a></li>
                            <li class="divider"></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type: 'csv', escape: 'false'});"><img src='<?= base_url() ?>assets/img/icons/csv.png' width="24"/> CSV</a></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type: 'txt', escape: 'false'});"><img src='<?= base_url() ?>assets/img/icons/txt.png' width="24"/> TXT</a></li>
                            <li class="divider"></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type: 'excel', escape: 'false'});"><img src='<?= base_url() ?>assets/img/icons/xls.png' width="24"/> XLS</a></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type: 'doc', escape: 'false'});"><img src='<?= base_url() ?>assets/img/icons/word.png' width="24"/> Word</a></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type: 'powerpoint', escape: 'false'});"><img src='<?= base_url() ?>assets/img/icons/ppt.png' width="24"/> PowerPoint</a></li>
                            <li class="divider"></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type: 'png', escape: 'false'});"><img src='<?= base_url() ?>assets/img/icons/png.png' width="24"/> PNG</a></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type: 'pdf', escape: 'false'});"><img src='<?= base_url() ?>assets/img/icons/pdf.png' width="24"/> PDF</a></li>
                        </ul>
                    </div>                                    

                </div>
                <div class="panel-body">
                    <table id="customers2" class="table datatable">
                        <thead>
                            <tr>
                                <th>SINO</th>
                                <th>User</th>
                                <th>Email ID</th>
                                <th>Contact Number</th>
                                <th>Emergency Number</th>
                                <th>User Image</th>


<!--                                <th style="    width: 10%;"></th>-->

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


                                        <?php if ($row->email_id == NULL) { ?>
                                            <td><?= $row->fb_email; ?></td>
                                        <?php } else { ?>
                                            <td><?= $row->email_id; ?></td>
                                        <?php } ?> 

                                        <?php if ($row->phone_number == NULL) { ?>
                                            <td style="color:red">Not Available</td>
                                        <?php } else { ?>
                                            <td><?= $row->phone_number; ?></td>
                                        <?php } ?>
                                        <?php if ($row->contact_number == NULL) { ?>
                                            <td style="color:red">Not Available</td>
                                        <?php } else { ?>
                                            <td><?= $row->contact_number; ?></td>
                                        <?php } ?>




                                        <?php if ($row->user_image == NULL) { ?>


                                            <td><img src=" <?= base_url() ?>assets/assets/images/users/default.jpg" width="75" height="75" /></td>
                                        <?php } else { ?>


                                            <td><img src="<?= $row->user_image; ?>" width="75" height="75" /></td>


                                        <?php } ?> 

        <!--                                        <td>
                              <div class="infont col-md-2"><a href="<?php echo site_url('booking/view_bundle_studio/' . $row->bundle_booking_id) ?>" title="Details"><button type="button" class="btn btn-info btn-sm">View Details</button> </a></div>
                              <div class="infont col-md-2"><a href="" title="delete" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-close"></i> </a></div>


                          </td>-->


                        <!--                                            <td>
                        <a href="<?php echo site_url('studio/edit/' . $row->studio_id) ?>"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo site_url('studio/delete/' . $row->studio_id) ?>" onclick="return confirm('Are  you sure you want to delete this ')"><i class="fa fa-trash-o"></i></a> 
                        </td>-->

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

