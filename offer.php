<!DOCTYPE html>
<html>

	<head>
		<title>LLD :: Offer</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Peralta|Quicksand|Dosis">
		
	</head>
	
<!-- header -->
<?php include '_header.php'?>
		
<!-- content -->
	<div id="content">
			
		<div id="offer-page">	
			<div id="offer">
			<h1>Offer</h1>
				
			<!-- printings -->
				<div id="printings-h">
					<h3 onclick='document.getElementById("printings").style.display="inline", 
								 document.getElementById("printings-h").style.display="none"'>
					(+) Printings</h3>
				</div>
				
					<div id="printings">
						<h3 onclick='document.getElementById("printings").style.display="none", 
									 document.getElementById("printings-h").style.display="inline"'>
						(-) Printings</h3>
							<p>Flyers / Leaflets</p>
							<p>Business Cards</p>
							<p>Posters</p>
							<p>Brochures</p>
							<p>Folders</p>
					</div>
			
			<!-- outdoor -->
				<div id="outdoor-h">
					<h3 onclick='document.getElementById("outdoor").style.display="inline"
								 document.getElementById("outdoor-h").style.display="none"'>
					(+) Outdoor ads</h3>
				</div>
					
					<div id="outdoor">
						<h3 onclick='document.getElementById("outdoor").style.display="none",
									 document.getElementById("outdoor-h").style.display="inline"'>
						(-) Outdoor ads</h3>
							<p>Banners</p>
							<p>Billboards</p>
							<p>Signs</p>
							<p>Car Wrapping</p>
					</div>
				
			<!-- branding -->
				<div id="branding-h">
					<h3 onclick='document.getElementById("branding").style.display="inline"
								 document.getElementById("branding-h").style.display="none"'>				
					(+) Branding / Identity</h3>
				</div>
				
					<div id="branding">
						<h3 onclick='document.getElementById("branding").style.display="none",
									 document.getElementById("branding-h").style.display="inline"'>
						(-) Branding / Identity</h3>
						<p>Logos</p>
						<p>Visual Identity</p>
						<p>Full Branding</p>
					</div>
			
			<!-- digital media -->
				<div id="digital-h">
					<h3 onclick='document.getElementById("digital").style.display="inline"
								 document.getElementById("digital-h").style.display="none"'>				
					(+) Digital Media</h3>
				</div>
					<div id="digital">
						<h3 onclick='document.getElementById("digital").style.display="none"
									 document.getElementById("digital-h").style.display="inline"'>				
						(-) Digital Media</h3>
						<p>Websites</p>
						<p>Web Apps</p>
						<p>Mobile Apps</p>
						<p>Social Media campains</p>
					</div>
			
			<br>
			</div>
		
		</div>
	</div>
<!-- footer -->		
<?php include '_footer.php'?>