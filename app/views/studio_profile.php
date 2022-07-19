
            <div class="block">
                <div class="page-title">                    
                    <h2><span class="fa fa-users"></span> Studio Details</h2>
                </div>
                   
                  <div class="infont col-md-2"><a href="<?=site_url('studio/edit_studio')?>"><button type="button" class="btn btn-info btn-sm">Edit</button> </a></div>

                </div>   
<div class="col-md-6">
                            <!-- CONTACT ITEM -->
                            <div class="panel panel-default">
                                
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?=$result->studio_name?></h3>
                                </div>
                                
                                <div class="panel-body profile" style="background:white">
<!--                                    <div class="profile-image">-->
<img src="<?=base_url()?>studio/<?=$result->studio_image?>" alt="Nadia Ali" style="width:100%;height: 200px;">
<!--                                  </div>-->
                                    <div class="profile-data">
<!--                                        <div class="profile-data-name" style="color: black"><?=$result->studio_name?></div>
                                        <div class="profile-data-title"><?=$result->studio_website?></div>-->
                                    </div>
                                    <div class="profile-controls">
                                       
                                    </div>
                                </div> 
                                
                                
                                
                       
                                <div class="panel-body">                                    
                                    <div class="contact-info">
                                        <p><small>Mobile</small><br><?=$result->studio_phone_number1?><br><?=$result->studio_phone_number2?></p>
                                        <p><small>Web site</small><br><?=$result->studio_website?></p>
                                        <p><small>Address</small><br><?=$result->studio_address?></p>                      
                                        <p><small>Description</small><br><?=$result->studio_description?></p> 
                                        <p><small>Studio Timings</small><br>
                                              <?php foreach ($studio_timings as $row) { ?>
                                         
                                            <?php if ($row->studio_timings == '1') { ?>
                                                                   
                                                    Morning                   
                                            
                                            <?php }if ($row->studio_timings == '2') { ?>
                                               
                                                    Noon  
                                                     <?php }if ($row->studio_timings == '3') { ?>
                                                    Evening
                                                     <?php }if ($row->studio_timings == '4') { ?>
                                                    Night
                                                <?php } ?></p>  
                                             
                                              <?php } ?>
    
                                             
                                                             

                                    </div>
                                </div>                                
                            </div>
                            <!-- END CONTACT ITEM -->
                            
                        </div>
<div class="col-md-6">
 
 <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Location</h3>
                                </div>
                                <div class="panel-body panel-body-map">
                                    <div id="map" style="width: 100%; height: 300px;"></div> 
                                </div>
                            </div>
     
</div>

     

<script src="http://maps.google.com/maps/api/js?key=AIzaSyBe5copIMpt-k_Ii8L9k7bIQKVnE8gldXc"></script>


<script>
var locations =  [ 
    
    <?php foreach ($studio_location as $row) { ?>
    [
        "<?=$row->place?>",
        <?=$row->studio_Latitude?>,
        <?=$row->studio_Longitude?>,
        1,
        "Georgia Mason",
        "",
        "Norfolk Botanical Gardens, 6700 Azalea Garden Rd.",
        "coming soon"
    ],
    <?php } ?>
    ]

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      // center: new google.maps.LatLng(-33.92, 151.25),
      center: new google.maps.LatLng(<?=$studio_location[0]->studio_Latitude?>,<?=$studio_location[0]->studio_Longitude?> ),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0], locations[i][6]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }


</script>

