             <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12"> 
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">VARIANT</h3>&nbsp;
                                    
     <a href="<?=site_url('variant/add_variant_vehicle')?>"><i class="fa fa-plus icon-bk"></i></a>
                                    
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
                                                 <th>Brand Name</th>
                                                 <th>Model Name</th>
                                                 <th>Variant Name</th>
                                                 <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php if ($result) { $i = 1; foreach ($result as $row): ?>   
                                            <tr>
                                                <td><?=$i?></td>
                                                <td><?=ucfirst($row->brand_name);?></td>
                                                <td><?=ucfirst($row->short_title);?></td>
                                                <td><?=strtoupper($row->variant_name);?></td>
                                                
                                                
  <td><a href="<?php echo site_url('variant/edit_variant_vehicles/'.$row->vehicle_to_variant_id.'/'.$row->variant_id)?>"><i class="fa fa-edit"></i></a>
 <a href="<?php echo site_url('variant/delete_vehicle_variant/'.$row->vehicle_to_variant_id) ?>" onclick="return confirm('Are  you sure you want to delete this ')"><i class="fa fa-trash-o"></i></a> </td>
                                            </tr>
                                            <?php $i++; endforeach ; } ?>
                                        </tbody>
                                    </table>                                    
                                </div>
                            </div>

                        </div>
                    </div>

                </div>         
           
            
