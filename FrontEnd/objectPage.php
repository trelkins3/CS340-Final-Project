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
	
	<?php
		include 'header.php';
	?>
	<main>
	
	<?php
		include 'connectvarsEECS.php'; 
		
		// Fetch passed object name
		$objectName = $_GET['param'];

		//print page title
		echo "<h1 class=\"page-title\">Satellite: $objectName</h1>";
	
		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}
		
		// Queries for satellite, launch, and purpose tables
		$satQuery = "SELECT satID, COSPAR, ownerID, orbitalPeriod FROM Satellite
					 WHERE satID='$objectName'";
		$launchQuery = "SELECT launchDate, launchSite FROM Rocket WHERE launchID=
						(SELECT launchID FROM Satellite WHERE satID='$objectName')";
		$purposeQuery = "SELECT purpose1, purpose2 FROM Purpose WHERE
						 satID='$objectName'";
		$imageQuery = "SELECT url FROM Images WHERE satID='$objectName'";
		
		// Fetch everything
		$satResult = mysqli_query($conn, $satQuery);
		if(!satResult){ die("Query to fetch satellite failed."); }
		
		$launchResult = mysqli_query($conn, $launchQuery);
		if(!launchResult){ die("Query to fetch launch failed."); }
		
		$purposeResult = mysqli_query($conn, $purposeQuery);
		if(!purposeResult){ die("Query to fetch purposes failed."); }

		$imageResult = mysqli_query($conn, $imageQuery);
		if(!imageQuery){ die("Query to fetch image failed."); }
		
		// Cut into row object for individual item access
		$satRow = mysqli_fetch_row($satResult);
		$launchRow = mysqli_fetch_row($launchResult);
		$purposeRow = mysqli_fetch_row($purposeResult);
		$image = mysqli_fetch_row($imageResult);
		
		// Print out table
		echo "<div class=\"col-left\"><table class=\"t02\">";	
		echo "<tr><td>Satellite Name:</td><td> $satRow[0]</td></tr>";
		echo "<tr><td>COSPAR ID Number:</td><td> $satRow[1]</td></tr>";
		echo "<tr><td>Launch Owner:</td><td> $satRow[2]</td></tr>";
		echo "<tr><td>Launch Date:</td><td> $launchRow[0]</td></tr>";
		echo "<tr><td>Launch Site:</td><td> $launchRow[1]</td></tr>";
		echo "<tr><td>Orbital Period:</td><td> $satRow[3] Hours</td></tr>";
		echo "<tr><td>Purposes:</td><td>";
		if($purposeRow[0] == NULL){
			echo "None";
		}
		else if($purposeRow[1] == NULL){
			echo "$purposeRow[0]";
		}
		else {
			echo "$purposeRow[0] and $purposeRow[1]";
		}
		echo "</td></tr></table></div>";
		
		// Photo code goes here?
		echo "<div class=\"col-right\">";
		echo "<a href=\"$image[0]\"><img src=\"$image[0]\"></img></a>";
		echo "</div>";

		mysqli_close($conn);
	?>

	</main>
	</body>
</html>