<?php
session_start();
session_unset();
session_destroy();

// header("Location: index.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Log In</title>
		<link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	</head>

    <body>
    <?php
        include 'header.php';
    ?>

    <main>
        <p>You have successfully been logged out</p>
        <a href="index.php">Return Home</a>

    </main>
    </body>
</html>
