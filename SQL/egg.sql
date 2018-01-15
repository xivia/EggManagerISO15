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

create table permission (
	peId INT NOT NULL,
	name varchar(32),
	PRIMARY KEY(peId)
);

create Table egg (
	eggId INT NOT NULL auto_increment,
	name varchar(64),
	eggCreated TIMESTAMP,
	eggColor INT,
	eggSize INT,
	eggType INT,
	eggStatus INT,
	weight double(5,2), /* in gramm */
	FOREIGN KEY (eggSize) REFERENCES eggSize (sizeId) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (eggType) REFERENCES eggType (typeId) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (eggColor) REFERENCES eggColor (colorId) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (eggStatus) REFERENCES eggStatus (statusId) ON DELETE CASCADE ON UPDATE CASCADE,
	PRIMARY KEY(eggId)
);

create table user (
	usId INT NOT NULL auto_increment,
	username varchar(32),
	password varchar(256),
	email varchar(256),
	uCreated TIMESTAMP,
	status INT,
	FOREIGN KEY (status) REFERENCES permission (peId) ON DELETE CASCADE ON UPDATE CASCADE,
	PRIMARY KEY(usId)
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
insert into egg(name, eggColor, eggSize, eggtype, eggStatus, weight) values ("Robin-chan", 1, 2, 3, 1, 100.5);
insert into egg(name, eggColor, eggSize, eggtype, eggStatus, weight) values ("Moon-chan", 1, 4, 2, 3, 11.5);
insert into egg(name, eggColor, eggSize, eggtype, eggStatus, weight) values ("Pluto-chan", 1, 0, 2, 1, 15162.5);
insert into egg(name, eggColor, eggSize, eggtype, eggStatus, weight) values ("Sun-chan", 1, 3, 4, 2, 52.5);
insert into egg(name, eggColor, eggSize, eggtype, eggStatus, weight) values ("Jackie-chan", 1, 2, 3, 1, 561.5);
insert into egg(name, eggColor, eggSize, eggtype, eggStatus, weight) values ("arber-chan", 1, 2, 3, 1, 5361.5);
insert into egg(name, eggColor, eggSize, eggtype, eggStatus, weight) values ("DO you know da wae", 1, 2, 3, 1, 666.66);
insert into egg(name, eggColor, eggSize, eggtype, eggStatus, weight) values ("Aids-chan", 1, 3, 3, 1, 2342.5);
insert into egg(name, eggColor, eggSize, eggtype, eggStatus, weight) values ("Ebola-chan", 1, 4, 3, 1, 234.5);
insert into egg(name, eggColor, eggSize, eggtype, eggStatus, weight) values ("Robin2-chan", 3, 2, 3, 1, 34.5);
insert into egg(name, eggColor, eggSize, eggtype, eggStatus, weight) values ("Flower-chan", 4, 3, 3, 1, 4.5);
insert into egg(name, eggColor, eggSize, eggtype, eggStatus, weight) values ("Trigger-chan", 2, 2, 3, 1, 32.5);

insert into permission(peId, name) value (0,'Banned');
insert into permission(peId, name) value (1,'User');
insert into permission(peId, name) value (2,'Moderator');
insert into permission(peId, name) value (3,'Admin');
insert into permission(peId, name) value (4,'Owner');
insert into permission(peId, name) value (99,'Deleted');

insert into user(username, password, email, uCreated, status) values ('Robin-chan', 'chan_123', 'xXxlolihentaixXx@earth.chan', '2008-11-11 13:23:44', 0)

select * from eggColor; /* int */
select * from eggType; /* int */
select * from eggStatus; /* int */
select * from eggSize;	/* chame anhand vom weight usrechne  */