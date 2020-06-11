drop TABLE classes;
create table classes(
    id int not null PRiMARY KEY AUTO_INCREMENT,
    class_name varchar(50),
    class_time DATETIME,
    class_desc varchar(50)
   
);
insert into classes
values(
    0,
        "football class",
        "02-NOV-2020 02:00",
        "football lessons"
);
drop table news;
create table news (
    id int not null PRiMARY KEY AUTO_INCREMENT,
    content varchar(500) not null,
    createdAt dateTime
);
insert into news
values(
    0,
        "football match between cratia and netherlands postponed to 3 oclock",
        "02:00"
);
drop table schedule;
create table schedule(
    id int not null PRiMARY KEY AUTO_INCREMENT,
    activity varchar(50),
    activity_date date,
    activity_time time
);
insert into schedule
values(0, "football", "08-Nov-2020", "02:00");
drop table sports;
create table sports(
    sport_id int not null PRIMARY KEY AUTO_INCREMENT,
    sport_name varchar(50) not null
);
insert into sports
values(0, "football");
drop table user;
create table user(
    id int not null PRIMARY KEY AUTO_INCREMENT,
    username varchar(40) not null,
    email varchar(40) not null,
    password varchar(40) not null,
    usertype char(1)
);