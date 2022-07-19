                       
                           <tr>
                              
                               <td><strong>Customer Phone :</strong></td>
                               <td><input type="text"  maxlength="50"  class="form-control" name="phonr" value="<?=$customer->phone_number?>"  readonly style="color: black;"/></td>
                        
                           </tr>


                            <tr>
                           
                            <td><strong>Customer Type :</strong></td>                
                                <?php if($customer->customer_type_id == 1){ ?>                            
                            <td><input type="text"  maxlength="50"  class="form-control" name="customer_type" value="Normal" readonly style="color: black;"/></td>
                                <?php } else{?>
                            <td> <input type="text"  maxlength="50"  class="form-control" name="customer_type" value="Corporate" readonly style="color: black;"/></td>
                                <?php } ?>
                             
                            </tr>



                            <tr>
                                <td><strong>Address:</strong></td>
                                <td><textarea class="form-control" rows="5" name="address" readonly style="color: black;"><?=@$customer->address?></textarea></td>
                            </tr>

