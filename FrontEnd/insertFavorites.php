<?php
session_start();
?>
<!DOCTYPE html>

<html>
	<head>
		<title>Insert Favorites</title>
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

		//establish connection
		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}

		//SQL values and query
		$satID = mysqli_real_escape_string($conn, $_POST["satID"]);
		$username = $_SESSION['username'];
		$query = "INSERT INTO Favorites VALUES ('$username', '$satID')";

		//perform insertion
		$result = mysqli_query($conn, $query);
		mysqli_close($conn);

		//on success, reload page
		if($result){
			echo "<script>window.location.replace(\"objectPage.php?param=$satID\")</script>";
			exit();
		}
		else {
			echo "<div style=\"text-align: center;\"><br><br>Failed to add objects to favorites - you need to log in!</div>";
		}
	?>
	</main>
	</body>
</html>