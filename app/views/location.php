<div class="page-content-wrap">
    <a href="studio_class_location.php"></a>
    <div class="row">
        <div class="col-md-12"> 
            <!-- START DATATABLE EXPORT -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">LOCATION</h3>&nbsp;

                    <a href="<?= site_url('studio_location/edit_location') ?> "><i class="fa fa-plus icon-bk"></i></a>

                    <div class="btn-group pull-right">
                        <button class="btn btn-primary dropdown-toggle bk" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                        <ul class="dropdown-menu">
<!--                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'json',escape:'false'});"><img src='<?= base_url() ?>assets/img/icons/json.png' width="24"/> JSON</a></li>
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
<!--                                               <th>Class Name</th>-->
                                
                                <th>Location Name</th>
                               
                                

<!--                                <th>Available Slots</th>
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
                                        <td><?= $row->location_name; ?></td>
                                        
                                     
                                      <td>
                                          <a href="<?php echo site_url('studio_location/location_info/' . $row->location_id) ?>" style="margin-right: 3%;"><i class="fa fa-info " title="Details"></i></a>
                                          
                                    <a href="<?php echo site_url('studio_location/edit_location/' . $row->location_id) ?>" style="margin-right: 3%;"><i class="fa fa-edit" title="Edit"></i></a>
                                    <a href="<?php echo site_url('studio_location/delete/' . $row->location_id) ?>" onclick="return confirm('Are  you sure you want to delete this ')" title="Delete"><i class="fa fa-trash-o"></i></a> 
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
