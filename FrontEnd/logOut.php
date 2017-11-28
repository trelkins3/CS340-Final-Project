<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Log In</title>
		<link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	</head>

    <body>
    <header>
        <h1><a>SatelliteDB</a></h1>
        <nav>
            <ul class="navbar-list">
                <li class="navbar-item"><a href="index.php">Home</a></li>
                
                <li class="navbar-item"><a href="satelliteDB.php">Satellite Database</a></li>
                <li class="navbar-item"><a href="addObject.php">Add Satellite</a></li>
                <?php
                    if(isset($_SESSION['status'])){
                        echo "<li class=\"navbar-item\"><a href=\"favorites.php\">Favorites</a></li>";
                        echo "<li class=\"navbar-item navbar-right\"><a href=\"logOut.php\">Log Out</a></li>";
                    }
                    else {
                        echo "<li class=\"navbar-item navbar-right\"><a href=\"logIn.php\">Log In</a></li>";
                        echo "<li class=\"navbar-item navbar-right\"><a href=\"signUp.php\">Sign Up</a></li>";
                    }
                ?>
            </ul>
        </nav>
    </header>

    <main>
        <p>You have successfully been logged out</p>

    </main>
    </body>
</html>