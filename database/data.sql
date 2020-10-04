DROP DATABASE IF EXISTS banque_php; -- Delete database and user if exist
DROP USER IF EXISTS banquePHP;

CREATE DATABASE banque_php; -- Create database and user
CREATE USER banquePHP IDENTIFIED BY 'root';

GRANT ALL PRIVILEGES ON banque_php TO banquePHP;


-- Create 3 tables in database
CREATE TABLE customers (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  lastname VARCHAR(20) NOT NULL,
  fisrtname VARCHAR(20) NOT NULL,
  birthday DATE NOT NULL,
  mail VARCHAR(20) NOT NULL,
  pass_word VARCHAR(20) NOT NULL,
  accounts_id INT NOT NULL
);

CREATE TABLE accounts (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  type_account VARCHAR(15) NOT NULL,
  number_account INT NOT NULL,
  opening_date DATE NOT NULL,
  money_account DECIMAL NULL,
  customers_id INT NOT NULL
);

CREATE TABLE operations (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  withdrawal DECIMAL NULL,
  deposit DECIMAL NULL,
  transfert DECIMAL NULL,
  accounts_id INT NOT NULL
);

-- Foreign keys
ALTER TABLE accounts
  ADD CONSTRAINT fk_customers_id FOREIGN KEY(customers_id) REFERENCES customers(id);

ALTER TABLE operations
  ADD CONSTRAINT fk_accounts_id FOREIGN KEY(accounts_id) REFERENCES accounts(id);