
<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-6"> 
            <?php if (@$studio_location_id != NULL) { ?>

                <div class="block">
                    <h4>EDIT LOCATION</h4>
                    <form id="form" role="form" class="form-horizontal" action="<?= site_url('studio_location/update_studio_class_location') ?>" method="post" enctype="multipart/form-data">

                        <div class="panel-body">



                            <div class="form-group">
                                <label class="col-md-3 control-label">Location Name:</label>
                                <div class="col-md-9">                                                                            
                                    <select  class="form-control select" name="location_name" data-live-search="true" required>
                                        <?php foreach ($location as $row): ?>
                                            <option value="<?= $row->location_name ?>" <?php if ($result->location_name == $row->location_name) { ?> selected="" <?php } ?> ><?= $row->location_name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>  
                            
                            <div class="location">                         
                                             
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Place:</label>  
                                        <div class="col-md-9">
          <input class="form-control geocomplete" type="text" placeholder="Type in an address" name="place" value="<?= $result->place ?>" />
<!--      <input class="find" type="button" value="find" />-->
                                         <span class="help-block"></span>
                                        </div>
                                    </div>             
                                             
                                    <fieldset class="details">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Latitude:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="lat" value="<?= $result->studio_Latitude ?>" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>

                                   <div class="form-group">
                                        <label class="col-md-3 control-label">Longitude:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="lng"  value="<?= $result->studio_Longitude ?>" required/>
                                         <span class="help-block"></span>
                                      </div>
                                    </div>
                                    </fieldset>
                          
                      </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Phone Number :</label>  
                                <div class="col-md-9">
               <input type="text" class="form-control" name="phone_number" maxlength="15" min="1" value="<?= $result->phone_number ?>" required/>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            
<!--                            <div class="form-group">
                                <label class="col-md-3 control-label">Place :</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="place" value="<?= $result->place ?>" required/>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Latitude:</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="studio_Latitude" value="<?= $result->studio_Latitude ?>" required/>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Longitude:</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="studio_Longitude" value="<?= $result->studio_Longitude ?>" required/>
                                    <span class="help-block"></span>
                                </div>
                            </div>-->

                            <input type="hidden"  name="studio_location_id" value="<?= $studio_location_id ?>" required/>







                            <div class="btn-group pull-right">
                                <input type="submit"  name="submit" class="btn btn-primary" value="Save">
                            </div> 


                        </div>                                               
                    </form>

                </div>              



            <?php } else { ?>
            
           

                <div class="block">
                    <h4>ADD STUDIO LOCATION</h4>
                    <form id="form" role="form" class="form-horizontal" action="<?= site_url('studio_location/insert_studio_class_location') ?>" method="post" enctype="multipart/form-data">

                        <div class="panel-body">






                            <div class="form-group">
                                <label class="col-md-3 control-label">Location Name:</label>
                                <div class="col-md-9">                                                                            
                                    <select  class="form-control select" name="location_name" data-live-search="true" required>
                                        <?php foreach ($location as $row): ?>
                                            <option value="<?= $row->location_name ?>" ><?= $row->location_name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div> 
                            
                              <div class="location">                         
                                             
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Place:</label>  
                                        <div class="col-md-9">
          <input class="form-control geocomplete" type="text" name="place" placeholder="Type in an address" value="" />
<!--      <input class="find" type="button" value="find" />-->
                                         <span class="help-block"></span>
                                        </div>
                                    </div>             
                                             
                                    <fieldset class="details">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Latitude:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="lat" value="" required/>
                                         <span class="help-block"></span>
                                        </div>
                                    </div>

                                   <div class="form-group">
                                        <label class="col-md-3 control-label">Longitude:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="lng"  value="" required/>
                                         <span class="help-block"></span>
                                      </div>
                                    </div>
                                    </fieldset>
                          
                      </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Phone Number :</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="phone_number" maxlength="15" min="1" required/>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            
<!--                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Place :</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="place" required/>
                                    <span class="help-block"></span>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-3 control-label">Latitude :</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="studio_Latitude" required/>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Longitude :</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="studio_Longitude" required/>
                                    <span class="help-block"></span>
                                </div>
                            </div>-->



                            <!--                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">Start Time:</label>  
                                                                    <div class="col-md-9">
                                                                        <input type="datetime-local" class="form-control" name="start_time"  required/>
                                                                     <span class="help-block"></span>
                                                                    </div>
                                                                </div>-->







                            <!--                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">End Time:</label>  
                                                                    <div class="col-md-9">
                                                                        <input type="datetime-local" class="form-control" name="end_time"  required/>
                                                                     <span class="help-block"></span>
                                                                    </div>
                                                                </div>-->






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

<script>
    // Create start date
    var start = new Date(),
            prevDay,
            startHours = 9;

// 09:00 AM
    start.setHours(9);
    start.setMinutes(0);

// If today is Saturday or Sunday set 10:00 AM
    if ([6, 0].indexOf(start.getDay()) != -1) {
        start.setHours(10);
        startHours = 10
    }

    $('#timepicker-actions-exmpl').datepicker({
        timepicker: true,
        language: 'en',
        startDate: start,
        minHours: startHours,
        maxHours: 18,
        onSelect: function (fd, d, picker) {
            // Do nothing if selection was cleared
            if (!d)
                return;

            var day = d.getDay();
            // Trigger only if date is changed
            if (prevDay != undefined && prevDay == day)
                return;
            prevDay = day;
            console.log('updat')
            // If chosen day is Saturday or Sunday when set
            // hour value for weekends, else restore defaults
            if (day == 6 || day == 0) {
                picker.update({
                    minHours: 10,
                    maxHours: 16
                })
            } else {
                picker.update({
                    minHours: 9,
                    maxHours: 18
                })
            }
        }
    })


    $('#timepicker-actions-exmpl1').datepicker({
        timepicker: true,
        language: 'en',
        startDate: start,
        minHours: startHours,
        maxHours: 18,
        onSelect: function (fd, d, picker) {
            // Do nothing if selection was cleared
            if (!d)
                return;

            var day = d.getDay();
            // Trigger only if date is changed
            if (prevDay != undefined && prevDay == day)
                return;
            prevDay = day;
            console.log('updat')
            // If chosen day is Saturday or Sunday when set
            // hour value for weekends, else restore defaults
            if (day == 6 || day == 0) {
                picker.update({
                    minHours: 10,
                    maxHours: 16
                })
            } else {
                picker.update({
                    minHours: 9,
                    maxHours: 18
                })
            }
        }
    })
</script>