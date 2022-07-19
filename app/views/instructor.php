<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12"> 
            <!-- START DATATABLE EXPORT -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">INSTRUCTORS</h3>&nbsp;

                    <a href="<?= site_url('instructor/insert_instructor') ?> "><i class="fa fa-plus icon-bk"></i></a>

                    <div class="btn-group pull-right">
                        <button class="btn btn-primary dropdown-toggle bk" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                        <ul class="dropdown-menu">
<!--                        <li><a href="#" onClick ="$('#customers2').tableExport({type:'json',escape:'false'});"><img src='<?= base_url() ?>assets/img/icons/json.png' width="24"/> JSON</a></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"><img src='<?= base_url() ?>assets/img/icons/json.png' width="24"/> JSON (ignoreColumn)</a></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'json',escape:'true'});"><img src='<?= base_url() ?>assets/img/icons/json.png' width="24"/> JSON (with Escape)</a></li>
                            <li class="divider"></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'xml',escape:'false'});"><img src='<?= base_url() ?>assets/img/icons/xml.png' width="24"/> XML</a></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'sql'});"><img src='<?= base_url() ?>assets/img/icons/sql.png' width="24"/> SQL</a></li>
                            <li class="divider"></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'csv',escape:'false'});"><img src='<?= base_url() ?>assets/img/icons/csv.png' width="24"/> CSV</a></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'txt',escape:'false'});"><img src='<?= base_url() ?>assets/img/icons/txt.png' width="24"/> TXT</a></li>
                            <li class="divider"></li>-->
                            <li><a href="#" onClick ="$('#customers2').tableExport({type: 'excel', escape: 'false'});"><img src='<?= base_url() ?>assets/img/icons/xls.png' width="24"/> XLS</a></li>
<!--                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'doc',escape:'false'});"><img src='<?= base_url() ?>assets/img/icons/word.png' width="24"/> Word</a></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'powerpoint',escape:'false'});"><img src='<?= base_url() ?>assets/img/icons/ppt.png' width="24"/> PowerPoint</a></li>
                            <li class="divider"></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'png',escape:'false'});"><img src='<?= base_url() ?>assets/img/icons/png.png' width="24"/> PNG</a></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'pdf',escape:'false'});"><img src='<?= base_url() ?>assets/img/icons/pdf.png' width="24"/> PDF</a></li>-->
                        </ul>
                    </div>                                    

                </div>
                <div class="panel-body">
                    <table id="customers2" class="table datatable">
                        <thead>
                            <tr>
                                 <th>SINO</th>
<!--                             <th>Class Name</th>-->
                                 <th>Instructor Name</th>
                                 <th>Email</th>
                                 <th>Contact Number</th>
                                 <th>Instructor Image</th>
                                 <th> Experience</th>
<!--                                <th>Instructor Description </th>-->
<!--                                <th>Slots Available </th>-->
                                <th>Price </th>
<!--                             <th>Available Slots</th>
                                <th>Balance Slot</th>-->
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result) {
                                $i = 1;
                                foreach ($result as $row) {
                                    ?>   
                                    <tr>

                                        <td><?= $i ?></td>
                                        <td><?= $row->instructor_name; ?></td>
                                        <td><?= $row->instructor_email; ?></td>
                                        <td><?= $row->instructor_phone; ?></td>

                                         <?php if ($row->instructor_image==NULL) { ?>
                                       
                                
                                <td><img src=" <?= base_url() ?>assets/assets/images/users/default.jpg" width="100" height="50" /></td>
                            <?php } else { ?>
                            
                                        
                                        <td><img src=" <?=base_url().'instructor/'?><?= $row->instructor_image;?>" width="100" height="50" /></td>
                                        
                                        
                                         <?php } ?>  
                                        <td><?= $row->instructor_experinece; ?></td>
<!--                                        <td><?= $row->instructor_description; ?></td>-->
<!--                                        <td><?= $row->instructor_slot_available; ?></td>-->
                                        <td><?= $row->instructor_price_per_hour; ?></td>
                                        <td>
                                    <a href="<?php echo site_url('instructor/edit_instructor/'.$row->instructor_id) ?>"><i class="fa fa-edit"></i></a>
                                    <a href="<?php echo site_url('instructor/delete_instructor/'.$row->instructor_id) ?>" onclick="return confirm('Are  you sure you want to delete this ')"><i class="fa fa-trash-o"></i></a> 
                                          </td>

                            </tr>
                                        <?php
                                        $i++;
                                }
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

