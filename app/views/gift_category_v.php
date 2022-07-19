              <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12"> 
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Manage Gift Category</h3>&nbsp;
                                    
     <a href="<?=site_url('gift/add_gift_category')?>"><i class="fa fa-plus icon-bk"></i></a>
                                    
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
                                                <th>Gift Category </th>
                                                <th>Gift Category  Arabic</th>
                                                <th>Image</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php if ($result) { $i = 1; foreach ($result as $row): ?>   
                                            <tr>
                                                <td><?=$i?></td>
                                                <td><?=$row->gift_cate_name;?></td>
                                                <td><?=$row->ar_gift_cate_name;?></td> 
                                                <td>     
                                                  <?php if(!empty($row->gift_cate_image)){ ?>
         <img src="<?=base_url().'gift/'.$row->gift_cate_image?>"  width="100" height="50"/>
         <?php }else{ ?>
         <img src="<?=base_url().'assets/images/noimage.png'?>"  width="50" height="50"/>
         <?php } ?></td>
     <td>
    <a href="<?php echo site_url('gift/edit_gift_category/'.$row->gift_category_id) ?>" title="edit"><i class="fa fa-edit"></i></a>
     <a href="<?php echo site_url('gift/delete_gift_category/'.$row->gift_category_id)?>" onclick="return confirm('Are  you sure you want to delete this ')" title="delete"><i class="fa fa-trash-o"></i></a>
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
<!--                <script> 
                    
$(document).ready( function() {
  $('#customers2').dataTable( {
    "iDisplayLength": 50
  } );
} );
                </script>-->

<!--            <script> 
                    
$(document).ready(function() {
    $('#customers2').DataTable( {
        "lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]]
    } );
} );       </script>                -->
                
                
                