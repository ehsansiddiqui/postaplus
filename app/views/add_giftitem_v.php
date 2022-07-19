
<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-6">                        


            <?php if (@$id != NULL) { ?>

                <div class="block">
                    <h4>Edit Gift items</h4>
                    <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('vehicle/edit_1/' . $id) ?>"  enctype="multipart/form-data" method="post">
                        <div class="panel-body">

                            
                       
                            
                           
                        <div class="form-group">
                                <label class="col-md-3 control-label">Title:</label>  
                                <div class="col-md-9">
  <input type="text" class="form-control" name="vehicle_name"   maxlength="20" value="<?=$result->vehicle_name?>" required/>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Description:</label>  
                                <div class="col-md-9">
  <input type="text" class="form-control" name="vehicle_type" value="<?=$result->vehicle_type?>"  maxlength="50" required/>
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <label class="col-md-3 control-label">Attributes :</label>  
                                <div class="col-md-9">
  <input type="text" class="form-control" name="vehicle_number"  value="<?=$result->vehicle_number?>" maxlength="50" required/>
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
                    <h4>Add Gift items</h4>
 <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('vehicle/gift_item') ?>" enctype="multipart/form-data" method="post">

                        <div class="panel-body">

                            
                                 <div class="form-group">
                                 <label class="col-md-3 control-label">Category <small style="color:red">*</small> :</label>
                                 <div class="col-md-9"> 
             <select   class="form-control select" id ="activityx" name="cate_id" data-live-search="true" required>
                                       <option>Plate printing</option>
                                       <option>Badge Printing</option>              
                                    </select>
                                    </div>
                                    </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tittle :</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="vehicle_name"   maxlength="20" required/>
    <!--                         <span class="help-block">min size = 2, max size = 8</span>-->
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Description:</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="vehicle_type"   maxlength="50" required/>
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
                                    <input type="number" class="form-control" name="vehicle_type"   maxlength="50" required/>
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


