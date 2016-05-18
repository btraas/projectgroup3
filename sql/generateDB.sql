
CREATE DATABASE leaderboards;

USE leaderboards;

CREATE TABLE leaderboards (
  id INTEGER NOT NULL auto_increment,
  username varchar(255) default '' NOT NULL ,
  score INTEGER NOT NULL,
  gamemode INTEGER NOT NULL,
  datetime varchar(25) NOT NULL default '',
  PRIMARY KEY (id),
  FOREIGN KEY (username) REFERENCES username(id) ON DELETE CASCADE
) ENGINE=MyISAM;


