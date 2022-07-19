              <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12"> 
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Government Paper</h3>&nbsp;
                                    
     <a href="<?=site_url('driver/add')?>"><i class="fa fa-plus icon-bk"></i></a>
                                    
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-primary dropdown-toggle bk" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">

                <li><a href="#" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src='<?=base_url()?>assets/img/icons/xls.png' width="24"/> XLS</a></li>
                
                                        </ul>
                                    </div>                                    
                                    
                                </div>
                                <div class="panel-body">
                                    <table id="customers2" class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>SiNO</th>
                                                <th>Category</th>
                                                <th>Tittle</th>
                                                <!--<th>Email</th>-->
                                                <!--<th>Phone Number</th>-->
                                                <th>Description</th>
                                                 <th>Price</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php if ($result) { $i = 1; foreach ($result as $row): ?>   
                                            <tr>
                                                <td><?=$i?></td>
                                                <!--<td><?=$row->store_name;?></td>-->
                                                <td><?=$row->first_name;?></td>
                                                <td><?=$row->last_name;?></td>
                                                <!--<td><?=$row->email_id;?></td>-->
                                                <!--<td><?=$row->phone_number;?></td> -->
                                              <?php if($row->driver_image){ ?>
                 <td><img src="<?= base_url() ?>driver/<?= $row->driver_image ?>" width="50" height="50" /></td>
                              <?php }else{ ?>                                                   
                 <td><img src="<?= base_url() ?>assets/assets/images/users/no-image.jpg" width="50" height="50" /></td> 
                              <?php } ?>
                                                
     <td><a href="<?php echo site_url('driver/edit/' . $row->driver_id) ?>" title="edit"><i class="fa fa-edit"></i></a>
                      <a href="<?php echo site_url('driver/delete/' . $row->driver_id) ?>" onclick="return confirm('Are  you sure you want to delete this ')" title="delete"><i class="fa fa-trash-o"></i></a></td>
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
           