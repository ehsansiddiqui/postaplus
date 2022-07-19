<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-6">                        


            <?php if (@$id != NULL) { ?>

                <div class="block">
                    <h4>Edit Offline Services</h4>
                    <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('product/edit_1/' . $id) ?>" method="post" enctype="multipart/form-data">
                        <div class="panel-body">



                            <div class="form-group">
                                <label class="col-md-3 control-label"> Tittle:</label>  
                                <div class="col-md-9">
<input type="text"  maxlength="50"  class="form-control" name="product_name" value="<?= $result->product_name ?>" required/>
                                    <span class="help-block"></span>
                                </div>
                            </div> 

                            
                            
                             <div class="form-group">
                                <label class="col-md-3 control-label"> Description:</label>  
                                <div class="col-md-9">
<input type="text"  maxlength="50"  class="form-control" name="product_name" value="<?= $result->product_name ?>" required/>
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
                    <h4>Add Offline Services</h4>
 <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('product/add/') ?>" method="post" enctype="multipart/form-data">

                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-md-3 control-label">Tittle :</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="product_name"   maxlength="20" required/>
    <!--                         <span class="help-block">min size = 2, max size = 8</span>-->
                                </div>
                            </div>
                                         
                            
                       <div class="form-group">
                                        <label class="col-md-3 control-label">Description</label>
                                        <div class="col-md-9">
                                            <textarea class="summernote"></textarea>
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


