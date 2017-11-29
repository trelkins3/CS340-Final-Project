<?php
session_start();
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Favorites</title>
		<link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
	</head>

    <body>
	
	<?php
		include 'header.php';
	?>
	
	<?php
		include 'connectvarsEECS.php'; 
		
		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}
		
		$User = $_SESSION['username'];
		// This needs to be dynamic - but how? $_Session['username']?
		$query = "SELECT satID as 'Satellite Name', 
						COSPAR as 'COSPAR ID',
						ownerID as 'Owner', 
						launchID as 'Launch ID', 
						orbitalPeriod as 'Orbital Period' 
					FROM Satellite 
					WHERE satID=(SELECT satID FROM Favorites WHERE Username='$User')";
		
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
			echo "<tr class='not-first'>";	
		
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