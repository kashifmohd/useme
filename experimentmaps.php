<!DOCTYPE html>
<html>
        <head>
        	 <title>Use Me</title>
        	 <!--<META http-equiv="refresh" content="0;URL=http://useme.edusamosa.in/experimentmaps.php?maptype=dustbin">-->

              <!-- Include meta tag to ensure proper rendering and touch zooming -->
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <!-- Include jQuery Mobile stylesheets -->
              <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
              <!-- Include the jQuery library -->
              <script src="http://code.jquery.com/jquery-1.11.1.min.js">
              </script>
              <!-- Include the jQuery Mobile library -->
              <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js">
              </script>
              <script
                    src="http://maps.googleapis.com/maps/api/js">
              </script>
              
              
	<style>
            #content {
                padding: 0;
                position : absolute !important;
                top : 100px !important; 
                right : 0;
                bottom : 0px !important; 
                left : 0 !important;    
            }
        </style>
        </head>
        
<body>  
    <!-- This is to add Header File  -->
    
    <?php 
        include('includes/header.php');
    ?>
	<!-- php fetching values from database -->
	<?php
	$servername = "localhost";
	$username = "useme";
	$password = "useme123";
	$dbname = "useme";
	
	// What user wants to see
	$maptype=$_GET['maptype'];
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	     die("Connection failed: " . $conn->connect_error);
	} 
	
	$sql = "SELECT plat,plong,pcat FROM product ";
	
	$result = $conn->query($sql);
	$i=0;
	$positions = array(array(),array());
	$category=array();
	if ($result->num_rows > 0) {
	    
	     while($row = $result->fetch_assoc()) {
	
	  
	  
	  $positions[$i][0] = $row["plat"];
	  $positions[$i][1] = $row["plong"];
	  $category[$i]= $row["pcat"];  
	      $i++;
	  
	  }
	
	} else {
	     echo "0 results";
	}
	  
	
	
	$conn->close();
	
	
	?>  
	
	
	
	
	<!--
        <script>
                          function initialize()
                      {
                            var mapProp = 
                            {
                                center: new google.maps.LatLng(51.508742,-0.120850),
                                zoom:18,
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                           };
                            var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
                      }

                      function loadScript()
                      {
                            var script = document.createElement("script");
                            script.type = "text/javascript";
                            script.src = "http://maps.googleapis.com/maps/api/js?key=&sensor=false&callback=initialize";
                            document.body.appendChild(script);
                      }
		      
                      window.onload = loadScript;
                      //google.maps.event.trigger(mapProp, 'resize');
              </script>
        -->
        
        
        
        
        
        <script type="text/javascript">
		
		
		function init(location){
		var currentlocation= new google.maps.LatLng(location.coords.latitude,location.coords.longitude);
		
		var positions = <?php echo json_encode( $positions ) ?>;
		var num_rows = <?php echo json_encode( $result->num_rows ) ?>;
		var category= <?php echo json_encode($category)?>;
		
		
		
		var mapOptions = {
		
		          center:  new google.maps.LatLng(location.coords.latitude,location.coords.longitude),
		          zoom: 18,
		          mapTypeId:google.maps.MapTypeId.ROADMAP
		        };
		        
		var map = new google.maps.Map(document.getElementById('map-canvas'),
		            mapOptions);
		
		var marker,i;
		       for(i=0;i<num_rows+1;i++)  
		      {
		          
			      if(maptype=='dustbin')
			      {    
				     	if(category[i]=='household')
				         marker=new google.maps.Marker(
				          {
				            position: new google.maps.LatLng(positions[i][0], positions[i][1]),
				            map:map,
				            icon:"household.png"          
				
				          });
				       if (category[i]=='e-wastes') 
				        marker=new google.maps.Marker(
				          {
				            position: new google.maps.LatLng(positions[i][0], positions[i][1]),
				            map:map,
				            icon:"ewaste.png"          
				
				          });
				       if (category[i]=='paper-recyclable') 
				        marker=new google.maps.Marker(
				          {
				            position: new google.maps.LatLng(positions[i][0], positions[i][1]),
				            map:map,
				            icon:"recyclable.png"          
				
				          });
			               if (category[i]=='scrap') 
				        marker=new google.maps.Marker(
				          {
				            position: new google.maps.LatLng(positions[i][0], positions[i][1]),
				            map:map,
				            icon:"scrap.png"          
				
				          });
				
				       if (category[i]=='chemical') 
				        marker=new google.maps.Marker(
				          {
				            position: new google.maps.LatLng(positions[i][0], positions[i][1]),
				            map:map,
				            icon:"chemical.png"          
				
				          });     
			      }    
		     
		     	      if(maptype=='toilet')
			      {    
				      if(category[i]=='gents')
				         marker=new google.maps.Marker(
				          {
				            position: new google.maps.LatLng(positions[i][0], positions[i][1]),
				            map:map,
				            icon:"gents.png"          
				
				          });
				       if (category[i]=='ladies') 
				        marker=new google.maps.Marker(
				          {
				            position: new google.maps.LatLng(positions[i][0], positions[i][1]),
				            map:map,
				            icon:"ladies.png"          
				
				          });
				       if(category[i]=='both')
				         marker=new google.maps.Marker(
				          {
				            position: new google.maps.LatLng(positions[i][0], positions[i][1]),
				            map:map,
				            icon:"both.png"          
				
				          });
				}
			        
		    }
		      var marker=new google.maps.Marker({
		position: new google.maps.LatLng(location.coords.latitude,location.coords.longitude),
		map:map
		
		});
		
		}     
		       $(document).ready(function(){
		
		      navigator.geolocation.getCurrentPosition(init);
		
		       });
		       
		//Auto Refresh
       	    /*google.maps.event.addListener(map, "idle", function(){
            var center = map.getCenter();
            google.maps.event.trigger(map, 'resize'); 
            map.setCenter(center);

            });*/ 
            
	</script>
        
        
        
        
        
        

        <div data-role="content" id="content">
            <div id="map-canvas" style="height:100%"></div>
        </div>

        <div data-theme="a" data-role="footer" data-position="fixed">
            <h3>
                Search Toilets
            </h3>
        </div>
    </div>
    