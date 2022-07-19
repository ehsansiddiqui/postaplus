<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12"> 
            <!-- START DATATABLE EXPORT -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> STUDIO LOCATION</h3>&nbsp;

                    <a href="<?= site_url('studio_location/edit_studio_class_location') ?> "><i class="fa fa-plus icon-bk"></i></a>

                    <div class="btn-group pull-right">
                        <button class="btn btn-primary dropdown-toggle bk" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                        <ul class="dropdown-menu">
<!--                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'json',escape:'false'});"><img src='<?= base_url() ?>assets/img/icons/json.png' width="24"/> JSON</a></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"><img src='<?= base_url() ?>assets/img/icons/json.png' width="24"/> JSON (ignoreColumn)</a></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'json',escape:'true'});"><img src='<?= base_url() ?>assets/img/icons/json.png' width="24"/> JSON (with Escape)</a></li>
                            <li class="divider"></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'xml',escape:'false'});"><img src='<?= base_url() ?>assets/img/icons/xml.png' width="24"/> XML</a></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'sql'});"><img src='<?= base_url() ?>assets/img/icons/sql.png' width="24"/> SQL</a></li>
                            <li class="divider"></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'csv',escape:'false'});"><img src='<?= base_url() ?>assets/img/icons/csv.png' width="24"/> CSV</a></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'txt',escape:'false'});"><img src='<?= base_url() ?>assets/img/icons/txt.png' width="24"/> TXT</a></li>
                            <li class="divider"></li>-->
                            <li><a href="#" onClick ="$('#customers2').tableExport({type: 'excel', escape: 'false'});"><img src='<?= base_url() ?>assets/img/icons/xls.png' width="24"/> XLS</a></li>
<!--                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'doc',escape:'false'});"><img src='<?= base_url() ?>assets/img/icons/word.png' width="24"/> Word</a></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'powerpoint',escape:'false'});"><img src='<?= base_url() ?>assets/img/icons/ppt.png' width="24"/> PowerPoint</a></li>
                            <li class="divider"></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'png',escape:'false'});"><img src='<?= base_url() ?>assets/img/icons/png.png' width="24"/> PNG</a></li>
                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'pdf',escape:'false'});"><img src='<?= base_url() ?>assets/img/icons/pdf.png' width="24"/> PDF</a></li>-->
                        </ul>
                    </div>                                    

                </div>
                <div class="panel-body">
                    <table id="customers2" class="table datatable">
                        <thead>
                            <tr>
                                <th>SINO</th>
<!--                                               <th>Class Name</th>-->
                                <th>Location Name</th>
                                <th>Place</th>
                                <th>Latitude </th>
                                <th>Longitude </th>
                               
                                

<!--                                <th>Available Slots</th>
                                <th>Balance Slot</th>-->
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result) {
                                $i = 1;
                                foreach ($result as $row) {
                                    ?>   
                                    <tr>

                                        <td><?= $i ?></td>
                                        <td><?= $row->location_name; ?></td>
                                        <td><?php
                                        
                                        
                                        if(!empty($row->place)){
                                            echo $row->place;
                                        }else{
                                            echo "N/A";
                                        } 
                                        
                                        ?></td>
                                          <td><?php
                                        
                                        if(!empty($row->studio_Latitude)){
                                            echo $row->studio_Latitude;
                                        }else{
                                            echo "N/A";
                                        }
                                        ?></td>
                                        <td><?php
                                        
                                       if(!empty($row->studio_Longitude)){
                                            echo $row->studio_Longitude;
                                        }else{
                                            echo "N/A";
                                        }     
                                        ?></td>
                                      
                                      
                                      <td>
                                    <a href="<?php echo site_url('studio_location/edit_studio_class_location/' . $row->studio_location_id) ?>"><i class="fa fa-edit"></i></a>
                                    <a href="<?php echo site_url('studio_location/delete_studio_class_location/' . $row->studio_location_id) ?>" onclick="return confirm('Are  you sure you want to delete this ')"><i class="fa fa-trash-o"></i></a> 
                                          </td>

                            </tr>
                                        <?php
                                        $i++;
                                }
                                }
                                ?>
        </tbody>
    </table>                                    
</div>
</div>

</div>
        
        <div class="col-md-12">
 
    <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">PLACE</h3>
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

</div>

</div>         
                                <!-- END PAGE CONTENT WRAPPER -->
