<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-6">                        


            <?php if (@$id != NULL) { ?>

                <div class="block">
                    <h4>Edit Governmental Paper</h4>
                    <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('driver/edit_1/' . $id) ?>"  enctype="multipart/form-data" method="post">
                        <div class="panel-body">



                     
                            
                            
                          
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tittle:</label>  
                                <div class="col-md-9">
       <input type="text" class="form-control" name="first_name" value="<?=$result->first_name?>"  maxlength="50" required/>
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <label class="col-md-3 control-label">Price:</label>  
                                <div class="col-md-9">
       <input type="text" class="form-control" name="last_name"  value="<?=$result->last_name?>"  maxlength="50" required/>
                                </div>
                            </div>
                            
                            
   <!--                          <div class="form-group">-->
   <!--                             <label class="col-md-3 control-label">Email ID:</label>  -->
   <!--                             <div class="col-md-9">-->
   <!--<input type="email" class="form-control" name="email_id"  value="<?=$result->email_id?>"  maxlength="50" required/>-->
   <!--                             </div>-->
   <!--                         </div>-->
                            
                            
                            
                         <!--    <div class="form-group">-->
                         <!--               <label class="col-md-3 control-label">Address</label>-->
                         <!--               <div class="col-md-9">-->
                         <!--<textarea class="form-control" rows="5" name="address"><?=$result->address?></textarea>-->
                         <!--               </div>-->
                         <!--    </div>-->
                            
                            
                                      <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-9">
                                    <?php if($result->driver_image == NULL) { ?>
                <img src="<?= base_url() ?>assets/assets/images/users/no-image.jpg" width="50" height="50" />
                
                                   <?php } else { ?>
                
  <img src="<?= base_url() ?>driver/<?= $result->driver_image ?>" width="50" height="50" />
<a href="<?=site_url('driver/disable_image/' .$result->driver_id)?>"<i class="fa fa-times-circle" aria-hidden="true" title="delete" style="position: absolute;top: -5px;right: 250px;z-index: 96;"></i></a>
                                   
                                    <?php } ?>    
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                        <label class="col-md-3 control-label">Image:</label>  
                                        <div class="col-md-9">
                                         <input class="iform-control"  type="file" name="userfile">
                                         <span class="help-block"></span>
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
                    <h4>Add Governmental Paper</h4>
 <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('driver/paper') ?>" enctype="multipart/form-data" method="post">

                        <div class="panel-body">

                            
                     
                            
                            
                           <div class="form-group">
                                 <label class="col-md-3 control-label">Category <small style="color:red">*</small> :</label>
                                    <div class="col-md-9">                                                                  
                     <select class="form-control select" id ="activityx" name="cate_id" data-live-search="true" required> 
                                       <option>Test Category</option>
                                    </select>
                                   </div>
                        </div>
                            
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tittle:</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="first_name"   maxlength="50" required/>
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <label class="col-md-3 control-label">Price:</label>  
                                <div class="col-md-9">
                                    <input type="number" class="form-control" name="last_name"   maxlength="50" required/>
                                </div>
                            </div>
                            
                            
                            <!-- <div class="form-group">-->
                            <!--    <label class="col-md-3 control-label">Email ID:</label>  -->
                            <!--    <div class="col-md-9">-->
                            <!--        <input type="email" class="form-control" name="email_id"   maxlength="50" required/>-->
                            <!--    </div>-->
                            <!--</div>-->
                            
                            
                            
                              <div class="form-group">
                                        <label class="col-md-3 control-label">Description</label>
                                        <div class="col-md-9">
                                            <textarea class="summernote"></textarea>
                                        </div>
                               </div>
                            

                            <!--<div class="form-group">-->
                            <!--            <label class="col-md-3 control-label">Driver licence:</label>  -->
                            <!--            <div class="col-md-9">-->
                            <!--             <input class="iform-control"  type="file" name="userfile1">-->
                            <!--             <span class="help-block">Only jpg, jpeg and png files are allowed.</span>-->
                                         
                            <!--            </div>-->
                            <!--</div>-->
                            
                            
                            <!--  <div class="form-group">-->
                            <!--            <label class="col-md-3 control-label">Driver Resume:</label>  -->
                            <!--            <div class="col-md-9">-->
                            <!--             <input class="iform-control"  type="file" name="userfile2">-->
                            <!--             <span class="help-block">Only jpg, jpeg,png, doc,docx , txt and pdf files are allowed.</span>-->
                            <!--            </div>-->
                            <!--</div>-->
                            

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


