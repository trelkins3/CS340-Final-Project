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
	
	<header>
        <h1><a>SatelliteDB</a></h1>
		<nav>
            <ul class="navbar-list">
                <li class="navbar-item"><a href="index.php">Home</a></li>
                
                <li class="navbar-item"><a href="satelliteDB.php">Satellite Database</a></li>
                <li class="navbar-item"><a href="addObject.php">Add Satellite</a></li>
                <?php
                    if(isset($_SESSION['status'])){
                        echo "<li class=\"navbar-item\"><a href=\"favorites.php\">Favorites</a></li>";
                        echo "<li class=\"navbar-item navbar-right\"><a href=\"logOut.php\">Log Out</a></li>";
                    }
                    else {
                        echo "<li class=\"navbar-item navbar-right\"><a href=\"logIn.php\">Log In</a></li>";
                        echo "<li class=\"navbar-item navbar-right\"><a href=\"signUp.php\">Sign Up</a></li>";
                    }
                ?>
            </ul>
        </nav>
    </header>
	
	<main>
		<!-- Rewrite this at some point? Maybe add 'about' title -->
		<!-- This should be aligned left with an image and Reddit feeds on the right -->
		<p>Welcome to SatelliteDB! SatelliteDB is a project created
		by Donald "Trey" Elkins and Adam Ruark with the goal of cataloguing various objects
		in orbit around the earth. We wanted to provide an easy to use, visually inoffensive
		web application that allows users to learn about or research satellites.<br><br>
		
		The satellite database page provides a list of all orbital objects contained within 
		the SatelliteDB catalog. Clicking an object's name will redirect to a page containing
		all of its recorded information. If you're logged in, objects can be favorited from
		their specific page. Favorites can be accessed from the 'Favorites' tab after logging
		in to SatelliteDB.<br><br>
		
		If you don't see an object that you'd like in the satellite datbase, use the 'add
		satellite' page to submit it to the catalog! More information in the database means
		a more useful system, so any additions are appreciated.<br><br>
		
		Enjoy!</p>
		<?php
			if(isset($_SESSION['status'])){
				echo "<b>You are logged in as ". $_SESSION['username'] . ".</b>";
			}
			else {
				echo "<b>You are not logged in.</b>";
			}
		?>
		<br><br><br>
		<script src="https://www.reddit.com/r/space/.embed?limit=5&t=all" type="text/javascript">
		</script>
    </main>
	
    </body>
</html>
