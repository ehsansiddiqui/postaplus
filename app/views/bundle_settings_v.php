              <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12"> 
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">BUNDLE SETTING</h3>&nbsp;
                                    
     <a href="<?=site_url('bundle_settings/add')?>"><i class="fa fa-plus icon-bk"></i></a>
                                    
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-primary dropdown-toggle bk" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">

                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'csv',escape:'false'});"><img src='<?=base_url()?>assets/img/icons/csv.png' width="24"/> CSV</a></li>
                                        </ul>
                                    </div>                                    
                                    
                                </div>
                                <div class="panel-body">
                                    <table id="customers2" class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>SiNO </th>
                                                <th>Number Of Class </th>
                                                <th>Min Number Of Studio </th>
                                                <th>Number Of Validity </th>
                                                <th>ACTION</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php if ($result) { $i = 1; foreach ($result as $row): ?>   
                                            <tr>
                                                <td><?=$i?></td>
                                                <td><?=$row->number_of_class;?></td>
                                                <td><?=$row->min_number_studio;?></td>
                                                <td><?=$row->number_of_validity.' days'?></td>
                                                <td><a href="<?php echo site_url('bundle_settings/edit/' . $row->bundle_config_id) ?>" title="edit"><i class="fa fa-edit"></i></a>
                      <a href="<?php echo site_url('bundle_settings/delete/' . $row->bundle_config_id) ?>" onclick="return confirm('Are  you sure you want to delete this ')" title="delete"><i class="fa fa-trash-o"></i></a> </td>
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
           
