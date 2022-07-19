<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-6">                        


            <?php if (@$id != NULL) { ?>

                <div class="block">
                    <h4>Edit Printing Type </h4>
                    <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('printing/edit_1_printing_type/'.$id) ?>" method="post">
                        <div class="panel-body">

                        <div class="form-group">
                                <label class="col-md-3 control-label">Print Type Name:</label>  
                                <div class="col-md-9">
                  <input type="text" class="form-control" name="print_type_name"  value="<?=$result->pri_type_name?>"   maxlength="255" required/>
                                </div>
                        </div>
                            
                            
                         <div class="form-group">
                                <label class="col-md-3 control-label">Print Type Name Arabic:</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="print_type_name_ar" value="<?=$result->ar_pri_type_name?>"  maxlength="255" required/>
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
                    <h4>Add Printing Type </h4>
                    <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('printing/add_printing_type') ?>" method="post">
                        <div class="panel-body">
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Print Type Name:</label>  
                                <div class="col-md-9">
    <input type="text" class="form-control" name="print_type_name"   maxlength="255" required/>
                                </div>
                            </div>
                            
                            
                             <div class="form-group">
                                <label class="col-md-3 control-label">Print Type Name Arabic:</label>  
                                <div class="col-md-9">
    <input type="text" class="form-control" name="print_type_name_ar"   maxlength="255" required/>
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