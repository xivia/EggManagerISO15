Drop Database if exists EggVerwaltung;
Create Database EggVerwaltung;
use EggVerwaltung;



create table eggSize (
	
	sizeId INT NOT NULL,
	name varchar(64),
	sizeFrom double(5,2), /* in mm */
	sizeTo double(5,2), /* in mm */
	PRIMARY KEY(sizeId)
);

create table eggType (
	
	typeId INT NOT NULL,
	name varchar(64),
	PRIMARY KEY(typeId)
);

create table eggColor (
	
	colorId INT NOT NULL,
	name varchar(64),
	colorR int(3), /* RGB (R) */
	colorG int(3), /* RGB (G) */
	colorB int(3), /* RGB (B) */
	PRIMARY KEY(colorId)
);

create table eggStatus (
	
	statusId INT NOT NULL,
	name varchar(64),
	PRIMARY KEY(statusId)
);

create Table Egg (
	egId INT NOT NULL,
	name varchar(64),
	eggColor INT,
	eggSize INT,
	eggType INT,
	eggStatus INT,
	weight double(5,2), /* in gramm */
	FOREIGN KEY (eggSize) REFERENCES eggSize (sizeId) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (eggType) REFERENCES eggType (typeId) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (eggColor) REFERENCES eggColor (colorId) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (eggStatus) REFERENCES eggStatus (statusId) ON DELETE CASCADE ON UPDATE CASCADE,
	PRIMARY KEY(egId)
);

insert into eggColor(colorId, name, colorR, colorG, colorB) values (0,'BLack',0,0,0);
insert into eggColor(colorId, name, colorR, colorG, colorB) values (1,'Blue',0,0,255);
insert into eggColor(colorId, name, colorR, colorG, colorB) values (2,'Red',255,0,0);
insert into eggColor(colorId, name, colorR, colorG, colorB) values (3,'Green',0,255,0);
insert into eggColor(colorId, name, colorR, colorG, colorB) values (4,'Purple',255,0,255);

insert into eggStatus(statusId, name) values (0,'Stored');
insert into eggStatus(statusId, name) values (1,'Missing');
insert into eggStatus(statusId, name) values (2,'Broke');
insert into eggStatus(statusId, name) values (3,'Eaten');
insert into eggStatus(statusId, name) values (4,'In Work');