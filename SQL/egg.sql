Drop Database if exists EggVerwaltung;
Create Database EggVerwaltung;
use EggVerwaltung;


create table status (
	
	statusId INT NOT NULL,
	name varchar(64),
	PRIMARY KEY(statusId)
);

create table eggSize (
	
	sizeId INT NOT NULL,
	name varchar(64),
	sizeFrom double(5,2), /* in mm */
	sizeTo double(5,2), /* in mm */
	status INT,
	FOREIGN KEY (status) REFERENCES status (statusId) ON DELETE CASCADE ON UPDATE CASCADE,
	PRIMARY KEY(sizeId)
);

create table eggType (
	
	typeId INT NOT NULL,
	name varchar(64),
	status INT,
	FOREIGN KEY (status) REFERENCES status (statusId) ON DELETE CASCADE ON UPDATE CASCADE,
	PRIMARY KEY(typeId)
);

create table eggColor (
	
	colorId INT NOT NULL,
	name varchar(64),
	colorR int(3), /* RGB (R) */
	colorG int(3), /* RGB (G) */
	colorB int(3), /* RGB (B) */
	status INT,
	FOREIGN KEY (status) REFERENCES status (statusId) ON DELETE CASCADE ON UPDATE CASCADE,
	PRIMARY KEY(colorId)
);

create table permission (
	peId INT NOT NULL,
	name varchar(32),
	status INT,
	FOREIGN KEY (status) REFERENCES status (statusId) ON DELETE CASCADE ON UPDATE CASCADE,
	PRIMARY KEY(peId)
);

create table user (
	usId INT NOT NULL auto_increment,
	username varchar(32),
	password varchar(256),
	email varchar(256),
	uCreated TIMESTAMP,
	status INT,
	permission INT,
	FOREIGN KEY (status) REFERENCES status (statusId) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (permission) REFERENCES permission (peId) ON DELETE CASCADE ON UPDATE CASCADE,
	PRIMARY KEY(usId)
);

create Table egg (
	eggId INT NOT NULL auto_increment,
	name varchar(64),
	eggCreated TIMESTAMP,
	eggColor INT,
	eggSize INT,
	eggType INT,
	status INT,
	userId INT,
	weight double(5,2), /* in gramm */
	FOREIGN KEY (eggSize) REFERENCES eggSize (sizeId) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (eggType) REFERENCES eggType (typeId) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (eggColor) REFERENCES eggColor (colorId) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (status) REFERENCES status (statusId) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (userId) REFERENCES user (usId) ON DELETE CASCADE ON UPDATE CASCADE,
	PRIMARY KEY(eggId)
);

insert into eggType(typeId, name) values (0,'Marzipan-chan');
insert into eggType(typeId, name) values (1,'Arber-chan');
insert into eggType(typeId, name) values (2,'LUL-chan');
insert into eggType(typeId, name) values (3,'GRUUUUUSIG-chan');
insert into eggType(typeId, name) values (4,'GUDDY-chan');

insert into eggColor(colorId, name, colorR, colorG, colorB) values (0,'BLack-chan',0,0,0);
insert into eggColor(colorId, name, colorR, colorG, colorB) values (1,'Blue-chan',0,0,255);
insert into eggColor(colorId, name, colorR, colorG, colorB) values (2,'Red-chan',255,0,0);
insert into eggColor(colorId, name, colorR, colorG, colorB) values (3,'Green-chan',0,255,0);
insert into eggColor(colorId, name, colorR, colorG, colorB) values (4,'Purple-chan',255,0,255);

insert into status(statusId, name) values (0,'Stored-chan');
insert into status(statusId, name) values (1,'Missing-chan');
insert into status(statusId, name) values (2,'Broke-chan');
insert into status(statusId, name) values (3,'Eaten-chan');
insert into status(statusId, name) values (4,'In Work-chan');
insert into status(statusId, name) values (99,'Deleted-chan');

insert into eggSize(sizeId, name, sizeFrom, sizeTo) values (0,'small',0.01,10.00);
insert into eggSize(sizeId, name, sizeFrom, sizeTo) values (1,'normal',10.01,20.00);
insert into eggSize(sizeId, name, sizeFrom, sizeTo) values (2,'big',20.01,30.00);
insert into eggSize(sizeId, name, sizeFrom, sizeTo) values (3,'arber',30.01,40.00);
insert into eggSize(sizeId, name, sizeFrom, sizeTo) values (4,'schoggi',40.01,50.00);


insert into egg(name, eggColor, eggSize, eggtype, status, weight) values ("gaggi", 1, 1, 1, 1, 12.5);
insert into egg(name, eggColor, eggSize, eggtype, status, weight) values ("arber", 2, 2, 2, 2, 12.5);
insert into egg(name, eggColor, eggSize, eggtype, status, weight) values ("schoggihaas", 3, 3, 3, 3, 12.5);
insert into egg(name, eggColor, eggSize, eggtype, status, weight) values ("earth-chan", 1, 2, 3, 1, 12.5);
insert into egg(name, eggColor, eggSize, eggtype, status, weight) values ("Robin-chan", 1, 2, 3, 1, 100.5);
insert into egg(name, eggColor, eggSize, eggtype, status, weight) values ("Moon-chan", 1, 4, 2, 3, 11.5);
insert into egg(name, eggColor, eggSize, eggtype, status, weight) values ("Pluto-chan", 1, 0, 2, 1, 15162.5);
insert into egg(name, eggColor, eggSize, eggtype, status, weight) values ("Sun-chan", 1, 3, 4, 2, 52.5);
insert into egg(name, eggColor, eggSize, eggtype, status, weight) values ("Jackie-chan", 1, 2, 3, 1, 561.5);
insert into egg(name, eggColor, eggSize, eggtype, status, weight) values ("arber-chan", 1, 2, 3, 1, 5361.5);
insert into egg(name, eggColor, eggSize, eggtype, status, weight) values ("DO you know da wae?", 1, 2, 3, 1, 666.66);
insert into egg(name, eggColor, eggSize, eggtype, status, weight) values ("Aids-chan", 1, 3, 3, 1, 2342.5);
insert into egg(name, eggColor, eggSize, eggtype, status, weight) values ("Ebola-chan", 1, 4, 3, 1, 234.5);
insert into egg(name, eggColor, eggSize, eggtype, status, weight) values ("Robin2-chan", 3, 2, 3, 1, 34.5);
insert into egg(name, eggColor, eggSize, eggtype, status, weight) values ("Flower-chan", 4, 3, 3, 1, 4.5);
insert into egg(name, eggColor, eggSize, eggtype, status, weight) values ("Trigger-chan", 2, 2, 3, 1, 32.6);


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
