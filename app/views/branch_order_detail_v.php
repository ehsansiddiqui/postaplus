<script>
    function print(href,target){
        
    }
</script>    
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12"> 
            <!-- START DATATABLE EXPORT -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">ORDER DETAILS</h3>&nbsp;
                    
                    <div class="btn-group pull-right">
                        
                        <!--<a href="<?php echo site_url('order/edit_order/'.$result->order_id) ?>"><button class="btn btn-primary  bk" ><i class="fa fa-edit"></i>Edit</button></a>-->
                        
                        <!--<a href="<?php echo site_url('order/activity/'.$result->order_id) ?>"><button class="btn btn-primary  bk" ><i class="fa fa-list"></i>Activity</button></a>-->
                        
<!-- <a href="<?php echo site_url('order/invoice/'.$result->order_id) ?>" onclick="window.open(this.href,this.target,'width=auto,height=auto');return false;"><button class="btn btn-primary" ><i class="fa fa-print"></i>Print</button></a>                       -->
                         
                        
<!--                        <ul class="dropdown-menu">
                            <li> </li>
                        </ul>-->
                    </div>                                    
                </div>
                <div class="panel-body">
                    
                    
                    <div class="col-md-6">
                        
                    <table id="customers2" class="table">
                        <thead>
<!--                            <tr>
                                <th></th>
                                <th></th>
                            </tr>-->
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td style="border-top: 0px"><strong>Order NO</strong></td>
                                <td style="border-top: 0px"><?= $result->order_id ?></td>
                            </tr>
                            
                            
                            <tr>
                                <td><strong>Order type</strong></td>
                                <td><?=ucfirst($result->order_type); ?></td>
                            </tr>
                            
                            
                            <tr>
                                <td><strong>Type</strong></td>
                                <td><?=$category;?></td>
                            </tr>

                            <tr>
                                <td><strong>Customer Name</strong></td>
                                <td><?=ucfirst($result->full_name); ?></td>
                            </tr>
                            
                           <tr>
                           <td><strong>Phone number</strong></td>
                           <td><?=$result->phone_number;?></td>
                           </tr>
                           
                           
                            <tr>
                           <td><strong>Email</strong></td>
                           <td><?=$result->email_id;?></td>
                           </tr>

                            <tr>
                                <td><strong>Order Date</strong></td>
    <td><?=date('D', strtotime($result->order_date));?>&nbsp;<?= date('d-M-Y h:i a', strtotime($result->order_date)); ?></td>
                            </tr>

                            
                            
                            <tr>
                                <td><strong>Pick Up Address(Branch)</strong></td>
                                <td><?=ucfirst($result->branch_name); ?></td>
                            </tr>


                            <tr>
                                <td><strong>Delivery Address</strong></td>
                                <td><?=ucfirst($result->delivery_addr); ?></td>
                            </tr>

                
                          



                        </tbody>
                    </table>
                        
                    </div>
                    
                    
                    <div class="col-md-6">
                        
                    <table id="customers2" class="table">
                        <thead>
<!--                            <tr>
                                <th></th>
                                <th></th> 
                            </tr>-->
                        </thead>
                        <tbody> 
                          
                      
                            

                           
                        <tr>
                                <td style="border-top: 0px"><strong>Attributes</strong></td>
                                <td style="border-top: 0px"><?php
                        if(!empty($result->attributes_id)){        
                        $sql = "SELECT atr_name FROM attributes WHERE attributes_id IN ($result->attributes_id)";
                        $query = $this->db->query($sql)->result(); 
                        if(!empty($query)){
                        foreach ($query as $r){
                          $a[] = $r->atr_name;  
                        }
                        echo implode(",",$a);
                        }        
                        }        ?></td>
                        </tr>

                        <?php if(!empty($result->printing_file)){  ?>
                            <tr>
                                <td><strong>File</strong></td>
              <td> <a href="<?=base_url().'user/'.$result->printing_file;?>" target="blank">View File </a> </td>
                            </tr>
                        <?php } ?>
                         
                            
                            <tr>
                                <td><strong>Quanty</strong></td>
                                <td><?= $result->qty; ?></td>
                            </tr>
                            
                            
                            <tr>
                                <td><strong>Price</strong></td>
                                <td><?= $result->price; ?></td>
                            </tr>
                            
                            
                            
                            <tr>
                                <td><strong>Total Amount</strong></td>
                                <td><?= $result->total_price; ?></td>
                            </tr>
                            
                            
                            <tr>
                                <td><strong>Payment Status</strong></td>
                                <td><?= $result->payment_status; ?></td>
                            </tr>
                            

                            <tr>
                                <td><strong>Order Status</strong></td>
                                <td>
                                
                                
                                <?php             
                                if($result->order_status == 'New'){ ?>
    <button type="button" class="btn btn-success btn-rounded" data-toggle="modal" data-target="#exampleModal"><?=$result->order_status?></button> 
                                <?php }else{ ?>
    <button type="button" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#exampleModal"><?=$result->order_status?></button> 
                                <?php } ?>
                                
                                
                               </td>
                            </tr>



                        </tbody>
                    </table>
                        
                    </div>
                    
                    

                   
                    
<!--                   <div class="col-md-12">
                    <br><br><br> 
                    <h3 class="panel-title">CART DETAILS</h3>&nbsp;
            <a href="<?=site_url('order/add/'.$result->order_id)?>"><i class="fa fa-plus icon-bk"></i></a>
                    <br><br>

                    <table id="customers2" class="table datatable">
                        <thead>
                            <tr>
                                <th>SiNO</th>
                                <th>Item</th>
                                <th>Laundry Item</th>
                                <th>Type</th>
                                <th>Quantity</th>
                                <th>Addon</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($order_details) {
                                $i = 1;
                                foreach ($order_details as $row): ?>   
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $row->types_name; ?></td>
                                        <td><?= $row->product_name; ?></td>
                                        <td><?= $row->gender; ?></td>
                                        <td><?= $row->quantity; ?></td>
                                        
                                        <td><?= $row->total; ?></td> 
                                    </tr>
                           <?php $i++;
                        endforeach;
                        } ?>
                        </tbody>
                        
                        <tbody>
                            <tr>
                              
                                 
                                <td></td> 
                                <td></td> 
                                <td><b>Total:</b></td>
                                <td><?=$result->total_amount?></td> 
                            </tr>
                        </tbody>
                    </table>
                    
                        </div>-->
                    


                </div>
            </div>

        </div>
    </div>

</div>         
<!-- END PAGE CONTENT WRAPPER -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      
      
   <form id="jvalidate" role="form" class="form-horizontal" action="<?=site_url('order/change_status/'.$order_id)?>" method="post"> 
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDIT ORDER STATUS</h5>
      </div>
<!--      <div class="modal-body">-->
       
          
          
             <div class="block">
           
   
                        <div class="panel-body">
          
          
          
                            <div class="form-group">
                
                                <div class="col-md-12">                                                                         
                               <label>Order Status<small style="color:red">*</small> :</label>     
                                    
                   <select class="form-control select" name="order_status_id" data-live-search="true" required>
                                        <?php foreach ($status as $row): ?>
            <option value="<?= $row->order_status_id ?>" 
     <?php if ($row->order_status == $result->order_status) {
                                                echo 'selected';
                                            }
                                            ?>><?= $row->order_status ?>
            </option>
    <?php endforeach; ?>
                   </select>
                                </div>
                            </div>
                            
                            
                            
<!--                            <div class="form-group">
                              
                                <div class="col-md-12">
                                      <label>Notes</label>
              <textarea class="form-control" rows="5" name="notes"></textarea>
                                </div>
                            </div>-->
                            
          
                        </div>
                  
             </div>
          
          
             
<!--      </div>-->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" class="btn btn-primary" value="Save changes" />
      </div>



    </div>
        </form>
      
      
  </div>
</div>

