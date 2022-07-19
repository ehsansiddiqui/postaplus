
<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-6"> 
            <?php if (@$location_id != NULL) { ?>

                <div class="block">
                    <h4>EDIT STUDIO LOCATION</h4>
                    <form id="form" role="form" class="form-horizontal" action="<?= site_url('studio_location/update_location/' . @$location_id) ?>" method="post" enctype="multipart/form-data">

                        <div class="panel-body">
                         

<!--                            <div class="form-group">
                                <label class="col-md-3 control-label">Location Name:</label>  
                                <div class="col-md-9">
                                    <input type="text"  maxlength="50"  class="form-control" name="location_name" value="<?= $result[0]->location_name ?>" required/>
                                    <span class="help-block"></span>
                                </div>
                            </div>-->

                            
                            <div class="location">                         
                                             
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Location Name:</label>  
                                        <div class="col-md-9">
          <input class="form-control geocomplete" type="text" name="location_name" placeholder="Type in an address" value="<?= $result[0]->location_name ?>" />
                                         <span class="help-block"></span>
                                        </div>
                                    </div>             
                                             
                                    <fieldset class="details">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Studio Latitude:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="lat" value="<?= $result[0]->locations_latitude ?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>

                                   <div class="form-group">
                                        <label class="col-md-3 control-label">Studio Longitude:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="lng"  value="<?= $result[0]->location_longitude ?>" required/>
                                         <span class="help-block"></span>
                                      </div>
                                    </div>
                                    </fieldset>
                          
                            </div>

                            <input type="hidden"  name="location_id" value="<?= $location_id ?>" required/>







                            <div class="btn-group pull-right">
                                <input type="submit"  name="submit" class="btn btn-primary" value="Save">
                            </div> 


                        </div>                                               
                    </form>

                </div>              



            <?php } else { ?>



                <div class="block">
                    <h4>ADD LOCATION</h4>
                    <form id="form" role="form" class="form-horizontal" action="<?= site_url('studio_location/insert_location') ?>" method="post" enctype="multipart/form-data">

                        <div class="panel-body">

<!--                        <div class="form-group">
                                <label class="col-md-3 control-label">Location Name:</label>  
                                <div class="col-md-9">
                                    <input type="text"  maxlength="50"  class="form-control" name="location_name"  required/>
                                    <span class="help-block"></span>
                                </div>
                            </div>-->
                            
                            

                        <div class="location">                         
                                             
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Location Name:</label>  
                                        <div class="col-md-9">
          <input class="form-control geocomplete" type="text" name="location_name" placeholder="Type in an address" value="" />
                                         <span class="help-block"></span>
                                        </div>
                                    </div>             
                                             
                                    <fieldset class="details">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Studio Latitude:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="lat" value="" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>

                                   <div class="form-group">
                                        <label class="col-md-3 control-label">Studio Longitude:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="lng"  value="" required/>
                                         <span class="help-block"></span>
                                      </div>
                                    </div>
                                    </fieldset>
                          
                        </div> 


                            <div class="btn-group pull-right">
                                <input type="submit"  name="submit" class="btn btn-primary" value="Save">
                            </div> 


                        </div>                                               
                    </form>

                </div>      



            <?php } ?>            

        </div>
    </div>            
</div>