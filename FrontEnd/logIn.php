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
    <?php
        include 'header.php';
    ?>

    <main>
        <div class="form-background">

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
    </div>
    </main>
    </body>
</html>
