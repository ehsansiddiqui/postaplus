         <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
 
       
               
     

                <?php if(@$id != NULL){ ?>
                
               <div class="block">
       <h4>EDIT ACTIVITY TYPE</h4>
  <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('activity_type/edit_1/'.$id) ?>" method="post">
                                <div class="panel-body">
                                    
                                    
                                    
<!--                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Activity Code:</label>  
                                        <div class="col-md-9">
        <input type="text" pattern="[^()/<>[\]\\,'|\x22]+" maxlength="5"  class="form-control" name="activity_code" value="<?=$result->activity_code?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>  
                                    -->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Activity Type:</label>  
                                        <div class="col-md-9">
                         <input type="text"  maxlength="50"  class="form-control" name="activity_type" value="<?=$result->activity_name?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div> 
                                    
                                    
                                <div class="form-group">
                                        <label class="col-md-3 control-label">Activity Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" rows="5" name="activity_description"><?=$result->activity_description?></textarea>
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
       <h4>ADD ACTIVITY TYPE</h4>
  <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('activity_type/add/') ?>" method="post">

                                <div class="panel-body">
                                       
<!--                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Activty Code:</label>  
                                        <div class="col-md-9">      
                        <input type="text" pattern="[^()/<>[\]\\,'|\x22]+" maxlength="5"  class="form-control" name="activity_code" required/>
                                   <span class="help-block">min size = 2, max size = 8</span>
                                        </div>
                                    </div>-->


 
                                   
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Activity Type:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="activity_type"   maxlength="50" required/>
<!--                                            <span class="help-block">min size = 2, max size = 8</span>-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Activity Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" rows="5" name="activity_description"></textarea>
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


