<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- end #header -->
  <div class="clearfix"> </div>
  <!-- end .clearfix --> 
  
  <!-- Page Title
================================================== -->
  <div class="pagetitle">
    <div class="pagetitle-overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6">
<!--            <h1>About</h1>-->
          </div>
          <!-- end .col-md-6 col-sm-6 -->
          
          <div class="col-md-6 col-sm-6">
            <ul class="breadcrumb">
              <li><a href="<?=base_url()?>">Home</a></li>
              <li class="active">Product</li>
            </ul>
          </div>
          <!-- end .col-md-6 col-sm-6 --> 
          
        </div>
        <!-- end .row --> 
      </div>
      <!-- end .container --> 
    </div>
    <!-- end .pagetitle-overlay --> 
  </div>
  <!-- end .pagetitle -->
  <div class="mb-100"> </div>
  <!-- end .mb-100 --> 
  
  <!-- About Us
================================================== -->
  <div class="container">
   
    <?php if($this->session->flashdata('m')){ ?>  
    <div class="row">
    <div class="col-md-12 col-sm-12">  
     <div class="alert alert-success fade in">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?=$this->session->flashdata('m')?>
     </div>
     </div>
    </div>
    <?php } ?>      
      
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <div class="owl-single owl-carousel owl-theme">
          <div class="item">
            <img src="<?=base_url()?>services/<?=$result->services_image?>" alt="" style="width: 455px;"/>
          </div>
         
        </div>
        <!-- end .owl-single --> 
        
        
      </div>
      <!-- end .col-md-6 col-sm-6 -->
      
      <div class="col-md-6 col-sm-6">
        <h3><?=$result->services_name?></h3>
        <div class="titleline"> </div>
        <!-- end .titleline -->
         <p>
          <?=$result->services_description?>  
        </p>
        
         
      </div>
      
      
      <br>
      
<!--    <div class="col-md-6 col-sm-6">
        <h5>Specifications</h5>
        <div class="titleline"></div>
         end .titleline 
          <?=$result->shop_product_specification?>  
    </div>-->
      <!-- end .col-md-6 col-sm-6 -->
      
      
   
      
     <div class="col-md-6 col-sm-6">
<!--         <button type="button" class="btn btn-theme" data-toggle="modal" data-target="#exampleModal" style="margin:40px 0px;    padding: 13px 24px">Request Quote <span><i class="fa fa-envelope-o" style="padding: 14px;"></i></span></button>-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">REQUEST QUOTE</h4>
              </div>
              <!-- end .modal-header -->
              <div class="modal-body">
                 <form   name="loginform" action="<?=site_url('product/request_quote')?>" method="post">
                  
                  <p>
                    <label for="user_login">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="" size="20" required/>
                  </p>
                  
                  <p>
                    <label for="user_pass">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="" size="55"  required/>
                  </p>
                  
                  <p>
                    <label for="user_pass">Contact Number</label>
                    <input type="text" name="phone" id="contact_number" class="form-control" value="" size="55" required />
                  </p>
                  
                  
                  <p>
                    <label for="user_pass">Address</label>
                    <textarea name="address" id="contact_number" class="form-control" required></textarea>
                  </p>
                  
                  
                  <p>
        <input type="hidden" name="product_name" class="form-control" value="<?=$result->shop_product_name?>" />
        <input type="hidden" name="product_id" class="form-control" value="<?=$result->shop_product_id?>" />
                    <input class="submit btn btn-theme" name="submit" type="submit" value="submit">
                  </p>
                </form>
<!--                <p> <a href="#">Lost your password?</a> </p>-->
              </div>
              <!-- end .modal-body --> 
            </div>
            <!-- end .modal-content --> 
          </div>
          <!-- end .modal-dialog --> 
        </div>
        <!-- end .modal -->
       </div>
      
      
      
      
      
    </div>
    <!-- end .row --> 
  </div>
  <!-- end .container -->
<!--  <div class="mb-50"> </div>-->
  <!-- end .mb-100 --> 
  
  <!-- About Our Studio
================================================== -->
<!--  <div class="wrapper-graybg">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <h5>Features</h5>
          <div class="titleline"> </div>
           end .titleline 
          <?=$result->shop_product_feature?> 
        </div>
         end .col-md-6 col-sm-6 
        
        <div class="col-md-6 col-sm-6">
          <div class="video-container">
              
 <video width="500" height="281" width="400" controls  controlsList="nodownload">
  <source src="<?=base_url()?>product/<?=$result->shop_product_vedio?>" type="video/mp4">
</video> 
              
            <iframe src="https://player.vimeo.com/video/155404383" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            
            
            
            
            
          </div>
           end .video-container  
          
          <?php if(!empty($result->shop_product_catalogue)){  ?>
          <a href="<?=base_url()?>product/<?=$result->shop_product_catalogue?>" class="btn btn-3d btn-lg btn-theme" target="_blank">Product Catalogue <span><i class="fa fa-sign-in"></i></span></a>
          <?php } ?>
        </div>
         end .col-md-6 col-sm-6  
        
      </div>
       end .row  
    </div>
     end .container  
  </div>-->
  <!-- end .wrapper-graybg -->
  <div class="mb-100"> </div>
  
<!-- end .mb-100 -->