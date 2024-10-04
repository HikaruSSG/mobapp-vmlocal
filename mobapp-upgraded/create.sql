CREATE DATABASE Registration;

USE Registration;

CREATE TABLE registration (
  id INT PRIMARY KEY AUTO_INCREMENT,
  firstname VARCHAR(50) NOT NULL,
  middle VARCHAR(50) NULL,
  last VARCHAR(50) NOT NULL,
  birth_day DATE NOT NULL,
  address VARCHAR(100) NOT NULL,
  zipcode VARCHAR(10) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARBINARY(255) NOT NULL
) ENGINE=InnoDB;