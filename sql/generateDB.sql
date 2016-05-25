
CREATE DATABASE memoryswipe;

USE memoryswipe;

CREATE TABLE leaderboards (
  id INTEGER NOT NULL auto_increment,
  username varchar(255) default '' NOT NULL ,
  score INTEGER NOT NULL,
  gamemode INTEGER NOT NULL,
  datetime varchar(25) NOT NULL default '',
  PRIMARY KEY (id),
  FOREIGN KEY (username) REFERENCES username(id) ON DELETE CASCADE
) ENGINE=MyISAM;

CREATE TABLE `achievements` (
  `achievement_id` INTEGER(11) NOT NULL AUTO_INCREMENT UNIQUE,
  `achievement_name` VARCHAR(20) NOT NULL UNIQUE,
  `achievement_description` TEXT(1),
  `achievement_max` INTEGER(11) DEFAULT NULL,
  PRIMARY KEY (`achievement_id`)
) ENGINE=MyISAM;

CREATE TABLE members (
  id INTEGER NOT NULL auto_increment,
  username varchar(255) default '' NOT NULL ,
  passcode varchar(255) default '' NOT NULL ,
  datetime varchar(25) NOT NULL default '',
  PRIMARY KEY (id),
  FOREIGN KEY (username) REFERENCES username(id) ON DELETE CASCADE
) ENGINE=MyISAM;


