         <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
 
                
                <?php if(@$id != NULL){ ?>
  
                          <div class="block">
       <h4>EDIT PACKAGES</h4>
     <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('packages/edit_1/'.$id) ?>" method="post" enctype="multipart/form-data">
                                
                                <div class="panel-body">
                                    
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Studio :</label>
                                        <div class="col-md-9">                                                                            
                                        <select class="form-control select" name="studio_id" data-live-search="true" required>
                                                <?php foreach ($result as $row): ?>
       <option value="<?=$row->studio_id?>" <?php if($row->studio_id == 1){echo 'selected';} ?>><?=$row->studio_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Packages Name:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="packages_name" value="<?=$res->packages_name?>" maxlength="50" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Number Of Classes:</label>  
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" name="number_of_classes" value="<?=$res->number_of_classes?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Validatity In Days:</label>  
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" name="validatity_in_days" value="<?=$res->validatity_in_days?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Price:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="price" value="<?=$res->price?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Status:</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" name="activity_id" data-live-search="true" required>
                                              <option value="1" <?php if($res->activity_id == 1){echo 'selected';} ?>>YES</option>
                                              <option value="0" <?php if($res->activity_id == 0){echo 'selected';} ?>>NO</option>
                                            </select>
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
       <h4>ADD PACKAGES</h4>
     <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('packages/add') ?>" method="post" enctype="multipart/form-data">
                                
                                <div class="panel-body">
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Studio:</label>
                                        <div class="col-md-9">                                                                            
                                        <select class="form-control select" name="studio_id" data-live-search="true" required>
                                                <?php foreach ($result as $row): ?>
       <option value="<?=$row->studio_id?>"><?=$row->studio_name?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Packages Name:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="packages_name" maxlength="50" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Number Of Classes:</label>  
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" name="number_of_classes"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Validatity In Days:</label>  
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" name="validatity_in_days"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Price:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="price"  required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                             
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Status:</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" name="activity_id" data-live-search="true" required>
                                                <option value="1">YES</option>
                                                <option value="0">NO</option>
                                            </select>
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