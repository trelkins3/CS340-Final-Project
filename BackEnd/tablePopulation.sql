-- Code to quick create all entries that aren't in the initialization SQL
-- This code should be run after OrbitalDB.sql and initEntries.sql

-- Owner
INSERT INTO `Owner` (`ownerID`, `ownerType`, `Location`, `Country`) VALUES
('CNSA', 'Government', 'Beijing', 'China'),
('ESA', 'Government', 'Paris', 'Europe'),
('Iridium Communicatio', 'Commercial', 'Virginia', 'United States'),
('NASA', 'Government', 'Washington D.C.', 'United States'),
('Roscosmos', 'Government', 'Moscow', 'Russia');

-- Satellite
INSERT INTO `Satellite` (`satID`, `COSPAR`, `ownerID`, `launchID`, `orbitalPeriod`) VALUES
('CASSIOPE', '2013-055A', 'SpaceX', 4, '1.67'),
('CUSAT', '2013-055B', 'SpaceX', 4, '1.67'),
('Iridium-39', '1997-069D', 'Iridium Communicatio', 5, '1.66'),
('Kosmos 2380', '2001-053C', 'Roscosmos', 3, '11.26'),
('Kosmos 2381', '2001-053B', 'Roscosmos', 3, '11.26'),
('Kosmos 2382', '2001-053A', 'Roscosmos', 3, '11.26'),
('PROBA2', '2009-059B', 'ESA', 6, '1.65'),
('QUESS', '2016-051A', 'CNSA', 7, '1.57'),
('SMOS', '2009-059A', 'ESA', 6, '1.67'),
('USA-192', '2006-052A', 'NASA', 2, '11.96'),
('USA-66', '1990-103A', 'NASA', 1, '11.96');

-- Rocket
INSERT INTO `Rocket` (`launchID`, `launchDate`, `launchSite`) VALUES
(2, '2006-11-17', 'Cape Canaveral'),
(3, '2001-12-01', 'Kazakhstan'),
(4, '2013-09-29', 'Vandenberg'),
(5, '1997-11-09', 'Vandenberg'),
(6, '2009-11-02', 'Plesetsk Cosmodrome'),
(7, '2016-08-16', 'Jiuquan');

-- Purpose
INSERT INTO `Purpose` (`satID`, `purpose1`, `purpose2`, `purpose3`) VALUES
('CASSIOPE', 'Research', 'Communications', NULL),
('CUSAT', 'Research', NULL, NULL),
('Iridium-39', 'Communications', NULL, NULL),
('Kosmos 2380', 'GPS/GLONASS', NULL, NULL),
('Kosmos 2381', 'GPS/GLONASS', NULL, NULL),
('Kosmos 2382', 'GPS/GLONASS', NULL, NULL),
('PROBA2', 'Research', NULL, NULL),
('QUESS', 'Research', 'Communications', NULL),
('SMOS', 'Research', NULL, NULL),
('USA-192', 'GPS/GLONASS', NULL, NULL),
('USA-66', 'GPS/GLONASS', NULL, NULL);

-- Favorites
INSERT INTO `Favorites` (`Username`, `satID`) VALUES
('ruarka', 'USA-66'),
('testuser', 'USA-192'),
('trelkins3', 'Iridium-39'),
('trelkins3', 'QUESS');

