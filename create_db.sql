drop table if exists pirates;
create table pirates (
    name varchar(100),
    age int,
    pirate_id int AUTO_INCREMENT PRIMARY KEY
);

drop table if exists crews;
create table crews (
    name varchar(100),
    members int,
    crew_id int AUTO_INCREMENT PRIMARY KEY,
    foreign key (members) references pirates(pirate_id)
);

insert into pirates(name,age) values ("Monkey D. Rufy","17");
insert into pirates(name,age) values ("Nami","18");
insert into pirates(name,age) values ("Roronoa Zoro","19");

insert into pirates(name,age) values ("Trafalgar D. Water Law","24");
insert into pirates(name,age) values ("Bepo","20");


insert into crews(name,members) values ("Cappello di Paglia",1);
insert into crews(name,members) values ("Cappello di Paglia",2);
insert into crews(name,members) values ("Cappello di Paglia",3);
insert into crews(name,members) values ("Hearth",4);
insert into crews(name,members) values ("Hearth",5);
