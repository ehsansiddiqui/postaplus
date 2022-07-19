              <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12"> 
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">PRODUCT PRICE MANAGEMENT</h3>&nbsp;
                                    
     <a href="<?=site_url('price/add')?>"><i class="fa fa-plus icon-bk"></i></a>
                                    
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-primary dropdown-toggle bk" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">

                <li><a href="#" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src='<?=base_url()?>assets/img/icons/xls.png' width="24"/> XLS</a></li>
                
                                        </ul>
                                    </div>                                    
                                    
                                </div>
                                
                        <div class="panel-body">
                                   
                  
                        <form method="post" action="<?=site_url('price/search')?>">
                            
                           <div class="col-md-3"> 
                           <label>Category :</label>
                            <select class="form-control select" name="types_id" data-live-search="true">
                                <option value="">---select---</option>
                                <?php foreach ($category as $row): ?>  
                    <option value="<?=$row->types_id?>"<?php if($row->types_id == @$types_id){ echo 'selected';}?> ><?=$row->types_name?></option>
                                 <?php endforeach; ?>
                            </select>
                            </div>
                        
                            <div class="col-md-3"> 
                           <label>Price package :</label>
                            <select class="form-control select" name="price_package_id" data-live-search="true">
                                <option value="">---select---</option>
                                <?php foreach ($price_package as $row): ?>
                    <option value="<?=$row->price_package_id?>"<?php if($row->price_package_id == @$price_package_id){ echo 'selected';}?> ><?=$row->price_package_name?></option>
                                 <?php endforeach; ?>
                            </select>
                             </div>
                            
                            
                            <div class="col-md-2"> 
                           <label>Type :</label>
                            <select class="form-control select" name="gender_id" data-live-search="true">
                                <option value="">---select---</option>
                                <?php foreach ($gender_type as $row): ?>
            <option value="<?=$row->gender_id?>"<?php if($row->gender_id == @$gender_id){ echo 'selected';}?> ><?=$row->gender?></option>
                                 <?php endforeach; ?>
                            </select>
                            </div>
                            
                            
                            <div class="col-md-2"> 
                           <label>Product Name :</label>
                            <select class="form-control select" name="product_id" data-live-search="true">
                                <option value="">---select---</option>
                                <?php foreach ($product as $row): ?>
            <option value="<?=$row->product_id?>"<?php if($row->product_id == @$product_id){ echo 'selected';}?> ><?=$row->product_name?></option>
                                 <?php endforeach; ?>
                            </select>
                            </div>
                            
                            
                            <div class="col-md-2"> 
        <input type="submit"  name="submit" class="btn btn-primary" value="Search" style="margin-top: 20px;">
                            </div>
                           
                        </form>
                                    
                        </div>
                                
                         
                            
                                       
                                    

                                
                                
                                <div class="panel-body">
                                    
                                    
                                    
                                    <table id="customers2" class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>SINO</th>
                                                <th>Category Name</th>
                                                <th>Price Package</th>
                                                <th>Type</th>
                                                <th>Product Name</th>
                                                <th>Product Price</th>
                                                <th>ACTION</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php if ($result) { $i = 1; foreach ($result as $row): ?>   
                                            <tr>
                                                <td><?=$i?></td>
                                                <td><?=$row->types_name;?></td>
                                                <td><?=$row->price_package_name;?></td>
                                                <td><?=$row->gender;?></td>
                                                <td><?=$row->product_name;?></td>
                                                <td><?=$row->product_price;?></td>
     <td><a href="<?php echo site_url('price/edit/' . $row->product_type_id) ?>" title="edit"><i class="fa fa-edit"></i></a>
                      <a href="<?php echo site_url('price/delete/' . $row->product_type_id) ?>" onclick="return confirm('Are  you sure you want to delete this ')" title="delete"><i class="fa fa-trash-o"></i></a></td>
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