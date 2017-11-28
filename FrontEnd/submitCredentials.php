<?php
	session_start();

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
		$_SESSION['errMsg'] = "Incorrect Username or Password";
		header("Location: logIn.php");
		exit();
	}
	//Fetch the stored password and compare the entered password
	$dbPassword = $row['Pass'];
	$salt = $row['salt'];
	$password = md5($password . $salt);

	mysqli_free_result($result);
	mysqli_close($conn);

	if($dbPassword == $password){
		$_SESSION['status'] = 'in';
		$_SESSION['username'] = $userName;
		header("Location: index.php");
		exit();
	}
	else{
		$_SESSION['errMsg'] = "Incorrect Username or Password";
		header("Location: logIn.php");
	}		
?>