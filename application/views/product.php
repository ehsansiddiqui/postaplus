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
            <h1>Product</h1>
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
  
  <!-- Shop 4 Columns
================================================== -->
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="isotope-select-menu pull-right">
          <select class="filters-shop form-control">
            <option value="*">View All</option>
         
            <?php foreach($category as $row){ ?>
            <option value=".filtering<?=$row->shop_category_id?>"><?=$row->shop_category_name?></option>
            <?php } ?>
          </select>
        </div>
        <!-- end .isotope-select-menu --> 
        
      </div>
      <!-- end .col-md-12 col-sm-12 --> 
      
    </div>
    <!-- end .row -->
    
    <div class="row">
      <div class="isotope-shop">
        
          
       <?php foreach($product as $pro){?>
          
       <div class="col-md-3 col-sm-6 element-item filtering<?=$pro->shop_category_id?>">
          <figure class="effect-phoebe">
            <img src="<?=base_url()?>product/<?=$pro->shop_product_image?>" alt="" />
         <figcaption>
        <p> <a href="<?=site_url('product/details/'.$pro->shop_product_id)?>"><i class="fa fa-link effect-1"></i></a><a class="nivo-lightbox" href="<?=base_url()?>product/<?=$pro->shop_product_image?>" title="This is an image title" data-lightbox-gallery="gallery3"><i class="fa fa-search effect-1"></i></a> </p>
        </figcaption>
          </figure>
          <div class="clearfix"> </div>
          <div class="photo-title2">
            <h5><?=$pro->shop_product_name?></h5>
<!--            <p><span class="line-through">$100</span> $90</p>-->
            
             <p align="justify"><?=substr($pro->shop_product_description,0,100);?>...<a href="<?=site_url('product/details/'.$pro->shop_product_id)?>" style="color:#4ca6ff">Read more</a></p>
            <p class="star-color"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i></p>
          </div>
          <!-- end .photo-title2 --> 
        </div>
        <!-- end .col-md-3 col-sm-6 -->
       <?php } ?> 

        

        
      </div>
      <!-- end .isotope-shop --> 
    </div>
    <!-- end .row --> 
  </div>
  <!-- end .container -->
  <div class="mb-100"> </div>
  <!-- end .mb-100 --> 