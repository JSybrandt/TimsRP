DROP TABLE IF EXISTS GAME_POST;
DROP TABLE IF EXISTS GAME_REQUESTS;
DROP TABLE IF EXISTS GAME_USERS;
DROP TABLE IF EXISTS GAMES;
DROP TABLE IF EXISTS USERS;
​
CREATE TABLE USERS(
	userid varchar(30),
	firstname VARCHAR(30),
	lastname varchar(30),
	email varchar(30) unique,
    picture varchar(1000),
	sex boolean,
	birthday date,
	password varchar(30),
    primary key (userid)
);
​
CREATE TABLE GAMES(
	gameid varchar(30),
	adminuserid varchar(30),
	img varchar(1000),
	systemname varchar(100),
	description varchar(1000),
	foreign key (adminuserid) references USERS(userid),
    primary key (gameid)
);
​
CREATE TABLE GAME_USERS(
	gameid varchar(30),
	userid varchar(30),
	charactername varchar(30),
	foreign key (gameid) references GAMES(gameid),
	foreign key (userid) references USERS(userid),
    primary key (gameid, userid)
);
​
CREATE TABLE GAME_REQUESTS(
	gameid varchar(30),
	userid varchar(30),
	foreign key (gameid) references GAMES(gameid),
	foreign key (userid) references USERS(userid),
    primary key (gameid, userid)
);
​
CREATE TABLE GAME_POST(
	gameid varchar(30),
	userid varchar(30),
	content varchar(1000),
	timeofpost datetime,
	foreign key (gameid) references GAMES(gameid),
	foreign key (userid) references USERS(userid),
    primary key (gameid, userid, timeofpost)
);