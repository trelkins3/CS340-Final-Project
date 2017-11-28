<?php
session_start();
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Log in Status</title>
		<link rel="stylesheet" href="style.css">
	</head>
<body>
	<header>
        <h1><a>SatelliteDB</a></h1>
		<nav>
			<ul class="navbar-list">
				<li class="navbar-item"><a href="index.php">Home</a></li>
				
				<li class="navbar-item"><a href="satelliteDB.php">Satellite Database</a></li>
				<li class="navbar-item"><a href="addObject.php">Add Satellite</a></li>
				<li class="navbar-item"><a href="about.php">About</a></li>
				<?php
					if(isset($_SESSION['status'])){
						echo "<li class=\"navbar-item\"><a href=\"favorites.php\">Favorites</a></li>";
						echo "<li class=\"navbar-item navbar-right\"><a href=\"logOut.php\">Log Out</a></li>";
					}
					else {
						echo "<li class=\"navbar-item navbar-right\"><a href=\"logIn.php\">Log In</a></li>";
					}
				?>
			</ul>
		</nav>
    </header>



	<h2>Login Status</h2>	
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
			die('Username not found. <a href="logIn.php"><br><br>Return to Login Page</a>');
		}
	//Fetch the stored password and compare the entered password
		$dbPassword = $row['Pass'];
		$salt = $row['salt'];
		$password = md5($password . $salt);


		if($dbPassword == $password){
			$_SESSION['status'] = 'in';
			$_SESSION['username'] = $userName;

			echo "<script>window.location.replace(\"index.php\")</script>";
			exit();
		}
		else{
			die('Incorrect Password. <a href="logIn.php"><br><br>Return to Login Page</a>');
		}
		
		mysqli_free_result($result);
		mysqli_close($conn);	
	?>

</body>
</html>