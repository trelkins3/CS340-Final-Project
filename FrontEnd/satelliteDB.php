<!DOCTYPE html>
<html>
	<head>
		<title>Object Database</title>
		<link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	</head>

    <body>
	
	<header>
        SatelliteDB
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
		echo "<h1>$table </h1>";
		echo '<table class="t01"><tr>';
		
		for($i=0; $i<$fields_num; $i++) {	
			$field = mysqli_fetch_field($result);
			echo "<th><b>$field->name</b></th>";
		}
		
		echo "</tr>\n";
		while($row = mysqli_fetch_row($result)) {	
			echo "<tr>";	
		
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
