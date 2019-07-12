
CREATE SCHEMA IF NOT EXISTS `autodb` DEFAULT CHARACTER SET utf8 ;
USE `autodb` ;

create table user(
id int not null primary key auto_increment,
vorname varchar(45),
nachname varchar(45),
email varchar(90),
passwort varchar(45),
geburtstag varchar(45),
geburtsmonat varchar(45),
geburtsjahr varchar(45),
strasse varchar(45),
hausnummer int,
plz int, 
ort varchar(45),
land varchar(45),
stadt varchar(45),
benutzername varchar(45)
);

create table auto(
id int not null primary key auto_increment,
marke varchar(45),
model varchar(45),
zustand varchar(90),
leistung int,
zylinder int,
sofortkaufpreis int,
startpreis int,
aktuellesgebot int,
user_id int not null,
foreign key (user_id) references user(id)
);




INSERT INTO user (vorname, nachname, email, passwort, benutzername) VALUES ('Seb',  'Swob',  'seb@swob.ch', sha1('seb'), 'SebS');

insert into auto (marke, model, zustand, leistung, zylinder, sofortkaufpreis, startpreis, aktuellesgebot, user_id) values('Audi', 'Cabriolet', 'Gebraucht', 100, 10, 20000, 10000, 10000, 1);

insert into auto (marke, model, zustand, leistung, zylinder, sofortkaufpreis, startpreis, aktuellesgebot, user_id) values('BMW', 'Coupe', 'Neu', 100, 10, 40000, 30000, 30000, 1); 



insert into auto (marke, model, zustand, leistung, zylinder, sofortkaufpreis, startpreis, aktuellesgebot, user_id) values('VW', 'Coupe', 'Neu', 100, 10, 40000, 30000, 30000, 1); 

insert into auto (marke, model, zustand, leistung, zylinder, sofortkaufpreis, startpreis, aktuellesgebot, user_id) values('Lambo', 'Kombi', 'Neu', 100, 10, 40000, 30000, 30000, 1); 

insert into auto (marke, model, zustand, leistung, zylinder, sofortkaufpreis, startpreis, aktuellesgebot, user_id) values('Königsegg', 'Roadster', 'Neu', 100, 10, 40000, 30000, 30000, 1); 

insert into auto (marke, model, zustand, leistung, zylinder, sofortkaufpreis, startpreis, aktuellesgebot, user_id) values('Citroen', 'Sport', 'Neu', 100, 10, 40000, 30000, 30000, 1); 

insert into auto (marke, model, zustand, leistung, zylinder, sofortkaufpreis, startpreis, aktuellesgebot, user_id) values('Mercedes', 'SUV', 'Neu', 100, 10, 40000, 30000, 30000, 1); 

insert into auto (marke, model, zustand, leistung, zylinder, sofortkaufpreis, startpreis, aktuellesgebot, user_id) values('VW', 'Cabriolet', 'Gebraucht', 100, 10, 40000, 30000, 30000, 1);

insert into auto (marke, model, zustand, leistung, zylinder, sofortkaufpreis, startpreis, aktuellesgebot, user_id) values('BMW', 'Kombi', 'Neu', 100, 10, 40000, 30000, 30000, 1);

insert into auto (marke, model, zustand, leistung, zylinder, sofortkaufpreis, startpreis, aktuellesgebot, user_id) values('Porsche', 'Roadster', 'Neu', 100, 10, 40000, 30000, 30000, 1);

insert into auto (marke, model, zustand, leistung, zylinder, sofortkaufpreis, startpreis, aktuellesgebot, user_id) values('Ferrari', 'Sport', 'Gebraucht', 100, 10, 40000, 30000, 30000, 1);

insert into auto (marke, model, zustand, leistung, zylinder, sofortkaufpreis, startpreis, aktuellesgebot, user_id) values('Porsche', 'SUV', 'Neu', 100, 10, 40000, 30000, 30000, 1);

insert into auto (marke, model, zustand, leistung, zylinder, sofortkaufpreis, startpreis, aktuellesgebot, user_id) values('Lambo', 'SUV', 'Neu', 100, 10, 100, 1000, 1000, 1);

delete from auto where id = 2 or id = 3;

select * from user;
SELECT * FROM auto, user where auto.user_id = user.id;

select * from auto;

select * from auto, user where auto.id = 1 and auto.user_id = user.id;

delete from user where id != 1;


select marke, model, auto.id, zustand, leistung, zylinder, sofortkaufpreis, startpreis, aktuellesgebot, vorname, nachname from auto, user where marke like "%a%"; 