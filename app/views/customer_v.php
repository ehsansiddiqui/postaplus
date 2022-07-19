              <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12"> 
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">CUSTOMER MANAGEMENT</h3>&nbsp;
                                    
     <!--<a href="<?=site_url('customer/add')?>"><i class="fa fa-plus icon-bk"></i></a>-->
                                    
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
                                                <th>Type</th>
                                                <th>Phone Number</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php if ($result) { $i = 1; foreach ($result as $row): ?>   
                                            <tr>
                                                <td><?=$i?></td>
                                                <?php if($row->type == 1){  ?>
                                                <td><?php echo 'Registered'; ?></td>
                                                <?php }else{ ?>
                                                <td><?php echo 'Guest'; ?></td>
                                                <?php } ?>
                                                <td><?=$row->phone_number;?></td>
                                                <td><?=$row->full_name?></td>
                                                <td><?=$row->email_id;?></td>              
     <td>  
         
         <?php if(!empty($row->image)){ ?>
         <img src="<?=base_url().'user/'.$row->image?>"  width="50" height="50"/>
         <?php }else{ ?>
         <img src="<?=base_url().'assets/images/noimage.png'?>"  width="50" height="50"/>
         <?php } ?>
<!--     <a href="#" title="view more"><i class="fa fa-info-circle"></i></a>-->
<!--     <a href="#" title="block"><i class="fa fa-ban"></i></a>-->
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
           
