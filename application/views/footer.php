<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Footer
            ============================================= -->
<footer id="footer" class="dark">

    <!-- Copyrights
============================================= -->
    <div id="copyrights" style="padding: 20px 0;">

        <div class="container clearfix">

            <div class="col_half">
                <img src="<?=base_url()?>assets/web/images/logo-side-dark.png" style="height:50px; margin-bottom: 0px;" alt="" class="footer-logo">

                Copyrights &copy; <?=date('Y')?> All Rights Reserved by Pusta Plus.
            </div>

            <div class="col_half col_last tright">
                <div class="copyrights-menu copyright-links fright clearfix">
                    <a href="index.html">Home</a>/<a href="about.html">About</a>/<a href="services.html">Services</a>/<a href="branches.html">Branches</a>/<a
                        href="contact.html">Contact</a>
                </div>
                <div class="clearfix"></div>
                <div class="copyrights-menu copyright-links fright clearfix">
                    Phone: <a href="#">+965-24738383</a> <span style="margin-left:20px;"></span>Email:<a href="#">info@postastc.com</a>
                </div>

            </div>

        </div>

    </div><!-- #copyrights end -->

</footer><!-- #footer end -->

</div><!-- #wrapper end -->

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

<!--  <script>
var mySwiper = new Swiper ('.swiper-container', {
// Optional parameters
spaceBetween: 130,
centeredSlides: true,
autoplay: {
delay: 5000,
disableOnInteraction: false,
},
pagination: {
el: '.swiper-pagination',
clickable: true,
},
navigation: {
nextEl: '.swiper-button-next',
prevEl: '.swiper-button-prev',
},
})
</script>-->
</body>
</html>