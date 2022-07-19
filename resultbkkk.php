<?php

 if(isset($_GET['result'])&&!empty($_GET['result'])){

    ob_start();
    include('index.php');
    ob_end_clean();
    $CI =& get_instance();
    $CI->load->library('session'); 
    $CI->load->helper(array('form', 'url'));
    if(!$CI->session->userdata('user_id')){
       redirect(base_url()); 
    }
    $CI->load->database();
    $gift_category = $CI->db->get_where('gift_category', array('gift_category_status'=>1))->result();
    
?>
<!DOCTYPE php>
<html dir="ltr" lang="en-US">
    <head>

        <meta http-equiv="content-type" content="text/php; charset=utf-8" />
        <meta name="author" content="Amer Salloum - SPlus Kuwait" />
        <!-- Stylesheets
        ============================================= -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i"
              rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/style.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/swiper.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/dark.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/font-icons.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/animate.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/magnific-popup.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/responsive.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/colors.css" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:image" content="http://www.postastc.com/Posta-Logo.jpg" />
        <link rel="mask-icon" sizes="any" href="<?=base_url()?>assets/web/favicon-32x32.png" />
        <link rel="icon" type="image/png" href="<?=base_url()?>assets/web/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="<?=base_url()?>assets/web/favicon-16x16.png" sizes="16x16" />
        <!-- Document Title
        ============================================= -->
        <title>Posta Plus - Printing Office (Student Center)</title>
        <style>
            #header {
                background-color: #FFF !important;
                /*ea7f1d*/
            }
            #primary-menu li {

                border-bottom: solid 1px #b96518;
                overflow: hidden;
            }
            #primary-menu a {

                margin: 20px 20px;
            }
            #primary-menu li:after {}
            #primary-menu li.active {
                background-color: #ea7f1d !important;
            }
            #primary-menu li.active a {
                color: #FFF !important;
            }

            #primary-menu li:hover {
                background-color: #ea7f1d !important;
                color: #FFF !important;
            }

            #primary-menu li:hover a {
                color: #FFF !important;
            }

            .side-header #primary-menu ul li {
                float: none;
                margin: 0;
            }

            .side-header #logo:not(.nobottomborder)::after,
            .side-header #primary-menu:not(.nobottomborder)::after {
                border-bottom: none !important;
            }

            .d-lg-block {

                position: fixed;
                bottom: 0;
            }

            .side-header #header {
                border-right: none;
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.065);
            }

            #logo img {
                padding: 0 20px;
            }

            .homepageicon {}

            .homepageicon:before {
                font-family: 'font-icons';
                content: "\e6d0";
                font-style: normal;
                font-weight: normal;
                position: absolute;
                font-size: 80px;
                color: #bebebe;
                opacity: 0.2;
                right: 0px;
                top: 20px;
                z-index: 1;

                max-height: 100%;

            }

            .abouticon:before {
                font-family: 'font-icons';
                content: "\e710";
                font-style: normal;
                font-weight: normal;
                position: absolute;
                font-size: 80px;
                color: #bebebe;
                opacity: 0.2;
                right: 0px;
                top: 20px;
                z-index: 1;

                max-height: 100%;

            }

            .servicesicon:before {
                font-family: 'font-icons';
                content: "\e6ce";
                font-style: normal;
                font-weight: normal;
                position: absolute;
                font-size: 80px;
                color: #bebebe;
                opacity: 0.2;
                right: 0px;
                top: 20px;
                z-index: 1;

                max-height: 100%;

            }
            
            .servicesicon2:before{
                font-family: 'font-icons';
                content: "\e72f";  
                font-style: normal;
                font-weight: normal; 
                position: absolute;
                font-size: 80px;
                color: #bebebe;
                opacity:0.2;
                right:0px;
                top:20px;  
                z-index: 1;
                max-height: 100%;

            }

            .locationsicon:before {
                font-family: 'font-icons';
                content: "\e7c2";
                font-style: normal;
                font-weight: normal;
                position: absolute;
                font-size: 80px;
                color: #bebebe;
                opacity: 0.2;
                right: 0px;
                top: 20px;
                z-index: 1;
                max-height: 100%;

            }

            .contacticon:before {
                font-family: 'font-icons';
                content: "\e748";
                font-style: normal;
                font-weight: normal;
                position: absolute;
                font-size: 80px;
                color: #bebebe;
                opacity: 0.2;
                right: 0px;
                top: 20px;
                z-index: 1;

                max-height: 100%;

            }

            #primary-menu ul li a:before {
                color: #bebebe;
            }

            #primary-menu ul li.active a:before {
                color: #dedede;
            }

            #primary-menu ul li:hover a:before {
                color: #bebebe;
            }
            
            @media only screen and (max-width: 600px){
                .fbox-media{
                    margin-bottom: 0px !important;
                }
                .feature-box.media-box p{
                    margin-top:0px !important;
                }
                .feature-box {
                    box-shadow: #dedede 1px 1px 8px;

                }
                .fbox-desc{
                    padding:10px;
                }
            }
            .fbox-desc h3{
                color: #333333;
                font-size:18px;
            }
            .fbox-desc p{
                color: #444;
            }

            
            .service-box:hover {
                background-color: transparent;
                border: 5px solid #E87D1E;
            }
            .service-box:hover .st0{
                fill:#E87D1E;
            }
            
            .st0{
                fill:#fff;
            }
            .st0:hover{
                fill:#E87D1E;
            }

                        /* Extra small devices (phones, 600px and down) */
           @media only screen and (max-width: 600px) {
           .service-box{
                border: none;
                background-color: #E87D1E; 
                border-radius: 10px;
                height: 100px;
                max-width: 90%;
                margin-left: auto;
                margin-right: auto;
            }
               
               .service-box svg{
                position: absolute;
                height: 60px;
                width:60px;  
                left:50%;
                margin-left:-50px; 
                margin-top:25px;

            }
           }

           /* Small devices (portrait tablets and large phones, 600px and up) */
           @media only screen and (min-width: 600px) {
           .service-box{
                border: none;
                background-color: #E87D1E; 
                border-radius: 10px;
                height: 100px;
                max-width: 90%;
                margin-left: auto;
                margin-right: auto;
            }
               
               .service-box svg{
                position: absolute;
                height: 60px;
                width:60px;  
                left:50%;
                margin-left:-50px; 
                margin-top:25px;

            }
           }

           /* Medium devices (landscape tablets, 768px and up) */
           @media only screen and (min-width: 768px) {
           
           }

           /* Large devices (laptops/desktops, 992px and up) */
           @media only screen and (min-width: 992px) {
           .service-box{
                border: none;
                background-color: #E87D1E; 
                border-radius: 10px;
                height: 140px;
                max-width: 90%;
                margin-left: auto;
                margin-right: auto;
            }
               
               .service-box svg{
                position: absolute;
                height: 80px;
                width:80px;  
                left:50%;
                margin-left:-50px; 
                margin-top:25px;

            }
           }

           /* Extra large devices (large laptops and desktops, 1200px and up) */
           @media only screen and (min-width: 1200px) {
           .service-box{
                border: none;
                background-color: #E87D1E; 
                border-radius: 10px;
                height: 177px;
                max-width: 90%;
                margin-left: auto;
                margin-right: auto;
            }
               .service-box svg{
                position: absolute;
                height: 110px;
                width:110px;  
                left:50%;
                margin-left:-50px; 
                margin-top:25px;

            }
           }
           
                       .footerfixed {
                position:fixed !important; 
                bottom:0;     
                width: calc(100% - 260px);
                width: -moz-calc(100% - 260px);
                width: -webkit-calc(100% - 260px);
            }
            @media only screen and (max-width: 990px) {
                .footerfixed {
                    position:fixed !important; 
                    bottom:0px;
                    width: 100% !important; 
                }
            }
            .label{
                margin-top:10px;
            }
            .divDevider{
                margin-left:auto; 
                margin-right:auto; 
                width:100%; 
                max-width:100%; 
                margin-top:30px; 
                border:1px solid #ccc; 
                border-radius: 10px; 
                box-shadow: #ddd 0px 5px 5px; 
            }
            
        #overlay {
                background: rgba(0,0,0,0.5);
                color: #666666;
                position: fixed;
                height: 100%;
                width: 100%;
                z-index: 5000;
                top: 0;
                left: 0;
                float: left;
                text-align: center;
                padding-top: 25%;
            }

            
            
        </style>
        <link rel="stylesheet" href="<?=base_url()?>assets/sweetalert.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/services.css" type="text/css" />
        <script src="<?=base_url()?>assets/web/js/jquery.js"></script>
    </head>

    <body class="stretched side-header" data-loader="2" data-animation-in="fadeIn" data-speed-in="1500" data-animation-out="fadeOut"
          data-speed-out="800" data-loader-color="ea7f1d">

          <div id="overlay" style='display:none'>
                    <img src="<?=base_url()?>loader.gif" alt="Loading" /><br/>
                    Loading...
          </div> 

        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="login-pop" tabindex="-1" role="dialog" aria-labelledby="login-popLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="login-popLabel"> Login </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <form class="default-form" id="login-form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="number" name="phone_number" class="form-control" id="exampleFormControlInput1" maxlength="15" placeholder="Phone number" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="exampleFormControlInput1" maxlength="255" placeholder="Password">
                            </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                        </form>

                   </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="registration-pop" tabindex="-1" role="dialog" aria-labelledby="registration-popLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registration-popLabel"> Registration </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="default-form" id="login-registration" method="post" enctype="multipart/form-data">
                            
                            <div class="form-group">
    <input type="number" name="phone_number" class="form-control" id="phone_number" placeholder="Phone Number" required="" maxlength="15">
                            </div>
                            
                            <div class="form-group">
   <input type="password" name="password" class="form-control" id="password" placeholder="Password" required="">
                            </div>
                            
    
                            <div class="form-group">
    <input type="email" name="email_id" class="form-control" id="email_id" placeholder="Email" required="">
                            </div>
                    
                            <div class="form-group">
    <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Name">
                            </div>
                    
                     <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                    
                        </form>
                    </div>

                </div>
            </div>
        </div>



        <div class="user-section">
            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    My Account
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    
                    <?php if($CI->session->userdata('user_id')){ ?>
                    
                    <div class="user_acc_wrapper">
                        <div class="user_icon">
                            <?php if(!empty($CI->session->userdata('image'))){ ?>
                 <img src="<?=base_url()?>user/<?=$CI->session->userdata('image')?>" alt="" width="80" height="80">
                            <?php }else{ ?>
                            <img src="https://dummyimage.com/80x80/000/fff" alt="">
                            <?php } ?>
                        </div>
                        <h3><?=$CI->session->userdata('full_name')?></h3>
                        <p><?=$CI->session->userdata('email_id')?></p>
                    </div>
                    
                    
                    <a href="<?=site_url('profile')?>" class="dropdown-item <?php if ($CI->uri->segment(1) == 'profile') { ?> active <?php } ?>"> My Account </a>
                    <a href="<?=site_url('myorder')?>" class="dropdown-item <?php if ($CI->uri->segment(1) == 'myorder') { ?> active <?php } ?>">  My Orders </a>
                    <a href="<?=site_url('login/logout')?>" class="dropdown-item"> Logout </a>
                    
                    <?php }else{ ?>
<!--                <button class="dropdown-item" type="button"> Share with friends </button>
                    <button class="dropdown-item" type="button"> Leave Feedback </button>
                    <button class="dropdown-item" type="button"> Rate us on play Store </button>-->
           <button class="dropdown-item" type="button" data-toggle="modal" data-target="#login-pop"> Login </button>
           <button class="dropdown-item" type="button" data-toggle="modal" data-target="#registration-pop"> Registration
                    <?php } ?>
                    </button>

                </div>
            </div>
        </div>


        <!-- Document Wrapper
        ============================================= -->
        <div id="wrapper" class="clearfix">

            <!-- Header
        ============================================= -->
            <header id="header" class="no-sticky ">

                <div id="header-wrap">

                    <div class="container clearfix" style="padding: 0 !important;">

                        <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                        <!-- Logo
        ============================================= -->
                        <div id="logo" class="nobottomborder" style="">
                            <a href="<?=base_url()?>" class="standard-logo" data-dark-logo="../images/logo-en.svg"><img src="<?=base_url()?>assets/web/images/logo-colored-en.svg"
                                                                                                                   alt="Posta Plus Logo"></a>
                            <a href="<?=base_url()?>" class="retina-logo" data-dark-logo="../images/logo-en.svg"><img src="<?=base_url()?>assets/web/images/logo-colored-en.svg"
                                                                                                                 alt="Posta Plus Logo"></a>
                        </div><!-- #logo end -->

                        <div class="col_full center">
<!--                            <a href="../ar/index.html" style="color:#444; font-size:20px;">عربي</a>-->
                        </div>
                        <!-- Primary Navigation
        ============================================= -->
                        <nav id="primary-menu" class="">

                            <ul>
                                <li <?php if ($CI->uri->segment(1) == '') { ?> class="active"<?php } ?>>
                                    <a href="<?=base_url()?>" class="homepageicon">
                                        <div>Home</div>
                                    </a></li>
                                    
                                    
                                <li <?php if ($CI->uri->segment(1) == 'about') { ?> class="active"<?php } ?>>
                                    <a href="<?=site_url('about')?>" class="abouticon">
                                        <div>About</div>
                                    </a> 
                                </li>
                                
                                <li <?php if ($CI->uri->segment(1) == 'online_services') { ?> class="active"<?php } ?>>
                                    <a href="<?=site_url('online_services')?>" class="servicesicon2">
                                        <div>All Services</div>
                                    </a> 
                                </li>
                                
    <!--		<li><a href="services.html" class="servicesicon">
                              <div>Services</div>
                             </a>
    </li>-->
                            <li class="dd_menu_cover<?php if ($CI->uri->segment(1) == 'services') { ?> active <?php } ?>">
                                    
                                    <a href="<?=site_url('services')?>" class="servicesicon">
                                        <div>Online Services</div>
                                    </a>
                                    
                                    
                                    <div class="dd_menu" >
                                        <ol>
                                            <li>
                                                <?php if($CI->session->userdata('user_id')){ ?>
                                                <a href="<?=site_url('printing');?>"> Printing </a>
                                                <?php }else{ ?>
                                                <a href="<?=site_url('login?page=printing');?>"> Printing </a>
                                                <?php } ?>
                                            </li>
                                            <li>
               <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    Gift </a>
                                            <div class="collapse" id="collapseExample">
                                   <?php foreach ($gift_category as $row): ?> 
                                  <?php if($CI->session->userdata('user_id')){ ?>                 
     <a class="sub-in-list" href="<?=site_url('gift?category_id='.$row->gift_category_id)?>"><?=$row->gift_cate_name;?></a>
                                      <?php }else{ ?>
        <a class="sub-in-list" href="<?=site_url('login?page=gift?category_id='.$row->gift_category_id);?>"> <?=$row->gift_cate_name;?> </a>
                                        <?php } ?>
     
                                   <?php endforeach;?>        
                                            </div>
                                                
                                            </li>
                                            <li>
                                           <?php if($CI->session->userdata('user_id')){ ?>
                                            <a href="<?=site_url('government_pappers')?>"> Government Pappers </a>
                                            <?php }else{ ?>   
                                   <a href="<?=site_url('login?page=government_pappers');?>"> Government Pappers </a>   
                                               <?php } ?>
                                            </li>
                                            <li>
                                               
                                                 <?php if($CI->session->userdata('user_id')){ ?>
                                                <a href="<?=site_url('photo_printing')?>"> Photo Printing </a>
                                                <?php }else{ ?> 
                                    <a href="<?=site_url('login?page=photo_printing');?>"> photo Printing </a>
                                                 <?php } ?>
                                                
                                            </li>
                                            <li>
                                                 <?php if($CI->session->userdata('user_id')){ ?>
                                                <a href="<?=site_url('summery')?>"> Summery </a>
                                                  <?php }else{ ?> 
                                    <a href="<?=site_url('login?page=summery');?>"> Summery </a>
                                                 <?php } ?>
                                            </li>
<!--                                            <li>
                                                <a data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
                                                    Others </a>
                                                <div class="collapse " id="collapseExample1">
                                                   
                    <?php if(!empty($other)){  foreach ($other as $oth){ ?>                                  
                    <a class="sub-in-list" href="<?=site_url('other?id='.$oth->others_id)?>"><?=$oth->others_tittle?></a>
                    <?php } } ?>
                     
                                                </div>
                                            </li>-->
                                        </ol>


                                    </div>
                                </li>

   
                                <li <?php if ($CI->uri->segment(1) == 'branch') { ?> class="active"<?php } ?>>
                                    <a href="<?=site_url('branch')?>" class="locationsicon">
                                        <div>Branches</div>
                                    </a> 
                                </li>
                                
                                
                                <li <?php if ($CI->uri->segment(1) == 'contact') { ?> class="active"<?php } ?>>   
                                    <a href="<?=site_url('contact')?>" class="contacticon">
                                        <div>Contact</div>
                                    </a> 
                                </li>

                            </ul>

                        </nav><!-- #primary-menu end -->

                        <div class="clearfix d-none d-lg-block ">
                            <a href="https://www.facebook.com/postaplus.sc/" target="_blank" class="social-icon si-small si-borderless si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>
                            <a href="https://www.instagram.com/postaplus.sc/" target="_blank" class="social-icon si-small si-borderless si-instagram">
                                <i class="icon-instagram"></i>
                                <i class="icon-instagram"></i>
                            </a>

                        </div>


                    </div>

                </div>

            </header>
            
            
        <section id="content">

                <div class="content-wrap"  style=" margin-bottom: 100px;">
                    <div class="container clearfix " style="  margin-left: auto; margin-right:auto;"> 
                        <div class='row' >
                            <div class="col-md-8 offset-md-2 col-sm-12">
                                <div class="style-msg successmsg" style="margin-left: auto; margin-right:auto;  " >
                                    <div class="sb-msg"><i class="icon-thumbs-up"></i>We received your order successfully.</div>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                </div>
                                <h3 style="margin-left: auto; margin-right:auto;  ">Thank you for using Posta Plus Student center </h3>
                                <div class="clearfix"></div>     
  <div   class="divDevider" >
      <table  class="table"  style="margin-left:auto; margin-right:auto; width:100%; max-width:100%; ">
     
     
     
     
     
     
     
     
	
<?php

$result = isset($_GET['result']) ? $_GET['result'] : '';
$trackid = isset($_GET['trackid']) ? $_GET['trackid'] : '';
$PaymentID = isset($_GET['paymentid']) ? $_GET['paymentid'] : '';
$ref = isset($_GET['ref']) ? $_GET['ref'] : '';
$tranid = isset($_GET['tranid']) ? $_GET['tranid'] : '';
$amount = isset($_GET['amt']) ? $_GET['amt'] : '';
$trx_error = isset($_GET['Error']) ? $_GET['Error'] : '';
$trx_errortext = isset($_GET['ErrorText']) ? $_GET['ErrorText'] : '';
$postdate = isset($_GET['postdate']) ? $_GET['postdate'] : date('Y-m-d');
$auth = isset($_GET['auth']) ? $_GET['auth'] : '';
$udf1 = isset($_GET['udf1']) ? $_GET['udf1'] : '';
$udf2 = isset($_GET['udf2']) ? $_GET['udf2'] : '';
$udf3 = isset($_GET['udf3']) ? $_GET['udf3'] : '';
$udf4 = isset($_GET['udf4']) ? $_GET['udf4'] : '';
$udf5 = isset($_GET['udf5']) ? $_GET['udf5'] : '';


$sql = "INSERT INTO `payment`(`payment_id`, `trackid`, `order_id`, `ref`, `result`, `date`,`amt`) VALUES ($PaymentID,$trackid,$udf1,$ref,$result,$postdate,$amount)";


//if(mysqli_query($con,$sql)){
  
 if(!empty($udf1)){ 
  $sql1 = "UPDATE `order_details` SET `payment_status`='paid' WHERE order_id = $udf1";
  //mysqli_query($con,$sql1);
  
  
  
//        $to = $CI->input->post('email_id');       
//        $subject = 'Student Registration';	
//	$message = '<table width="400" border="0" cellpadding="3">
//               <tr>
//               <td>YOUR USERNAME</td>
//                <td>'.$username.'</td>
//              </tr>
//                <tr>
//                <td>YOUR PASSWORD</td>
//                <td>'.$password. '</td>
//              </tr> 
//            </table>';
//	$headers  = 'MIME-Version: 1.0' . "\r\n";
//  	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
//	$headers .= 'From: '.$username.'<noreply@ibosoninnov.com>'."\r\n";
//        @mail($to,$subject,$message,$headers); 
  
  
  } 
    
 //}
?>

  <tr>
  <td><strong class="text"><center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transaction Details</center></strong></td>
  </tr>
  <?php if($trx_error != null || $trx_errortext != null) { ?>
  <tr>
    <td>Error :</td>
    <td><?php echo "$trx_error - $trx_errortext"; ?></td>
  </tr>
  <?php } ?>
  <tr>
    <td>Payment ID :</td>
    <td><?php echo $PaymentID; ?></td>
  </tr>
  <tr>
    <td>Post Date :</td>
    <td><?php echo date('d-M-Y',strtotime($postdate));?></td>
  </tr>
  <tr>
    <td>Result Code :</td>
    <td><?php echo $result;?></td>
  </tr>
  <tr>
    <td>Transaction ID :</td>
    <td><?php echo $tranid;?></td>
  </tr>
<!--  <tr>
    <td class="tdfixed">Auth :</td>
    <td class="tdwhite"><?php echo $auth;?></td>
  </tr>-->
  <tr>
    <td>Track ID :</td>
    <td><?php echo $trackid;?></td>
  </tr>
  <tr>
    <td>Ref No :</td>
    <td><?php echo $ref;?></td>
  </tr>
  <tr>
    <td>Amount :</td>
    <td><?php echo $amount;?></td>
  </tr>
<!--  <tr>
    <td class="tdfixed">UDF1 :</td>
    <td class="tdwhite"><?php //echo $udf1;?> </td>
  </tr>
  <tr>
    <td class="tdfixed">UDF2 :</td>
    <td class="tdwhite"><?php //echo $udf2;?></td>
  </tr>
  <tr>
    <td class="tdfixed">UDF3 :</td>
    <td class="tdwhite"><?php //echo $udf3;?></td>
  </tr>
  <tr>
    <td class="tdfixed">UDF4 :</td>
    <td class="tdwhite"><?php //echo $udf4;?></td>
  </tr>
  <tr>
    <td class="tdfixed">UDF5 :</td>
    <td class="tdwhite"><?php //echo $udf5;?></td>
  </tr>-->



</table>
      
   
      
  </div>
</div>



<br><br><br><br><br><br>   

                        </div>




                    </div>

                </div>

            </section><!-- #content end -->

            <!-- Footer
            ============================================= -->
            <footer id="footer" class="dark footerfixed  " style="">

                <!-- Copyrights
                ============================================= -->
                <div id="copyrights" style="padding: 20px 0;">

                    <div class="container clearfix">

                        <div class="col_half">
                            <img src="../images/logo-side-dark.png" style="height:50px; margin-bottom: 0px;" alt="" class="footer-logo">

                            Copyrights &copy; 2019 All Rights Reserved by Pusta Plus.
                        </div>

                        <div class="col_half col_last tright">
                            <div class="copyrights-menu copyright-links fright clearfix">
                                <a href="index.php">Home</a>/<a href="about.php">About</a>/<a href="services.php">Services</a>/<a href="branches.php">Branches</a>/<a href="contact.php">Contact</a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="copyrights-menu copyright-links fright clearfix">
                                Phone: <a href="#">+965-24738383</a> <span style="margin-left:20px;"></span>Email:<a href="#">info@postastc.com</a>
                            </div>

                        </div>

                    </div>

                </div><!-- #copyrights end -->

            </footer><!-- #footer end -->

        </div><!-- #wrapper end -->

        <!-- Go To Top
        ============================================= -->
        <div id="gotoTop" class="icon-angle-up"></div>

        <!-- External JavaScripts
        ============================================= -->
        <script src="../js/jquery.js"></script>
        <script src="../js/plugins.js"></script>

        <!-- Footer Scripts
        ============================================= -->
        <script src="../js/functions.js"></script>

    </body>
</html>

 <?php }else{    redirect(base_url());  } ?>

