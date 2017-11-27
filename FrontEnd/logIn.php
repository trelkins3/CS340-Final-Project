<!DOCTYPE html>
<html>
	<head>
		<title>Log In</title>
		<link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	</head>

    <body>
    <header>
        <h1><a>SatelliteDB   </a></h1>
		<nav>
			<ul class="navbar-list">
				<li class="navbar-item"><a href="index.php">Home</a></li>
				<li class="navbar-item"><a href="logIn.php">Account</a></li>
				<li class="navbar-item"><a href="satelliteDB.php">Satellite Database</a></li>
				<li class="navbar-item"><a href="addObject.php">Add Satellite</a></li>
			</ul>
		</nav>
    </header>

    <main>
        <h2>Log In</h2>

        <div class="form-container">
            <form action="submitCredentials.php" method="post">
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

        <p>Don't have an account? <a href="http://web.engr.oregonstate.edu/~elkinsd/CS340/SatelliteDB/signUp.php">Sign up!</a></p>
    </main>
    </body>
</html>
