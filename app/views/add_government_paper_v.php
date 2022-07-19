
<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-6">                        


            <?php if (@$id != NULL) { ?>

                <div class="block">
                    <h4>Edit Government Paper</h4>
                    <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('government_paper/edit_1_government_paper/'.$id) ?>"  enctype="multipart/form-data" method="post">
                        <div class="panel-body">

                           
                                 <div class="form-group">
                                 <label class="col-md-3 control-label">Category <small style="color:red">*</small> :</label>
                                 <div class="col-md-9"> 
           <select   class="form-control select" id ="activityx" name="government_paper_category_id" data-live-search="true" required>       
                     <?php if(!empty($government_paper_category)){ foreach ($government_paper_category as $row):  ?>
            <option value="<?=$row->government_paper_category_id?>" <?php if($row->government_paper_category_id == $res->government_paper_category_id){ echo 'selected'; }  ?>><?=ucfirst($row->government_paper_cate_name)?></option> 
                        <?php endforeach; }?>                    
           </select>
                                    </div>
                                    </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tittle :</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="government_paper_title" value="<?=$res->government_paper_title?>"  maxlength="255" required/>
  
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tittle Arabic:</label>  
                                <div class="col-md-9">
<!--                                    <textarea class="form-control" name="government_paper_description" maxlength="255"><?=$res->government_paper_description?></textarea>   
                                    -->
                                    
         <input type="text" class="form-control" name="government_paper_title_ar" value="<?=$res->ar_government_paper_title?>"  maxlength="255" required/>
         
                                    
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
                    <h4>Add Government Paper</h4>
 <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('government_paper/add_government_paper') ?>" enctype="multipart/form-data" method="post">

                        <div class="panel-body">

                            
                                 <div class="form-group">
                                 <label class="col-md-3 control-label">Category <small style="color:red">*</small> :</label>
                                 <div class="col-md-9"> 
           <select   class="form-control select" id ="activityx" name="government_paper_category_id" data-live-search="true" required>       
                     <?php if(!empty($government_paper_category)){ foreach ($government_paper_category as $row):  ?>
            <option value="<?=$row->government_paper_category_id?>"><?=ucfirst($row->government_paper_cate_name)?></option> 
                        <?php endforeach; }?>                    
           </select>
                                    </div>
                                    </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tittle :</label>  
                                <div class="col-md-9">
             <input type="text" class="form-control" name="government_paper_title"   maxlength="255" required/>
  
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tittle Arabic:</label>  
                                <div class="col-md-9">
        <input type="text" class="form-control" name="government_paper_title_ar"   maxlength="255" required/>                            
<!--   <textarea class="form-control" name="government_paper_title_ar"></textarea>                        -->
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


