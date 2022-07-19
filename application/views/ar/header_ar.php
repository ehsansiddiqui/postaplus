<!DOCTYPE php>
<html  dir="rtl" lang="ar">
    <head>
        <meta http-equiv="content-type" content="text/php; charset=utf-8" />
        <meta name="author" content="Amer Salloum - SPlus Kuwait" />
        <!-- Stylesheets
        ============================================= -->
        <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet"> 
        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/bootstrap-rtl.css" type="text/css" />

        <link rel="stylesheet" href="<?=base_url()?>assets/web/style.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/style-rtl.css" type="text/css" />

        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/swiper.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/dark.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/dark-rtl.css" type="text/css" />

        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/font-icons.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/font-icons-rtl.css" type="text/css" />

        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/animate.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/magnific-popup.css" type="text/css" />

        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/responsive.css" type="text/css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/responsive-rtl.css" type="text/css" />

        <link rel="stylesheet" href="<?=base_url()?>assets/web/css/colors.css" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <meta property="og:image" content="http://www.postastc.com/Posta-Logo.jpg" />	
        <link rel="mask-icon" sizes="any" href="../favicon-32x32.png"  />
        <link rel="icon" type="image/png" href="../favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="../favicon-16x16.png" sizes="16x16" />
<link rel="stylesheet" href="<?=base_url()?>assets/web/css/services.css" type="text/css" />
        <!-- Document Title
        ============================================= -->
        <title>بوسطه بلس - مركز الطالب</title>
        <style>
            #header{
                background-color: #FFF !important;
                /*ea7f1d*/
            }
            #primary-menu li{

                border-bottom: solid 1px #b96518;
                overflow: hidden; 
            }
            #primary-menu  a{

                margin:20px 20px;
            }
            #primary-menu li:after{

            }
            #primary-menu li.active{
                background-color: #ea7f1d !important; 
            }
            #primary-menu li.active a{ 
                color: #FFF !important;
            }
            #primary-menu li:hover{
                background-color: #ea7f1d !important;
                color:#FFF !important;
            }
            #primary-menu  li:hover  a{ 
                color:#FFF !important;
            }
            .side-header #primary-menu ul li {
                float: none;
                margin: 0; 
            }
            .side-header #logo:not(.nobottomborder)::after, .side-header #primary-menu:not(.nobottomborder)::after {
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
            #logo img{
                padding: 0 20px;
            }
            .homepageicon{

            }
            .homepageicon:before{
                font-family: 'font-icons';
                content: "\e6d0";  
                font-style: normal;
                font-weight: normal; 
                position: absolute;
                font-size: 120px;
                color: #bebebe;
                opacity:0.2;
                left:-20px;
                top:40px;  
                z-index: 1;

                max-height: 100%;

            }
            .abouticon:before{
                font-family: 'font-icons';
                content: "\e710";  
                font-style: normal;
                font-weight: normal; 
                position: absolute;
                font-size: 120px;
                color: #bebebe;
                opacity:0.2;
                left:-20px;
                top:40px;  
                z-index: 1;

                max-height: 100%;

            }
            .servicesicon:before{
                font-family: 'font-icons';
                content: "\e6ce";  
                font-style: normal;
                font-weight: normal; 
                position: absolute;
                font-size: 120px;
                color: #bebebe;
                opacity:0.2;
                left:-10px;
                top:40px;  
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
            
            .locationsicon:before{
                font-family: 'font-icons';
                content: "\e7c2";  
                font-style: normal;
                font-weight: normal; 
                position: absolute;
                font-size: 110px;
                color: #bebebe;
                opacity:0.2;
                left:0px;
                top:40px;  
                z-index: 1;

                max-height: 100%;

            }
            .contacticon:before {
                font-family: 'font-icons';
                content: "\e748";  
                font-style: normal;
                font-weight: normal; 
                position: absolute;
                font-size: 110px;
                color: #bebebe;
                opacity:0.2;
                left:-10px;
                top:40px;  
                z-index: 1;

                max-height: 100%;

            }
            @media (min-width: 992px) {
                .side-header #header-wrap {
                    padding-left: 0px;
                    padding-right: 0;
                }
            }
            html, body, p, h1, h2, h3, h4, h5, h6, h7, span, b, div, ul, li, a{
                font-family: 'Cairo', sans-serif;
            }
            p{
                font-size:16px;
            }
            .feature-box h3{
                font-size:23px;
            }
            .feature-box h3 span{
                font-size:16px;
            }
            #primary-menu div{
                font-size:18px;
            }
            #primary-menu ul li a:before{
                color: #bebebe;
            }
            #primary-menu ul li.active a:before{
                color: #dedede;
            }
            #primary-menu ul li:hover a:before{
                color: #ededed;
            }
            #page-title.page-title-parallax h1 {
                letter-spacing: 0px !important;
            }
            h1 h2 h3 h4 h5 h6 h7{
                letter-spacing: 0px !important;
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
            
            .user-section_ar{
              position:fixed;
              top:0;
              left:0;
              padding:30px;
              z-index:999;    
            }
            
            
.dd_menu_cover .dd_menu {
  opacity: 0;
  visibility: hidden;
  position: fixed;
  top: 0;
  right: 260px;
  width: 260px;
  height: 100vh;
  background: #fff;
  z-index: 999;
  left: 0px;
  -webkit-box-shadow: 14px 0px 24px -16px rgba(0, 0, 0, 0.24);
          box-shadow: 14px 0px 24px -16px rgba(0, 0, 0, 0.24);
  -webkit-transition: all 0.5s ease;
  transition: all 0.5s ease;
}
        </style>
        
        <link rel="stylesheet" href="<?=base_url()?>assets/sweetalert.css" type="text/css" />
        
        <script src="<?=base_url()?>assets/web/js/jquery.js"></script>
        
    </head>

    <body class="stretched side-header side-header-right  rtl " data-loader="2" data-animation-in="fadeIn" data-speed-in="1500" data-animation-out="fadeOut" data-speed-out="800" data-loader-color="ea7f1d"> 
        
        
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
                        <h5 class="modal-title" id="login-popLabel"> تسجيل الدخول </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <form class="default-form" id="login-form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="number" name="phone_number" class="form-control" id="exampleFormControlInput1" maxlength="15" placeholder="رقم الهاتف" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="exampleFormControlInput1" maxlength="255" placeholder="كلمه السر">
                            </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">إرسال</button>
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
                        <h5 class="modal-title" id="registration-popLabel"> التسجيل </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="default-form" id="login-registration" method="post" enctype="multipart/form-data">
                            
                            <div class="form-group">
    <input type="number" name="phone_number" class="form-control" id="phone_number" placeholder="رقم الهاتف" required="" maxlength="15">
                            </div>
                            
                            <div class="form-group">
   <input type="password" name="password" class="form-control" id="password" placeholder="كلمه السر" required="">
                            </div>
                            
    
                            <div class="form-group">
    <input type="email" name="email_id" class="form-control" id="email_id" placeholder="البريد الإلكتروني" required="">
                            </div>
                    
                            <div class="form-group">
    <input type="text" name="full_name" class="form-control" id="full_name" placeholder="اسم">
                            </div>
                    
                     <button type="submit" name="submit" class="btn btn-primary btn-block">تسجيل</button>
                    
                        </form>
                    </div>

                </div>
            </div>
        </div>

        
         <div class="user-section_ar">
            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    حسابي
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    
                    <?php if($this->session->userdata('user_id')){ ?>
                    
                    <div class="user_acc_wrapper">
                        <div class="user_icon">
                            <?php if(!empty($this->session->userdata('image'))){ ?>
                 <img src="<?=base_url()?>user/<?=$this->session->userdata('image')?>" alt="" width="80" height="80">
                            <?php }else{ ?>
                            <img src="https://dummyimage.com/80x80/000/fff" alt="">
                            <?php } ?>
                        </div>
                        <h3><?=$this->session->userdata('full_name')?></h3>
                        <p><?=$this->session->userdata('email_id')?></p>
                    </div>
                    
                    
                    <a href="<?=site_url('profile')?>" class="dropdown-item <?php if ($this->uri->segment(1) == 'profile') { ?> active <?php } ?>"> حسابي </a>
                    <a href="<?=site_url('myorder')?>" class="dropdown-item <?php if ($this->uri->segment(1) == 'myorder') { ?> active <?php } ?>">  طلباتي </a>
                    <a href="<?=site_url('login/logout')?>" class="dropdown-item"> تسجيل خروج </a>
                    
                    <?php }else{ ?>
<!--                <button class="dropdown-item" type="button"> Share with friends </button>
                    <button class="dropdown-item" type="button"> Leave Feedback </button>
                    <button class="dropdown-item" type="button"> Rate us on play Store </button>-->
           <button class="dropdown-item" type="button" data-toggle="modal" data-target="#login-pop"> تسجيل الدخول </button>
           <button class="dropdown-item" type="button" data-toggle="modal" data-target="#registration-pop"> التسجيل
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
            <header id="header" class="no-sticky " >

                <div id="header-wrap">

                    <div class="container clearfix" style="padding: 0 !important;">

                        <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                        <!-- Logo
                        ============================================= -->
                        <div id="logo" class="nobottomborder" style="">
                            <a href="<?=base_url()?>" class="standard-logo" data-dark-logo="<?=base_url()?>assets/web/images/logo-ar.svg"><img src="<?=base_url()?>assets/web/images/logo-colored-ar.svg" alt="Posta Plus Logo"></a>
                            <a href="<?=base_url()?>" class="retina-logo" data-dark-logo="<?=base_url()?>assets/web/images/logo-ar.svg"><img src="<?=base_url()?>assets/web/images/logo-colored-ar.svg"   alt="Posta Plus Logo"></a>
                        </div><!-- #logo end -->

                        <div class=" center" style=" margin-bottom: 20px;">
                        <a href="<?=site_url('language/en')?>" style="color:#444; font-size:20px;">English</a>
                        </div>
                        <!-- Primary Navigation
                        ============================================= -->
                        <nav id="primary-menu" class=" ">

                            <ul>
                    <li <?php if ($this->uri->segment(1) == '') { ?> class="active"<?php } ?>><a href="<?=base_url()?>" class="homepageicon"><div class=" ">الرئيسية</div></a></li>
                    <li <?php if ($this->uri->segment(1) == 'about') { ?> class="active"<?php } ?>><a href="<?=site_url('about')?>"  class="abouticon"><div>من نحن</div></a> </li>
                    
                    
                    <li class="dd_menu_cover<?php if ($this->uri->segment(1) == 'online_services') { ?> active <?php } ?>">
                                    <a href="<?=site_url('online_services')?>" class="servicesicon2">
                                        <div>خدمات عبر الانترنت</div>
                                    </a>
                       
                                 <div class="dd_menu" >
                                        <ol>
                                            <li>
                                                <?php if($this->session->userdata('user_id')){ ?>
                                                <a href="<?=site_url('printing_ar');?>"> طبع </a>
                                                <?php }else{ ?>
                                                <a href="<?=site_url('login?page=printing');?>"> طبع </a>
                                                <?php } ?>
                                            </li>
                                            <li>
               <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    هدية مجانية </a>
                                            <div class="collapse" id="collapseExample">
                                   <?php foreach ($gift_category as $row): ?> 
                                  <?php if($this->session->userdata('user_id')){ ?>                 
     <a class="sub-in-list" href="<?=site_url('gift?category_id='.$row->gift_category_id)?>"><?=$row->gift_cate_name;?></a>
                                      <?php }else{ ?>
        <a class="sub-in-list" href="<?=site_url('login?page=gift?category_id='.$row->gift_category_id);?>"> <?=$row->gift_cate_name;?> </a>
                                        <?php } ?>
     
                                   <?php endforeach;?>        
                                            </div>
                                                
                                            </li>
                                            <li>
                                           <?php if($this->session->userdata('user_id')){ ?>
                                            <a href="<?=site_url('government_pappers_ar')?>"> بابرس الحكومة </a>
                                            <?php }else{ ?>   
                                   <a href="<?=site_url('login?page=government_pappers');?>"> بابرس الحكومة </a>   
                                               <?php } ?>
                                            </li>
                                            <li>
                                               
                                                 <?php if($this->session->userdata('user_id')){ ?>
                                                <a href="<?=site_url('photo_printing')?>"> طباعة الصور </a>
                                                <?php }else{ ?> 
                                    <a href="<?=site_url('login?page=photo_printing');?>"> طباعة الصور </a>
                                                 <?php } ?>
                                                
                                            </li>
                                            <li>
                                                 <?php if($this->session->userdata('user_id')){ ?>
                                                <a href="<?=site_url('summery')?>"> صيفي </a>
                                                  <?php }else{ ?> 
                                    <a href="<?=site_url('login?page=summery');?>"> صيفي </a>
                                                 <?php } ?>
                                            </li>

                                        </ol>


                                    </div>   
                       
                                </li>
                   
                    
                    
                    <li <?php if ($this->uri->segment(1) == 'services') { ?> class="active"<?php } ?>><a href="<?=site_url('services')?>" class="servicesicon"><div>الخدمات</div></a> </li>
                    
                    
                    <li <?php if ($this->uri->segment(1) == 'branch') { ?> class="active"<?php } ?>><a href="<?=site_url('branch')?>" class="locationsicon"><div>الافرع</div></a> </li>
                    <li <?php if ($this->uri->segment(1) == 'contact') { ?> class="active"<?php } ?>><a href="<?=site_url('contact')?>" class="contacticon"><div>الاتصال بنا</div></a> </li> 
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
            
            <!-- #header end -->
<script> 
        $('#login-form').submit(function(event){    
          event.preventDefault();
          $('#overlay').show(); 
          var formData = new FormData(this);
          $.ajax({
            url: '<?=site_url('login/verify')?>',
            type: 'POST',
            data: formData, 
            dataType: 'json',      
            success: function(msg)
            { 
              if(msg.status == 'error'){ 
                sweetAlert('Error!', msg.msg, "error");
                $('#login-form')[0].reset();
                $('#overlay').hide();
              }else{ 
                sweetAlert('Success!', '', "success");
                $('#overlay').hide();
                $('#login-form')[0].reset();
                setTimeout(function(){location.reload();} , 1000);   
                }
            },
            cache: false,
            contentType: false,
            processData: false
         });
          return false;
        });
        
        
    $('#login-registration').submit(function(event){    
         
        event.preventDefault();
         $('#overlay').show(); 
          var formData = new FormData(this);
          $.ajax({
            url: '<?=site_url('registration/add')?>',
            type: 'POST',
            data: formData, 
            dataType: 'json',      
            success: function(msg)
            { 
              if(msg.status == 'error'){ 
                sweetAlert('Error!', msg.msg, "error");
                $('#login-registration')[0].reset();
                $('#overlay').hide();
              }else{ 
                sweetAlert('Success!', '', "success");
                $('#overlay').hide();
                $('#login-registration')[0].reset();
                setTimeout(function(){location.reload();} , 1000);   
                }
            },
            cache: false,
            contentType: false,
            processData: false
         });
          return false;
        });                     
</script>