         <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
 

                <?php if(@$id != NULL){ ?>
       
                           <div class="block">
       <h4>EDIT LOCATION</h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('location/edit_locations/'.$id) ?>" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                    
          
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Location Name:</label>  
                                        <div class="col-md-9">
     <input type="text" class="form-control" name="location_name" value="<?=$result->location_name?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>
                                       
                                    
                                   <div class="btn-group pull-right">
                                    <input type="submit"  name="submit" class="btn btn-primary" value="Save">
                                     <!--  <button class="btn btn-primary" type="submit">Submit</button>-->
                                   </div>
                                    
                                </div>                                               
    </form>
           
           </div>              
                            
                            
                            
                <?php }else{ ?>
    
          <div class="block">
       <h4>ADD LOCATION </h4>
  <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('location/add_location') ?>" method="post" enctype="multipart/form-data">
                                <div class="panel-body">
                                    
            
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Location name :</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="location_name" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div> 
                                       
                                   <div class="btn-group pull-right">
                                    <input type="submit"  name="submit" class="btn btn-primary" value="Save">
                                    <!--  <button class="btn btn-primary" type="submit">Submit</button>-->
                                   </div>
                                    
                                </div>                                               
    </form>
           
           </div>       
                            
                            
                            
                            
                <?php } ?>



                        </div>
                    </div>            
       </div>