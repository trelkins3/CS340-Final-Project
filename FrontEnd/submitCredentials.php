<!DOCTYPE html>
<html>
	<head>
		<title>Log in Status</title>
		<link rel="stylesheet" href="index.css">
	</head>
<body>
<h2>Log in Status</h2>
<?php
	include 'connectvarsEECS.php'; 
	
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	$userName = mysqli_real_escape_string($conn, $_POST["userName"]);
	$password = mysqli_real_escape_string($conn, $_POST["password"]);

//Get information for user
	$query = "SELECT * FROM DBUsers WHERE Username = '$userName'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if(!$row){
		die('Username not found');
	}
//Fetch the stored password and compare the entered password
	$dbPassword = $row['Pass'];
	$salt = $row['salt'];
	$password = md5($password . $salt);

	if($dbPassword == $password){
		echo "Success";
	}
	else{
		die('Incorrect Password');
	}
		
	mysqli_free_result($result);
	mysqli_close($conn);	
?>

</body>
</html>