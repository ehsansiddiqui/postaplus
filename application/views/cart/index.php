<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    /* Update item quantity */
    function updateCartItem(obj, rowid){
        $.get("<?php echo site_url('printing/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
            if(resp == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, please try again.');
            }
        });
    }
</script>

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">


        <div class="container clearfix " style="max-width:80%; margin-left: auto; margin-right:auto;     ">
            <div class='row' >
                <div class="col-md-8 offset-md-2 col-sm-12">
                    <div class="style-msg successmsg" style="margin-left: auto; margin-right:auto;  " >
                        <!--    --------(to show when changes made)---------- -->
                        <?php if($this->session->flashdata('message')){  ?>
                            <div class="sb-msg"><i class="icon-thumbs-up"></i>
                                <?=$this->session->flashdata('message');?>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php } ?>
                    </div>

                    <div class="clearfix"></div>


                    <div  style="font-size: 12px;" class="divDevider" >
                        <div style="background-color:#ea7f1d; width:100%; padding:10px; border-radius: 10px 10px 0px 0px;  ">
                            <h4 class="nobottommargin" style="color:#fff;">Shopping Cart</h4>
                        </div>
                        <div >
                            <table style="font-size: 12px;"  class="table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th width="5%">File</th>
                                    <th width="30%">Product Title</th>
                                    <th width="15%">Price</th>
                                    <th width="13%">Quantity</th>
                                    <th width="20%">Subtotal</th>
                                    <th width="12%">Action</th>
                                </tr>
<!--                                --><?php //$abc = 1; ?>
                                </thead>
                                <tbody>
                                <?php if($this->cart->total_items() > 0){ foreach($cart as $item){    ?>
                                    <tr>
                                        <td><?php echo $item['id'];  ; ?></td>
                                        <td><a target="_blank" href="<?php echo base_url('user/') . $item["image"]; ?>">File Link</a></td>
                                        <td><?php echo $item["name"]; ?></td>
                                        <td><?php echo ''.$item["price"].' KWD'; ?></td>
                                        <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
                                        <td><?php echo ''.$item["subtotal"].' KWD'; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('printing/removeItem/'.$item["rowid"]); ?>" class="btn btn-danger btn-block" onclick="return confirm('Are you sure?')"><i style="font-size: 30px;" class="fa fa-remove"></i></a>
                                        </td>
                                    </tr>
                                <?php } }else{ ?>
                                <tr><td colspan="6"><p>Your cart is empty.....</p></td>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td><a href="<?php echo site_url('products/'); ?>" class="btn btn-primary btn-block button button-3d  "><i class="fa fa-shopping-cart"></i> Continue Shopping</a></td>
                                    <td colspan="4"></td>
                                    <?php $delivery_charges = $this->db->get_where('settings',array('settings_id'=>1))->row('setting_value'); ?>
                                    <?php $total_discount = $this->db->get_where('settings',array('settings_id'=>2))->row('setting_value'); ?>
                                    <?php if($this->cart->total_items() > 0){ ?>
                                        <td class="text-left">Grand Total: <b><?php echo ''.$this->cart->total() + $delivery_charges .' KWD'; ?></b></td>
                                        <td style="padding-right: 12px;"><a style="padding: 5px;" href="<?php echo site_url('checkout/selectPayment/'); ?>" class="btn btn-primary btn-block button button-3d  "><i class="fa fa-shopping-basket"></i> Checkout</a></td>
                                    <?php } ?>
                                </tr>
                                </tfoot>

                            </table>
<!--                            --><?php //echo 'Delivery Charges are :  ' . $delivery_charges . 'KWD' ?><!-- / --><?php //echo 'Total Discount Is :  ' . $total_discount . 'KWD' ?>
                            <?php echo 'Delivery Charges are :  ' . $delivery_charges . 'KWD' ?>
                        </div>
                    </div>
                </div>





            </div>




        </div>

    </div>

</section><!-- #content end -->
