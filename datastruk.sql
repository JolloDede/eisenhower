CREATE DATABASE IF NOT EXISTS eh;
USE eh;

CREATE TABLE eisenhower(
  id int AUTO_INCREMENT not null,
  user varchar(20),
  etime time,
  link varchar(25),
  discription varchar(200),
  dificulty int,
  PRIMARY key(id)
);
