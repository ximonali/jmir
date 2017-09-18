DROP DATABASE IF EXISTS simon_test;

/*
Create Database
*/

CREATE DATABASE IF NOT EXISTS simon_test 
DEFAULT CHARACTER 
SET latin1 COLLATE latin1_swedish_ci;
USE simon_test;

/*
Create Tables
*/
CREATE TABLE if NOT EXISTS provinces(
	id INT(11) unsigned NOT NULL AUTO_INCREMENT, 
	name VARCHAR(50) NOT NULL , 
	PRIMARY KEY (id))ENGINE=INNODB;

CREATE TABLE if NOT EXISTS users(
	id INT(11) AUTO_INCREMENT, 
	name varchar(50) NOT NULL,
	telephone varchar(14) NOT NULL, 
	province_id INT(11) UNSIGNED NOT NULL, 
	postal_code varchar(7) NOT NULL, 
	salary decimal(7,2) NOT NULL,
	INDEX (province_id),
	PRIMARY KEY (id),
	FOREIGN KEY (province_id) REFERENCES provinces(id))ENGINE=INNODB;


INSERT INTO provinces(id,name) VALUES 
(1,"Ontario"),
(2,"Quebec"),
(3,"Nova Scotia"),
(4,"New Brunswick"),
(5,"British Columbia"),
(6,"Prince Edward Island"),
(7,"Saskatchewan"),
(8,"Alberta"),
(9,"Newfoundland and Labrador"),
(10,"Northwest Territories"),
(11,"Yukon"),
(12,"Nunavut");


INSERT INTO `users` (`id`, `name`, `telephone`, `province_id`, `postal_code`, `salary`) VALUES
(1, 'Jill Smith', '(416) 123-4567', 1, 'M1J 3E2', '5,000.50'),
(2, 'Eve Jackson', '416-123-4567', 2, 'M1J 4D2', '3,000.50'),
(3, 'Bill Gates', '000-000-0000', 6, 'M6N5G4', '22,000.00'),
(4, 'Jhon Doe', '000-000-0000', 9, 'M1J3E2', '2,0000.00'),
(5, 'Mary Doe', '000-000-0000', 11, 'M1J3E2', '2,0000.00'),
(6, 'Mark Mcmore', '(416) 123-4567', 3, 'M6N5G4', '65,000.00'),
(7, 'Daniel Castlegate', '000-000-0000', 1, 'M1J 2W4', '23,000.00'),
(8, 'Mary Doe', '000-000-0000', 11, 'M1J3E2', '2,0000.00'),
(9, 'Mark Mcmore', '(416) 123-4567', 3, 'M6N5G4', '65,000.00'),
(10, 'Daniel Castlegate', '000-000-0000', 1, 'M1J 2W4', '23,000.00'),
(11, 'Jill Smith', '(416) 123-4567', 1, 'M1J 3E2', '5,000.50'),
(12, 'Eve Jackson', '416-123-4567', 2, 'M1J 4D2', '3,000.50'),
(13, 'Jason Mathew', '000-000-0000', 12, 'M1J 2W4', '22,000.00');

