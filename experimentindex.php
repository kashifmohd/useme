<?php 
		include('includes/head_css_links_includes.php');
?>

<body>  
		<!-- This is to add Header File  -->
		
		<div data-role="page" id="pageone">
	        	<div data-role="panel" id="myPanel" data-theme="b"> 
	                        <a href="http://useme.edusamosa.in/Add.php" class="ui-btn ui-shadow">Add a Bin/Toilet</a>
	                        <a href="http://useme.edusamosa.in/Required.php" class="ui-btn ui-shadow">State Requirement</a>
	                        <a href="http://useme.edusamosa.in/Complaint.php" class="ui-btn ui-shadow">Complaint</a>
	                        <a href="http://useme.edusamosa.in/Share.php" class="ui-btn ui-shadow">Like & Share</a>
	                        <a href="http://useme.edusamosa.in/LeaderBoard.php" class="ui-btn ui-shadow">LeaderBoard</a>
	                        <a href="http://useme.edusamosa.in/About_Us.php" class="ui-btn ui-shadow">About Us</a>
	                      
	                 </div> 
	  
                 <div data-role="header" data-theme="b">
                        <h1>USE ME</h1>
                        <a href="#myPanel" class="ui-btn ui-corner-all ui-shadow ui-icon-home ui-btn-icon-notext">Home</a>
                        <div data-role="navbar">
                              <ul>
                               <li><a id="dustbintab" href="http://useme.edusamosa.in/experimentmaps.php?maptype=dustbin"   class="ui-btn ui-icon-search ui-btn-icon-bottom" >Search Dustbins</a></li>

                                  <li><a href="http://useme.edusamosa.in/experimentmaps.php?maptype=toilet"    class="ui-btn ui-icon-search ui-btn-icon-bottom">Search Toilets</a></li>
                                  
                                   
                              </ul>
                        </div>
                  </div>


              

  		
  		
  		
  		
  		<div data-theme="a" data-role="footer" data-theme="b">
  			<h2>Dustbin Categories:</h2>
			    <ul data-role="listview" data-inset="true" >
			      <li>
			        <img src="household.png" class="ui-li-icon">Household Dustbins
			      </li>
			      <li>
			        <img src="recyclable.png" class="ui-li-icon">Paper dumping zones
			      </li>
			      <li>
			        <img src="ewaste.png" class="ui-li-icon">E-Wastes dumping zones
			      </li>
			      <li>
			        <img src="scrap.png" class="ui-li-icon">Metallic Scrap-dumping zones
			      </li>
			      <li>
			        <img src="chemical.png" class="ui-li-icon">Chemical-treatment zones
			      </li>
			    </ul>
			    <h2>Toilet Categories:</h2>
			    <ul data-role="listview" data-inset="true">
			      <li>
			        <img src="gents.png" class="ui-li-icon">Men's Toilet
			      </li>
			      <li>
			        <img src="ladies.png" class="ui-li-icon">Women's Toilet
			      </li>
			      <li>
			        <img src="both.png" class="ui-li-icon">Unisex Toilet
			      </li>
			      
			    </ul>
  			
  		</div>
	</div>
    
</body>