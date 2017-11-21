﻿<!DOCTYPE html>
<html>
<body>
	<head>
		<title>Sign Up</title>
		<link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	</head>

    <header>
        Orbitals Database
    </header>

    <main>
        <h2>Sign Up</h2>

        <div class="form-container">
            <form action="insert.php" method="post">
                <table>
                    <tr>
                        <td><label for="userName">Username:</label></td>
                        <td><input type="text" name="userName" id="userName"></td>
                    </tr><td>
                    <tr>
                        <td><label for="name">Name:</label></td>
                        <td><input type="text" name="name" id="name"></td>
                    </tr>
                	<tr>
                       <td><label for="email">Email:</label></td>
                       <td><input type="text" name="email" id="email"></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password:</label></td>
                        <td><input type="password" name="password" id="password"></td>
                    </tr>
                </table>
                <input type="submit" value="Submit">

            </form>

        </div>
    </main>
</body>
</html>