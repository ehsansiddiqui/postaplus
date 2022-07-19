<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section id="page-title" class="page-title-parallax page-title-dark" style="padding: 250px 0; background-image: url('<?=base_url()?>assets/web/images/contact.jpg'); background-size: cover; background-position: center center;" data-bottom-top="background-position:0px 400px;" data-top-bottom="background-position:0px -500px;">

                <div class="container clearfix">
                    <h1>الاتصال بنا</h1> 
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">الرئيسية</a></li> 
                        <li class="breadcrumb-item active" aria-current="page">الاتصال بنا</li>
                    </ol>
                </div>

            </section><!-- #page-title end -->




            <!-- Content
            ============================================= -->
            <section id="content">

                <div class="content-wrap">

                    <div class="container clearfix">

                        <!-- Postcontent
                        ============================================= -->
                        <div class="postcontent nobottommargin">

                            <h3>تواصل معنا</h3>

                            <div class="contact-widget">

                                <div class="contact-form-result"></div>

                                <form class="nobottommargin" id="template-contactform" name="template-contactform" action="../include/sendemail.php" method="post">

                                    <div class="form-process"></div>

                                    <div class="col_one_third">
                                        <label for="template-contactform-name">الإسم <small>*</small></label>
                                        <input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control required" />
                                    </div>

                                    <div class="col_one_third">
                                        <label for="template-contactform-email">البريد الالكتروني <small>*</small></label>
                                        <input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control" />
                                    </div>

                                    <div class="col_one_third col_last">
                                        <label for="template-contactform-phone">رقم الهاتف</label>
                                        <input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control" />
                                    </div>

                                    <div class="clear"></div>

                                    <div class="col_two_third">
                                        <label for="template-contactform-subject">الموضوع <small>*</small></label>
                                        <input type="text" id="template-contactform-subject" name="template-contactform-subject" value="" class="required sm-form-control" />
                                    </div>

                                    <div class="col_one_third col_last">
                                        <label for="template-contactform-service">الخدمة</label>
                                        <select id="template-contactform-service" name="template-contactform-service" class="sm-form-control">
                                            <option value="">-- إختر واحده --</option>
                                            <option value="printing">طباعة</option>
                                            <option value="Branches">الافرع</option>
                                            <option value="Feedback">خدمات اُخرى</option> 
                                        </select>
                                    </div>

                                    <div class="clear"></div>

                                    <div class="col_full">
                                        <label for="template-contactform-message">الرسالة <small>*</small></label>
                                        <textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="30"></textarea>
                                    </div>

                                    <div class="col_full hidden">
                                        <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
                                    </div>

                                    <div class="col_full">
                                        <button class="button button-3d nomargin" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">ارسال</button>
                                    </div>

                                </form>
                            </div>

                        </div><!-- .postcontent end -->

                        <!-- Sidebar
                        ============================================= -->
                        <div class="sidebar col_last nobottommargin">

                            <address>
                                <strong>الرئيسي:</strong><br>
                                مدينة الكويت، برج الإنماء<br> 
                            </address>
                            <abbr title="Phone Number"><strong>رقم الهاتف:</strong></abbr> <p style="direction:ltr !important;">(+965) 24738383</p><br> 
                            <abbr title="Email Address"><strong>البريد الالكتروني:</strong></abbr> <p>info@postastc.com</p>



                            <div class="widget noborder notoppadding">

                                <a href="https://www.facebook.com/postaplus.sc/" class="social-icon si-small si-dark si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>

                                <a href="https://www.instagram.com/postaplus.sc/" class="social-icon si-small si-dark si-instagram">
                                    <i class="icon-instagram"></i>
                                    <i class="icon-instagram"></i>
                                </a>



                            </div>

                        </div><!-- .sidebar end -->

                    </div>

                </div>

            </section><!-- #content end -->
