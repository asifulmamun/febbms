-- Become A Donor Table Create with column
CREATE TABLE `febbms`.`becomedonor` (
    `id` INT(20) NOT NULL AUTO_INCREMENT , 
    `profileStatus` INT(2) NOT NULL DEFAULT '0' , 
    `name` VARCHAR(200) NOT NULL , 
    `bloodGroup` VARCHAR(50) NOT NULL , 
    `mobile` VARCHAR(30) NULL DEFAULT NULL , 
    `password`  VARCHAR(255) NOT NULL DEFAULT '' , 
    `email` VARCHAR(200) NOT NULL, 
    `dob` DATE NULL , `address` LONGTEXT NOT NULL , 
    `socialUrl` VARCHAR(200) NOT NULL , 
    `gender` VARCHAR(50) NOT NULL , 
    PRIMARY KEY (`id`), 
    UNIQUE `mobile` (`mobile`)
    ) ENGINE = InnoDB;
-- Become Donor Table - Add New Field
ALTER TABLE `becomedonor` ADD `lastDateOfDonate` DATE NULL DEFAULT NULL AFTER `mobile`;
ALTER TABLE `becomedonor` ADD `UpdatedOrAcceptBy` VARCHAR(50) NULL DEFAULT NULL AFTER `gender`;
ALTER TABLE `becomedonor` ADD `district` VARCHAR(50) NULL DEFAULT NULL AFTER `dob`;
ALTER TABLE `becomedonor` ADD `reg_date` DATETIME NULL DEFAULT CURRENT_TIMESTAMP AFTER `UpdatedOrAcceptBy`;
ALTER TABLE `becomedonor` CHANGE `socialUrl` `socialUrl` VARCHAR(200) NULL DEFAULT NULL;
ALTER TABLE `becomedonor` ADD `token` VARCHAR(250) NULL DEFAULT NULL AFTER `reg_date`;

-- Request for Blood Table Create with column
CREATE TABLE `febbms`.`requestblood` ( 
    `id` INT(30) NOT NULL AUTO_INCREMENT , 
    `requeststatus` INT(5) NOT NULL DEFAULT '1' , 
    `name` VARCHAR(250) NULL DEFAULT NULL , 
    `bloodgroup` VARCHAR(30) NOT NULL , 
    `blooddonatelastdate` DATE NULL DEFAULT NULL , 
    `mobile` VARCHAR(30) NOT NULL , 
    `requiredonatebag` INT(10) NOT NULL DEFAULT '1' , 
    `district` VARCHAR(50) NULL DEFAULT NULL , 
    `hospitalandaddress` LONGTEXT NULL DEFAULT NULL , 
    `socialurl` VARCHAR(250) NULL DEFAULT NULL , 
    `gender` VARCHAR(30) NULL DEFAULT NULL , 
    `requestdate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)
    ) ENGINE = InnoDB;
-- Request Blood Table - Add New Field
ALTER TABLE `requestblood` ADD `password` VARCHAR(255) NOT NULL DEFAULT '' AFTER `id`;

-- Users Table
CREATE TABLE `febbms`.`users` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `donor_id` INT NOT NULL , 
    `role` INT NULL DEFAULT NULL , 
    
    PRIMARY KEY (`id`), 
    UNIQUE (`donor_id`)
) ENGINE = InnoDB;
