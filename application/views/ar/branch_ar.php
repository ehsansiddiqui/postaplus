<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
            <section id="page-title" class="page-title-parallax page-title-dark" style="padding: 250px 0; background-image: url('<?=base_url()?>assets/web/images/about.jpg'); background-size: cover; background-position: center center;" data-bottom-top="background-position:0px 400px;" data-top-bottom="background-position:0px -500px;">

                <div class="container clearfix">
                    <h1>افرعنا</h1>
                    <span>تعرف على اماكن تواجدنا وارقام الهواتف التابعة لافرع مركز الطالب</span>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">الرئيسية</a></li> 
                        <li class="breadcrumb-item active" aria-current="page">الافرع</li>
                    </ol>
                </div>

            </section><!-- #page-title end -->

            <!-- Content
            ============================================= -->
            <section id="content">

                <div class="content-wrap">

                    <div class="container clearfix">

                      
                    <?php if(!empty($branch)){ $i=1; foreach($branch as $row){ ?>

                        
                    <?php                        
                    if($i==0){                          
                    ?>

                       <div class="col_half">
                            <div class="heading-block fancy-title nobottomborder title-bottom-border"><h4><?=$row->branch_name?> <span>فرع</span>.</h4></div>
                            <div class="col_one_third"><img src="<?=base_url()?>branch/<?=$row->branch_image?>"/></div>
                            <div class="col_two_third col_last">
                                <p>
                                    Email:<?=$row->branch_email?><br>
                                    Phone:<?=$row->phone_number?><br>
                                    Whatsapp:<?=$row->whatsapp_no?><br>
                                    location:<?=$row->address?><br>
                                    Direction: <a href="<?=$row->google_map_url?>"><?=$row->address?></a>
                                </p>
                            </div>
                        </div>
                        <div class="col_half col_last">
                            <div class="heading-block fancy-title nobottomborder title-bottom-border"><h4><?=$row->branch_name?><span>Branch</span>.</h4></div>
                            <div class="col_one_third"><img src="<?=base_url()?>branch/<?=$row->branch_image?>"/></div>
                            <div class="col_two_third col_last">
                                <p>
                                Email:<?=$row->branch_email?><br>
                                Phone:<?=$row->phone_number?><br>
                                Whatsapp:<?=$row->whatsapp_no?><br>
                                location:<?=$row->address?><br>
                                Direction: <a href="<?=$row->google_map_url?>"><?=$row->address?></a>
                                </p>
                            </div>
                        </div>

                     <?php   
                     }
                     ?>
                           

                        
                        <?php if($i%2!=0){ ?>   
                        
                        <div class="col_half">
                            <div class="heading-block fancy-title nobottomborder title-bottom-border"><h4><?=$row->branch_name?> <span>فرع</span>.</h4></div>
                            <div class="col_one_third"><img src="<?=base_url()?>branch/<?=$row->branch_image?>"/></div>
                            <div class="col_two_third col_last">
                                <p>
                                    Email:<?=$row->branch_email?><br>
                                    Phone:<?=$row->phone_number?><br>
                                    Whatsapp:<?=$row->whatsapp_no?><br>
                                    location:<?=$row->address?><br>
                                    Direction: <a href="<?=$row->google_map_url?>"><?=$row->address?></a>
                                </p>
                            </div>
                        </div>
                        
                        <?php } ?>  

                       <?php if($i%2==0){ ?>  

                        <div class="col_half col_last">
                            <div class="heading-block fancy-title nobottomborder title-bottom-border"><h4><?=$row->branch_name?><span>فرع</span>.</h4></div>
                            <div class="col_one_third"><img src="<?=base_url()?>branch/<?=$row->branch_image?>"/></div>
                            <div class="col_two_third col_last">
                                <p>
                                Email:<?=$row->branch_email?><br>
                                Phone:<?=$row->phone_number?><br>
                                Whatsapp:<?=$row->whatsapp_no?><br>
                                location:<?=$row->address?><br>
                                Direction: <a href="<?=$row->google_map_url?>"><?=$row->address?></a>
                                </p>
                            </div>
                        </div>

                       <?php } ?> 







                    <?php  $i++; }   }  ?>                         
                    

                    </div>



                </div>

            </section>
