Drop Database if exists EggVerwaltung;
Create Database EggVerwaltung;
use EggVerwaltung;

create Table Egg (
	egId INT NOT NULL,
	name varchar(64),
	color varchar(64),
	size enum('tiny','small','medium','big','xxxxxxxxl'),
	weight double(5,2), /* in gramm */
	status enum('store','eat','break','miss'),
	PRIMARY KEY(egId)
);
/*
create Table Chest (
	chId INT NOT NULL,
	arId INT,
	name varchar(32),
	number_Card int(4),
	rarity enum('Wood','Crown','Silver','Gold','Giant','Epic','Magic','Supermagic','Legendary','Tournament'),
	FOREIGN KEY (arId) REFERENCES Arena (arId) ON DELETE CASCADE ON UPDATE CASCADE,
	PRIMARY KEY(chId)
);
*/