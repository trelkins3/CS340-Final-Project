<!DOCTYPE html>
<html>
	<head>
		<title>Log In</title>
		<link rel="stylesheet" href="style.css">
	</head>
    <body>
    <h2>Log In</h2>

    <form action="submitCredentials.php" method="post">
        <p>
            <label for="userName">Username:</label>
            <input type="text" name="userName" id="userName">
        </p>
        <p>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </p>
        <input type="submit" value="Login">

    </form>

    <p>Don't have an account? <a href="http://web.engr.oregonstate.edu/~ruarka/cs340/Project/signUp.php">Sign up!</a></p>
    </body>
</html>
