<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="clearfix"> </div>
  <!-- end .clearfix --> 
  
  <!-- Page Title
================================================== -->
  <div class="pagetitle">
    <div class="pagetitle-overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <h1>E-waste Collection Center</h1>
          </div>
<!--           end .col-md-6 col-sm-6 -->
          
          <div class="col-md-6 col-sm-6">
            <ul class="breadcrumb">
              <li><a href="<?=base_url()?>">Home</a></li>
              <li class="active">E-waste Collection Center</li>
            </ul>
          </div>
<!--           end .col-md-6 col-sm-6  -->
          
        </div>
<!--         end .row  -->
      </div>
<!--       end .container  -->
    </div>
<!--     end .pagetitle-overlay  -->
  </div>
  <!-- end .pagetitle -->
  <div class="mb-100"> </div>
  <!-- end .mb-100 --> 
  
  <!-- About Us
================================================== -->
  <div class="container">
    <div class="row">
<!--      <div class="col-md-6 col-sm-6">
        <div class="owl-single owl-carousel owl-theme">
          <div class="item">
            <img src="images/features/feature1.jpg" alt="" />
          </div>
          <div class="item">
            <img src="images/features/feature2.jpg" alt="" />
          </div>
          <div class="item">
            <img src="images/features/feature3.jpg" alt="" />
          </div>
        </div>
         end .owl-single  
      </div>-->
      <!-- end .col-md-6 col-sm-6 -->
      
      <div class="col-md-12 col-sm-12">
          
        <h5><a href="<?=site_url('technology/e_waste_collection_center')?>" style="text-decoration: none;"><?=$result->page_title?></a></h5>      
        <div class="titleline"> </div>
        <!-- end .titleline --> 
        <p align="justify"><?=preg_replace("/[\n\r]/","",$result->page_description);?></p>
        
        
      </div>
      <!-- end .col-md-6 col-sm-6 --> 
      
    </div>
    <!-- end .row --> 
  </div>
  <!-- end .container -->
  <div class="mb-100"> </div>