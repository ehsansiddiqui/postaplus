         <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
 
           <?php if(@$id != NULL){ ?>
                
               <div class="block">
       <h4>Edit Photo printing </h4>
  <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('price_package/edit_1/'.$id) ?>" method="post">
                                <div class="panel-body">
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Package Name:</label>  
                                        <div class="col-md-9">
                         <input type="text"  maxlength="50"  class="form-control" name="price_package_name" value="<?=$result->price_package_name?>" required/>
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
       <h4>Add Photo printing</h4>
  <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('price_package') ?>" method="post">

                                      <div class="panel-body">
                                          
                                          
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Title:</label>  
                                        <div class="col-md-9">
                <input type="text"  maxlength="50"  class="form-control" name="price_package_name" value="" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                          
                                          
                                          
                                     <div class="form-group">
                                 <label class="col-md-3 control-label">Attributes <small style="color:red">*</small> :</label>
                                    <div class="col-md-9">                                                                  
                     <select class="form-control select" id ="activityx" name="cate_id" data-live-search="true" required> 
                                       <option>Size</option>
                                    </select>
                                   </div>
                        </div>
                            
                        
                         <div class="form-group">
                                 <label class="col-md-3 control-label"></label>
                                    <div class="col-md-9">                                                                  
                     <select class="form-control select" id ="activityx" name="cate_id" data-live-search="true" required> 
                                       <option>Small</option>
                                       <option>Large</option>
                                    </select>
                                   </div>
                        </div>
                             
                                          
                                          
                                          
                                    
                                    
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Price:</label>  
                                        <div class="col-md-9">
                <input type="number"  maxlength="50"  class="form-control" name="price_package_name" value="" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Description:</label>  
                                        <div class="col-md-9">
                                <textarea  maxlength="50"  class="form-control" name="price_package_name"></textarea>
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


