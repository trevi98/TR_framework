create database caf collate='utf8_general_ci';
use caf;




create table users (
    first_name varchar(30) not null,
    last_name varchar(30) not null,
    email varchar(30) not null unique,
    password text(500) not null,
    country varchar(30) not null,
    phone int(10) null,
    gender varchar(6) not null,
    age int(2) not null,
    catigory varchar(30) not null,
    addidas_bag varchar(30) not null,
    addidas_shose varchar(30) not null,
    pic text(100) null,
    status int(1) DEFAULT 0,
    id int(10) primary key not null auto_increment
);

create table admin (
    first_name varchar(30) not null,
    last_name varchar(30) not null,
    password text(500) not null,
    email varchar(30) unique,
    role varchar(10) not null,
    id int(10) primary key not null auto_increment
);

create table password_reset (
    code varchar(100) not null unique,
    user_id int(10) not null,
    id int(10) primary key not null auto_increment,
    FOREIGN KEY (user_id) references users(id)

);

create table password_reset_admin (
    code varchar(100) not null unique,
    admin_id int(10) not null,
    id int(10) primary key not null auto_increment,
    FOREIGN KEY (admin_id) references admin(id)

);

create table roles (
    title varchar(30) not null,
    number varchar(2) not null unique,
    id int(10) primary key not null auto_increment

);




------------------------------------------------------
---------------------insertion------------------------
------------------------------------------------------


--
insert into roles (title,number) values
    ('admin','1'),
    ('jonuer admin','2'),
    ('editor','3');
--

--
insert into main_topics (title) values
    ('challenges'),
    ('handball'),
    ('tactical fouls'),
    ('offcide'),
    ('penalty area incidents')
    ;

--


-- insert into admin (username,password) values(
--     'admin',
--     'admin'
-- );

///////////////////////////////////////////////
drop database caf;
///////////////////////////////////////////////