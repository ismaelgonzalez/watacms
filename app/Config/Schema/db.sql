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