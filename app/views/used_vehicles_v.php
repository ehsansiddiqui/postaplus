
              <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12"> 
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"> USED VEHICLE </h3>&nbsp;
                                    
<!--     <a href="<?=site_url('used_vehicles/add_used_vehicles')?>"><i class="fa fa-plus icon-bk"></i></a>-->
                                    
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">

                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'pdf',escape:'false'});"><img src='<?=base_url()?>assets/img/icons/pdf.png' width="24"/> PDF</a></li>
                                        </ul>
                                    </div>                                    
                                    
                                </div>
                                <div class="panel-body">
                                    <table id="customers2" class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>SINO</th>
                                                <th>Vehicle Type</th>
                                                <th>Brand Name</th>
                                                <th>Model Name</th>
                                                <th>Seller Name</th>
                                                <th>Email</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                      
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php if ($result) { $i = 1; foreach ($result as $row): ?>   
                                            <tr>
                                                <td><?=$i?></td>
                                                <td><?=$row->category_name;?></td>
                                                <td><?=$row->brand_name;?></td>
                                                 <td><?=$row->short_title;?></td>
                                                 <td><?=$row->fname;?></td>
                                                <td><?=$row->email_id;?></td>
         <td><img src="<?=base_url()?>assets/udayamotors/images/shop/used/<?=$row->img?>" width="100" height="50" /></td>
          
         
         <?php if($row->aproved == 800){ ?>
         
    <td><a href="<?php echo site_url('used_vehicles/status/'.$row->used_vehicle_model_id) ?>">Approved</a></td>
        
         <?php } else{?>
    
    <td>
      <a href="<?php echo site_url('used_vehicles/status/'.$row->used_vehicle_model_id) ?>">Pending</a>
    
    </td>
    
                                            </tr>
         <?php } ?>                                   <?php $i++; endforeach ; } ?>
                                        </tbody>
                                    </table>                                    
                                </div>
                            </div>

                        </div>
                    </div>

                </div>         
<!-- END PAGE CONTENT WRAPPER -->
           
            
