INSERT INTO DBUsers VALUES 
('satResearcher1', 'Satellites', 'Trey', 'elkinsd@oregonstate.edu');

INSERT INTO Rocket VALUES
(1, 1996-01-30, 'Cape Canaveral');

-- Check ENUM
INSERT INTO Owner VALUES
('SpaceX', 'Commercial', 'Florida', 'United States');

INSERT INTO Satellite (satID, ownerID, launchID) VALUES ('CubeSat001', 'SpaceX', '1');

INSERT INTO Favorites VALUES
('satResearcher1', 'CubeSat001');

DROP TABLE Favorites, Purpose, Satellite, Launches, Owner, Rocket, DBUsers;