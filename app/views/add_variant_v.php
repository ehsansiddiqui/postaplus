         <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
 
    
               
                <?php if(@$id != NULL){ ?>
            
                                 <div class="block">
       <h4>EDIT VARIANT</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('variant/edit_variants/'.$id) ?>" method="post">
                                <div class="panel-body">
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Variant Name:</label>  
                                        <div class="col-md-9">
                         <input type="text" class="form-control" name="variant_name" value="<?=@$result->variant_name?>"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>  
                                      
                                                                                       
                                    <div class="btn-group pull-right">
                                    <input type="submit"  name="submit" class="btn btn-primary" value="Save">
<!--                                <button class="btn btn-primary" type="submit">Submit</button>-->
                                    </div>                                                                                       
                                </div>                                               
    </form>
           
           </div>             
                            
                            
                            
                <?php }else{ ?>
                            

                            
               
                  <div class="block">
       <h4>ADD VARIANT</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('variant/add_variant') ?>" method="post">
                                <div class="panel-body">
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Variant Name:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="variant_name" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>  
                                    
                       
                                                                                       
                                    <div class="btn-group pull-right">
                                    <input type="submit"  name="submit" class="btn btn-primary" value="Save">
<!--                                <button class="btn btn-primary" type="submit">Submit</button>-->
                                    </div>                                                                                       
                                </div>                                               
    </form>
           
           </div>                
                            
                            
                            
                <?php } ?>
         
                        </div>
                    </div>            
       </div>