<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-6">                        


            <?php if (@$id != NULL) { ?>

                <div class="block">
                    <h4>EDIT BANNER</h4>
                    <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('banner/edit_1/' . $id) ?>" method="post" enctype="multipart/form-data">
                        <div class="panel-body">

<!--                        <div class="form-group">
                        <label class="col-md-3 control-label">Shop<small style="color:red">*</small> :</label>
                            <div class="col-md-9">                                                               
                                   <select class="form-control select" name="shop_id" data-live-search="true" required>
                      <?php foreach ($shop as $row): ?>
       <option value="<?=$row->shop_id?>" <?php if($row->shop_id == $result->shop_id){ echo 'selected';}?>><?=$row->shop_name?></option>
                                   <?php endforeach; ?>
                                  </select>
                            </div>
                        </div> -->

                            <div class="form-group">
                                <label class="col-md-3 control-label"><small style="color:red">*</small>Banner Name:</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="shop_banner_name"  value="<?=$result->shop_banner_name?>"  maxlength="255" required/>
                                 <!--    <span class="help-block">min size = 2, max size = 8</span>-->
                                </div>
                            </div>
                            
                            
                            
                             <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-9">
                                    <?php if($result->shop_banner_image == NULL) { ?>
                <img src="<?= base_url() ?>assets/assets/images/users/no-image.jpg" width="50" height="50" />
                
                                   <?php } else { ?>
                
  <img src="<?= base_url() ?>banner/<?= $result->shop_banner_image ?>" width="50" height="50" />
  
<!--<a href="<?=site_url('driver/disable_image/' .$result->driver_id)?>"<i class="fa fa-times-circle" aria-hidden="true" title="delete" style="position: absolute;top: -5px;right: 250px;z-index: 96;"></i></a>-->
                                   
                                    <?php } ?>    
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                        <label class="col-md-3 control-label">Image:</label>  
                                        <div class="col-md-9">
                                         <input class="iform-control"  type="file" name="userfile">
                                         <span class="help-block">Only jpg, jpeg and png files are allowed.</span>
                                        </div>
                            </div>
                             

                            <div class="form-group">
                    <label class="col-md-3 control-label">Banner Description<small style="color:red">*</small>:</label>  
                                <div class="col-md-9">
           <textarea class="form-control" name="shop_banner_description"   maxlength="255" required/><?=$result->shop_banner_description?></textarea>
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
                    <h4>ADD BANNER</h4>
 <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('banner/add') ?>" method="post" enctype="multipart/form-data">

                        <div class="panel-body">
                            
                            
                            
<!--                        <div class="form-group">
                        <label class="col-md-3 control-label">Shop<small style="color:red">*</small> :</label>
                            <div class="col-md-9">                                                               
                                   <select class="form-control select" name="shop_id" data-live-search="true" required>
                      <?php foreach ($shop as $row): ?>
       <option value="<?=$row->shop_id?>"><?=$row->shop_name?></option>
                                   <?php endforeach; ?>
                                  </select>
                            </div>
                        </div> -->

                            <div class="form-group">
                                <label class="col-md-3 control-label">Banner Name<small style="color:red">*</small>:</label>  
                                <div class="col-md-9">
                         <input type="text" class="form-control" name="shop_banner_name"   maxlength="100" required/>
                                 <!--    <span class="help-block">min size = 2, max size = 8</span>-->
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                        <label class="col-md-3 control-label">Image:</label>  
                                        <div class="col-md-9">
                                         <input class="iform-control"  type="file" name="userfile">
                                         <span class="help-block">Only jpg, jpeg and png files are allowed.</span>
                                        </div>
                            </div>

                    <div class="form-group">
                    <label class="col-md-3 control-label">Banner Description<small style="color:red">*</small>:</label>  
                                <div class="col-md-9">
           <textarea class="form-control" name="shop_banner_description"   maxlength="255" required/></textarea>
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
