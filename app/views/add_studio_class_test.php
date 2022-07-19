<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Hypber Admin </title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--        <link rel="icon" href="favicon.ico" type="image/x-icon" />-->
        <!-- END META SECTION -->
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?= base_url() ?>assets/css/theme-default.css"/>
        <link href="<?= base_url() ?>assets/dist/css/datepicker.min.css" rel="stylesheet" type="text/css">  
        <!-- EOF CSS INCLUDE -->
        <style>
            .icon-bk{
                border-radius: 80px;
                text-align: right;
                line-height: 18px;
                padding: 10px 15px;
                box-shadow: 2px 1px 5px 0px rgba(128, 128, 128, 0.37);
                margin-top: -50px;
                background-color: #38AAFE;
                border-color: #38AAFE;
                color: #22262e;
                min-width: 0px;
                cursor: pointer;
                outline: none !important;
            } 

            .bk{
                background-color:#5D61FC;
                border-color: #38AAFE;
            }

        </style>

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>-->

        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">

            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <?php if ($this->session->userdata('admin_groups_id') == 2) { ?>

                        <li class="xn-logo">
                            <a href="<?= site_url('home') ?>">Studio Admin</a>

                            <a href="#" class="x-navigation-control"></a>
                        </li>





                    <?php } else { ?>
                        <li class="xn-logo">
                            <a href="<?= site_url('home') ?>">Super Admin</a>
                            <a href="#" class="x-navigation-control"></a>
                        </li>
                    <?php } ?>
                    <li class="xn-profile">

                        <div class="profile">
                            <?php
                            if ($this->session->userdata('admin_groups_id') == 2) {
                                $query = NULL;
                                $studo_id = $this->session->userdata('studo_ids');

                                if (isset($studo_id)) {
                                    $su_id = explode(",", $studo_id);
                                    $studo_ids = $su_id[0];
                                    $query = $this->db->get_where('studio', array('studio_id' => $studo_ids))->row();
                                }
                                ?>
                                <div class="profile-image">

                                    <?php
                                    if (!empty($this->session->userdata('studio_id'))) {

                                        $q = $this->db->get_where('studio', array('studio_id' => $this->session->userdata('studio_id')))->row();

                                        if (!empty($q->studio_image)) {
                                            ?>
                                            <a href="<?php echo site_url('studio/studio_profile'); ?>" class=""> <img src="<?= base_url() ?>studio/<?= $q->studio_image ?>" alt="John Doe" width="200px" height="100px"/> </a>            

                                        <?php } else { ?>
                                            <a href="<?php echo site_url('studio/studio_profile'); ?>" class=""> <img src="<?= base_url() ?>assets/assets/images/users/default.jpg" alt="John Doe"/> </a>
                                        <?php } ?>

                                    <?php } elseif (!empty($query) && $query->studio_image != NULL) { ?>

                                        <a href="<?php echo site_url('studio/studio_profile'); ?>" class=""> <img src="<?= base_url() ?>studio/<?= $query->studio_image ?>" alt="John Doe" width="200px" height="100px"/> </a>

                                    <?php } else { ?>
                                        <a href="<?php echo site_url('studio/studio_profile'); ?>" class=""> <img src="<?= base_url() ?>assets/assets/images/users/default.jpg" alt="John Doe"/> </a>
                                    <?php } ?>



                                </div>


                            <?php } ?>



                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo @$page_data->username; ?></div>
                                <?php
                                if ($this->session->userdata('admin_groups_id') == 2) {
                                    $sql = "SELECT studio_id,studio_name FROM studio WHERE studio_id IN ($studo_id)";
                                    $studios = $this->db->query($sql)->result();
                                    ?>   
                                    <div class="profile-data-title">Studio Admin</div>
                                    <br>

                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <select style="margin-left: 10px;" id="studio_id">
                                                <?php foreach ($studios as $stu) { ?> 
                                                    <option value="<?= $stu->studio_id ?>" <?php
                                                    if ($this->session->userdata('studio_id') == $stu->studio_id) {
                                                        echo 'selected';
                                                    }
                                                    ?>><?= $stu->studio_name ?></option>
    <?php } ?>
                                            </select>
                                        </div>                                           
                                    </div>

                                    <div id="success"></div>


                                <?php } else { ?>
                                    <div class="profile-data-title"> Administrator</div>
<?php } ?>
                            </div>

                        </div>                                                                        
                    </li>



<?php if ($this->session->userdata('admin_groups_id') == 1) { ?>  



                        <li <?php if ($this->uri->segment(1) == 'home') { ?> class="active" <?php } ?> >
                            <a href="<?php echo site_url('home'); ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
                        </li>


                        <li <?php if ($this->uri->segment(2) == 'location') { ?> class="active" <?php } ?> >
                            <a href="<?php echo site_url('studio_location/location'); ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Location</span></a>    
                        </li>


                        <li <?php if ($this->uri->segment(1) == 'activity_type') { ?> class="active" <?php } ?> >
                            <a href="<?php echo site_url('activity_type'); ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Activity Type</span></a>    
                        </li> 
                        <li <?php if ($this->uri->segment(1) == 'instructor') { ?> class="active" <?php } ?> >
                            <a href="<?php echo site_url('instructor/instructor'); ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Instructors</span></a>    
                        </li>


                        <li <?php if ($this->uri->segment(1) == 'studio') { ?> class="active" <?php } ?> >
                            <a href="<?php echo site_url('studio'); ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Studio</span></a>    
                        </li>

                        <li <?php if ($this->uri->segment(1) == 'studio_user') { ?> class="active" <?php } ?> >
                            <a href="<?php echo site_url('studio_user'); ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Studio User</span></a>    
                        </li>


                        <li <?php if ($this->uri->segment(1) == 'bundle_settings') { ?> class="active" <?php } ?> >
                            <a href="<?php echo site_url('bundle_settings'); ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Bundle Settings</span></a>    
                        </li>


                        <li <?php if ($this->uri->segment(1) == 'class_master') { ?> class="active" <?php } ?> >
                            <a href="<?php echo site_url('class_master'); ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Class Master</span></a>    
                        </li>

                        <li <?php if ($this->uri->segment(1) == 'studio_classes') { ?> class="active" <?php } ?> >
                            <a href="<?php echo site_url('studio_classes'); ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Classes</span></a>    
                        </li>        

                        <li <?php if ($this->uri->segment(1) == 'voucher') { ?> class="active" <?php } ?> >
                            <a href="<?php echo site_url('voucher'); ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Voucher</span></a>    
                        </li> 
                        <li  <?php if ($this->uri->segment(1) == 'booking') { ?> class="xn-openable active" <?php } ?>>

                            <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Booking</span></a>

                            <ul>
                                <li <?php if ($this->uri->segment(2) == 'class_booking') { ?> class="active" <?php } ?>><a href="<?php echo site_url('booking/class_booking'); ?>"><span class="fa fa-image"></span>Class Booking</a></li>
                                <li <?php if ($this->uri->segment(2) == 'bundle_booking') { ?> class="active" <?php } ?>><a href="<?php echo site_url('booking/bundle_booking'); ?>"><span class="fa fa-image"></span>Bundle Booking</a></li>
                            </ul>
                        </li>



                        <li <?php if ($this->uri->segment(1) == 'user_details') { ?> class="active" <?php } ?> >
                            <a href="<?php echo site_url('user_details'); ?>"><span class="fa fa-desktop"></span> <span class="xn-text">User Details</span></a>    
                        </li>



<?php } else { ?>


                        <li <?php if ($this->uri->segment(2) == 'studio_class_location') { ?> class="active" <?php } ?> >
                            <a href="<?php echo site_url('studio_location/studio_class_location'); ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Studio Location</span></a>    
                        </li>


                        <li <?php if ($this->uri->segment(1) == 'activity_type') { ?> class="active" <?php } ?> >
                            <a href="<?php echo site_url('activity_type/studio_class_activity'); ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Activity Type</span></a>    
                        </li> 
                        <li <?php if ($this->uri->segment(2) == 'studio_instructor') { ?> class="active" <?php } ?> >
                            <a href="<?php echo site_url('instructor/studio_instructor'); ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Instructors</span></a>    
                        </li>

                        <li <?php if ($this->uri->segment(1) == 'class_master') { ?> class="active" <?php } ?> >
                            <a href="<?php echo site_url('class_master'); ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Class Master</span></a>    
                        </li>

                        <li <?php if ($this->uri->segment(1) == 'studio_classes') { ?> class="active" <?php } ?> >
                            <a href="<?php echo site_url('studio_classes/studio_class'); ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Classes</span></a>    
                        </li> 



                        <li  <?php if ($this->uri->segment(1) == 'booking') { ?> class="xn-openable active" <?php } ?>>

                            <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Booking</span></a>

                            <ul>

                                <li <?php if ($this->uri->segment(2) == 'user_details_per_studio') { ?> class="active" <?php } ?>><a href="<?php echo site_url('booking/user_details_per_studio'); ?>"><span class="fa fa-image"></span>User Details</a></li>
                                <li <?php if ($this->uri->segment(2) == 'class_booking_per_studio') { ?> class="active" <?php } ?>><a href="<?php echo site_url('booking/class_booking_per_studio'); ?>"><span class="fa fa-image"></span>Class Booking</a></li>



                            </ul>
                        </li>




<?php } ?>

                </ul>
                <!-- END X-NAVIGATION -->
            </div>


            <div class="page-content">

                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    <!--                    <li class="xn-search">
                                            <form role="form">
                                                <input type="text" name="search" placeholder="Search..."/>
                                            </form>
                                        </li>   -->


                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                </ul>




                <ul class="breadcrumb">
                    <!--
                    
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Tables</a></li>
                    <li class="active">Basic</li>
                    
                    -->
                </ul>

<?php if ($this->session->flashdata('message')) { ?>

                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong></strong> <?= $this->session->flashdata('message'); ?>
                    </div>

<?php } ?>



<?php if ($this->session->flashdata('message1')) { ?>

                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong></strong> <?= $this->session->flashdata('message1'); ?>
                    </div>

<?php } ?> 


                <div class="page-content-wrap">                
                    <div class="row">
                        <div class="col-md-6">                        


<?php if (@$id != NULL) { ?>

                                <div class="block">
                                    <h4>EDIT CLASS</h4>
                                    <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('studio_classes/edit_1_class/' . $id) ?>" method="post" enctype="multipart/form-data">

                                        <div class="panel-body">

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Activity Type <small style="color:red">*</small>:</label>
                                                <div class="col-md-9">                                                                            
                                                    <select class="form-control select" name="activity_id" data-live-search="true" required>
                                                        <?php foreach ($activity as $row): ?>
                                                            <option value="<?= $row->activity_id ?>" <?php if ($row->activity_id == $res->activity_id) {
                                                        echo 'selected';
                                                    } ?>><?= $row->activity_name ?></option>
    <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Class Name <small style="color:red">*</small>:</label>
                                                <div class="col-md-9">                                                                            
                                                    <select class="form-control select" name="studio_classes_name" id="classes_name" data-live-search="true" required>
    <?php foreach ($class_master as $row): ?>
                                                            <option value="<?= $row->class_name ?>" <?php if ($row->class_name == $res->studio_classes_name) {
            echo 'selected';
        } ?>><?= $row->class_name ?></option>
    <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Level <small style="color:red">*</small>:</label>
                                                <div class="col-md-9">                                                                            
                                                    <select class="form-control select" name="level_id" data-live-search="true" required>
    <?php foreach ($level as $row): ?>
                                                            <option value="<?= $row->level_id ?>" <?php if ($row->level_id == $res->level_id) {
            echo 'selected';
        } ?>><?= $row->level_name ?></option>
    <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Instructor Name<small style="color:red">*</small> :</label>
                                                <div class="col-md-9">                                                                            
                                                    <select class="form-control select" name="instructor_id" data-live-search="true" required>
    <?php foreach ($instructor as $row): ?>
                                                            <option value="<?= $row->instructor_id ?>" <?php if ($row->instructor_id == $res->instructor_id) {
            echo 'selected';
        } ?>><?= $row->instructor_name ?></option>
    <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Date <small style="color:red">*</small>:</label>  
                                                <div class="col-md-9">             
                                                    <input type='text' name="date" class='form-control datepicker-here' data-language='en' value="<?= date('m/d/Y', strtotime($res->date)) ?>" required=""/> 
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Start Time <small style="color:red">*</small>:</label>
                                                <div class="col-md-5">
                                                    <div class="input-group bootstrap-timepicker">
                                                        <input type="text"  name="start_time" value="<?= $res->start_time ?>"  class="form-control timepicker24"/>
        <!--                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>-->
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-3 control-label">End Time <small style="color:red">*</small>:</label>
                                                <div class="col-md-5">
                                                    <div class="input-group bootstrap-timepicker">
                                                        <input type="text" name="end_time" value="<?= $res->end_time ?>" class="form-control timepicker24"/>
        <!--                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>-->
                                                    </div>
                                                </div>
                                            </div>

                                            <!--                                 <div class="form-group">
                                                                                    <label class="col-md-3 control-label">About</label>
                                                                                    <div class="col-md-9">
                                                                                        <textarea class="form-control" rows="5" name="description"><?= $res->description ?></textarea>
                                                                                    </div>
                                                                            </div>
                                            
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3 control-label">Other Details</label>
                                                                                    <div class="col-md-9">
                                                                                        <textarea class="form-control" rows="5" name="other_details"><?= $res->other_details ?></textarea>
                                                                                    </div>
                                                                                </div>-->

                                            <div id="s"></div>

                                            <br>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Available Slots <small style="color:red">*</small>:</label>  
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="total_available_slots" value="<?= $res->total_available_slots ?>" required/>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div> 



                                            <!--                        <div class="form-group">
                                                                                    <label class="col-md-3 control-label">Booking Cut Off Time:</label>  
                                                                                    <div class="col-md-9">
                                                            <input type="text" class="form-control" name="cutoff_time" value="<?= $res->cutoff_time ?>"  required/>
                                                                                     <span class="help-block"><small>Hours</small></span>
                                                                                    </div>
                                                                    </div> -->


                                            <!--                                    <div class="form-group">
                                                                                    <label class="col-md-3 control-label">Latitude:</label>  
                                                                                    <div class="col-md-9">
                                                   <input type="text" class="form-control" name="class_latitude" value="<?= $res->class_latitude ?>" required/>
                                                                                     <span class="help-block"></span>
                                                                                    </div>
                                                                                </div>
                                            
                                                                               <div class="form-group">
                                                                                    <label class="col-md-3 control-label">Longitude:</label>  
                                                                                    <div class="col-md-9">
                                                   <input type="text" class="form-control" name="class_longitude" value="<?= $res->class_longitude ?>" required/>
                                                                                     <span class="help-block"></span>
                                                                                    </div>
                                                                                </div>-->


                                            <div class="location">                         

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Location:</label>  
                                                    <div class="col-md-9">
                                                        <input class="form-control geocomplete" type="text" placeholder="Type in an address" value="" />
                                              <!--      <input class="find" type="button" value="find" />-->
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>             

                                                <fieldset class="details">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Latitude<small style="color:red">*</small> :</label>  
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="lat" value="<?= $res->class_latitude ?>" required/>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Longitude<small style="color:red">*</small> :</label>  
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="lng"  value="<?= $res->class_longitude ?>" required/>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                            </div>

                                            <!--                                    <div class="form-group">
                                                                                    <label class="col-md-3 control-label">Cancel:</label>
                                                                                    <div class="col-md-9">                                                                                
                                                                                        <select class="form-control select" name="status" data-live-search="true" required>
                                                                                          <option value="1" <?php if ($res->status == 0) {
        echo 'selected';
    } ?>>YES</option>
                                                                                          <option value="0" <?php if ($res->status == 1) {
        echo 'selected';
    } ?>>NO</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>-->



                                            <div class="btn-group pull-right">
                                                <input type="submit"  name="submit" class="btn btn-primary" value="Save">
                                            </div> 


                                        </div>                                               
                                    </form>

                                </div>              



                            <?php } else { ?>

                                <div class="block">
                                    <h4>ADD CLASS</h4>
                                    <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('studio_classes/add_class') ?>" method="post" enctype="multipart/form-data">

                                        <div class="panel-body">

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Activity Type <small style="color:red">*</small> :</label>
                                                <div class="col-md-9">                                                                            
                                                    <select class="form-control select" name="activity_id" data-live-search="true" required>
                                                        <?php foreach ($activity as $row): ?>
                                                            <option value="<?= $row->activity_id ?>"><?= $row->activity_name ?></option>
    <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Class Name <small style="color:red">*</small> :</label>
                                                <div class="col-md-9">                                                              
                                                    <select class="form-control select" name="studio_classes_name" id="classes_name" data-live-search="true" required>
    <?php foreach ($class_master as $row): ?>
                                                            <option value="<?= $row->class_name ?>"><?= $row->class_name ?></option>
    <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>         



                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Level <small style="color:red">*</small> :</label>
                                                <div class="col-md-9">                                                                            
                                                    <select class="form-control select" name="level_id" data-live-search="true" required>
                                                        <?php foreach ($level as $row): ?>
                                                            <option value="<?= $row->level_id ?>"><?= $row->level_name ?></option>
    <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Instructor Name<small style="color:red">*</small>:</label>
                                                <div class="col-md-9">                                                                            
                                                    <select class="form-control select" name="instructor_id" data-live-search="true" required>
    <?php foreach ($instructor as $row): ?>
                                                            <option value="<?= $row->instructor_id ?>" ><?= $row->instructor_name ?></option>
    <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <hr>
                                          
                                            <div class="panel-body dayplan">

                                                <div class="control-group" id="fields">

                                                    <div class="controls_day_plan">
                                                        <div class="entry_day_plan input-group col-sm-12 col-xs-12 ">
                                                            <br>
                                                            <div class="form-group">
                                                                <label for="exampleInputnumber" class="col-md-3 control-label">Date<small style="color:red">*</small> :</label>
                                                                <div class="col-md-9">   
                                                                    <input type="text" name="date[]" class="datepickers form-control form_line_only dateit" placeholder="YYYY-MM-DD" required> 
                                                                    <span class="help-block"></span>
                                                                </div> 
                                                            </div>


                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Start Time <small style="color:red">*</small> :</label>  
                                                                <div class="col-md-9">
                           <input type="text"  name="start_time[]" class="form-control timepicker24" required/>
                                                                    <span class="help-block"></span>
                                                                </div>
                                                            </div> 


                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">End Time<small style="color:red">*</small> :</label>  
                                                                <div class="col-md-9">
                          <input type="text"  name="end_time[]" class="form-control timepicker24" required/>
                                                                    <span class="help-block"></span>
                                                                </div>
                                                            </div>


                                                          
           <button class="btn btn-success  btn-add add_col pull-right" type="button" style="border-radius: 80px;padding: 10px 12px;"><span class="glyphicon glyphicon-plus" style="margin: 0px;"></span></button>
                                                           
                                                            
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <hr>

                                            <div id="s"></div>

                                            <br>           
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Available Slots <small style="color:red">*</small>:</label>  
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="total_available_slots"  required/>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>





                                            <div class="location">                         

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Location:</label>  
                                                    <div class="col-md-9">
                                                        <input class="form-control geocomplete" type="text" placeholder="Type in an address" value="" />
                                              <!--      <input class="find" type="button" value="find" />-->
                                                        <span class="help-block"></span>
                                                    </div>
                                                </div>             

                                                <fieldset class="details">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Latitude <small style="color:red">*</small>:</label>  
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="lat" value="" required/>
                                                            <span class="help-block"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Longitude <small style="color:red">*</small>:</label>  
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

                <script type="text/javascript">
                    $(document).ready(function ()
                    {

                        function getAll() {

                            var e = document.getElementById("classes_name");
                            var classes_name = e.options[e.selectedIndex].value;



                            $.ajax
                                    ({type: "POST",
                                        url: '<?= site_url('studio_classes/get_classes_name') ?>',
                                        data: {classes_names: classes_name},
                                        cache: false,
                                        success: function (r)
                                        {
                                            //alert(r);
                                            //$("#success").val(r);
                                            $("#s").html(r);
                                        }
                                    });
                        }
                        getAll();

                        $("#classes_name").change(function ()
                        {
                            var classes_name = $(this).find(":selected").val();
                            ;

                            $.ajax
                                    ({type: "POST",
                                        url: '<?= site_url('studio_classes/get_classes_name') ?>',
                                        data: {classes_names: classes_name},
                                        cache: false,
                                        success: function (r)
                                        {
                                            // $("#success").val(r);
                                            $("#s").html(r);
                                        }
                                    });
                        })
                    });
                </script>












                <script>

                    var datePickerOption = {
                        showOtherMonths: true,
                        selectOtherMonths: true,
                        dateFormat: "yy-mm-dd",
                        minDate: 0,
                        onSelect: function (selectedDate) {}
                    }

                    $("body").on("focus", ".datepickers", function () {
                        var $context = $(this).parents('.entry_day_plan');
                        $($(this), $context).datepicker({
                            showOtherMonths: true,
                            selectOtherMonths: true,
                            dateFormat: "yy-mm-dd",
                            minDate: 0,
                            onSelect: function (selectedDate) {}
                        });
                    });

                    var count = 0;
                    $(function () {
                        $("body").on('click', '.btn-add', function (e) {
                            e.preventDefault();
                            count++;
                            var controlForm = $('.controls_day_plan:first'),
                                    currentEntry = $(this).parents('.entry_day_plan:first'),
                                    newEntry = $(currentEntry.clone()).appendTo(controlForm);

                            newEntry.find('input.datepickers').val('').attr('id', 'input_' + count).datepicker(datePickerOption);
                            controlForm.find('.entry_day_plan:not(:last) .btn-add')
                                    .removeClass('btn-add').addClass('btn-remove')
                                    .removeClass('btn-success').addClass('btn-danger')
                                    .html('<span class="glyphicon glyphicon-minus" style="margin: 0px;"></span>');
                            newEntry.find(".datepickers").removeClass('hasDatepicker');


                        }).on('click', '.btn-remove', function (e) {
                            $(this).parents('.entry_day_plan:first').remove();
                            e.preventDefault();
                            return false;
                        });
                    });

                </script>



            </div>       

        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="<?php echo site_url('login/logout') ?>" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->


        <script type="text/javascript">
            $(document).ready(function ()
            {

                function getAll() {

                    var e = document.getElementById("studio_id");
                    var studio_id = e.options[e.selectedIndex].value;
                    $.ajax
                            ({type: "POST",
                                url: '<?= site_url('home/set_studio_id') ?>',
                                data: {ids: studio_id},
                                cache: false,
                                success: function (r)
                                {
                                    $("#success").html(r);
                                }
                            });
                }
                getAll();

                $("#studio_id").change(function ()
                {
                    var studio_id = $(this).find(":selected").val();
                    ;

                    $.ajax
                            ({type: "POST",
                                url: '<?= site_url('home/set_studio_id1') ?>',
                                data: {ids: studio_id},
                                cache: false,
                                success: function (r)
                                {
                                    $("#success").html(r);
                                    window.location = window.location;
                                }
                            });
                })
            });
        </script>



        <!-- START PRELOADS -->
        <audio id="audio-alert" src="<?= base_url() ?>assets/audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="<?= base_url() ?>assets/audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  

        <!-- START SCRIPTS -->
<!--    <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/jquery/jquery-ui.min.js"></script>-->
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/bootstrap/bootstrap.min.js"></script>


        <!-- START PLUGINS -->
<!-- <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/jquery/jquery.min.js"></script>-->



        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='<?= base_url() ?>assets/js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/scrolltotop/scrolltopcontrol.js"></script>

        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/morris/raphael-min.js"></script>
<!--        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/morris/morris.min.js"></script>       -->
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='<?= base_url() ?>assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='<?= base_url() ?>assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
<!--        <script type='text/javascript' src='<?= base_url() ?>assets/js/plugins/bootstrap/bootstrap-datepicker.js'></script>                -->
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/owl/owl.carousel.min.js"></script>                 
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/moment.min.js"></script>
<!--        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/daterangepicker/daterangepicker.js"></script>-->
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
        <!-- END THIS PAGE PLUGINS-->   





        <!-- START THIS TABLE PLUGINS-->        
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/tableexport/tableExport.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/tableexport/jquery.base64.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/tableexport/html2canvas.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/tableexport/jspdf/libs/sprintf.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/tableexport/jspdf/jspdf.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/tableexport/jspdf/libs/base64.js"></script>        
        <!--         END THIS TABLE PLUGINS -->




<?php if ($this->uri->segment(1) == 'studio_classes' && $this->uri->segment(2) == 'add_class') { ?> 

            <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
          <!--   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
            <script src="<?= base_url() ?>assets/jquery.geocomplete.js"></script>
            <script>
            $(function () {
                $(".geocomplete").geocomplete({
                    details: ".details",
                    detailsScope: '.location',
                    types: ["geocode", "establishment"],
                });

                $(".find").click(function () {
                    $(this).parents(".location").find(".geocomplete").trigger("geocode");
                });
            });
            </script>
<?php } ?>



        <!-- START TEMPLATE -->
<!--        <script type="text/javascript" src="<?= base_url() ?>assets/js/settings.js"></script>-->
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins.js"></script>        
        <script type="text/javascript" src="<?= base_url() ?>assets/js/actions.js"></script>
<!--        <script type="text/javascript" src="<?= base_url() ?>assets/js/demo_dashboard.js"></script>-->

        <!-- END TEMPLATE -->
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type='text/javascript' src='<?= base_url() ?>assets/js/plugins/jquery-validation/jquery.validate.js'></script>  
        <!-- END SCRIPTS -->

    </body>
</html>