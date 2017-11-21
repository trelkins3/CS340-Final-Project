-- Create new user 
INSERT INTO DBUsers Values ('ruarka', '1234password', 'Adam Ruark', 'ruarka@oregonstate.edu' );

-- A person changes their favorite satellite
UPDATE Favorites SET satID='New Sat' WHERE Username='satResearcher1';

--Various selects
-- Display each user that likes a particular satellite
SELECT Username FROM Favorites WHERE satID='CubeSat001';

--List every detail about a satellite
SELECT S.satID, ownerID, launchID, orbitalPeriod, daysInOrbit, purpose1, purspose2, purpose3
FROM Satellite S, Purpose P
WHERE S.satID=P.satID;

--Display the ID of each satellite and their owner type
SELECT satID, ownerType 
FROM Satellite S, Owner O 
WHERE S.ownerID=O.ownerID;

-- TRIGGERS
-- Clear out favorites if a satellite is removed
CREATE TRIGGER deleteSatFromFavorites BEFORE DELETE ON Satellite
FOR EACH ROW
BEGIN
	DELETE FROM Favorites
	WHERE Favorites.satID=old.satID
END

-- If a user gets deleted, remove their favorite
CREATE TRIGGER deleteUserFromFavorites BEFORE DELETE ON User
FOR EACH ROW
BEGIN
	DELETE FROM Favorites
	WHERE old.Username=Favorites.Username
END
