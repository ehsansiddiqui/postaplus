<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-6">                        


            <?php if (@$id != NULL) { ?>

                <div class="block">
                    <h4>Edit Government Paper </h4>
                    <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('government_paper/edit_1_government_paper_category/'.$id) ?>" method="post">
                        <div class="panel-body">

                        <div class="form-group">
                                <label class="col-md-3 control-label">Category Name:</label>  
                                <div class="col-md-9">
                  <input type="text" class="form-control" name="government_paper_category_name"  value="<?=$result->government_paper_cate_name?>"   maxlength="255" required/>
                                </div>
                        </div>
                            
                            
                     <div class="form-group">
                                <label class="col-md-3 control-label">Category Name Arabic:</label>  
                                <div class="col-md-9">
    <input type="text" class="form-control" name="government_paper_category_name_ar" value="<?=$result->ar_government_paper_cate_name?>"  maxlength="255" required/>
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
                    <h4>Add Government Paper </h4>
                    <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('government_paper/add_government_paper_category') ?>" method="post">
                        <div class="panel-body">
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Category Name:</label>  
                                <div class="col-md-9">
    <input type="text" class="form-control" name="government_paper_category_name"   maxlength="255" required/>
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <label class="col-md-3 control-label">Category Name Arabic:</label>  
                                <div class="col-md-9">
    <input type="text" class="form-control" name="government_paper_category_name_ar"   maxlength="255" required/>
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