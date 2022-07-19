<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
                font-size: 120px;
                color: #bebebe;
                opacity: 0.2;
                right: -20px;
                top: 40px;
                z-index: 1;

                max-height: 100%;

            }

            .abouticon:before {
                font-family: 'font-icons';
                content: "\e710";
                font-style: normal;
                font-weight: normal;
                position: absolute;
                font-size: 120px;
                color: #bebebe;
                opacity: 0.2;
                right: -20px;
                top: 40px;
                z-index: 1;

                max-height: 100%;

            }

            .servicesicon:before {
                font-family: 'font-icons';
                content: "\e6ce";
                font-style: normal;
                font-weight: normal;
                position: absolute;
                font-size: 120px;
                color: #bebebe;
                opacity: 0.2;
                right: -10px;
                top: 40px;
                z-index: 1;

                max-height: 100%;

            }

            .locationsicon:before {
                font-family: 'font-icons';
                content: "\e7c2";
                font-style: normal;
                font-weight: normal;
                position: absolute;
                font-size: 110px;
                color: #bebebe;
                opacity: 0.2;
                right: 0px;
                top: 40px;
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
                opacity: 0.2;
                right: -10px;
                top: 40px;
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


    <section>
      <div class="content-wrap">
        <div class="container clearfix">
          <div class="col_full">

            <div class="content_center">
              <h3 class="sub_head"> Preview </h3>

        <form class="default-form"  action="https://www.postastc.com/postaplus`payment/PHP_VPC_3Party_Order_DO.php" id="form_id" method="post" enctype="multipart/form-data">
            
            
<!--                <div class="form-group">
                 <label>Qty</label>
                <input type="text"  name="qty" class="form-control"  value="<?=@$order_data->qty?>" readonly>
                </div>-->
            
            
<!--                <div class="form-group">
                   <label>Price</label>
                <input type="text"  name="price" class="form-control"  value="<?=@$order_data->price?>" readonly>
                </div>-->
                  
                <div class="form-group">
                   <label>Total Price</label>
             <input type="text"  name="vpc_Amount" class="form-control"  value="<?=(int)@$order_data->total_price?>" readonly>
                </div>
                  
                <div class="form-group">
                    <input type="hidden"  name="Title" class="form-control"  value="PHP VPC 3 Party Transacion">
                    <input type="hidden"  name="virtualPaymentClientURL" class="form-control"  value="https://migs.mastercard.com.au/vpcpay">
                    <input type="hidden"  name="vpc_Version"      class="form-control"  value="1"/>
                    <input type="hidden"  name="vpc_Command"      class="form-control"  value="pay"/>
                    <input type="hidden"  name="vpc_AccessCode"   class="form-control"  value="9FE0FA38"/>
                    <input type="hidden"  name="vpc_MerchTxnRef"  class="form-control"  value="<?=$order_id?>"/>
                    <input type="hidden"  name="vpc_Merchant"     class="form-control"  value="TESTGBK_KWD"/>
                    <input type="hidden"  name="vpc_OrderInfo"    class="form-control"  value="<?=$order_id?>"/>
                    <input type="hidden"  name="vpc_ReturnURL"    class="form-control"  value="https://www.postastc.com/postaplus`payment/PHP_VPC_3Party_Order_DR.php"/>
                    <input type="hidden"  name="vpc_Locale"        class="form-control"    value="en_AU"/>
                    <input type="hidden"  name="vpc_Currency"     class="form-control"  value="KWD"/>
                  
                    
                    
                </div>
            

                <div class="row">
                  <div class="col-md-6">     
                      <input type="submit" name="SubButL" class="btn btn-primary btn-block" value="Pay Now!"/>
                  </div>   
                   <div class="col-md-6">     
       <a href="<?=base_url()?>"><button class="btn btn-primary btn-block">Cancel</button></a>
                  </div>
                </div>
            
            
            </form>

            </div>
          </div>
        </div>
      </div>
    </section>
            
            
            
<!-- #footer end -->

<!--</div> #wrapper end -->

<!-- Go To Top
============================================= -->

<div id="gotoTop" class="icon-angle-up"></div>
<!-- External JavaScripts
============================================= -->
<script src="<?=base_url()?>assets/web/js/plugins.js"></script>
<!-- Footer Scripts
============================================= -->
<script src="<?=base_url()?>assets/web/js/functions.js"></script>
<script src="<?=base_url()?>assets/sweetalert.min.js"></script>
<script src="<?=base_url()?>assets/notify.min.js"></script>
</body>
</html>          
       