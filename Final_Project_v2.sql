drop table if exists  BestAnswer cascade ;
drop table if exists Award cascade;
drop table if exists Post cascade;
drop table if exists Question cascade;
drop table if exists Users cascade;
drop table if exists Tag cascade;

create table Tag(
    tag_id int not null auto_increment,
    tag_name varchar(50) not null,
    primary key (tag_id)
);

INSERT into tag values(1, 'Programming language');
INSERT into tag values(2, 'Database System');
INSERT into tag values(3, 'Algorithm');
INSERT into tag values(4, 'Machine Learning');
INSERT into tag values(5, 'Data science');




create table Users(
    user_id int not null auto_increment,
    username varchar(20) not null, -- user name with max length of
    password varchar(16) not null, -- password length max of 16 character
    firstname varchar(20) not null,
    lastname varchar(20) not null,
    level varchar(20) default 'basic',
    Email varchar(50),
    city varchar(20),
    state varchar(20),
    country varchar(20),
    phone varchar(20),
    primary key (user_id)
);

INSERT INTO Users (username, password, firstname, lastname, level, Email, city, state, country, phone) values ('wangh6', 'wangh6','haoxiang', 'wang',default,'hw2766@nyu.edu', 'Queens','New York', 'USA','123-123-1111');
INSERT INTO Users (username, password, firstname, lastname, level, Email, city, state, country, phone) values ('heyif3', 'heyif3','yifan', 'he', default,'yf3631@nyu.edu','Los Angles','California','USA','123-123-2222');
INSERT INTO Users (username, password, firstname, lastname, level, Email, city, state, country, phone) values ('wangyif2', 'wangyif2','yifeng','wang', default,'yw2312@nyu.edu', 'Seattle', 'Washington','USA','123-123-3333');
INSERT INTO Users (username, password, firstname, lastname, level, Email, city, state, country, phone) values ('wangtongx7', 'wangtongx7','tongxuan', 'wang', default,'tw4524@nyu.edu','New York City','New York','USA','123-123-4444');
INSERT INTO Users (username, password, firstname, lastname, level, Email, city, state, country, phone) values ('chenguow0', 'chenguow0','guowei', 'chen',default,'gc3824@nyu.edu', 'hefei','Anhui','China','123-123-5555');





create table Question (
    question_id int not null auto_increment,
    uid int not null,
    tag int not null,
    title varchar(200) not null,
    body varchar(10000) not null,
    question_time timestamp not null default current_timestamp ,
    status varchar(20) default 'not finished',
    primary key (question_id),
    foreign key (uid) references Users(user_id),
    foreign key (tag) references Tag(tag_id)
);

INSERT INTO Question values (1, 1, 2, 'what is data base system','what is the database system doing and how it work?','2022-01-01 00:12:32',default);
INSERT INTO Question values (2, 3, 4, 'what is machine learning','how the machine learning improve the accuracy','2022-02-01 01:30:12','Finished');
INSERT INTO Question values (3, 5, 3, 'what is the quick sort','how quick sort works and its complexity','2019-11-3 11:28:17',default);
INSERT INTO Question values (4, 2, 1, 'is prolog still useful today?','what is the prolog used for?','2021-03-04 04:37:37',default);
INSERT INTO Question values (5, 5, 3, 'what is merge sort','how merge sort works and its advantages over other sorts','2019-07-12 17:30:38',default);
INSERT INTO Question values (6, 4, 5, 'what is regression','what is regression','2020-04-09 18:30:12',default);
INSERT INTO Question values (7, 3, 5, 'Error code 0072 when downloading the numpy','had anybody ever meet the same problem?','2022-04-17 12:47:28',default);
INSERT INTO Question values (8, 5, 3, 'what is the difference of merge sort and other sort on the time & space complexity','is the quick sort faster then merge sort?','2019-11-7 14:36:04',default);

create table Post (
    post_id int not null auto_increment,
    qid int not null,
    uid int not null,
    content varchar(10000) not null,
    thumb_ups int default 0,
    post_time timestamp not null,
    primary key (post_id),
    foreign key (qid) references Question (question_id),
    foreign key (uid) references Users(user_id)
);

INSERT INTO Post values (1, 1, 4,'it is a model to store some information about different data type',3,'2022-01-01 12:32:43');
INSERT INTO Post values (2, 1, 1,'got it!, thank you',0,'2022-01-02 11:12:53');
INSERT INTO Post values (3, 2, 5,'I do not know it',0,'2022-02-02 11:12:53');
INSERT INTO Post values (4, 2, 4,'It is using machine learning model like SVM to increase the probability',5,'2022-02-02 15:42:51');
INSERT INTO Post values (5, 2, 3,'what kind of machine learning model',0,'2022-02-03 02:12:21');
INSERT INTO Post values (6, 2, 2,'svm, decision tree, naive bayes',2,'2022-02-04 05:20:41');

create table Award(
  uid int not null,
  count int default 0,
  primary key (uid),
  foreign key (uid) references Users(user_id)
);



create table BestAnswer(
    qid int not null,
    postid int not null,
    primary key (qid, postid),
    foreign key (qid) references Question(question_id),
    foreign key (postid) references Post(post_id)
);

insert into BestAnswer values (2,4);
