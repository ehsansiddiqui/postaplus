<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-6">                        


            <?php if (@$id != NULL) { ?>

                <div class="block">
                    <h4>Edit Attribute </h4>
                    <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('attributes/edit_1_attributes/' . $id) ?>" method="post">
                        <div class="panel-body">


                    <div class="form-group">
               <label class="col-md-3 control-label">Attribute Group <small style="color:red">*</small> :</label>
                    <div class="col-md-9">                                                                    
                <select   class="form-control select" id ="activityx" name="attributes_group_id" data-live-search="true" required>
                        <?php if(!empty($result)){ foreach ($result as $row):  ?>
            <option value="<?=$row->attributes_group_id?>" <?php if($row->attributes_group_id == $res->attributes_group_id){ echo 'selected'; }  ?>><?=ucfirst($row->attr_group_name)?></option> 
                        <?php endforeach; }?>                              
                </select>
                    </div>
                    </div>   
                            

                            <div class="form-group">
           <label class="col-md-3 control-label">Attributes Name<small style="color:red">*</small>:</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="attributes_name" value="<?=$res->atr_name?>"  maxlength="255" required/>
                                </div>
                            </div>
                            
                            
                              <div class="form-group">
           <label class="col-md-3 control-label">Attributes Name Arabic<small style="color:red">*</small>:</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="attributes_name_ar" value="<?=$res->ar_atr_name?>"  maxlength="255" required/>
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
                    <h4>Add Attribute </h4>
 <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('attributes/add_attributes') ?>" method="post">

                        <div class="panel-body">        
                            
                                 <div class="form-group">
               <label class="col-md-3 control-label">Attribute Group <small style="color:red">*</small> :</label>
                                  <div class="col-md-9">                                                                    
                     <select   class="form-control select" id ="activityx" name="attributes_group_id" data-live-search="true" required>
                        <?php if(!empty($result)){ foreach ($result as $row):  ?>
                         <option value="<?=$row->attributes_group_id?>"><?=ucfirst($row->attr_group_name)?></option> 
                        <?php endforeach; }?>               
                                       
                     </select>
                                    </div>
                                    </div>   
                            

                            <div class="form-group">
           <label class="col-md-3 control-label">Attributes Name<small style="color:red">*</small>:</label>  
                                <div class="col-md-9">
               <input type="text" class="form-control" name="attributes_name"   maxlength="255" required/>
                                </div>
                            </div>
                            
                            
                              <div class="form-group">
           <label class="col-md-3 control-label">Attributes Name Arabic<small style="color:red">*</small>:</label>  
                                <div class="col-md-9">
               <input type="text" class="form-control" name="attributes_name_ar"   maxlength="255" required/>
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

<!--<script type="text/javascript">
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
</script>-->