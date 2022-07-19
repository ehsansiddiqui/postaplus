<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-6">                        


            <?php if (@$id != NULL) { ?>

                <div class="block">
                    <h4>Edit Gift Category </h4>
                    <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('gift/edit_1_gift_category/'.$id) ?>" enctype="multipart/form-data" method="post">
                        <div class="panel-body">

                        <div class="form-group">
                                <label class="col-md-3 control-label">Category Name:</label>  
                                <div class="col-md-9">
                  <input type="text" class="form-control" name="gift_category_name"  value="<?=$result->gift_cate_name?>"   maxlength="255" required/>
                                </div>
                        </div>
                            
                            
                          <div class="form-group">
                                <label class="col-md-3 control-label">Category Arabic Name:</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="gift_category_name_ar" value="<?=$result->ar_gift_cate_name?>"  maxlength="255" dir="rtl"  required/>
                                </div>
                            </div>
                            
                            
                               <div class="form-group">
                                <label class="col-md-3 control-label"></label>  
                                <div class="col-md-9">
                                    
                        <?php if(!empty($result->gift_cate_image)){ ?>            
                        <img src="<?=base_url()?>gift/<?=$result->gift_cate_image?>" width="100" height="50"/> 
                          <?php }else{ ?>
                        <img src="<?=base_url().'assets/images/noimage.png'?>"  width="50" height="50"/>
                        <?php } ?>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Image:</label>  
                                <div class="col-md-9">
                                    <input type="file"  name="userfile"/>
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
                    <h4>Add Gift Category </h4>
                    <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('gift/add_gift_category') ?>" enctype="multipart/form-data" method="post">
                        <div class="panel-body">
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Category Name:</label>  
                                <div class="col-md-9">
    <input type="text" class="form-control" name="gift_category_name"   maxlength="255" required/>
                                </div>
                            </div>
                            
                              <div class="form-group">
                                <label class="col-md-3 control-label">Category Arabic Name:</label>  
                                <div class="col-md-9">
    <input type="text" class="form-control" name="gift_category_name_ar" dir="rtl"  maxlength="255" required/>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Image:</label>  
                                <div class="col-md-9">
                                    <input type="file" name="userfile"  required/>
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