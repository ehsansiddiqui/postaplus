              <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12"> 
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">BUNDLE BOOKING</h3>&nbsp;
                                    
<!--     <a href="<?=site_url('/add')?>"><i class="fa fa-plus icon-bk"></i></a>-->
                                    
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
                                <th>SINO</th>
                                <th>Booking ID<th>
                                <th>User</th>  
                                <th>Studio</th>
                                <th>Email ID</th>
                                <th>Phone Number</th>
                                <th>Number Of Classes Booked</th>
<!--                           <th>Number Of Classes Booked Availed</th>-->
                                <th>Valid Till</th>
<!--                                <th>Total Price</th>
                                <th>Payment Status</th>-->
                               

                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php if ($result) { $i = 1; foreach ($result as $row): ?>   
                                            <tr>
                                                <td><?=$i?></td>
                                                
                                            <td><?= $row->bundle_booking_id; ?></td>
                                            <td><?= $row->first_name; ?></td>
                                            <td><?= $row->studio_name; ?></td>
                                            <td><?= $row->email_id; ?></td>
                                            <td><?= $row->phone_number; ?></td>
                                            <td><?= $row->total_number_class; ?></td>
<!--                                        <td><?= $row->total_class_availed; ?></td>-->
                                            <td><?= $row->valid_till; ?></td>
                                          
                                              
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
           
