<!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <div class="row">
                        
                        <a href="<?php echo site_url('order/add_activity/'.$order_id) ?>"><button class="btn btn-primary" style="float:right;margin: 0px 10px;"><i class="fa fa-plus"></i>Activity</button></a><br><br>
                        
                        <div class="col-md-12">
                        
                            <!-- START TIMELINE -->
                            <div class="timeline timeline-right">
                                
                                
                                <?php if ($result) { $i = 1; foreach ($result as $row): ?>     
                                
                                <!-- START TIMELINE ITEM -->
                                <div class="timeline-item timeline-item-right">
                                    <div class="timeline-item-info"><?=date('d M Y',strtotime($row->date))?></div>
                                    <div class="timeline-item-icon"><span class="fa fa-users"></span></div>
                                    <div class="timeline-item-content">
                                        <div class="timeline-heading" style="padding-bottom: 10px;">
                                            
                                            
                                            
                                            
                                       <?php if($row->activity_type == 4){ ?>  
                                            
                                            <?php if(!empty($row->driver_image)){ ?>
                                            <img src="<?= base_url() ?>driver/<?=$row->driver_image?>"/>
                                            <?php }else{ ?>
                                            <img src="<?= base_url() ?>assets/assets/images/users/no-image.jpg"/>
                                            <?php } ?>
                                            
                                <a href="#"><?=ucfirst($row->first_name)?> (Driver)
                                       <?php }?>
                                    <?php if($row->activity_type == 5){ ?>  
                            <img src="<?= base_url() ?>assets/assets/images/users/no-image.jpg"/>        
                                <a href="#"><?=ucfirst('Admin')?>
                                       <?php }?>
                                  <?=$row->activity_title?> 
                                        </div>                                                                              
                                    </div>
                                
                                    
                                    <?php if($row->activity_message != NULL){ ?>
                                <div class="timeline-body comments">
                                            <div class="comment-write"> 
                                   <p><?=$row->activity_message?></p>   
                                            </div>
                                 </div>
                                    <?php }?>
                                    
                                    
                                    
                                </div>                                
                                <!-- END TIMELINE ITEM -->
                                 <?php $i++; endforeach ; } ?>
                                
                                
                                
                                
                                <!-- START TIMELINE ITEM -->
                                <div class="timeline-item timeline-main">
                                    <div class="timeline-date"><a href="#"><span class="fa fa-ellipsis-h"></span></a></div>
                                </div>                                
                                <!-- END TIMELINE ITEM -->
                            </div>
                            <!-- END TIMELINE -->
                            
                        </div>
                    </div>
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->