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
		        
		map = new google.maps.Map(document.getElementById('map-canvas'),
		            mapOptions);
		
		var marker,i;
		       for(i=0;i<num_rows+1;i++)  
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
		    
		    
		      var marker=new google.maps.Marker({
		position: new google.maps.LatLng(location.coords.latitude,location.coords.longitude),
		map:map
		
		});
		//google.maps.event.trigger(map, 'resize'); 
		}     
		      $(document).ready(function(){
		
		      navigator.geolocation.getCurrentPosition(init);
		
		       });
  
       
    </script>

  </body>
</html>