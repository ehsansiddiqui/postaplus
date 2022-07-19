<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section id="slider" class="slider-element slider-parallax swiper_wrapper full-screen clearfix">
    <div class="slider-parallax-inner">

        <div class="swiper-container swiper-parent">
            <div class="swiper-wrapper">
                  <?php foreach ($banner_web as $banner){ ?>
                                <div class="swiper-slide  " style="background-image: url('<?=base_url()?>banner/<?php echo $banner->shop_banner_image; ?>');">
                                    <div class="container clearfix">
                                        <div class="slider-caption slider-caption-left">
                                            <h2 data-animate="fadeInUp" style="color:#ea7f1d;"><?php echo $banner->shop_banner_name; ?></h2>
                                            <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200"><?php echo $banner->shop_banner_description; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>

            </div>
            <div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
            <div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
            <div class="slide-number">
                <div class="slide-number-current"></div><span>/</span>
                <div class="slide-number-total"></div>
            </div>
        </div>

    </div>
</section>

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">



        <div class="container clearfix">

            <div class="col_one_third">
                <h2>Welcome to Posta Plus</h2>
                <p>Student Center was established in 1992 to cater to the rising demand for specialized
                    printing services in the public and private sector as well as educational institu- tions.<br><br>

                    Today, Student Center is known for high quality printing, world-class standards in service,
                    highly advanced technology, delivery excellence and a commitment to building and
                    maintaining long-term client relationships <br><br>

                    Over the years, Student Center has become one of the leading providers of specialized
                    printing services and related business solutions. We employ over profession- als in our 12
                    branches throughout the strategic locations in Kuwait. All our locations are spacious,
                    luxurious and designed to be functional. We take pride in the fact that we have served more
                    than satisﬁed clients from different industries-both public and private-including
                    engineers, architects and professionals for close to two decades ...<a href="about.html">Read
                        more</a>
                </p>
            </div>
            <div class="col_two_third col_last"><img src="<?=base_url()?>assets/web/images/main-about.jpg" /></div>

            <div class="clear"></div>








        </div>

        <div class="container clearfix">
            <div class="fancy-title title-double-border">
                <h2>Sections</h2>
            </div>



            <div class="col_one_third">
                <div class="feature-box fbox-center fbox-border fbox-effect noborder">
                    <div class="fbox-icon">
                        <a href="<?=site_url('services')?>"><i class="icon-cog i-alt"></i></a>
                    </div>
                    <h3>Services<span class="subtitle" style="color:#333;">Posta plus serve a wide variety of
                            printing solutions for students and businesses with a high quality standard, please
                            go to services page to see more</span></h3>
                </div>
            </div>


            <div class="col_one_third">
                <div class="feature-box fbox-center fbox-border fbox-effect noborder">
                    <div class="fbox-icon">
                        <a href="<?=site_url('branch')?>"><i class="icon-location i-alt"></i></a>
                    </div>
                    <h3>Branches<span class="subtitle" style="color:#333;">Posta plus is available in many
                            locations across kuwait country, too see more about our branches location please go
                            to our branches page</span></h3>
                </div>
            </div>
            <div class="col_one_third col_last">
                <div class="feature-box fbox-center fbox-border fbox-effect noborder">
                    <div class="fbox-icon">
                        <a href="<?=site_url('contact')?>"><i class="icon-phone3 i-alt"></i></a>
                    </div>
                    <h3>Contact us<span class="subtitle" style="color:#333;">Posta Plus always aim to satisfy
                            our clients, we will be happy to hear your feedback and suggestion, please go to
                            contact us page and for more information</span></h3>
                </div>
            </div>


        </div>
    </div>

</section><!-- #content end -->
