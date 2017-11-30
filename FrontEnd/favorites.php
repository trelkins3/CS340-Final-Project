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

	<?php
		include 'header.php';
	?>
    <body>
    	<main>
    		<h1>Favorites</h1>
	<?php
		include 'connectvarsEECS.php'; 
		
		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}
		
		//Query
		$User = $_SESSION['username'];
		$query = "SELECT S.satID as 'Satellite Name', 
					S.COSPAR as 'COSPAR ID', 
					S.ownerID as 'Owner', 
					S.launchID as 'Launch ID', 
					S.orbitalPeriod as 'Orbital Period'
				FROM Satellite S, DBUsers D, Favorites F 
				WHERE S.satID=F.satID AND F.Username=D.Username AND F.Username='$User'";
		
		$result = mysqli_query($conn, $query);
		if (!$result) {
			die("Query to show fields from table failed $query");
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
			$parameter = $row[0];	
			echo "<tr class='not-first' onclick=\"location.href='objectPage.php?param=$parameter'\">";	
		
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
    </main>
    </body>
</html>