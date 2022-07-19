<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Hypber Admin </title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        <!-- CSS INCLUDE -->  
                   <link href="<?=base_url()?>assets/dist/css/datepicker.min.css" rel="stylesheet" type="text/css">  
        <link rel="stylesheet" type="text/css" id="theme" href="<?=base_url()?>assets/css/theme-default.css"/>
        
     
<!--           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>-->
  

        <!-- EOF CSS INCLUDE -->     
        
        <style>
            .icon-bk{
    border-radius: 80px;
    text-align: right;
    line-height: 18px;
    padding: 10px 15px;
    box-shadow: 2px 1px 5px 0px rgba(128, 128, 128, 0.37);
    margin-top: -50px;
    background-color: #ffb606;
    border-color: #ffb606;
    min-width: 0px;
    cursor: pointer;
    outline: none !important;
            }      
        </style>
          
<!--        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>-->
        
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
             
                      <script src="<?=base_url()?>assets//dist/js/datepicker.js"></script>
           <script src="<?=base_url()?>assets//dist/js/i18n/datepicker.en.js"></script>
    
        
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="<?=site_url('home')?>">Hypber Admin</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="<?=base_url()?>assets/assets/images/users/avatar.jpg" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="<?=base_url()?>assets/assets/images/users/avatar.jpg" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo @$page_data->username;?></div>
                                <div class="profile-data-title">Administrator</div>
                            </div>
                            <div class="profile-controls">
                                <a href="#" class="profile-control-left"><span class="fa fa-info"></span></a>
<!--               <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>-->
                            </div>
                        </div>                                                                        
                    </li>
                    

                    <li <?php if($this->uri->segment(1) =='home'){ ?> class="active" <?php } ?> >
                        <a href="<?php echo site_url('home');?>"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
                    </li>
                    
                    

                    
<!--              <li <?php if($this->uri->segment(1) =='banner'){ ?> class="active" <?php } ?> >
 <a href="<?php echo site_url('banner');?>"><span class="fa fa-desktop"></span> <span class="xn-text">Banner</span></a> 
              </li>    -->
                    
             
                <li <?php if($this->uri->segment(1) =='activity_type'){ ?> class="active" <?php } ?> >
  <a href="<?php echo site_url('activity_type');?>"><span class="fa fa-desktop"></span> <span class="xn-text">Activity Type</span></a>    
               </li>            
                    
       <li <?php if($this->uri->segment(1) =='studio'){ ?> class="active" <?php } ?> >
      <a href="<?php echo site_url('studio');?>"><span class="fa fa-desktop"></span> <span class="xn-text">Studio</span></a>    
                </li>
         
     
                <li <?php if($this->uri->segment(1) =='packages'){ ?> class="active" <?php } ?> >
      <a href="<?php echo site_url('packages');?>"><span class="fa fa-desktop"></span> <span class="xn-text">Packages</span></a>    
                </li>       


                <li <?php if($this->uri->segment(1) =='studio_classes'){ ?> class="active" <?php } ?> >
      <a href="<?php echo site_url('studio_classes');?>"><span class="fa fa-desktop"></span> <span class="xn-text">Classes</span></a>    
                </li>        

                    
                <li  <?php if($this->uri->segment(1) =='booking'){ ?> class="xn-openable active" <?php } ?>>
                    
                <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Booking</span></a>
                        
                <ul>
   
                 <li <?php if($this->uri->segment(2) =='package_booking'){ ?> class="active" <?php } ?>><a href="<?php echo site_url('booking/package_booking'); ?>"><span class="fa fa-image"></span>Package Booking </a></li> 
                 <li <?php if($this->uri->segment(2) =='class_booking'){ ?> class="active" <?php } ?>><a href="<?php echo site_url('booking/class_booking'); ?>"><span class="fa fa-image"></span>Class Booking</a></li>
                 <li <?php if($this->uri->segment(2) =='instructor_booking'){ ?> class="active" <?php } ?>><a href="<?php echo site_url('booking/instructor_booking'); ?>"><span class="fa fa-image"></span>Instructor Booking</a></li>
                 <li <?php if($this->uri->segment(2) =='bundle_booking'){ ?> class="active" <?php } ?>><a href="<?php echo site_url('booking/bundle_booking'); ?>"><span class="fa fa-image"></span>Bundle Booking</a></li>
                 <li <?php if($this->uri->segment(2) =='bundle_booking_studios'){ ?> class="active" <?php } ?>><a href="<?php echo site_url('booking/bundle_booking_studios'); ?>"><span class="fa fa-image"></span>Bundle Booking Studios </a></li>
                  
                  <!-- 
                    <li class="xn-openable">
                         <a href="#"><span class="fa fa-clock-o"></span> Timeline</a>
                        <ul>
                  <li><a href="pages-timeline.html"><span class="fa fa-align-center"></span> Default</a></li>
                  <li><a href="pages-timeline-simple.html"><span class="fa fa-align-justify"></span> Full Width</a></li>
                        </ul>
                    </li> -->
                </ul>
               </li>
      
               
               
            <li <?php if($this->uri->segment(1) =='user_details'){ ?> class="active" <?php } ?> >
      <a href="<?php echo site_url('user_details');?>"><span class="fa fa-desktop"></span> <span class="xn-text">User Details</span></a>    
            </li>
      
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
<!--                    <li><a href="#">Home</a></li>
                    <li><a href="#">Tables</a></li>
                    <li class="active">Basic</li>-->
                </ul>
    
                <?php if($this->session->flashdata('message')){ ?>
                
                <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong></strong> <?=$this->session->flashdata('message');?> .
                </div>
                
                <?php } ?>
                
                
                
                <?php if($this->session->flashdata('message1')){ ?>
                
                <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong></strong> <?=$this->session->flashdata('message1');?> .
                </div>
                
               <?php } ?> 
            
                
                                                          <div class="block">
       <h4>ADD CLASS</h4>
     <form id="form" role="form" class="form-horizontal" action="<?php echo site_url('studio_classes/add') ?>" method="post" enctype="multipart/form-data">
                                
                                <div class="panel-body">
                                    
                
            <input type="text" id="timepicker-actions-exmpl">
            
            
            <script>// Create start date
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
        if (!d) return;

        var day = d.getDay();
        // Trigger only if date is changed
        if (prevDay != undefined && prevDay == day) return;
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
})</script>
            
                                </div>
     </form>
                                                          </div>

