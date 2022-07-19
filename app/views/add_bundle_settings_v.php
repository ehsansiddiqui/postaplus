         <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
 
                
                <?php if(@$id != NULL){ ?>
                            
                            
                            
                            <div class="block">
       <h4>EDIT BUNDLE SETTINGS</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('bundle_settings/edit_1/'.$id) ?>" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                     
                                   
                                                 
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Number Of Class <small style="color: red">*</small> :</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="number_of_class" value="<?=$res->number_of_class?>"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                       
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Min Number Studio <small style="color: red">*</small> :</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="min_number_studio" value="<?=$res->min_number_studio?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Validity Day<small style="color: red">*</small> :</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="number_of_validity" value="<?=$res->number_of_validity?>" required/>
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
       <h4>ADD BUNDLE SETTINGS</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('bundle_settings/add') ?>" method="post" enctype="multipart/form-data">
                               
                                   <div class="panel-body">
                                       
                        
                          
                                                 
                                                 
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Number Of Class <small style="color: red">*</small> :</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="number_of_class"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                       
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Min Number Studio <small style="color: red">*</small> :</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="min_number_studio"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                       
                                       
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Validity Day <small style="color: red">*</small> :</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="number_of_validity"  required/>
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