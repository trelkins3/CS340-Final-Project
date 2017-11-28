 <?php
session_start();
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Object Database</title>
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
	
	<?php
		include 'connectvarsEECS.php'; 
		
		$objectName = $_GET['param'];
	
		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}
		
		$satQuery = "SELECT satID, COSPAR, ownerID, orbitalPeriod FROM Satellite
					 WHERE satID='$objectName'";
		$launchQuery = "SELECT launchDate, launchSite FROM Rocket WHERE launchID=
						(SELECT launchID FROM Satellite WHERE satID='$objectName')";
		$purposeQuery = "SELECT purpose1, purpose2 FROM Purpose WHERE
						 satID='$objectName'";
		
		$satResult = mysqli_query($conn, $satQuery);
		if(!satResult){ die("Query to fetch satellite failed."); }
		
		$launchResult = mysqli_query($conn, $launchQuery);
		if(!launchResult){ die("Query to fetch launch failed."); }
		
		$purposeResult = mysqli_query($conn, $purposeQuery);
		if(!purposeResult){ die("Query to fetch purposes failed."); }
		
		$satRow = mysqli_fetch_row($satResult);
		$launchRow = mysqli_fetch_row($launchResult);
		$purposeRow = mysqli_fetch_row($purposeResult);
		
		//echo "$objectName";		
		echo "<br>Satellite Name: $satRow[0]<br><br>";
		echo "COSPAR ID Number: $satRow[1]<br><br>";
		echo "Launch Owner: $satRow[2]<br><br>";
		echo "Launch Date: $launchRow[0]<br><br>";
		echo "Launch Site: $launchRow[1]<br><br>";
		echo "Orbital Period: $satRow[3] Hours<br><br>";
		echo "Purposes: $purposeRow[0] $purposeRow[1] <br>";
		
		// Photo code goes here?
	?>