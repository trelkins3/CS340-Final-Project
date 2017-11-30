<?php
session_start();
?>
<!DOCTYPE html>

<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
	</head>

    <body>
	
	<?php
		include 'header.php';
	?>
	
	<main class="front-page">
		<!-- Rewrite this at some point? Maybe add 'about' title -->
		<!-- This should be aligned left with an image and Reddit feeds on the right -->
		<h1 class="page-title">Welcome to SatelliteDB</h1>
		<div class="col-left">
			<p> SatelliteDB is a project created
			by Donald "Trey" Elkins and Adam Ruark with the goal of cataloguing various objects
			in orbit around the earth. We wanted to provide an easy to use, visually clean
			web application that allows users to learn about or research satellites.<br><br>
			
			The satellite database page provides a list of all orbital objects contained within 
			the SatelliteDB catalog. Clicking an object's name will redirect to a page containing
			all of its recorded information. If you're logged in, objects can be favorited from
			their specific page. Favorites can be accessed from the 'Favorites' tab after logging
			in to SatelliteDB.<br><br>
			
			If you don't see an object that you'd like in the satellite datbase, use the 'add
			satellite' page to submit it to the catalog! More information in the database means
			a more useful system, so any additions are appreciated.<br><br>
			
			Enjoy!
			</p>
			<img src="http://www.esa.int/var/esa/storage/images/esa_multimedia/images/2015/05/iss_seen_from_sts-132/15404398-1-eng-GB/ISS_seen_from_STS-132.jpg">
		</div>

		<div class="col-right">
			<script src="https://www.reddit.com/r/space/.embed?limit=8&t=all" type="text/javascript">
			</script><br><br>
		</div>
		
    </main>
	
    </body>
</html>