<?php
session_start();

include 'connectvarsEECS.php'; 

//establish connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$conn) {
	die('Could not connect: ' . mysql_error());
}

//SQL values and query
$satID = mysqli_real_escape_string($conn, $_POST["satID"]);
$username = $_SESSION['username'];
$query = "DELETE FROM Favorites WHERE Username='$username' AND satID='$satID'";

//perform insertion
$result = mysqli_query($conn, $query);
mysqli_close($conn);

//on success, reload page
if($result){
	echo "<script>window.location.replace(\"objectPage.php?param=$satID\")</script>";
	exit();
}
else {
	die("$query");
}
?>

    
 