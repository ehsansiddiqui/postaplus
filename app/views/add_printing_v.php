
<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-6">                        


            <?php if (@$id != NULL) { ?>

                <div class="block">
                    <h4>Edit Printing</h4>
                    <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('printing/edit_1_printing/'.$id) ?>"  enctype="multipart/form-data" method="post">
                        <div class="panel-body">

                           
                                 <div class="form-group">
                                 <label class="col-md-3 control-label">Type <small style="color:red">*</small> :</label>
                                 <div class="col-md-9"> 
           <select   class="form-control select" id ="activityx" name="print_type_id" data-live-search="true" required>       
                     <?php if(!empty($print_type)){ foreach ($print_type as $row):  ?>
            <option value="<?=$row->print_type_id?>" <?php if($row->print_type_id == $res->print_type_id){ echo 'selected'; }  ?>><?=ucfirst($row->pri_type_name)?></option> 
                        <?php endforeach; }?>                    
           </select>
                                    </div>
                                    </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tittle :</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="printing_title" value="<?=$res->printing_title?>"  maxlength="255" required/>
  
                                </div>
                            </div>
                            
                            
                             <div class="form-group">
                                <label class="col-md-3 control-label">Tittle Arabic:</label>  
                                <div class="col-md-9">
         <input type="text" class="form-control" name="ar_printing_title" value="<?=$res->ar_printing_title?>"  maxlength="255" required/>                      
                                </div>
                            </div>
                            
                            
<!--                            <div class="form-group">
                                <label class="col-md-3 control-label">Description:</label>  
                                <div class="col-md-9">
                                    <textarea class="form-control" name="printing_description" maxlength="255"><?=$res->printing_description?></textarea>                        
                                </div>
                            </div>-->
             
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
                    <h4>Add Printing</h4>
 <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('printing/add_printing') ?>" enctype="multipart/form-data" method="post">

                        <div class="panel-body">

                            
                                 <div class="form-group">
                                 <label class="col-md-3 control-label">Type <small style="color:red">*</small> :</label>
                                 <div class="col-md-9"> 
           <select   class="form-control select" id ="activityx" name="print_type_id" data-live-search="true" required>       
                     <?php if(!empty($print_type)){ foreach ($print_type as $row):  ?>
            <option value="<?=$row->print_type_id?>"><?=ucfirst($row->pri_type_name)?></option> 
                        <?php endforeach; }?>                    
           </select>
                                    </div>
                                    </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tittle :</label>  
                                <div class="col-md-9">
             <input type="text" class="form-control" name="printing_title"   maxlength="255" required/>
  
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tittle Arabic:</label>  
                                <div class="col-md-9">
             <input type="text" class="form-control" name="ar_printing_title"   maxlength="255" required/>                      
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
                                 <label class="col-md-3 control-label">Attributes :</label>
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


