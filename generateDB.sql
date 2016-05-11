
CREATE DATABASE leaderboards;

USE leaderboards;

CREATE TABLE leaderboard (
  id INTEGER NOT NULL auto_increment,

  username varchar(255) default '' NOT NULL ,
  score INTEGER NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (username) REFERENCES username(id) ON DELETE CASCADE
) ENGINE=MyISAM;


