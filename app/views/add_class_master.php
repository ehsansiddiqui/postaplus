         <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
 
           <?php if(@$id != NULL){ ?>
                
               <div class="block">
       <h4>EDIT CLASS MASTER</h4>
  <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('class_master/edit_1/'.$id) ?>" method="post">
                                <div class="panel-body">
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Class Name:</label>  
                                        <div class="col-md-9">
                         <input type="text"  maxlength="50"  class="form-control" name="class_name" value="<?=$result->class_name?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div> 
                                    
                                    
                                <div class="form-group">
                                        <label class="col-md-3 control-label"> Description</label>
                                        <div class="col-md-9">
         <textarea class="form-control" rows="5" name="discription"><?=$result->discription?></textarea>
                                        </div>
                                </div>
                                    
                                   <div class="form-group">
                                        <label class="col-md-3 control-label"> Other Details</label>
                                        <div class="col-md-9">
         <textarea class="form-control" rows="5" name="other_details"><?=$result->other_details?></textarea>
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
       <h4>ADD ACTIVITY TYPE</h4>
  <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('class_master/add/') ?>" method="post">

                                      <div class="panel-body">
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Class Name:</label>  
                                        <div class="col-md-9">
                         <input type="text"  maxlength="50"  class="form-control" name="class_name" value="" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div> 
                                    
                                    
                                <div class="form-group">
                                        <label class="col-md-3 control-label"> Description</label>
                                        <div class="col-md-9">
         <textarea class="form-control" rows="5" name="discription"></textarea>
                                        </div>
                                </div>
                                    
                                   <div class="form-group">
                                        <label class="col-md-3 control-label"> Other Details</label>
                                        <div class="col-md-9">
         <textarea class="form-control" rows="5" name="other_details"></textarea>
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


