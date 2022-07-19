         <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
 
    
               
                <?php if(@$id != NULL){ ?>
            
                                 <div class="block">
       <h4>EDIT CITY</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('city/edit_citys/'.$id) ?>" method="post">
                                <div class="panel-body">
                                    
                                    
                                    
                                       <div class="form-group">
                                        <label class="col-md-3 control-label">State :</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" name="state_id" data-live-search="true" required>
                                                <?php foreach ($state as $row): ?>
       <option value="<?=$row->state_id?>" <?php if($row->state_id == $result->state_id){echo 'selected';} ?>><?=$row->state_name?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">City Name:</label>  
                                        <div class="col-md-9">
                         <input type="text" class="form-control" name="city_name" value="<?=@$result->city_name?>"  required/>
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
       <h4>ADD CITY</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('city/add_city') ?>" method="post">
                                <div class="panel-body">
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">State :</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control select" name="state_id" data-live-search="true" required>
                                                <?php foreach ($state as $row): ?>
                                     <option value="<?=$row->state_id?>"><?=$row->state_name?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">City Name:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="city_name" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>  
                                    
                       
                                                                                       
                                    <div class="btn-group pull-right">
                                    <input type="submit"  name="submit" class="btn btn-primary" value="Save">
                                     <!-- <button class="btn btn-primary" type="submit">Submit</button>-->
                                    </div>                                                                                       
                                </div>                                               
    </form>
           
           </div>                
                            
                            
                            
                <?php } ?>
         
                        </div>
                    </div>            
       </div>