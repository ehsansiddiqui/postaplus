<section id="content">

                <div class="content-wrap"  style=" margin-bottom: 100px;">


                    <div class="container clearfix " style="  margin-left: auto; margin-right:auto;     "> 
                        <div class='row' >
                            <div class="col-md-10 offset-md-1 col-sm-12"  >


                                <div class="clearfix"></div>


                                <div   class="divDevider" >
                                    
                                        <h4 class="nobottommargin" style="color:#333; padding:10px;">My Orders</h4>
                                    
                                    <table class="table"   style="margin-left:auto; margin-right:auto;   max-width:100%; ">
                                        
                                        <tr style="background-color:#ea7f1d; color:#fff;">
                                            <th>Order ID</th>
                                            <th>Order Type</th>
                                            <th>File</th>
                                            <th>Date</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total Price</th>
                                            <th>Status</th> 
                                        </tr>
                                    <?php if($myorder){ foreach ($myorder as $row){ ?>    
                                        
                                        <tr>
                                            <td><?=$row->order_id?></td>
                                            <td><?=$row->order_type?></td>
                                            
                                            <td>
                                             
                                            <?php if($row->printing_file !=NULL){  ?>    
 <img src="<?=base_url()?>user/<?=$row->printing_file?>" alt="image here" style="max-width:200px; max-height:100px;">
                                            <?php }else{ ?>
 <img src="<?=base_url()?>assets/images/noimage.png" alt="image here" style="max-width:200px; max-height:100px;">
                                            <?php } ?>
                                            </td>
                                            
                                            
                                            <td><?=date('d-M-Y',strtotime($row->order_date))?></td>
                                            <td><?=$row->qty?></td>
                                            <td><?=$row->price?> KD</td>
                                            <td><?=$row->total_price?> KD</td>
                                            <td><?=$row->order_status?></td>
                                        </tr>
                                        
                                    <?php } } ?> 
                                    </table>
                                </div>


                            </div>





                        </div>




                    </div>

                </div>

            </section><!-- #content end -->
