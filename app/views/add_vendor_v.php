<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-6">                        


            <?php if (@$id != NULL) { ?>

                <div class="block">
                    <h4>EDIT VENDOR</h4>
                    <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('vendor/edit_1/' . $id) ?>" method="post">
                        <div class="panel-body">



                            <div class="form-group">
                                <label class="col-md-3 control-label">Tittle:</label>  
                                <div class="col-md-9">
    <input type="text" class="form-control" name="vendor_name"  value="<?=@$result->vendor_name?>"  maxlength="20" required/>
                                </div>
                            </div>
      
                         
                            
                            
                            
                       
                            
                            
                            
                            
          <!--                  <div class="form-group">-->
          <!--                      <label class="col-md-3 control-label">Email:</label>  -->
          <!--                      <div class="col-md-9">-->
          <!--<input type="email" class="form-control" name="vendor_email" value="<?=@$result->vendor_email?>" required/>-->
          <!--                      </div>-->
          <!--                  </div>-->
                            
                            
    <!--                        <div class="form-group">-->
    <!--                            <label class="col-md-3 control-label">Billing Price:</label>  -->
    <!--                            <div class="col-md-9">-->
    <!--<input type="number" class="form-control" name="vendor_billing_price" value="<?=@$result->vendor_billing_price?>" required/>-->
    <!--                            </div>-->
    <!--                        </div>-->
                            
                            
                            
    <!--                        <div class="form-group">-->
    <!--                            <label class="col-md-3 control-label">Store Price:</label>  -->
    <!--                            <div class="col-md-9">-->
    <!--<input type="number" class="form-control" name="vendor_price" value="<?=@$result->vendor_price?>" required/>-->
    <!--                            </div>-->
    <!--                        </div>-->
                            
                            
                         
                              
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Description</label>
                                <div class="col-md-9">
                        <textarea class="form-control" rows="5" name="vendor_address"><?=@$result->vendor_address?></textarea>
                                </div>
                            </div>


                           

                            <div class="btn-group pull-right">
                                <input type="submit"  name="submit" class="btn btn-primary" value="Save">
                            </div>                                                                                       
                        </div>                                               
                    </form>

                </div>   
            <?php } else { ?>

                <div class="block">
                    <h4>Add Service</h4>
 <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('vendor/add') ?>" method="post">

                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-md-3 control-label">Tittle:</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="vendor_name"   maxlength="20" required/>
                                </div>
                            </div>
      
                            <!--<div class="form-group">-->
                            <!--    <label class="col-md-3 control-label">Latitude:</label>  -->
                            <!--    <div class="col-md-9">-->
                            <!--        <input type="text" class="form-control" name="vendor_latitude"   maxlength="50" required/>-->
                            <!--    </div>-->
                            <!--</div>-->
                            
                            <!--<div class="form-group">-->
                            <!--    <label class="col-md-3 control-label">Longitude:</label>  -->
                            <!--    <div class="col-md-9">-->
                            <!--        <input type="text" class="form-control" name="vendor_longitude"   maxlength="50" required/>-->
                            <!--    </div>-->
                            <!--</div>-->
                         
                              
                            <!--<div class="form-group">-->
                            <!--    <label class="col-md-3 control-label">Contact Person:</label>  -->
                            <!--    <div class="col-md-9">-->
                            <!--        <input type="text" class="form-control" name="vendor_contact_person" required/>-->
                            <!--    </div>-->
                            <!--</div>-->
                            
                            <!--<div class="input_fields_wrap">-->
                            <!--<div class="form-group">-->
                            <!--    <label class="col-md-3 control-label">Phone Number:</label>  -->
                            <!--    <div class="col-md-9">-->
                            <!--        <input type="text" class="form-control" name="phone_number[]" required/>-->
                            <!--    </div>-->
                                
                            <!--    <a href="#" class="add_field_button"><i class="fa fa-plus pull-right"></i></a> -->
                            <!--</div> -->
                            <!--</div>-->
                            
                            
                            <!--<div class="form-group">-->
                            <!--    <label class="col-md-3 control-label">Email:</label>  -->
                            <!--    <div class="col-md-9">-->
                            <!--        <input type="email" class="form-control" name="vendor_email" required/>-->
                            <!--    </div>-->
                            <!--</div>-->
                            
                            
                       
                            
                            
                            
                          
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Description</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" rows="5" name="vendor_address"></textarea>
                                </div>
                            </div>


                            <div class="btn-group pull-right">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                            </div>                                                                                                                          
                        </div>                                               

                    </form>
                </div>
            <?php } ?>

        </div>
    </div>            
</div>

<script type="text/javascript">
    $(document).ready(function() {
    var max_fields      = 5; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="input_fields_wrap"><div class="form-group"><label class="col-md-3 control-label">Phone Number:</label><div class="col-md-9"><input type="text" class="form-control" name="phone_number[]"/></div></div><a href="#" class="remove_field"><i class="fa fa-minus pull-right"></i></a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>