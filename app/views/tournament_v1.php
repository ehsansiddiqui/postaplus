                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Places</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="<?php echo site_url('place/add');?>"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      <div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
<!--                                            <li><a href="#">Print</a></li>-->
                                            <li><a href="#">Save as PDF</a></li>
<!--                                            <li><a href="#">Export to Excel</a></li>-->
                                         </ul>
                                      </div> 
                                   </div>
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                                <th><center>Place Title</center></th>
                                                <th><center>City</center></th>
                                                <th><center>Place Achor Image</center></th>
                                                <th><center>Place More Image</center></th>
                                                <th><center>Action</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                     <?php  
                                     $i = 0;
                                     $j = 1 ;
                                     foreach ($query as $row){ $i++; ?>        
                                            
                                            <?php if($i%2==0){  $i = 0; $i++; ?> <tr class="even gradeC"> <?php }else{ ?>
                                            <tr class="odd gradeX"> <?php } ?>
                                                
                                     <td><center><?php echo $row->tournament_venue;?></center></td>
                                     <td><center><?php echo $row->tournament_date ; ?></center></td>
                                     <td><center><?php echo $row->award_prize ; ?></center></td>
                                     <td><center><?php echo $row->award_prize ; ?></center></td>   
                                     <td><center><img src="<?php echo base_url()?>Tournament/<?php echo $row->tournament_id ?>/<?php echo $row->tournaament_big_image ; ?>" title="edit" height="50" width="100" /></center></td>           
                                                <td class="center">                         
                            <a href="<?php echo site_url('place/edit/'.$row->tournament_id) ?>"><img src="<?php echo base_url()?>assets/images/edit-icon.png" title="edit" /></a>
                            <a href="<?php echo site_url('place/delete/'.$row->tournament_id) ?>"><img src="<?php echo base_url()?>assets/images/delete-icon.png" title="Delete" onclick="return confirm('Are  you sure you want to delete this ')"/> </a>     
                                                </td>
                                            </tr>
                                           <?php $j++; }  ?>       
                                        </tbody>
                                    </table>
                                    
                                      <?php //echo $links;?> 
                                </div>
                            </div>
                        </div>
                        
                        <!-- /block -->
                    </div>
