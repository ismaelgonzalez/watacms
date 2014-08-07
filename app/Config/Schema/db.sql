CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50),
    password VARCHAR(255),
    role VARCHAR(20),
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);
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
