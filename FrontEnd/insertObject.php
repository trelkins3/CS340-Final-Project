<?php
session_start();

include 'connectvarsEECS.php'; 

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$conn) {
	die('Could not connect: ' . mysql_error());
}

//Initialize field variables
$fields = array("satID"=>null, "COSPAR"=>null,"owner"=>null,"launchID"=>null,
				"launchSite"=>null, "launchDate"=>null, "orbitalPeriod"=>null,
				"purpose1"=>null, "purpose2"=>null, "image"=>null);
					
// Escape user inputs for security and check for mandatory fields
$error = false;
foreach($fields as $name => $value){
	$fields["$name"] = mysqli_real_escape_string($conn, $_POST["$name"]);
	if($name == "purpose1" || $name == "purpose2" || $name == "image"){
		//do nothing, these can be null
	}
	else if($fields["$name"] == null){
		$error = true;
		break;
	}
}

//if any fields left blank, exit with error
if($error){
	$_SESSION['errMsg'] = "Mandatory field left blank";
	echo "<script>window.location.replace(\"addObject.php\")</script>";
	exit();
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
$image = $fields['image'];

//TODO: some constraint checking
//Worst case scenario we BS our way through the presentation


// Insertion queries
$launchQuery = "INSERT INTO Rocket (launchID, launchDate, launchSite) VALUES
				('$launchID', '$launchDate', '$launchSite')";
$satQuery = "INSERT INTO Satellite (satID, COSPAR, ownerID, launchID, orbitalPeriod) VALUES
			 ('$satID', '$COSPAR', '$owner', '$launchID', '$orbitalPeriod')";
$purposeQuery = "INSERT INTO Purpose (satID, purpose1, purpose2) VALUES 
				('$satID', '$purpose1', '$purpose2')";
$imageQuery = "INSERT INTO Images VALUES ('$satID', '$image')";

$results1 = mysqli_query($conn, $launchQuery);
$results2 = mysqli_query($conn, $satQuery);
$results3 = mysqli_query($conn, $purposeQuery);
$results4 = mysqli_query($conn, $imageQuery);

mysqli_close($conn);

if ($results1 && $results2 && $results3 && $results4){
	echo "<script>window.location.replace(\"satelliteDB.php\")</script>";
	exit();	
}
else{
	$_SESSION['errMsg'] = "Unable to add entry";
	echo "<script>window.location.replace(\"addObject.php\")</script>";
	exit();
}

?>