                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12"> 
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">CLASS </h3>&nbsp;
                                    
     <a href="<?=site_url('classs/add')?>"><i class="fa fa-plus icon-bk"></i></a>
                                    
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src='<?=base_url()?>assets/img/icons/xls.png' width="24"/> XLS</a></li>

                                        </ul>
                                    </div>                                    
                                    
                                </div>
                                <div class="panel-body">
                                    <table id="customers2" class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>SINO</th>
                                                <th>Class Name</th>
                                                <th>Arabic Name</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if ($result) { $i = 1; foreach ($result as $row): ?>   
                                            <tr>
                                                <td><?=$i?></td>
                                                <td><?=$row->class_name;?></td>
                                                <td><?=$row->ar_class_name;?></td>
          <td>
              <a href="<?php echo site_url('classs/edit/'.$row->class_id) ?>"><i class="fa fa-edit"></i></a>
              <a href="<?php echo site_url('classs/delete/'.$row->class_id) ?>" onclick="return confirm('Are  you sure you want to delete this ')"><i class="fa fa-trash-o"></i></a> 
          </td>
                                            </tr>
                                        <?php $i++; endforeach ; } ?>
                                        </tbody>
                                    </table>                                    
                                </div>
                            </div>

                        </div>
                    </div>

                </div>         
                <!-- END PAGE CONTENT WRAPPER -->