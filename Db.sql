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

create table main_topics(
    title varchar(30) not null,
    id int(10) primary key not null auto_increment
);

create table videos(
    title varchar(30) not null,
    link text(100) not null,
    decision text(100) null,
    explanation text(500) null,
    main_topic_id int(10) not null,
    year varchar(4) not null,
    id int(10) primary key not null auto_increment,
    FOREIGN KEY (main_topic_id) references main_topics(id) ON DELETE CASCADE
);

create table playlists(
    title varchar(30) not null,
    main_topic_id int(10) not null,
    admin_id int(10) not null,
    id int(10) primary key not null auto_increment,
    FOREIGN KEY (main_topic_id) references main_topics(id) ON DELETE CASCADE,
    FOREIGN KEY (admin_id) references admin(id) ON DELETE CASCADE
);

create table playlists_videos_users(
    playlist_id int(10) not null,
    user_id int(10) not null,
    video_id int(10) not null,
    id int(10) primary key not null auto_increment,
    FOREIGN KEY (playlist_id) references playlists(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) references users(id) ON DELETE CASCADE,
    FOREIGN KEY (video_id) references videos(id) ON DELETE CASCADE
);

create table groups(
    title varchar(30) not null,
    admin_id int(10) not null,
    id int(10) primary key not null auto_increment,
    FOREIGN KEY (admin_id) references admin(id) ON DELETE CASCADE
);

create table groups_users_videos(
    group_id int(10) not null,
    user_id int(10) not null,
    video_id int(10) not null,
    id int(10) primary key not null auto_increment,
    FOREIGN KEY (group_id) references groups(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) references users(id) ON DELETE CASCADE,
    FOREIGN KEY (video_id) references videos(id) ON DELETE CASCADE
);

create table groups_users_playlists(
    group_id int(10) not null,
    user_id int(10) not null,
    playlist_id int(10) not null,
    id int(10) primary key not null auto_increment,
    FOREIGN KEY (group_id) references groups(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) references users(id) ON DELETE CASCADE,
    FOREIGN KEY (playlist_id) references playlists(id) ON DELETE CASCADE
);

create table comments(
    comment text(500) not null,
    group_id int(10) not null,
    user_id int(10) not null,
    video_id int(10) not null,
    id int(10) primary key not null auto_increment,
    FOREIGN KEY (group_id) references groups(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) references users(id) ON DELETE CASCADE,
    FOREIGN KEY (video_id) references videos(id) ON DELETE CASCADE
);

create table tests(
    title varchar(30) not null,
    id int(10) primary key not null auto_increment
);

create table questions(
    question text(500) not null,
    type varchar(10) not null,
    answers text(500) not null,
    choices text(500) null,
    test_id int(10) not null,
    id int(10) primary key not null auto_increment,
    FOREIGN KEY (test_id) references tests(id) ON DELETE CASCADE
);

create table tets_users(
    user_id int(10) not null,
    test_id int(10) not null,
    id int(10) primary key not null auto_increment,
    FOREIGN KEY (test_id) references tests(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) references users(id) ON DELETE CASCADE
);

create table tets_groups(
    user_id int(10) not null,
    group_id int(10) not null,
    id int(10) primary key not null auto_increment,
    FOREIGN KEY (group_id) references tests(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) references groups(id) ON DELETE CASCADE
);

create table tets_playlists(
    user_id int(10) not null,
    playlist_id int(10) not null,
    id int(10) primary key not null auto_increment,
    FOREIGN KEY (playlist_id) references tests(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) references playlists(id) ON DELETE CASCADE
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