<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-6">                        


                <div class="block">
                    <h4>Add Gift Categories</h4>
 <form id="jvalidate" role="form" class="form-horizontal" action="<?php echo site_url('vehicle/category')?>" enctype="multipart/form-data" method="post">

                        <div class="panel-body">

                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Tittle :</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="vehicle_name"   maxlength="20" required/>
    <!--                         <span class="help-block">min size = 2, max size = 8</span>-->
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Description:</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="vehicle_type"   maxlength="50" required/>
                                </div>
                            </div>
                            
                            
  
                            <div class="btn-group pull-right">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                            </div>                                                                                                                          
                        </div>                                               

                    </form>
                </div>
 

        </div>
    </div>            
</div>
