              <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12"> 
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?=$report?></h3>&nbsp;
                                    
<!--     <a href=""><i class="fa fa-plus icon-bk"></i></a>-->
                                    
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
                                                <th>Store Name</th>
                                                <th>Store Contact Person</th>
                                                <th>Store Phone Number</th>
<!--                                                <th>Email</th>         -->
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                 <?php if ($result) { $i = 1;$sum=0; foreach ($result as $row): $sum+= $row->total_amount;  ?>   
                                            <tr>
                                                <td><?=$i?></td>
                                                <td><?=$row->store_name;?></td>       
                                                <td><?=$row->store_contact_person;?></td>
                                                <td><?=$row->store_phone_number;?></td>
<!--                                                <td><?=$row->email_id;?></td>-->
                                                <td><?=$row->total_amount;?></td>
                                            </tr>
                                            <?php $i++; endforeach ; } ?>
                                        </tbody>
                                        
                                        
    <tfoot>
      <th></th>
      <th></th>
      <th></th>   
     <th style="text-align:right">Total:</th>
     <th>
         <span><?=number_format((float)$sum, 2, '.', '')?></span>
     </th>
    </tfoot>
                                        
                                        
                                    </table>                                    
                                </div>
                            </div>

                        </div>
                    </div>

                </div>         
                <!-- END PAGE CONTENT WRAPPER -->
           
