
<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-6">                        


            <?php if (@$id != NULL) { ?>

                <div class="block">
                    <h4>Edit Class</h4>
                    <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('classs/edit_1/'. $id) ?>"  enctype="multipart/form-data" method="post">
                        <div class="panel-body">

     
                             
                            <div class="form-group">
                                <label class="col-md-3 control-label">Class Name :</label>  
                                <div class="col-md-9">
             <input type="text" class="form-control" name="class_name" value="<?=$res->class_name?>"  maxlength="255" required/>
                                </div>
                            </div>
                             
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Arabic Class Name :</label>  
                                <div class="col-md-9">
             <input type="text" class="form-control" name="ar_class_name" dir="rtl" value="<?=$res->ar_class_name?>"  maxlength="255" required/>
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
                    <h4>Add Class</h4>
 <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('classs/add') ?>" enctype="multipart/form-data" method="post">

                        <div class="panel-body">

           
                            <div class="form-group">
                                <label class="col-md-3 control-label">Class Name :</label>  
                                <div class="col-md-9">
             <input type="text" class="form-control" name="class_name"   maxlength="255" required/>
                                </div>
                            </div>
                             
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Arabic Class Name :</label>  
                                <div class="col-md-9">
             <input type="text" class="form-control" name="ar_class_name" dir="rtl"  maxlength="255" required/>
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