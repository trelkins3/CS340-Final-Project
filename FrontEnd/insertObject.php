<!DOCTYPE html>
<html>
	<head>
		<title>Object Addition Submission</title>
		<link rel="stylesheet" href="style.css">
	</head>
<body>
<h2>Object Addition Submission</h2>
<?php
	include 'connectvarsEECS.php'; 
	
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	//Initialize field variables
	$fields = array("satID"=>"", "COSPAR"=>"","owner"=>"","launchID"=>"",
					"launchSite"=>"", "launchDate"=>"", "orbitalPeriod"=>"",
					"purpose1"=>"", "purpose2"=>"");
					
	// Escape user inputs for security and check for mandatory fields

	// THIS NEEDS TO BE WRITTEN
	
	// Escape user inputs for security and check for mandatory fields
	$error = false;
	foreach($fields as $name => $value){
		$fields["$name"] = mysqli_real_escape_string($conn, $_POST["$name"]);
		if($fields["$name"] == ""){
			$error = true;
		}

	}
		
	// Var separation
	$satID = $fields['satID'];
	$COSPAR = $fields['COSPAR'];
	$owner = $fields['owner'];
	$launchID = $fields['launchID'];
	$launchSite = $fields['launchSite'];
	$launchDate = $fields['launchDate'];
	$orbitalPeriod = $fields['orbitalPeriod'];
	$purpose1 = $fields['purpose1'];
	$purpose2 = $fields['purpose2'];
	
	// Insertion queries
	$launchQuery = "INSERT INTO Rocket (launchID, launchDate, launchSite) VALUES
					('$launchID', '$launchDate', '$launchSite')";
	$satQuery = "INSERT INTO Satellite (satID, COSPAR, ownerID, launchID, orbitalPeriod) VALUES
				 ('$satID', '$COSPAR', '$owner', '$launchID', '$orbitalPeriod')";
	$purposeQuery = "INSERT INTO Purpose (satID, purpose1, purpose2) VALUES 
					('$satID', '$purpose1', '$purpose2')";
					
	if (mysqli_query($conn, $launchQuery)){
		if (mysqli_query($conn, $satQuery)){
			if (mysqli_query($conn, $purposeQuery)){
				echo "Record added successfully.";
			} 
		} 
	}
	else{
		echo "ERROR: Could not execute query. " . mysqli_error($conn);
	}
	
	mysqli_close($conn);
?>
	
</body>
</html>