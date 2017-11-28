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
				<li class="navbar-item"><a href="about.php">About</a></li>
				<?php
					if(isset($_SESSION['status'])){
						echo "<li class=\"navbar-item\"><a href=\"favorites.php\">Favorites</a></li>";
						echo "<li class=\"navbar-item navbar-right\"><a href=\"logOut.php\">Log Out</a></li>";
					}
					else {
						echo "<li class=\"navbar-item navbar-right\"><a href=\"logIn.php\">Log In</a></li>";
					}
				?>
			</ul>
		</nav>
    </header>
	
	<?php
		include 'connectvarsEECS.php'; 
	
		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}
		
		$query = 'SELECT satID as "Satellite Name", COSPAR as "COSPAR ID",
				  ownerID as "Launch Entity", launchID, orbitalPeriod
				  as "Orbital Period (Hrs)" FROM `Satellite`';

		$result = mysqli_query($conn, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}
		
		// get number of columns in table	
		$fields_num = (mysqli_num_fields($result));
		echo "<h1>$table</h1>";
		echo '<table class="t01"><tr>';
		
		for($i=0; $i<$fields_num; $i++) {	
			$field = mysqli_fetch_field($result);
			echo "<th><b>$field->name</b></th>";
		}
		
		echo "</tr>\n";
		while($row = mysqli_fetch_row($result)) {	
			echo "<tr class='notFirst'>";	
		
			// $row is array... foreach( .. ) puts every element
			// of $row to $cell variable	
		
			$count = count($row);	// Using this as a workaround to not print salt
		
			foreach($row as $cell){
				if($count == 0)
					break;
				echo "<td>$cell</td>";	
				$count--;
		}
		echo "</tr>\n";
		}
		
		echo '</table>';
	?>

    <main>
    	
    </main>
	
    </body>
</html>
