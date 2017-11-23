-- This no longer works with the addition of salting/hashing
INSERT INTO DBUsers VALUES 
('satResearcher1', 'Satellites', 'Trey', 'elkinsd@oregonstate.edu');

INSERT INTO Rocket VALUES
(1, 1996-01-30, 'Cape Canaveral');

-- Check ENUM
INSERT INTO Owner VALUES
('SpaceX', 'Commercial', 'Florida', 'United States');

-- This will fail if there's no 'Rocket' object with ID 1
INSERT INTO Satellite (satID, ownerID, launchID) VALUES ('CubeSat001', 'SpaceX', '1');

-- This won't work based on above broken statement, but the format will work
INSERT INTO Favorites VALUES
('satResearcher1', 'CubeSat001');

-- Removed 'Launches' table from DB
DROP TABLE Favorites, Purpose, Satellite, Owner, Rocket, DBUsers;

-- Purpose table is handled by PHP