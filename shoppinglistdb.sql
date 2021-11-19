-- create and select the database
DROP DATABASE IF EXISTS shoppinglistdb;
CREATE DATABASE shoppinglistdb;
USE shoppinglistdb;  

-- Creating Table
CREATE TABLE items (
  itemNo       INT(11)        NOT NULL   AUTO_INCREMENT,
  itemName     VARCHAR(255)   NOT NULL,
  PRIMARY KEY (itemID)
);


-- create the user and grant priveleges.
GRANT SELECT, INSERT, DELETE, UPDATE
ON shoppinglistdb.*
TO usr@localhost
IDENTIFIED BY 'pa55word'; 