
<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-6">                        


            <?php if (@$id != NULL) { ?>

                <div class="block">
                    <h4>Edit Photoprinting</h4>
                    <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('photoprinting/edit_1_photoprinting/'. $id) ?>"  enctype="multipart/form-data" method="post">
                        <div class="panel-body">

                           
                         
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tittle :</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="photoprinting_title" value="<?=$res->photoprinting_title?>"  maxlength="255" required/>
  
                                </div>
                            </div>
                            
                            
<!--                            <div class="form-group">
                                <label class="col-md-3 control-label">Description:</label>  
                                <div class="col-md-9">
                                    <textarea class="form-control" name="photoprinting_description" maxlength="255"><?=$res->photoprinting_description?></textarea>                        
                                </div>
                            </div>-->
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tittle Arabic:</label>  
                                <div class="col-md-9">
                                    
                <input type="text" class="form-control" name="photoprinting_title_ar" value="<?=$res->ar_photoprinting_title?>"  maxlength="255" required/>
<!--           <textarea class="form-control" name="photoprinting_description"></textarea>                        -->
                                </div>
                            </div>
             
<!--                        <div class="form-group">
                                 <label class="col-md-3 control-label">Attributes <small style="color:red">*</small> :</label>
                                    <div class="col-md-9">                                                                  
                     <select class="form-control select" id ="activityx" name="cate_id" data-live-search="true" required> 
                                       <option>Size</option>
                                    </select>
                                   </div>
                        </div>-->
                            
                        
                         <div class="form-group">
                                 <label class="col-md-3 control-label">Attributes</label>
                                    <div class="col-md-9">                                                                  
        <select class="form-control select" id ="activityx" name="attributes_id" data-live-search="true" required> 
                                     
            <?php if(!empty($attributes)){ foreach ($attributes as $row):  ?>
            <option value="<?=$row->attributes_id?>" <?php if($row->attributes_id == $res->attributes_id){ echo 'selected'; }  ?>><?=ucfirst($row->atr_name)?></option> 
                        <?php endforeach; }?>                    
           </select>               
                                   </div>
                        </div>
                            
                            
                            
                             <div class="form-group">
                                <label class="col-md-3 control-label">Price:</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="price" value="<?=$res->price?>"  maxlength="50" required/>
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
                    <h4>Add Photoprinting</h4>
 <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('photoprinting/add_photoprinting') ?>" enctype="multipart/form-data" method="post">

                        <div class="panel-body">

                            
                            
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tittle :</label>  
                                <div class="col-md-9">
             <input type="text" class="form-control" name="photoprinting_title"   maxlength="255" required/>
  
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tittle Arabic:</label>  
                                <div class="col-md-9">
                                    
                <input type="text" class="form-control" name="photoprinting_title_ar"   maxlength="255" required/>
<!--           <textarea class="form-control" name="photoprinting_description"></textarea>                        -->
                                </div>
                            </div>
             
<!--                        <div class="form-group">
                                 <label class="col-md-3 control-label">Attributes <small style="color:red">*</small> :</label>
                                    <div class="col-md-9">                                                                  
                     <select class="form-control select" id ="activityx" name="cate_id" data-live-search="true" required> 
                                       <option>Size</option>
                                    </select>
                                   </div>
                        </div>-->
                            
                        
                         <div class="form-group">
                                 <label class="col-md-3 control-label">Attributes</label>
                                    <div class="col-md-9">                                                                  
        <select class="form-control select" id ="activityx" name="attributes_id" data-live-search="true" required> 
                                     
            <?php if(!empty($attributes)){ foreach ($attributes as $row):  ?>
            <option value="<?=$row->attributes_id?>"><?=ucfirst($row->atr_name)?></option> 
                        <?php endforeach; }?>                    
           </select>               
                                   </div>
                        </div>
                            
                            
                            
                             <div class="form-group">
                                <label class="col-md-3 control-label">Price:</label>  
                                <div class="col-md-9">
            <input type="text" class="form-control" name="price"   maxlength="50" required/>
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


