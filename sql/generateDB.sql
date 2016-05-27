
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
) ENGINE=InnoDB;

CREATE TABLE `achievements` (
  `achievement_id` INTEGER(11) NOT NULL AUTO_INCREMENT UNIQUE,
  `achievement_name` VARCHAR(20) NOT NULL UNIQUE,
  `achievement_description` TEXT(1),
  `achievement_max` INTEGER(11) DEFAULT NULL,
  PRIMARY KEY (`achievement_id`)
) ENGINE=InnoDB;

CREATE TABLE members (
  id INTEGER NOT NULL auto_increment,
  username varchar(255) default '' NOT NULL ,
  passcode varchar(255) default '' NOT NULL ,
  datetime varchar(25) NOT NULL default '',
  PRIMARY KEY (id),
  FOREIGN KEY (username) REFERENCES username(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `member_achievements` (
  `achievement_id` INTEGER(11) DEFAULT NULL,
  `achievement_value` INTEGER(11) DEFAULT NULL,
  `username` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT NULL,
  KEY `achievement_id` (`achievement_id`) USING BTREE,
  KEY `username` (`username`) USING BTREE,
  CONSTRAINT `member_achievements_fk2` FOREIGN KEY (`username`) REFERENCES `members` (`username`) ON UPDATE CASCADE,
  CONSTRAINT `member_achievements_fk1` FOREIGN KEY (`achievement_id`) REFERENCES `achievements` (`achievement_id`) ON UPDATE CASCADE
) ENGINE=InnoDB
CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;


-- Create Procedure to get user achievements

CREATE DEFINER = 'g3'@'%' PROCEDURE `GetAchievements`(
        IN `username` VARCHAR(255)
    )
    NOT DETERMINISTIC
    CONTAINS SQL
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN

	SELECT * FROM

		-- Select achievements this user has unlocked
		(SELECT a.*, ma.username, ma.achievement_value AS value,
		CASE 
        	WHEN (100*ma.achievement_value/a.`achievement_max`) > 100 THEN 100
        	WHEN (100*ma.achievement_value/a.`achievement_max`) < 0 THEN 0
        	ELSE ROUND(100*ma.achievement_value/a.`achievement_max`, 0) END
        AS percent_complete 
		FROM achievements a 
		RIGHT JOIN  member_achievements ma ON ma.achievement_id = a.achievement_id
		WHERE ma.username = username
		
		 UNION
		 -- Select all achievements
		 SELECT a.*, username, 0, 0  FROM achievements a
		) sq

	-- Group unlocked + all achievements
	GROUP BY achievement_id;
END;

