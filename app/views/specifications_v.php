             <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12"> 
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">VEHICLE SPECIFICATIONS</h3>&nbsp;
                                    
     <a href="<?=site_url('specifications/add_specifications')?>"><i class="fa fa-plus icon-bk"></i></a>
                                    
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
                                                <th>Brand</th>
                                                <th>Model Name</th>
                                                <th>Variant Name</th>
                                                <th>Specification Name</th>
                                                <th>Specification Value</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php if ($result) { $i = 1; foreach ($result as $row): ?>   
                                            <tr>
                                                <td><?=$i?></td>
                                                 <td><?=strtoupper($row->category_name);?></td>
                                                 <td><?=strtoupper($row->brand_name);?></td>
                                                 <td><?=$row->short_title;?></td>
                                                 <td><?=$row->variant_name;?></td>
                                             
                                                <td><?=strtoupper($row->specification_name);?></td>
                                                <td><?=ucfirst($row->specification_value);?></td>
                                               
                                                
         <td><a href="<?php echo site_url('specifications/edit_specifications/'.$row->vehicle_specification_id)?>"><i class="fa fa-edit"></i></a>
                              <a href="<?php echo site_url('specifications/delete_specifications/'.$row->vehicle_specification_id) ?>" onclick="return confirm('Are  you sure you want to delete this ')"><i class="fa fa-trash-o"></i></a> </td>
                                            </tr>
                                            <?php $i++; endforeach ; } ?>
                                        </tbody>
                                    </table>                                    
                                </div>
                            </div>

                        </div>
                    </div>

                </div>         
           
            
