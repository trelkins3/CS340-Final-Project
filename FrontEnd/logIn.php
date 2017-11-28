<?php
session_start();
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
        <h2>Log In</h2>

        <div class="form-container">
            <form action="submitCredentials.php" method="post">
                <p class="error-msg">
                    <?php
                        if(isset($_SESSION['errMsg'])){
                            echo $_SESSION['errMsg'];
                        }
                    ?>
                </p>
                <?php unset($_SESSION['errMsg']); ?>
                
                <table>
                    <tr>
                        <td class="table-desc"><label for="userName">Username:</label></td>
                        <td><input type="text" name="userName" id="userName"></td>
                    </tr>
                    <tr>
                        <td class="table-desc"><label for="password">Password: </label></td>
                        <td><input type="password" name="password" id="password"></td>
                    </tr>
                </table>

                <input type="submit" value="Login">

            </form>
        </div>

        <p>Don't have an account? <a href="signUp.php">Sign up!</a></p>
    </main>
    </body>
</html>
