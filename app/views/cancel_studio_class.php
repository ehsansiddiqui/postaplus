
<div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        
 
                
                <?php if(@$class_id != NULL){ ?>
  
                          <div class="block">
       <h4>EDIT CLASS STATUS</h4>
     <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('studio_classes/canceled/'.$class_id) ?>" method="post" enctype="multipart/form-data">
                                
                                <div class="panel-body">
                                   
                                 <div class="form-group">
                                        <label class="col-md-3 control-label">STATUS:</label>
                                        <div class="col-md-9">                                                                                
                                            <select class="form-control" name="status" data-live-search="true" required>
                                             <option value="">--- select ---</option>   
                                             <option value="0" <?php if($res->status == 0){echo 'selected';} ?>>Cancel</option>
<!--                                            <option value="1" <?php if($res->status == 1){echo 'selected';} ?>>Active</option>-->
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

  