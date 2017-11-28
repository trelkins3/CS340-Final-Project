<?php
session_start();

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

if($error){
	$_SESSION['errMsg'] = "Mandatory field left blank";
	echo "<script>window.location.replace(\"signUp.php\")</script>";
	exit();
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

echo "test";
if (mysqli_query($conn, $query)){
	mysqli_close($conn);
	$_SESSION['status'] = 'in';
	$_SESSION['username'] = $userName;
	echo "<script>window.location.replace(\"index.php\")</script>";	
	exit();
} 
else{
	$_SESSION['errMsg'] = "Username is already taken";
	echo "<script>window.location.replace(\"signUp.php\")</script>";
	exit();
}


?>