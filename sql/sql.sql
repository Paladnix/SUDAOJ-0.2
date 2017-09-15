drop database if exists `SDOJ`;

create database `SDOJ` default character set utf8 COLLATE utf8_general_ci ;

use `SDOJ`;

create table user(

	id varchar(20)       comment '学号', 
	username varchar(32) comment '用户名，自己起的名字',
	truename varchar(32) comment '真实名字',
	password varchar(32) comment '密码',
	email varchar(64),
	sex varchar(16),
	tel varchar(32),
	role int default '0' comment '用户权限',
	
    primary key(username)
    
)engine=InnoDB default charset=utf8;

create table problem(

	pid int unsigned auto_increment,
	pname varchar(128) NOT NULL,
	ratio float default '0.00',
	accepted int default '0',
	submited int default '0',
	discription blob NOT NULL,
	input blob,
	output blob,
	inputCase blob,
	outputCase blob,
	timeLimit float default '1.0',
	memoryLimit int default '65535',
	author varchar(32)            comment 'username',
	cid int default '0'           comment '所属比赛id',
	visable int default '0'       comment '是否可见，默认是不可见',
    tag varchar(2014) default "#" comment '题目标签',
	
	primary key(pid)

)engine=InnoDB auto_increment=1 default charset=utf8;

create table status(

	rid int unsigned auto_increment comment '提交的ID',
	pid int NOT NULL                comment '题目ID', 
	status varchar(32)              comment '提交结果',         
	rtime float                     comment '运行时间',
	rmemory int                     comment '运行内存',
	username varchar(32) not null, 
	compiler varchar(16),
	submitTime timestamp default CURRENT_TIMESTAMP comment '提交的时间',
	codeLength int                                 comment '代码长度',
    cid int default 0                              comment '所属比赛',
    
	primary key(rid)
	
)engine=InnoDB auto_increment=1 default charset=utf8;

create table contest(

	cid int unsigned auto_increment,
	cname varchar(128),
	timeStart datetime,
	timeEnd datetime,
	password varchar(20),
    problem varchar(1024) default "#",
	author varchar(32) NOT NULL default 'admin',
    introduction varchar(2014),
    tip varchar(1024),
	
	primary key (cid)
)engine=InnoDB auto_increment=1 default charset=utf8;

