<div class="page-content-wrap">
   <div class="row">
      <div class="col-md-12">
         <!-- START DATATABLE EXPORT -->                            
         <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">ORDER MANAGEMENT</h3>
               &nbsp;                                         
               <!--<a href="<?=site_url('order/new_order')?>"><i class="fa fa-plus icon-bk"></i></a>-->
               <div class="btn-group pull-right">
                  <button class="btn btn-primary dropdown-toggle bk" data-toggle="dropdown">
                  <i class="fa fa-bars"></i> Export Data
                  </button>                                                                                                                         
                  <ul class="dropdown-menu">
                     <li><a href="#" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src='<?=base_url()?>assets/img/icons/xls.png' width="24"/> XLS</a>
                     </li>
                  </ul>
               </div>
            </div>
            <!--<div class="panel-body">-->
            <!--   <form method="post" action="<?=site_url('order/search')?>">-->
            <!--      <div class="col-md-12">-->
            <!--         <div class="col-md-2">-->
            <!--            <label>Status :</label>                            -->
            <!--            <select class="form-control select" name="order_status_id" data-live-search="true">-->
            <!--               <option value="">---select---</option>-->
            <!--               <?php foreach ($status as $row): ?>-->
            <!--               <option value="<?=$row->order_status_id?>"<?php if($row->order_status_id == @$order_status_id){ echo 'selected';}?> ><?=$row->order_status?></option>-->
            <!--               <?php endforeach; ?>                            -->
            <!--            </select>-->
            <!--         </div>-->
            <!--         <div class="col-md-2">-->
            <!--            <label>Order No :</label>-->
            <!--            <select class="form-control select" name="order_id" data-live-search="true">-->
            <!--               <option value="">---select---</option>-->
            <!--               <?php foreach ($order_number as $row): ?>-->
            <!--               <option value="<?=$row->order_id?>"<?php if($row->order_id == @$order_id){ echo 'selected';}?> ><?=$row->order_no?></option>-->
            <!--               <?php endforeach; ?>                            -->
            <!--            </select>-->
            <!--         </div>-->
            <!--         <div class="col-md-2">-->
            <!--            <label>Customer :</label>-->
            <!--            <select class="form-control select" name="customer_id" data-live-search="true">-->
            <!--               <option value="">---select---</option>-->
            <!--               <?php foreach ($customer as $row): ?>            -->
            <!--               <option value="<?=$row->customer_id?>"<?php if($row->customer_id == @$customer_id){ echo 'selected';}?> ><?=$row->first_name.'('.$row->phone_number.')'?></option>-->
            <!--               <?php endforeach; ?>                            -->
            <!--            </select>-->
            <!--         </div>-->
            <!--         <div class="col-md-2">      -->
            <!--               <label>Store :</label>                            -->
            <!--            <select class="form-control select" name="store_id" data-live-search="true">-->
            <!--               <option value="">---select---</option>-->
            <!--               <?php foreach ($store as $row): ?>  -->
            <!--               <option value="<?=$row->store_id?>"<?php if($row->store_id == @$store_id){ echo 'selected';}?> ><?=$row->store_name?></option>-->
            <!--               <?php endforeach; ?>                            -->
            <!--            </select>-->
                        
                        
            <!--         </div>-->
            <!--      </div>-->
            <!--      <div class="col-md-12">-->
            <!--         <div class="col-md-4"> -->
            <!--            <br>  <br>                              -->
            <!--         </div>-->
            <!--      </div>-->
            <!--      <div class="col-md-12">-->
                    
            <!--         <div class="col-md-2">-->
            <!--         <label>Order From :</label>            -->
            <!--         <input type="text" class="form-control datepicker" name="order_from" autocomplete="off"/>-->
            <!--        </div>  -->
            <!--        <div class="col-md-2">                             -->
            <!--            <label>Order To :</label>            -->
            <!--            <input type="text" class="form-control datepicker" name="order_to" autocomplete="off"/>-->
            <!--        </div>-->
                      
            <!--         <div class="col-md-2">                            -->
            <!--            <label>Pickup Bag No :</label>                       -->
            <!--            <input type="text" class="form-control" name="pickup_bag"   maxlength="50" />-->
            <!--         </div>-->
            <!--         <div class="col-md-2">                            -->
            <!--            <label>Delivery Bag  No :</label>-->
            <!--            <input type="text" class="form-control" name="delivery_bag"   maxlength="50" />                                           -->
            <!--         </div>-->
            <!--         <div class="col-md-2">         -->
            <!--            <input type="submit"  name="submit" class="btn btn-primary" value="Search" style="margin-top: 20px;">                                           -->
            <!--         </div>-->
            <!--      </div>-->
            <!--   </form>-->
            <!--</div>-->
            <div class="panel-body">
               <table id="customers2" class="table datatable">
                  <thead>
                     <tr>
<!--                        <th>SiNO</th>-->
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Type</th>
                        <th>Total</th>
                        <th>Delivery/Pickup</th>
                        <th>Order Date</th>
                        <th>Order Status</th>
                        <th>Payment Status</th>
                        <th>View</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if ($result) { $i = 1; foreach ($result as $row): ?> 
                     <tr>
<!--                        <td><?=$i?></td>-->
                        <td><?=$row->order_id;?></td>
                        <td><?=$row->full_name;?></td>
                        <td><?=ucfirst($row->order_type);?></td>
                        <td><?=$row->total_price;?></td>
                        <td><?php 
                        if(!empty($row->delivery_addr)){
                           echo 'Delivery to'.' '.substr($row->delivery_addr,0,50).'..';     
                        }
                        if(!empty($row->branch_id)){
                           echo 'Pickup from'.' '.substr($row->branch_name,0,50).'..';    
                        }
                        ?>
                        </td>
          <td>
       <?=date('d-M-Y',strtotime($row->order_date));?>
          </td>
        <td><?php if($row->order_status == 'New'){ ?>                                                                               <span class="label label-success"><?=$row->order_status?></span>                                                             <?php }else{ ?>                                                
        <span class="label label-danger"><?=$row->order_status?></span>                                                              <?php } ?>
                 
        <td><?=$row->payment_status;?></td>           
                        <td>
  <a href="<?php echo site_url('order/details/'.$row->order_id) ?>" title="view more"><i class="fa fa-info-circle"></i></a>
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
<script type="text/javascript">
$(document).ready(function() {
    $('#customers2').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );
</script>