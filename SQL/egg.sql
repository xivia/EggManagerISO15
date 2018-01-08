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

create Table egg (
	egId INT NOT NULL auto_increment,
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

insert into eggType(typeId, name) values (0,'Marzipan');
insert into eggType(typeId, name) values (1,'Arber');
insert into eggType(typeId, name) values (2,'LUL');
insert into eggType(typeId, name) values (3,'GRUUUUUSIG');
insert into eggType(typeId, name) values (4,'GUDDY');

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

insert into eggSize(sizeId, name, sizeFrom, sizeTo) values (0,'small',0.01,10.00);
insert into eggSize(sizeId, name, sizeFrom, sizeTo) values (1,'normal',10.01,20.00);
insert into eggSize(sizeId, name, sizeFrom, sizeTo) values (2,'big',20.01,30.00);
insert into eggSize(sizeId, name, sizeFrom, sizeTo) values (3,'arber',30.01,40.00);
insert into eggSize(sizeId, name, sizeFrom, sizeTo) values (4,'schoggi',40.01,50.00);


insert into egg(name, eggColor, eggSize, eggtype, eggStatus, weight) values ("gaggi", null, null, null, null, 12.5);
insert into egg(name, eggColor, eggSize, eggtype, eggStatus, weight) values ("arber", null, null, null, null, 12.5);
insert into egg(name, eggColor, eggSize, eggtype, eggStatus, weight) values ("schoggihaas", null, null, null, null, 12.5);
insert into egg(name, eggColor, eggSize, eggtype, eggStatus, weight) values ("earth-chan", 1, 2, 3, 1, 12.5);


select * from eggColor; /* int */
select * from eggType; /* int */
select * from eggStatus; /* int */
select * from eggSize;	/* chame anhand vom weight usrechne  */