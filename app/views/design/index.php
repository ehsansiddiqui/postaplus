<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META SECTION -->        
        <title>Postaplus Admin </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->        <!-- CSS INCLUDE -->                
        <link rel="stylesheet" type="text/css" id="theme" href="<?= base_url() ?>assets/css/theme-default.css"/>
<!--        <link href="<?= base_url() ?>assets/dist/css/datepicker.min.css" rel="stylesheet" type="text/css">  -->
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>              
<!--          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>-->
<!--    <script src="<?= base_url() ?>assets/dist/js/datepicker.js"></script>
        <script src="<?= base_url() ?>assets/dist/js/i18n/datepicker.en.js"></script>-->
    </head>
    <body>
        <!-- START PAGE CONTAINER -->        
        <div class="page-container">
            <!-- START PAGE SIDEBAR -->            
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->                
                <ul class="x-navigation">
                    <li class="xn-logo">                        
                        <a href="<?= site_url('home') ?>">Postaplus</a>                        
                        <a href="#" class="x-navigation-control"></a>          
                    </li>
                    
                    
                  <?php if($this->session->userdata('admin_groups_id')==1){  ?>
                    
                    
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">                            
                            <img src="<?= base_url() ?>assets/assets/images/users/avatar.jpg" alt="John Doe"/>                                         </a>                        
                        <div class="profile">
                            <div class="profile-image">                               
                                <img src="<?= base_url() ?>assets/assets/images/users/avatar.jpg" alt="John Doe"/>                                          </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo @$page_data->username; ?></div>
                                <div class="profile-data-title">Administrator</div>
                            </div>
                            <div class="profile-controls">
                                <a href="#" class="profile-control-left"><span class="fa fa-info"></span></a>
        <!--<a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>-->      
                            </div>
                        </div>
                    </li>
                    
                    
                    
                    <li <?php if ($this->uri->segment(1) == 'home') { ?> class="active" <?php } ?> >                        
                        <a href="<?php echo site_url('home'); ?>">
                            <span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                                      </li>


                <li <?php if ($this->uri->segment(1) == 'banner') { ?> class="active" <?php } ?> >                        
                        <a href="<?php echo site_url('banner'); ?>">
                            <span class="fa fa-desktop"></span> <span class="xn-text">Banner</span></a>                                     </li>
                             <li <?php if ($this->uri->segment(1) == 'banner_web') { ?> class="active" <?php } ?> >
                          <a href="<?php echo site_url('banner_web'); ?>">
                              <span class="fa fa-desktop"></span> <span class="xn-text">Banner Web</span></a>
                      </li>
                  
                <li <?php if ($this->uri->segment(1) == 'branch') { ?> class="active" <?php } ?> >                        
                        <a href="<?php echo site_url('branch'); ?>">
                            <span class="fa fa-desktop"></span> <span class="xn-text">Branch</span></a>                                     </li>
                        <!--Accountant-->
                <li <?php if ($this->uri->segment(1) == 'accountant') { ?> class="active" <?php } ?> >                        
                        <a href="<?php echo site_url('accountant'); ?>">
                            <span class="fa fa-desktop"></span> <span class="xn-text">Accountant</span></a>                                     </li>
                    <!--Accountant-->
                    <li class="xn-openable  <?php if ($this->uri->segment(1) == 'attributes') { ?> active <?php } ?> ">
                      <a href="#"><span class="fa fa-desktop"></span>Manage attributes</a>
                      <ul>                                    
         <li <?php if ($this->uri->segment(2) == 'attributes_group') { ?> class="active" <?php } ?>><a href="<?php echo site_url('attributes/attributes_group'); ?>"><span class="fa fa-align-center"></span>Attributes Group </a></li>
         
         
            <li <?php if ($this->uri->segment(2) == 'attributes') { ?> class="active" <?php } ?>><a href="<?php echo site_url('attributes/attributes'); ?>"><span class="fa fa-align-center"></span>Attributes</a></li>
                      </ul>                            
                    </li> 
                    
                    
                    
                    
                    <li class="xn-openable  <?php if ($this->uri->segment(1) == 'printing') { ?> active <?php } ?> ">
                      <a href="#"><span class="fa fa-desktop"></span>Manage Priting</a>
                      <ul>                                    
         <li <?php if ($this->uri->segment(2) == 'printing_type') { ?> class="active" <?php } ?>><a href="<?php echo site_url('printing/printing_type'); ?>"><span class="fa fa-align-center"></span>printing Type</a></li>
         
         
            <li <?php if ($this->uri->segment(2) == 'printing') { ?> class="active" <?php } ?>><a href="<?php echo site_url('printing/printing'); ?>"><span class="fa fa-align-center"></span>Priting</a></li>
                      </ul>                            
                    </li>   
                    
                    
                    
                   <li class="xn-openable  <?php if ($this->uri->segment(1) == 'gift') { ?> active <?php } ?> ">
                      <a href="#"><span class="fa fa-desktop"></span>Manage Gift items</a>
                      <ul>                                    
         <li <?php if ($this->uri->segment(2) == 'gift_category') { ?> class="active" <?php } ?>><a href="<?php echo site_url('gift/gift_category'); ?>"><span class="fa fa-align-center"></span>Gift Category </a></li>
         
         
            <li <?php if ($this->uri->segment(2) == 'gift') { ?> class="active" <?php } ?>><a href="<?php echo site_url('gift/gift'); ?>"><span class="fa fa-align-center"></span>Gift items</a></li>
                      </ul>                            
                    </li> 
                    

                    
                    
                     <li <?php if ($this->uri->segment(2) == 'photoprinting') { ?> class="active" <?php } ?> >
                        <a href="<?php echo site_url('photoprinting/photoprinting'); ?>">
                            <span class="fa fa-desktop"></span> 
                            <span class="xn-text">Manage Photo printing</span></a>            
                    </li>
                    
                    
                    
                    
                   <li class="xn-openable  <?php if ($this->uri->segment(1) == 'government_paper') { ?> active <?php } ?> ">
                      <a href="#"><span class="fa fa-desktop"></span>Government Papers</a>
                      <ul>                                    
         <li <?php if ($this->uri->segment(2) == 'government_paper_category') { ?> class="active" <?php } ?>><a href="<?php echo site_url('government_paper/government_paper_category'); ?>"><span class="fa fa-align-center"></span>Category </a></li>
         
         
            <li <?php if ($this->uri->segment(2) == 'government_paper') { ?> class="active" <?php } ?>><a href="<?php echo site_url('government_paper/government_paper'); ?>"><span class="fa fa-align-center"></span>Governmental Paper</a></li>
                      </ul>                            
                    </li> 
                   
                    
                    
                    <li <?php if ($this->uri->segment(1) == 'classs') { ?> class="active" <?php } ?> >
                        <a href="<?php echo site_url('classs'); ?>">
                            <span class="fa fa-desktop"></span>
                            <span class="xn-text">class</span></a>                
                    </li>
                    
                    
                    <li <?php if ($this->uri->segment(1) == 'brand') { ?> class="active" <?php } ?> >
                        <a href="<?php echo site_url('brand'); ?>">
                            <span class="fa fa-desktop"></span>
                            <span class="xn-text">Brand</span></a>                
                    </li>
                    
                    
                    <li <?php if ($this->uri->segment(1) == 'summery') { ?> class="active" <?php } ?> >
                        <a href="<?php echo site_url('summery'); ?>">
                            <span class="fa fa-desktop"></span>
                            <span class="xn-text">Summery</span></a>                
                    </li>
                    
                    
                    <li <?php if ($this->uri->segment(1) == 'offlineservices') { ?> class="active" <?php } ?> >
                        <a href="<?php echo site_url('offlineservices'); ?>">
                            <span class="fa fa-desktop"></span>
                            <span class="xn-text">Offline Services</span></a>                
                    </li>
                    
                    
                <li <?php if ($this->uri->segment(1) == 'order') { ?> class="active" <?php } ?> >
                        <a href="<?php echo site_url('order'); ?>">
                           <span class="fa fa-desktop"></span> 
                          <span class="xn-text">Orders</span></a>
                </li>
                    
                    
                    
                <li class="xn-openable  <?php if ($this->uri->segment(1) == 'report') { ?> active <?php } ?> ">
                          <a href="#"><span class="fa fa-desktop"></span>Report</a>
                      <ul>                                    
         <li <?php if ($this->uri->segment(2) == 'customer_settlement') { ?> class="active" <?php } ?>><a href="<?php echo site_url('report/customer_settlement'); ?>"><span class="fa fa-align-center"></span>sales report </a></li>
                      </ul>                            
                </li> 
                    
                <li <?php if ($this->uri->segment(1) == 'customer') { ?> class="active" <?php } ?> >
                        <a href="<?php echo site_url('customer'); ?>">
                            <span class="fa fa-desktop"></span>
                            <span class="xn-text">Manage Customer</span></a>
                </li>
                
                
                <li <?php if ($this->uri->segment(1) == 'settings') { ?> class="active" <?php } ?> >
                        <a href="<?php echo site_url('settings'); ?>">
                            <span class="fa fa-desktop"></span>
                            <span class="xn-text">Settings</span></a>
                </li>
                    
            
            <?php }else if($this->session->userdata('admin_groups_id')==2){  ?>    
                
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">                            
                            <img src="<?=base_url() ?>branch/<?=$this->session->userdata('branch_image')?>" alt="John Doe"/>                                         </a>                        
                        <div class="profile">
                            <div class="profile-image">                               
                                <img src="<?=base_url() ?>branch/<?=$this->session->userdata('branch_image')?>"/>                                          </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo @$page_data->username; ?></div>
                                <div class="profile-data-title">Branch</div>
                            </div>
                            <div class="profile-controls">
                                <a href="#" class="profile-control-left"><span class="fa fa-info"></span></a>
        <!--<a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>-->      
                            </div>
                        </div>
                    </li>
                    
                    <li <?php if ($this->uri->segment(1) == 'home') { ?> class="active" <?php } ?> >                        
                        <a href="<?php echo site_url('home'); ?>">
                            <span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                                      </li>


                    <li <?php if ($this->uri->segment(1) == 'order') { ?> class="active" <?php } ?> >
                        <a href="<?php echo site_url('order/branch_order'); ?>">
                           <span class="fa fa-desktop"></span> 
                          <span class="xn-text">Orders</span></a>
                    </li>
                  
            <?php }else{ ?>
                     <li class="xn-profile">
                        <a href="#" class="profile-mini">                            
                            <img src="<?=base_url() ?>accountant/<?=$this->session->userdata('branch_image')?>" alt="John Doe"/>                                         </a>                        
                        <div class="profile">
                            <div class="profile-image">                               
                                <img src="<?=base_url() ?>accountant/<?=$this->session->userdata('branch_image')?>"/>                                          </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?php echo @$page_data->username; ?></div>
                                <div class="profile-data-title">Accountant</div>
                            </div>
                            <div class="profile-controls">
                                <a href="#" class="profile-control-left"><span class="fa fa-info"></span></a>
        <!--<a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>-->      
                            </div>
                        </div>
                    </li>
                    
                    <li <?php if ($this->uri->segment(1) == 'home') { ?> class="active" <?php } ?> >                        
                        <a href="<?php echo site_url('home'); ?>">
                            <span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                                      </li>


                    <li <?php if ($this->uri->segment(1) == 'order') { ?> class="active" <?php } ?> >
                        <a href="<?php echo site_url('order/branch_order'); ?>">
                           <span class="fa fa-desktop"></span> 
                          <span class="xn-text">Orders</span></a>
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

                    <!--     
                             <li class="xn-search">
                             <form role="form">
                              <input type="text" name="search" placeholder="Search..."/>                        
                             </form>                    
                             </li>   -->                    

                    <!-- END SEARCH -->                    

                    <!-- SIGN OUT -->

                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                           </li>
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
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>                
                        <strong></strong> <?= $this->session->flashdata('message'); ?> .                
                    </div>
                <?php } ?>                                                                

                <?php if ($this->session->flashdata('message1')) { ?>                                
                    <div class="alert alert-danger" role="alert">            
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>                
                        <strong></strong> <?= $this->session->flashdata('message1'); ?> .                
                    </div>
                <?php } ?> 
                <!--                                
                <div class="page-title">
                <h2><span class="fa fa-arrow-circle-o-left"></span> Basic Tables</h2>               
                </div>
                -->                                                                   
                <?php echo $content_for_layout; ?>                                            
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
                            <a href="<?php echo site_url('login/logout') ?>" class="btn btn-success btn-lg">Yes</a>                            <button class="btn btn-default btn-lg mb-control-close">No</button>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->        
        <audio id="audio-alert" src="<?= base_url() ?>assets/audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="<?= base_url() ?>assets/audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->
        <!-- START SCRIPTS --> 
        <!-- START PLUGINS -->
<!--        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/jquery/jquery.min.js"></script>-->
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/bootstrap/bootstrap.min.js"></script>
        <!-- END PLUGINS --> 
        <!-- START THIS PAGE PLUGINS-->                
        <script type='text/javascript' src='<?= base_url() ?>assets/js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js">
        </script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/scrolltotop/scrolltopcontrol.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/morris/raphael-min.js"></script>
        <!--<script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/morris/morris.min.js"></script>-->  
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/rickshaw/d3.v3.js"></script> 
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='<?= base_url() ?>assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='<?= base_url() ?>assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
        <script type='text/javascript' src='<?= base_url() ?>assets/js/plugins/bootstrap/bootstrap-datepicker.js'></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/owl/owl.carousel.min.js"></script> 
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/daterangepicker/daterangepicker.js"></script>
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
        
        
        
        <?php if ($this->uri->segment(2) == 'new_order'){ ?> 

            <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAbujQ0pvtPOvNYbcx5Uk0fAioTN5HMCVg&amp;libraries=places"></script>
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
            
            
        <?php if ($this->uri->segment(2) == 'edit_order'){ ?> 

            <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAbujQ0pvtPOvNYbcx5Uk0fAioTN5HMCVg&amp;libraries=places"></script>
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

            
        <!-- THIS PAGE PLUGINS -->        
   
           
        
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/codemirror/codemirror.js"></script>        
   <script type='text/javascript' src="<?= base_url() ?>assets/js/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
        <script type='text/javascript' src="<?= base_url() ?>assets/js/plugins/codemirror/mode/xml/xml.js"></script>
        <script type='text/javascript' src="<?= base_url() ?>assets/js/plugins/codemirror/mode/javascript/javascript.js"></script>
        <script type='text/javascript' src="<?= base_url() ?>assets/js/plugins/codemirror/mode/css/css.js"></script>
        <script type='text/javascript' src="<?= base_url() ?>assets/js/plugins/codemirror/mode/clike/clike.js"></script>
        <script type='text/javascript' src="<?= base_url() ?>assets/js/plugins/codemirror/mode/php/php.js"></script>    

        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/summernote/summernote.js"></script>
        <!-- END PAGE PLUGINS -->     
            
            

        <!-- START TEMPLATE -->
                                                                                                                                   <!--        <script type="text/javascript" src="<?= base_url() ?>assets/js/settings.js"></script>-->

        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins.js"></script>                                           <script type="text/javascript" src="<?= base_url() ?>assets/js/actions.js"></script>
<!--  <script type="text/javascript" src="<?= base_url() ?>assets/js/demo_dashboard.js"></script>-->

        <!-- END TEMPLATE -->

        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/bootstrap/bootstrap-select.js"></script>
     <script type='text/javascript' src='<?= base_url() ?>assets/js/plugins/jquery-validation/jquery.validate.js'></script>

        <!-- END SCRIPTS -->          
    </body>
</html>