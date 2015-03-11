CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(150),
    password VARCHAR(255),
    role VARCHAR(20),
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    PRIMARY KEY  (id)
);

CREATE TABLE authors (
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT,
    name VARCHAR(150),
    last_name VARCHAR(150),
    bio TEXT DEFAULT NULL,
    pic VARCHAR(150) DEFAULT NULL,
    social_media VARCHAR(255) DEFAULT NULL,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL,
    PRIMARY KEY  (id)
);

ALTER TABLE authors ADD CONSTRAINT authors_fk1 FOREIGN KEY (user_id) REFERENCES users(id);
ALTER TABLE users ADD status TINYINT default 1;

### banners
CREATE TABLE `banners` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(250),
  `link` VARCHAR(250),
  `pic` VARCHAR(150),
  `start_date` DATE,
  `end_date` DATE,
  `is_adsense` INT(1) DEFAULT 0,
  `adsense_code` TEXT,
  `status` TINYINT(4) DEFAULT 1,
  `banner_size_id` INT,
  PRIMARY KEY  (`id`)
);

CREATE TABLE `banner_sizes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `size` VARCHAR(150),
  PRIMARY KEY  (`id`)
);


ALTER TABLE `banners` ADD CONSTRAINT `banner_sizes_fk1` FOREIGN KEY (`banner_size_id`) REFERENCES banner_sizes(`id`);
INSERT INTO banner_sizes (size) VALUES ('300x250'),('728x90'),('320x50');

### sections
CREATE TABLE `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT 0,
  `name` varchar(100) DEFAULT NULL,
  `lft` INTEGER(10) DEFAULT NULL,
  `rght` INTEGER(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
);
ALTER TABLE sections ADD status TINYINT(4) DEFAULT 1;

### Tags
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `tagged` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) DEFAULT NULL,
  `model` enum('album','post','pic','video') DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

##pics
CREATE TABLE `pics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pic` varchar(128) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `blurb` varchar(250) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `is_published` TINYINT(4) DEFAULT 1,
  `published_date` DATE DEFAULT NULL,
  `published_time` TIME DEFAULT NULL,
  `status` TINYINT(4) DEFAULT 1,
  PRIMARY KEY (`id`)
);

### polls
CREATE TABLE `polls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(150) DEFAULT NULL,
  `blurb` varchar(250) DEFAULT NULL,
  `published_date` DATE DEFAULT NULL,
  `published_time` TIME DEFAULT NULL,
  `status` TINYINT(4) DEFAULT 1,
  PRIMARY KEY (`id`)
);

CREATE TABLE `poll_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_id` int(11) DEFAULT NULL,
  `answer` varchar(150) DEFAULT NULL,
  `num_votes` int(11) DEFAULT 0,
  `color` varchar(50) DEFAULT NULL,
  `status` TINYINT(4) DEFAULT 1,
  PRIMARY KEY (`id`)
);

##albums
CREATE TABLE `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `blurb` varchar(250) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `is_published` TINYINT(4) DEFAULT 1,
  `published_date` DATE DEFAULT NULL,
  `published_time` TIME DEFAULT NULL,
  `status` TINYINT(4) DEFAULT 1,
  PRIMARY KEY (`id`)
);

##photos
CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pic` varchar(128) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `blurb` varchar(250) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  `status` TINYINT(4) DEFAULT 1,
  PRIMARY KEY (`id`)
);

##videos
CREATE TABLE `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video` varchar(128) DEFAULT NULL,
  `video_number` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `blurb` varchar(250) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `is_published` TINYINT(4) DEFAULT 1,
  `published_date` DATE DEFAULT NULL,
  `published_time` TIME DEFAULT NULL,
  `status` TINYINT(4) DEFAULT 1,
  PRIMARY KEY (`id`)
);

#ALTER TABLE video ADD COLUMN video_number VARCHAR(100);

##articles
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `blurb` varchar(250) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `pic` varchar(128) DEFAULT NULL,
  `pic_blurb` varchar(250) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `is_published` TINYINT(4) DEFAULT 1,
  `published_date` DATE DEFAULT NULL,
  `published_time` TIME DEFAULT NULL,
  `status` TINYINT(4) DEFAULT 1,
  `is_main` TINYINT(1) DEFAULT 0,
  `is_top` TINYINT(1) DEFAULT 0,
  `was_main` TINYINT(4) DEFAULT 0,
  `num_views` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
);