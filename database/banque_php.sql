DROP DATABASE IF EXISTS banque_php;
CREATE DATABASE banque_php CHARACTER SET 'utf8';
USE banque_php;

DROP USER IF EXISTS 'BanquePHP'@'Localhost';
CREATE USER 'BanquePHP'@'Localhost';
GRANT ALL PRIVILEGES ON banque_php.* To 'BanquePHP'@'Localhost' IDENTIFIED BY 'banque76';


CREATE TABLE User(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  lastname VARCHAR(50) NOT NULL,
  firstname VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL UNIQUE,
  city VARCHAR(30) NOT NULL,
  city_code CHAR(5) NOT NULL,
  adress VARCHAR(50) NOT NULL,
  sex CHAR(1) NOT NULL,
  password VARCHAR(255) NOT NULL UNIQUE,
  birth_date DATE NOT NULL,
  PRIMARY KEY (id)
)
ENGINE=InnoDB;

INSERT INTO User(lastname, firstname, email, city, city_code, adress, sex, password, birth_date)
VALUES
("Dupont", "Richard", "r.dupont@gmail.com", "Rouen", "76000", "9 rue du Gros Horloge", "h", "Riri1962!", "1962-05-21"),
("Melez", "Claire", "clairemelez@outlook.com", "Lille", "59100", "45 rue du Molinel", "f", "AstraGirl154", "2000-11-14");

CREATE TABLE Account(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  amount DECIMAL(11,2) NOT NULL,
  opening_date TIMESTAMP NOT NULL,
  account_type VARCHAR(50) NOT NULL,
  user_id INT UNSIGNED,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES User(id)
)
ENGINE=InnoDB;

INSERT INTO Account(amount, opening_date, account_type, user_id)
VALUES
(596.23, NOW(), "Compte courant", 1),
(12345, NOW(), "Livret A", 1),
(500, NOW(), "PEL", 1),
(-56.78, NOW(), "Compte courant", 2);

CREATE TABLE Operation(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  operation_type VARCHAR(30) NOT NULL,
  amount DECIMAL(13,2) NOT NULL,
  registered TIMESTAMP NOT NULL,
  label VARCHAR(50) NULL,
  account_id INT UNSIGNED,
  PRIMARY KEY (id),
  FOREIGN KEY (account_id) REFERENCES Account(id)
)
ENGINE=InnoDB;

INSERT INTO Operation(operation_type, amount, registered, label, account_id)
VALUES
("débit", -15.60, NOW(), "le poulet d'or SARL", 1),
("crédit", 500, NOW(), NULL, 2),
("débit", -7.62, NOW(), "carrefour essence", 1),
("débit", -50, NOW(), "frais de gestion", 2)
;
