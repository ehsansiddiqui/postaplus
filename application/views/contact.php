<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section id="page-title" class="page-title-parallax page-title-dark" style="padding: 250px 0; background-image: url('<?=base_url()?>assets/web/images/contact.jpg'); background-size: cover; background-position: center center;" data-bottom-top="background-position:0px 400px;" data-top-bottom="background-position:0px -500px;">

                <div class="container clearfix">
                    <h1>Contact us</h1> 
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li> 
                        <li class="breadcrumb-item active" aria-current="page">contact us</li>
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

                            <h3>Send us an Email</h3>

                            <div class="contact-widget">

                                <div class="contact-form-result"></div>

                                <form class="nobottommargin" id="template-contactform" name="template-contactform" action="../include/sendemail.html" method="post">

                                    <div class="form-process"></div>

                                    <div class="col_one_third">
                                        <label for="template-contactform-name">Name <small>*</small></label>
                                        <input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control required" />
                                    </div>

                                    <div class="col_one_third">
                                        <label for="template-contactform-email">Email <small>*</small></label>
                                        <input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control" />
                                    </div>

                                    <div class="col_one_third col_last">
                                        <label for="template-contactform-phone">Phone</label>
                                        <input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control" />
                                    </div>

                                    <div class="clear"></div>

                                    <div class="col_two_third">
                                        <label for="template-contactform-subject">Subject <small>*</small></label>
                                        <input type="text" id="template-contactform-subject" name="template-contactform-subject" value="" class="required sm-form-control" />
                                    </div>

                                    <div class="col_one_third col_last">
                                        <label for="template-contactform-service">Services</label>
                                        <select id="template-contactform-service" name="template-contactform-service" class="sm-form-control">
                                            <option value="">-- Select One --</option>
                                            <option value="printing">Printing</option>
                                            <option value="Branches">Branches</option>
                                            <option value="Feedback">FeedBack</option> 
                                        </select>
                                    </div>

                                    <div class="clear"></div>

                                    <div class="col_full">
                                        <label for="template-contactform-message">Message <small>*</small></label>
                                        <textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="30"></textarea>
                                    </div>

                                    <div class="col_full hidden">
                                        <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
                                    </div>

                                    <div class="col_full">
                                        <button class="button button-3d nomargin" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">Send Message</button>
                                    </div>

                                </form>
                            </div>

                        </div><!-- .postcontent end -->

                        <!-- Sidebar
                        ============================================= -->
                        <div class="sidebar col_last nobottommargin">

                            <address>
                                <strong>Headquarters:</strong><br>
                                Kuwait City, Al Inmaa Tower<br> 
                            </address>
                            <abbr title="Phone Number"><strong>Phone:</strong></abbr> (+965) 24738383<br> 
                            <abbr title="Email Address"><strong>Email:</strong></abbr> info@postastc.com



                            <div class="widget noborder notoppadding">

                                <a href="#" class="social-icon si-small si-dark si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>

                                <a href="#" class="social-icon si-small si-dark si-instagram">
                                    <i class="icon-instagram"></i>
                                    <i class="icon-instagram"></i>
                                </a>



                            </div>

                        </div><!-- .sidebar end -->

                    </div>

                </div>

            </section><!-- #content end -->