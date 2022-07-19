<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


    <section>
      <div class="content-wrap">
        <div class="container clearfix">
          <div class="col_full">

            <div class="content_center">
              <h3 class="sub_head"> Preview </h3>

        <form class="default-form"  action="https://www.postastc.com/postaplus`SendPerformREQuest.php" id="form_id" method="post" enctype="multipart/form-data">
            
            
                <div class="form-group">
                   <label>Qty</label>
                <input type="text"  name="total_amount" class="form-control"  value="<?=@$order_data->qty?>" readonly>
                </div>
            
            
                <div class="form-group">
                   <label>Price</label>
                <input type="text"  name="total_amount" class="form-control"  value="<?=@$order_data->price?>" readonly>
                </div>
  
                <div class="form-group">
                   <label>Total Price</label>
             <input type="text"  name="total_price" class="form-control"  value="<?=@$order_data->total_price?>" readonly>
                </div>
            
            <?php
            $delivery_charges = $this->db->get_where('settings',array('settings_id'=>1))->row('setting_value');         
            ?>
            
            
           <div class="form-group">
            <label>Delivery Charges</label>
      <input type="text"  name="delivery_charges" class="form-control"  value="<?=@$delivery_charges?>" readonly>
           </div>
            
            <div class="form-group">
                   <label>Grand total</label>
             <input type="text"  name="total_amount" class="form-control"  value="<?=@$order_data->total_price+@$delivery_charges?>" readonly>
            </div>
                  
                <div class="form-group">
                    <input type="hidden"  name="order_id" class="form-control"  value="<?=$order_id?>">
                </div>
            
            
                  <div class="row">
                  <div class="col-md-6">     
            <button type="submit" name="submit" class="btn btn-primary btn-block">Pay Now</button>
                  </div>
                      
                   <div class="col-md-6">     
       <a href="<?=base_url()?>" class="btn btn-primary btn-block" style="padding: 13px;">Cancel</a>
                  </div>
                      
                  </div>
            </form>

            </div>
          </div>
        </div>
      </div>
    </section>       