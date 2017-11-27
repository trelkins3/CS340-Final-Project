<!DOCTYPE html>
<html>
	<head>
		<title>Add Object</title>
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
		<h2>Add Object</h2>

		<!-- A lot of these need to be modified to be dropdown menus -->
		<div class="form-container">
            <form action="insertObject.php" method="post">
                <table>
                    <tr>
                        <td><label for="satID">Satellite Name/ID:</label></td>
                        <td><input type="text" name="satID" id="satID"></td>
                    </tr><td>
                    <tr>
                        <td><label for="COSPAR">COSPAR ID:</label></td>
                        <td><input type="text" name="COSPAR" id="COSPAR"></td>
                    </tr>
					<!-- Needs to be dropdown menu -->
                	<tr>
                       <td><label for="owner">Owner:</label></td>
                       <td><input type="text" name="owner" id="owner"></td>
                    </tr>
					<!-- This needs to be removed and replaced with conditional logic that
					just assigns a new ID as necessary if the launch date and site aren't
					the same as an existing launch -->
                    <tr>
                        <td><label for="launchID">Launch ID:</label></td>
                        <td><input type="text" name="launchID" id="launchID"></td>
                    </tr>
					<tr>
                        <td><label for="launchSite">Launch Site:</label></td>
                        <td><input type="text" name="launchSite" id="launchSite"></td>
                    </tr>
					<tr>
                        <td><label for="launchDate">Launch Date:</label></td>
                        <td><input type="text" name="launchDate" id="launchDate"></td>
                    </tr>
					<tr>
                        <td><label for="orbitalPeriod">Orbital Period (in hours):</label></td>
                        <td><input type="text" name="orbitalPeriod" id="orbitalPeriod"></td>
                    </tr>
					<!-- Needs to be dropdown menu -->
					<tr>
                        <td><label for="purpose1">Purpose 1:</label></td>
                        <td><input type="text" name="purpose1" id="purpose1"></td>
                    </tr>
					<tr>
                        <td><label for="purpose2">Purpose 2:</label></td>
                        <td><input type="text" name="purpose2" id="purpose2"></td>
                    </tr>
                </table>
                <input type="submit" value="Submit">

				</form>
        </div>
    </main>
	
    </body>
</html>
