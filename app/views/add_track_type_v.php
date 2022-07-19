         <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
 
       
               
     

                <?php if(@$id != NULL){ ?>
                
               <div class="block">
       <h4>EDIT TRACK TYPE</h4>
  <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('track_type/edit_1/'.$id) ?>" method="post">
                                <div class="panel-body">
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Event Type:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="track_type" value="<?=$result->track_type_name?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>  
                                                                                       
                                    <div class="btn-group pull-right">
                                      <input type="submit"  name="submit" class="btn btn-primary" value="Save">
<!--                                  <button class="btn btn-primary" type="submit">Submit</button>-->
                                    </div>                                                                                       
                                </div>                                               
</form>
                      
        </div>   
                <?php }else{ ?>
                
      <div class="block">
       <h4>ADD TRACK TYPE</h4>
  <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('track_type/add/') ?>" method="post">
<!--                                <div class="panel-body">
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Vehicle Type:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="category_type" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>  
                                                                                       
                                    <div class="btn-group pull-right">
                                           <input type="submit"  name="submit" class="btn btn-primary" value="Save">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>                                                                                       
                                </div>


-->

                                <div class="panel-body">                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Event Type:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="track_type"/>
<!--                                            <span class="help-block">min size = 2, max size = 8</span>-->
                                        </div>
                                    </div>                                                        
                                    <div class="btn-group pull-right">
<!--                                        <button class="btn btn-primary" type="button" onClick="jvalidate.resetForm();$('#gender').next('.bootstrap-select').removeClass('error').removeClass('valid')">Hide prompts</button>-->
<input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
<!--                                        <button class="btn btn-primary" type="submit">Submit</button>-->
                                    </div>                                                                                                                          
                                </div>                                               
                      
             



    </form>
            
       
       
           </div>
                            
                            
                <?php } ?>
       
                 
                        </div>
                    </div>            
                </div>


