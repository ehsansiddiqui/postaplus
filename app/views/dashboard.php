
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <!-- START WIDGETS -->                    
    <div class="row">
        <div class="col-md-4">

            <!-- START WIDGET SLIDER -->
            <div class="widget widget-default widget-carousel">


                         <div class="owl-carousel" id="owl-example">
                        <div>



                            <div class="widget-title"> Latest orders </div> 
                            
                            
                            <?php if (@$total_income->total_amounts == NULL) { ?>

                           <div class="widget-int">0.00</div>

                            <?php } else { ?>
                            <div class="widget-int"><?=round($total_income->total_amounts); ?></div>

                            <?php } ?>
                         

                        </div>
                        
                        <div>                                    
                            <div class="widget-title">Overall sales</div>
     
                           
                            <?php if (@$received_amount->received_amount == NULL){ ?>

                           <div class="widget-int">0.00</div>

                                    <?php } else { ?>
                           
                            <div class="widget-int"><?=round($received_amount->received_amount); ?></div>
       
                             <?php } ?>
                        </div>
                             
                      
                             
                        </div> 
                 

                </div>         
           

            </div>
            <div class="col-md-4">

                <!-- START WIDGET REGISTRED -->
                <div class="widget widget-default widget-item-icon">
                    <div class="widget-item-left">
                        <a href="<?=site_url('customer')?>"><span class="fa fa-user"></span></a>
                    </div>
                    <div class="widget-data">
                        <div class="widget-int num-count"><?=@$total_customers->cnt?></div>
                    <div class="widget-title">Customers</div>
                    <div class="widget-subtitle"></div>
                </div>
   
            </div>                            
            <!-- END WIDGET REGISTRED -->

        </div>
        
        
        <div class="col-md-4">

            <!-- START WIDGET CLOCK -->
            <div class="widget widget-info widget-padding-sm">
                <div class="widget-big-int plugin-clock">00:00</div>                            
                <div class="widget-subtitle plugin-date">Loading...</div>


                <div class="widget-buttons widget-c3">
                    <div class="col">
                    </div>
                    <div class="col">

                    </div>
                    <div class="col">

                    </div>
                </div>                            
            </div>                        
            <!-- END WIDGET CLOCK -->

        </div>
    </div>
    <!-- END WIDGETS -->                    



</div>
                               
