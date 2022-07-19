         <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
 
    
               
                <?php if(@$id != NULL){ ?>
            
                                 <div class="block">
       <h4>EDIT COLOUR</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('colour/edit_colours/'.$id) ?>" method="post">
                                <div class="panel-body">
                                    
        
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Color Name:</label>  
                                        <div class="col-md-9">
                         <input type="text" class="form-control" name="color_name" value="<?=@$result->color_name?>"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                              <div class="form-group">
                                        <label class="col-md-3 control-label">Color Code:</label>  
                                        <div class="col-md-9">
                      <input type="text" class="form-control" name="color_code" value="<?=@$result->color_code?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                             </div>  
                                      
                                                                                       
                                    <div class="btn-group pull-right">
                                    <input type="submit"  name="submit" class="btn btn-primary" value="Save">
                                    </div>                                                                                       
                                </div>                                               
    </form>
           
           </div>             
                            
                            
                            
                <?php }else{ ?>
                            

                            
               
                  <div class="block">
       <h4>ADD COLOUR</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('colour/add_colour') ?>" method="post">
                                <div class="panel-body">

                                <div class="form-group">
                                        <label class="col-md-3 control-label">Color Name:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="color_name" required/>
                                         <span class="help-block"></span>
                                        </div>
                                 </div>  
                                    
                                <div class="form-group">
                                        <label class="col-md-3 control-label">Color Code:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="color_code" required/>
                                         <span class="help-block"></span>
                                        </div>
                                 </div> 
                                    
                                    
                                                                                       
                                <div class="btn-group pull-right">
                                    <input type="submit"  name="submit" class="btn btn-primary" value="Save">
                                </div>                                                                                       
                                </div>                                               
    </form>
           
           </div>                
                            
                            
                            
                <?php } ?>
         
                        </div>
                    </div>            
       </div>