| login | CREATE TABLE `login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 








| stories | CREATE TABLE `stories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `link` varchar(5000) DEFAULT NULL,
  `url` varchar(5000) DEFAULT NULL,
  `story` longtext,
  `likes` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`title`),
  CONSTRAINT `stories_ibfk_1` FOREIGN KEY (`username`) REFERENCES `login` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1 |








| comments | CREATE TABLE `comments` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment_username` varchar(30) DEFAULT NULL,
  `comment` longtext,
  `story_username` varchar(30) DEFAULT NULL,
  `story_title` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `comments_ibfk_1` (`story_username`,`story_title`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`story_username`, `story_title`) REFERENCES `stories` (`username`, `title`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1 |
