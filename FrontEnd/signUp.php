<!DOCTYPE html>
<html>
	<head>
		<title>Sign Up</title>
		<link rel="stylesheet" href="style.css">
	</head>
    <body>
        <h2>Sign Up</h2>

        <form action="insert.php" method="post">
            <p>
                <label for="userName">Username:</label>
                <input type="text" name="userName" id="userName">
            </p>
            <p>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name">
            </p>
        	<p>
                <label for="email">Email Address:</label>
                <input type="text" name="email" id="email">
            </p>
            <p>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </p>
            <input type="submit" value="Submit">

        </form>
    </body>
</html>
