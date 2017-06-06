<!DOCTYPE html>
<html>

	<head>
		<title>LLD :: Contact</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Peralta|Quicksand|Dosis">
		
	</head>
	
<!-- header -->
<?php include '_header.php'?>
		
<!-- content -->
		<div id="content">
			<h1>Contact Us</h1>
			
			<div id="address">
				<ul>
					<li><b>Lemon Labs Design</b>
					<li>13 Lemon Street
					<li>Dundee, DD1 3LL
					<li>Scotland, UK
				</ul>
			</div>
	<!-- GoogleMaps -->
			<div id="GoogleMap">
			<p>// Sorry, Google Maps temporarily unavailable</p>
			
			<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
				<div style="overflow:hidden;height:100%;width:100%;">
					<div id="gmap_canvas" style="height:100%;width:100%;">
					<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
					</div>
					<script type="text/javascript"> 
						function init_map(){
							var myOptions = {zoom:9,center:new google.maps.LatLng(56.462018,-2.970721000000026),mapTypeId: google.maps.MapTypeId.TERRAIN};
							map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
							marker = new google.maps.Marker({
								map: map,position: new google.maps.LatLng(56.462018, -2.970721000000026)});
							infowindow = new google.maps.InfoWindow({
								content:"<b>Lemon Labs</b><br/>13 Lemon Street<br/>Dundee DD1 3LL" });
							google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});
							infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
					</script>	
				</div>
			</div>
		</div>
	
<!-- footer -->		
<?php include '_footer.php'?>