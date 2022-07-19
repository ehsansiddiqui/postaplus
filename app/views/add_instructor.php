
<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-6">                        


            <?php if (@$instructor_id != NULL) { ?>

                <div class="block">
                    <h4>EDIT CLASS INSTRUCTOR</h4>
                    <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('instructor/update_instructor/' . $instructor_id) ?>" method="post" enctype="multipart/form-data">

                        <div class="panel-body">


                            <div class="form-group">
                                <label class="col-md-3 control-label">Instructor Name:</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="instructor_name" value="<?= $result->instructor_name ?>" required/>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Email ID:</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="instructor_email" value="<?= $result->instructor_email ?>" required/>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Contact Number:</label>  
                                <div class="col-md-9">
                                    <input type="number" class="form-control" name="instructor_phone" value="<?= $result->instructor_phone ?>" required/>
                                    <span class="help-block"></span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-9">
                                    <?php if($result->instructor_image == NULL) { ?>
                                     <img src="<?= base_url() ?>assets/assets/images/users/default.jpg" width="100" height="50" />
                                   <?php } else { ?>
                                    <img src="<?= base_url() ?>instructor/<?= $result->instructor_image ?>" width="100" height="50" />
                                   <a href="<?=site_url('instructor/disable_image1/?instructor_id=' .$result->instructor_id)?>" <i class="fa fa-times-circle" aria-hidden="true" title="delete" style="position: absolute;top: -5px;right: 250px;z-index: 96;"></i></a>
                                   
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



                            <div class="form-group">
                                <label class="col-md-3 control-label">Instructor Experience:</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="instructor_experinece" value="<?= $result->instructor_experinece ?>" required/>
                                    <span class="help-block"></span>
                                </div>
                            </div>



<!--                            <div class="form-group">
                                <label class="col-md-3 control-label">Instructor Description:</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="instructor_description" value="<?= $result->instructor_description ?>" required/>
                                    <span class="help-block"></span>
                                </div>
                            </div>-->
                            
                            
                            <div class="form-group">
                                        <label class="col-md-3 control-label">Instructor Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" rows="5" name="instructor_description" required><?= $result->instructor_description ?></textarea>
                                        </div>
                            </div>


                            <!--
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Slots Available:</label>  
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" name="instructor_slot_available" value="<?= $result->instructor_slot_available ?>" required/>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>-->


                            <div class="form-group">
                                <label class="col-md-3 control-label">Price:</label>  
                                <div class="col-md-9">
                                    <input type="number" class="form-control" name="instructor_price_per_hour" value="<?= $result->instructor_price_per_hour ?>" required/>
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
                    <h4>ADD CLASS INSTRUCTOR</h4>
                    <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('instructor/insert_instructor') ?>" method="post" enctype="multipart/form-data">

                        <div class="panel-body">







                            <div class="form-group">
                                <label class="col-md-3 control-label">Instructor Name:</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="instructor_name" required/>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Email ID:</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="instructor_email" required/>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Contact Number:</label>  
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="instructor_phone" required/>
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


                            <div class="form-group">
                                <label class="col-md-3 control-label">Instructor Experience:</label>  
                                <div class="col-md-9">    
                                    <input type="text"  name="instructor_experinece" class="form-control"  required>
                                    <!-- <input type="datetime-local" class="form-control" name="start_time"  required/>-->
                                    <span class="help-block"></span>
                                </div>
                            </div>



<!--                            <div class="form-group">
                                <label class="col-md-3 control-label">Instructor Description:</label>  
                                <div class="col-md-9">    
                                    <input type="text"  name="instructor_description" class="form-control"  required>
                                     <input type="datetime-local" class="form-control" name="start_time"  required/>
                                    <span class="help-block"></span>
                                </div>
                            </div>-->



                              <div class="form-group">
                                        <label class="col-md-3 control-label">Instructor Description</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" rows="5" name="instructor_description" required></textarea>
                                        </div>
                            </div>



                            <!--                                <div class="form-group">
                                                                    <label class="col-md-3 control-label">End Time:</label>  
                                                                    <div class="col-md-9">
                                                                        <input type="datetime-local" class="form-control" name="end_time"  required/>
                                                                     <span class="help-block"></span>
                                                                    </div>
                                                                </div>-->



                            <!--                            <div class="form-group">
                                                            <label class="col-md-3 control-label">Slots Available:</label>  
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" name="instructor_slot_available" required/>
                                                                <span class="help-block"></span>
                                                            </div>
                                                        </div>-->

                            <div class="form-group">
                                <label class="col-md-3 control-label"> Price:</label>  
                                <div class="col-md-9">
                                    <input type="number" class="form-control" name="instructor_price_per_hour" required/>
                                    <span class="help-block"></span>
                                </div>
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
<script type='text/javascript' src='<?= base_url() ?>assets/js/plugins/icheck/icheck.min.js'></script>