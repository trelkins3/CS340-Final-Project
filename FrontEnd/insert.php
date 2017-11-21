<!DOCTYPE html>
<!-- Insert into Student table CS 340 -->
<html>
	<head>
		<title>Form Submission</title>
		<link rel="stylesheet" href="style.css">
	</head>
<body>
<h2>Form Submission</h2>
<?php
	include 'connectvarsEECS.php'; 
	
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

//Initialize field variables
	$fields = array("userName"=>"", "name"=>"","email"=>"","password"=>"");

// Escape user inputs for security and check for mandatory fields
	$error = false;
	foreach($fields as $name => $value){
		$fields["$name"] = mysqli_real_escape_string($conn, $_POST["$name"]);
		if($fields["$name"] == ""){
			$error = true;
		}

	}

// hash and salt password
	$salt = time();
	$fields['password'] = md5($fields['password'] . $salt);

//separate into different variables, $query wasn't fun with so many quotes
	$userName = $fields['userName'];
	$name = $fields['name'];
	$email = $fields['email'];
	$password =$fields['password'];
 
// attempt insert query 
	$query = "INSERT INTO DBUsers (Username, Pass, Name, Email, salt) VALUES ('$userName', '$password', '$name', '$email', '$salt')";

	if($error){
		echo "ERROR: Mandatory field left blank";
	}
	else if (mysqli_query($conn, $query)){
		echo "Record added successfully.";
	} 
	else{
		echo "ERROR: Could not execute query. " . mysqli_error($conn);
	}
// close connection
mysqli_close($conn);
?>

</body>
</html>