<!DOCTYPE html>
<html>

  <head>

    <style type="text/css">
      html, body, #map-canvas { height: 100%; margin: 0; padding: 0;}
    </style>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>     
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js">

    </script>
    
  </head>
  <body>



<div id="map-canvas"></div>


<html>
<body>

<?php
	$servername = "localhost";
	$username = "useme";
	$password = "useme123";
	$dbname = "useme";
	
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
		      var marker=new google.maps.Marker({
		position: new google.maps.LatLng(location.coords.latitude,location.coords.longitude),
		map:map
		
		});
		
		}     
		       $(document).ready(function(){
		
		      navigator.geolocation.getCurrentPosition(init);
		
		       });
       
    </script>

  </body>
</html>