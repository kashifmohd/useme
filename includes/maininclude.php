<!DOCTYPE html>
<html>
        <head>
        	 <title>Use Me</title>
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