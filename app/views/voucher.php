              <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12"> 
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">VOUCHER</h3>&nbsp;
                                    
     <a href="<?=site_url('voucher/add')?>"><i class="fa fa-plus icon-bk"></i></a>
                                    
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
                                                <th>SiNO</th>
                                           
                                                <th>Voucher Code</th>
                                                 <th>Voucher Type</th>
                                                 <th>Voucher Reduction</th>
                                                
                                                 <th>Voucher Description</th>
                                                 <th>Voucher Created Date</th>
                                                 <th>Voucher Expiry Date</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php if ($result) { $i = 1; foreach ($result as $row): ?>   
                                            <tr>
                                                <td><?=$i?></td>
                                                <td><?=$row->voucher_code;?></td>
                                                
                                                <td>
                                                 <?php if ($row->voucher_type == 1) { ?>
                                                    Price
                                                     <?php } elseif ($row->voucher_type == 2) { ?>
                                                    Percentage
                                                     <?php } ?>
                                                
                                                </td>
                                                <td><?=$row->voucher_reduction;?><?php if ($row->voucher_type == 1) { ?>
                                                    $
                                                     <?php } elseif ($row->voucher_type == 2) { ?>
                                                    %
                                                     <?php } ?></td>
                                                <td><?=$row->voucher_desc;?></td>
                                                 <td><?=$row->created_date;?></td>
                                                <td><?=$row->expiry_date;?></td>
                                                <td><a href="<?php echo site_url('voucher/edit/' . $row->voucher_id) ?>" title="edit"><i class="fa fa-edit"></i></a>
                      <a href="<?php echo site_url('voucher/delete/' . $row->voucher_id) ?>" onclick="return confirm('Are  you sure you want to delete this ')" title="delete"><i class="fa fa-trash-o"></i></a> </td>
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
           
