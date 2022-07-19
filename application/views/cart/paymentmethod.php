<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<section>
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="col_full">

                <div class="content_center">
                    <h3 class="sub_head"> Select Payment Method </h3>

<!--                    <form class="default-form"  action="https://www.postastc.com/postaplus`SendPerformREQuest.php" id="form_id" method="post" enctype="multipart/form-data">-->
                    <form class="default-form"  action="<?=site_url('checkout/viewpayment')?>" id="form_id" method="post" enctype="multipart/form-data">

                        <div class="form-group">

                            <label><input type="radio" name="payment_option"  value="knet" /> K NET</label>&nbsp;
                            <label><input type="radio" name="payment_option"  value="MiGS" /> VISA/MASTER CARD </label>

                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" name="submit" class="btn btn-primary btn-block">Pay Now</button>
                            </div>

                            <div class="col-md-6">
                                <a href="<?=base_url()?>" class="btn btn-primary btn-block" style="padding: 13px;">Cancel</a>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>       