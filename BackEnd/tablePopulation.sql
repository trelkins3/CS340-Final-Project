-- Code to quick create all entries that aren't in the initialization SQL

-- Can't just insert into DBUsers due to the salt/hash?

-- Owner
INSERT INTO `Owner` (`ownerID`, `ownerType`, `Location`, `Country`) VALUES
('CNSA', 'Government', 'Beijing', 'China'),
('ESA', 'Government', 'Paris', 'Europe'),
('Iridium Communicatio', 'Commercial', 'Virginia', 'United States'),
('NASA', 'Government', 'Washington D.C.', 'United States'),
('Roscosmos', 'Government', 'Moscow', 'Russia'),
('SpaceX', 'Commercial', 'California', 'United States');

-- Satellite
INSERT INTO `Satellite` VALUES ('USA-66', 'NASA', 2, '11.96');

-- Purpose
-- None yet

