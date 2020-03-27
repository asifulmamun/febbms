-- Become A Donor Table Create with column
CREATE TABLE `febbms`.`becomedonor` ( `id` INT(20) NOT NULL AUTO_INCREMENT , `profileStatus` INT(2) NOT NULL DEFAULT '0' , `name` VARCHAR(200) NOT NULL , `bloodGroup` VARCHAR(50) NOT NULL , `mobile` VARCHAR(30) NULL DEFAULT NULL , `password`  VARCHAR(255) NOT NULL DEFAULT '' , `email` VARCHAR(200) NOT NULL, `dob` DATE NULL , `address` LONGTEXT NOT NULL , `socialUrl` VARCHAR(200) NOT NULL , `gender` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`), UNIQUE `mobile` (`mobile`)) ENGINE = InnoDB;


-- Request for Blood Table Create with column
CREATE TABLE `febbms`.`requestblood` ( `id` INT(30) NOT NULL AUTO_INCREMENT , `requeststatus` INT(5) NOT NULL DEFAULT '1' , `name` VARCHAR(250) NOT NULL , `bloodgroup` VARCHAR(30) NOT NULL , `blooddonatelastdate` DATE NULL DEFAULT NULL , `mobile` VARCHAR(30) NOT NULL , `requiredonatebag` INT(10) NOT NULL DEFAULT '1' , `hospitalandaddress` LONGTEXT NOT NULL , `socialurl` VARCHAR(250) NOT NULL , `gender` VARCHAR(30) NOT NULL , `requestdata` DATE NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;



-- query
SELECT * FROM `requestblood` ORDER BY id DESC LIMIT 1, 2