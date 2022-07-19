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
        </style>
    </head>

    <body class="stretched side-header side-header-right  rtl " data-loader="2" data-animation-in="fadeIn" data-speed-in="1500" data-animation-out="fadeOut" data-speed-out="800" data-loader-color="ea7f1d">  

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
