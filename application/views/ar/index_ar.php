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
                                            <h2 data-animate="fadeInUp" style="color:#ea7f1d;">
                                            <?php 
                                                if (!isset($banner->shop_banner_name_ar)) {
                                                    echo '';
                                                }
                                                else{
                                                    echo $banner->shop_banner_name_ar;
                                                }
                                             ?></h2>
                                            <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">
                                                <?php 
                                                 if (!isset($banner->shop_banner_description_ar)) {
                                                    echo '';
                                                }
                                                else{
                                                    echo $banner->shop_banner_description_ar;
                                                }
                                                
                                                ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>

                            

                        </div>
                        <div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
                        <div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
                        <div class="slide-number"><div class="slide-number-current"></div><span>/</span><div class="slide-number-total"></div></div>
                    </div>

                </div>
            </section>

            <!-- Content
            ============================================= -->
            <section id="content">

                <div class="content-wrap">

                    <div class="container clearfix">

                        <div class="col_one_third">
                            <h2>اهلا بكم في مركز الطالب</h2>
                            <p>ﺗﻢ ﺗﺄﺳﻴﺲ ﺷﺮﻛﺔ  ﻣﺮﻛﺰ اﻟﻄﺎﻟﺐ ﻓﻲ ﻋﺎم 1992  ﻟﺘﻠﺒﻴﺔ إﺣﺘﻴﺎﺟﺎت اﻟﻌﻤﻼء
اﻟﻤﺘﺰاﻳﺪة ﻋﻠﻰ ﺧﺪﻣﺎت اﻟﻄﺒﺎﻋﺔ اﻟﻤﺘﺨﺼﺼﺔ ﻓﻲ اﻟﻘﻄﺎﻋﻴﻦ اﻟﻌﺎم واﻟﺨﺎص،
ﻓﻀﻼ ﻋﻦ اﻟﻤﺆﺳﺴﺎت اﻟﺘﻌﻠﻴﻤﻴﺔ
<br><br>

                                اﻟﻴﻮم ﻣﺮﻛﺰ اﻟﻄﺎﻟﺐ ﻣﻌﺮوف ﺑﺘﻘﺪﻳﻢ ﺧﺪﻣﺎت ﻋﺎﻟﻴﺔ اﻟﺠﻮدة ﻣﺮاﻋﻴﺎ اﻟﻤﻌﺎﻳﻴﺮ اﻟﻌﺎﻟﻤﻴﺔ ﻓﻲ  اﻟﺨﺪﻣﺔ  ﻣﺴﺘﺨﺪﻣﺎ  أﺣﺪث  وﺳﺎﺋﻞ  اﻟﺘﻜﻨﻮﻟﻮﺟﻴﺎ  ﻓﻲ  اﻟﺘﺼﻤﻴﻢ
واﻧﺘﺎج   ﺣﺮﺻﺎ ﻣﻨﺎ ﻋﻠﻰ اﻟﺤﻔﺎظ ﻋﻠﻰ اﻟﻌﻼﻗﺎت ﻃﻮﻳﻠﺔ اﻟﻤﺪى ﻣﻊ ﻋﻤﻼﺋﻨﺎ
 <br><br>

                                ﻋﻠﻰ ﻣﺮ اﻟﺴﻨﻴﻦ، أﺻﺒﺢ ﻣﺮﻛﺰ اﻟﻄﺎﻟﺐ واﺣﺪة ﻣﻦ اﻟﺸﺮﻛﺎت اﻟﺮاﺋﺪة ﻓﻲ ﻣﺠﺎل

 ﺧﺪﻣﺎت  اﻟﻄﺒﺎﻋﺔ  اﻟﻤﺘﺨﺼﺼﺔ  واﻟﺘﺼﻮﻳﺮ  ﻧﺤﻦ ﻧﻘﻮم ﺑﺘﻮﻇﻴﻒ اﻟﻤﻬﻨﻴﻴﻦ واﻟﻤﺘﺨﺼﺼﻴﻦ ﻓﻲ ﻓﺮوﻋﻨﺎ 12 ﻓﻲ ﺟﻤﻴﻊ أﻧﺤﺎء اﻟﻤﻮاﻗﻊ اﻻﺳﺘﺮاﺗﻴﺠﻴﺔ ﻓﻲ اﻟﻜﻮﻳﺖ. ﺟﻤﻴﻊ ﻣﻮاﻗﻌﻨﺎ ﻓﺴﻴﺤﺔ وﻓﺎﺧﺮة وﻣﺼﻤﻤﺔ ﻟﺘﻜﻮن ﻋﻤﻠﻴﺔ . وﻧﺤﻦ ﻧﻔﺨﺮ ﻓﻲ ﺣﻘﻴﻘﺔ أﻧﻨﺎ ﻧﻘﺪم اﻟﺨﺪﻣﺔ ﻟﻠﻌﻤﻼء ﻓﻲ ﻣﺨﺘﻠﻒ اﻟﺼﻨﺎﻋﺎت - اﻟﻌﺎﻣﺔ واﻟﺨﺎﺻﺔ، ﺑﻤﺎ ﻓﻲ ذﻟﻚ اﻟﻤﻬﻨﺪﺳﻴﻦ واﻟﻤﻬﻨﺪﺳﻴﻦ اﻟﻤﻌﻤﺎرﻳﻴﻦ واﻟﻤﻬﻨﻴﻴﻦ
 ...<a href="about.php">إقرأ المزيد</a>
                            </p>
                        </div>
                   <div class="col_two_third col_last"><img src="<?=base_url()?>assets/web/images/main-about.jpg"/></div>

                        <div class="clear"></div>

                    </div>

                    <div class="container clearfix">
                        <div class="fancy-title title-double-border">
                            <h2>الاقسام</h2>
                        </div>



                        <div class="col_one_third">
                            <div class="feature-box fbox-center fbox-border fbox-effect noborder">
                                <div class="fbox-icon">
                                    <a href="services.php"><i class="icon-cog i-alt"></i></a>
                                </div>
                                <h3>الخدمات<span class="subtitle" style="color:#333;">يقدم مركز الطالب عدد كبير ومتنوع من خدمات الطباعة اللتي تلبي احتياجات الطلاب والشركات</span></h3>
                            </div>
                        </div>


                        <div class="col_one_third">
                            <div class="feature-box fbox-center fbox-border fbox-effect noborder">
                                <div class="fbox-icon">
                                    <a href="branches.php"><i class="icon-location i-alt"></i></a>
                                </div>
                                <h3>الافرع<span class="subtitle" style="color:#333;">يوفر مركز الطالب خدمات مميزة في الافرع المنتشرة في مناطق دولة الكويت، لمزيد من المعلومات الرجاء الذهاب لصفحة الافرع</span></h3>
                            </div>
                        </div>
                        <div class="col_one_third col_last">
                            <div class="feature-box fbox-center fbox-border fbox-effect noborder">
                                <div class="fbox-icon">
                                    <a href="contact.php"><i class="icon-phone3 i-alt"></i></a>
                                </div>
                                <h3>الاتصال بنا<span class="subtitle" style="color:#333;">لمزيد من المعلومات وطرق الاتصال بنا، الرجاء الذهاب الى صفحة الاتصال بنا</span></h3>
                            </div>
                        </div>


                    </div>
                </div>

            </section><!-- #content end -->
