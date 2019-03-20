CREATE DATABASE IF NOT EXISTS eh;
USE eh;

CREATE TABLE eisenhower(
  id int AUTO_INCREMENT not null,
  user varchar(20),
  etime date,
  link varchar(25),
  description varchar(200),
  importance boolean,
  PRIMARY key(id)
);
