CREATE DATABASE IF NOT EXISTS eh;
USE eh;

CREATE TABLE eisenhower(
  id int AUTO_INCREMENT not null,
  user varchar(20),
  etime date,
  link varchar(50),
  description varchar(2000),
  importance boolean,
  PRIMARY key(id)
);

CREATE TABLE snake(
  user varchar(20) not null,
  score int,
  PRIMARY key(user)
);
