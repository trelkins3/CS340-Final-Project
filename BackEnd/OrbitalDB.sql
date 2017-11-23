CREATE TABLE DBUsers
(Username			VARCHAR(20)		NOT NULL UNIQUE,
 Pass				VARCHAR(32)		NOT NULL,
 salt				VARCHAR(20)		NOT NULL,
 Name				VARCHAR(20)		DEFAULT NULL,
 Email				VARCHAR(40)		NOT NULL,
 PRIMARY KEY(Username)
);

-- 'Booster' Table
CREATE TABLE Rocket
(launchID		  INT			NOT NULL UNIQUE,	-- Arbitrary Numeric ID
 launchDate		  DATE			NOT NULL,
 launchSite		  VARCHAR(20)	NOT NULL,
 PRIMARY KEY(launchID)
);

CREATE TABLE Owner
(ownerID			VARCHAR(20)							NOT NULL UNIQUE,
 ownerType			ENUM('Commercial', 'Government')	NOT NULL,
 Location			VARCHAR(20)							DEFAULT NULL,
 Country			VARCHAR(20)							NOT NULL,
 PRIMARY KEY(ownerID)
);

CREATE TABLE Satellite
(satID				VARCHAR(20)		NOT NULL UNIQUE,	-- Used to fetch Purpose
 ownerID			VARCHAR(20)		NOT NULL,
 launchID			INT				NOT NULL,
 orbitalPeriod		DECIMAL(5,2)	DEFAULT NULL,
 PRIMARY KEY(satID),
 FOREIGN KEY(ownerID) REFERENCES Owner(ownerID),
 FOREIGN KEY(launchID) REFERENCES Rocket(launchID)
 ON UPDATE CASCADE
 ON DELETE CASCADE
);

-- Must be fetched via SELECT queries/PHP
-- Need a trigger to update?? Or is it already implemented
CREATE TABLE Purpose
(satID				VARCHAR(20)		NOT NULL UNIQUE,
 purpose1			VARCHAR(20)		DEFAULT NULL,
 purpose2			VARCHAR(20)		DEFAULT NULL,
 purpose3			VARCHAR(20)		DEFAULT NULL,
 PRIMARY KEY(satID),
 FOREIGN KEY(satID) REFERENCES Satellite(satID)
 ON UPDATE CASCADE
);

-- Only allowed to have one favorite?
CREATE TABLE Favorites
(Username		VARCHAR(20)		NOT NULL,
 satID			VARCHAR(20)		NOT NULL,
 PRIMARY KEY(Username, satID),
 FOREIGN KEY(Username) REFERENCES DBUsers(Username)
 ON DELETE CASCADE,
 FOREIGN KEY(satID) REFERENCES Satellite(satID)
 ON DELETE CASCADE
);