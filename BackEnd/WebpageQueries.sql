--Home
--None needed, static images

--Sign up. Requires user input
INSERT INTO Users VALUES '$Username', '$Password', '$Name', '$Email';

--Log in. Requires user input
SELECT * FROM Users WHERE Username = '$Username' AND Pass = '$Password';

--Account Page. No user input. Username taken from stored credentials during login
SELECT satID FROM Favorites WHERE Username = '$Username';

--Object Database page. Need to implement category selections?
--Satellite
SELECT * FROM Satellite;
--Rocket
SELECT * FROM Rocket;
--Owner
SELECT * FROM Owner;

--Object Page. User input based on what object they clicked to get here
SELECT S.satID, COSPAR, orbitalPeriod, 
	R.launchID, launchDate, launchSite, 
	O.ownerID, ownerType, Location, Country,
	P.satID, purpose1, purpose2, purpose3
FROM Satellite S, Rocket R, Owner O, Purpose P
WHERE S.satID='$userInput' AND S.satID=P.satID AND S.ownerID=O.ownerID AND S.launchID=R.launchID;

--Add object. Requires user input
--If owner already exists, then we won't need to insert a new owner. Check this with php.
INSERT INTO Satellite VALUES '$satID', '$COSPAR', '$ownerID', '$launchID', '$orbitalPeriod';
INSERT INTO Purpose VALUES '$satID', '$purpose1', '$purpose2', '$purpose3';
INSERT INTO Owner VALUES '$ownerID', '$ownerType', '$Location', '$Country';
