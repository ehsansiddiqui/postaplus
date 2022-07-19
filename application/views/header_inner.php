<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ascentbahrain</title>
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="images/favicon.ico">
<!-- Web Fonts
================================================== -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700%7CRoboto:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
<!-- CSS
================================================== -->
<link rel="stylesheet" href="<?=base_url()?>assets/web/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/web/revolution/css/settings.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/web/revolution/css/layers.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/web/revolution/css/navigation.css">
<link rel="stylesheet" href="<?=base_url()?>assets/web/fonts/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/web/css/plugins.css" />
<link rel="stylesheet" href="<?=base_url()?>assets/web/css/style.css" />
<link rel="stylesheet" href="<?=base_url()?>assets/web/css/colors.css" />

<!-- IE
================================================== -->
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Style Switcher (Demo Only)
================================================== -->
<link rel="stylesheet" href="<?=base_url()?>assets/web/switcher/css/switcher.css" />
<link rel="stylesheet" href="<?=base_url()?>assets/web/switcher/css/reset.css" id="jssDefault" />
</head>

<body>
 <div id="fakeloader"> </div> 
<div id="boxed-layout"> 
  
  <!-- Top Bar
================================================== -->
  <div id="topbar">
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-sm-5">
          <ul class="topbar-contact">
<!--            <li><i class="fa fa-phone-square"></i>(123) 456-7890</li>-->
<!--            <li>|</li>
            <li class="language dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-language"></i>English <i class="fa fa-angle-down"></i></a>
              <ul class="dropdown-menu">
                <li><a href="#">English</a></li>
                <li><a href="#">French</a></li>
                <li><a href="#">Spanish</a></li>
                <li><a href="#">Italian</a></li>
                <li><a href="#">German</a></li>
              </ul>
            </li>-->
          </ul>
          <!-- end .topbar-contact --> 
        </div>
        <!-- end .col-md-5 col-sm-5 -->
        
        <div class="col-md-7 col-sm-7">
          <ul class="social-icons pull-right">
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://api.whatsapp.com/send?phone=919961723100"><i class="fa fa-whatsapp"></i></a></li>
<!--            <li class="topbar-search dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search"></i></a>
              <ul class="dropdown-menu pull-right">
                <li>
                  <form class="input-group" action="#" method="get">
                    <input type="text" class="form-control" name="q" placeholder="Search">
                    <span class="input-group-btn">
                    <button class="btn btn-default"><i class="fa fa-search"></i></button>
                    </span>
                  </form>
                </li>
              </ul>
            </li>-->
          </ul>
          <!-- end .social-icons --> 
        </div>
        <!-- end .col-md-7 col-sm-7 --> 
        
      </div>
      <!-- end .row --> 
    </div>
    <!-- end .container --> 
  </div>
  <!-- end #topbar --> 
  
  <!-- Header
================================================== -->
  <header id="header">
    <div class="header-shadow"> </div>
    <!-- end .header-shadow -->
    <nav class="navbar yamm navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="<?=base_url()?>">
              <img src="<?=base_url()?>assets/web/images/logo.png" alt="" width="100" height="60" />
          </a> 
        </div>
        <!-- end .navbar-header -->
        
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              
    <li <?php if ($this->uri->segment(1) == '') { ?> class="active" <?php } ?>><a href="<?=base_url()?>">Home</a></li>
    
    <li <?php if ($this->uri->segment(1) == 'about') { ?> class="active" <?php } ?>><a href="<?=site_url('about')?>">About Us</a></li>
    
    <li <?php if ($this->uri->segment(1) == 'services') { ?> class="active" <?php } ?>><a href="<?=site_url('services')?>">Services</a></li>
    
    <li <?php if ($this->uri->segment(1) == 'product') { ?> class="active" <?php } ?>><a href="<?=site_url('product')?>">Product</a></li>
    
    <li <?php if ($this->uri->segment(1) == 'contact') { ?> class="active" <?php } ?>><a href="<?=site_url('contact')?>">Contact</a></li>   
 
      </ul>
          <!-- end .nav navbar-nav --> 
        </div>
        
        
        
        <!-- end .navbar-collapse collapse --> 
        
      </div>
      <!-- end .container --> 
    </nav>
    <!-- end .navbar --> 
    
  </header>
  <!-- end #header -->