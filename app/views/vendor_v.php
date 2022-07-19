              <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12"> 
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Manage Service</h3>&nbsp;
                                    
     <a href="<?=site_url('vendor/add')?>"><i class="fa fa-plus icon-bk"></i></a>
                                    
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
                                                <th>Tittle</th>
<!--                                            <th>Latitude</th>
                                                <th>Longitude</th>-->
                                                <!--<th>Contact Person</th>-->
                                                <!--<th>Phone Number</th>-->
                                                <!--<th>Email</th>         -->
                                                <!--<th>Billing Price</th>-->
                                                <!--<th>Vendor Price</th> -->
                                                <th>Description</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php if ($result) { $i = 1; foreach ($result as $row): ?>   
                                            <tr>
                                                <td><?=$i?></td>
                                                <td><?=$row->vendor_name;?></td>
<!--                                            <td><?=$row->vendor_latitude;?></td>
                                                <td><?=$row->vendor_longitude;?></td>-->       
                                                <!--<td><?=$row->vendor_contact_person;?></td>-->
                                                <!--<td><?=$row->vendor_phone_number;?></td>-->
                                                <!--<td><?=$row->vendor_email;?></td>-->
                                                <!--<td><?=$row->vendor_billing_price;?></td>-->
                                                <!--<td><?=$row->vendor_price;?></td>                          -->
                                                <td><?=$row->vendor_address;?></td>
                                                
     <td><a href="<?php echo site_url('vendor/edit/' . $row->vendor_id) ?>" title="edit"><i class="fa fa-edit"></i></a>
                      <a href="<?php echo site_url('vendor/delete/' . $row->vendor_id) ?>" onclick="return confirm('Are  you sure you want to delete this ')" title="delete"><i class="fa fa-trash-o"></i></a></td>
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
           
