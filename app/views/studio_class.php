<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12"> 
            <!-- START DATATABLE EXPORT -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">CLASSES</h3>&nbsp;

                    <a href="<?=site_url('studio_classes/add_class')?>"><i class="fa fa-plus icon-bk"></i></a>

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
                                <th>Activity Type</th>
                                <th>Class Name</th>
                                <th>Date</th>
                                <th>Start Time </th>
                                <th>End Time</th>
                                <th>Instructor</th>
                                <th>Today Cancellation</th>
                                <th>Status</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result) {
                                $i = 1;
                                foreach ($result as $row){
                                    ?>   
                                    <tr>

                                        <td><?= $i ?></td>
                                        <td><?= $row->activity_name; ?></td>
                                        <td><?= $row->studio_classes_name; ?></td>
                                        <td><?= date('Y-M-d', strtotime($row->date));?></td>
                                        <td><?= $row->start_time; ?></td>
                                        <td><?= $row->end_time; ?></td>
                                        <td><?= $row->instructor_name;?></td>
                                        
                                        <?php 
                                        
                                        $date = date('Y-m-d');
                                        $mdate = date('Y-m-d',strtotime($row->modified_date));
                                        
                                        
                                        if($row->stat == 0 && $mdate == $date){ ?>
                                        <td style="color:red"> YES </td>      
                                        <?php }elseif($row->stat == 0){ ?>
                                        <td style="">NO</td>         
                                        <?php  }else{ ?>
                                        <td style="color:green">NO</td>
                                        <?php }?>
                                        <?php if($row->stat == 0){ ?>
                                        <td style="color:red"> Cancelled </td>      
                                        <?php }if($row->stat == 1){ ?>
                                        <td style="color:green"> Active </td>         
                                        <?php  } ?>

                                        <td>
                                            <a href="<?php echo site_url('studio_classes/edit_class/' . $row->studio_classes_class_id) ?> " title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo site_url('studio_classes/delete_class/' . $row->studio_classes_class_id) ?>" title="Delete" onclick="return confirm('Are  you sure you want to delete this ')"><i class="fa fa-trash-o"></i></a> 
                                            <a href="<?php echo site_url('studio_classes/canceled/' . $row->studio_classes_class_id) ?> " title="Cancell" ><i class="fa fa-ban"></i></a>
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

