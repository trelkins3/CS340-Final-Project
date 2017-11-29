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
	
		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}
		
		$query = 'SELECT satID as "Satellite Name", COSPAR as "COSPAR ID",
				  ownerID as "Launch Entity" FROM `Satellite`';

		$result = mysqli_query($conn, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}
		
		// get number of columns in table	
		$fields_num = (mysqli_num_fields($result));
		echo "<h1>Satellites</h1>";
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
		
			$count = count($row);	
		
			foreach($row as $cell){
				if($count == 0)
					break;	
				else
					echo "<td>$cell</td>";
				$count--;
		}
		echo "</tr></a>\n";
		}
		
		echo '</table>';
	?>

    
    </main>
    </body>

    
</html>
