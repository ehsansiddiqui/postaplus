              <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12"> 
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">BANNER MANAGEMENT</h3>&nbsp;
                                    
     <a href="<?=site_url('banner/add')?>"><i class="fa fa-plus icon-bk"></i></a>
                                    
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
<!--                                                <th>Shop Name</th>-->
                                                <th>Banner Name</th>
                                                <th>Banner Image</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php if ($result) { $i = 1; foreach ($result as $row): ?>   
                                            <tr>
                                                <td><?=$i?></td>
<!--                                                <td><?=$row->shop_name;?></td>-->
                                                <td><?=$row->shop_banner_name;?></td>
                                                <?php if($row->shop_banner_image){ ?>
                 <td><img src="<?= base_url() ?>banner/<?= $row->shop_banner_image ?>" width="100" height="50" /></td>
                              <?php }else{ ?>                                                   
                 <td><img src="<?= base_url() ?>assets/assets/images/users/no-image.jpg" width="100" height="50" /></td> 
                              <?php } ?>
                                                 
     <td><a href="<?php echo site_url('banner/edit/' . $row->shop_banner_id) ?>" title="edit"><i class="fa fa-edit"></i></a>
                      <a href="<?php echo site_url('banner/delete/' . $row->shop_banner_id) ?>" onclick="return confirm('Are  you sure you want to delete this ')" title="delete"><i class="fa fa-trash-o"></i></a></td>
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
           
