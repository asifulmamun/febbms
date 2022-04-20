CREATE TABLE `becomedonor` (
	`id` int(20) NOT NULL AUTO_INCREMENT,
	`profileStatus` int(2) NOT NULL DEFAULT '0',
	`name` varchar(200) NOT NULL,
	`bloodGroup` varchar(50) NOT NULL,
	`mobile` varchar(30),
	`lastDateOfDonate` DATE,
	`password` varchar(255) NOT NULL,
	`email` varchar(200) NOT NULL,
	`dob` DATE,
	`district` varchar(50),
	`address` longtext NOT NULL,
	`socialUrl` varchar(200),
	`gender` varchar(50) NOT NULL,
	`UpdatedOrAcceptBy` varchar(50),
	`reg_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
	`token` varchar(250),
	PRIMARY KEY (`id`)
);

CREATE TABLE `requestblood` (
	`id` int(30) NOT NULL AUTO_INCREMENT,
	`password` varchar(255) NOT NULL,
	`requeststatus` int(5) NOT NULL DEFAULT '1',
	`name` varchar(250),
	`bloodgroup` varchar(30) NOT NULL,
	`blooddonatelastdate` DATE,
	`mobile` varchar(30) NOT NULL,
	`requiredonatebag` int(10) NOT NULL DEFAULT '1',
	`district` varchar(50),
	`hospitalandaddress` longtext,
	`socialurl` varchar(250),
	`gender` varchar(30),
	`requestdate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`UpdatedOrAcceptBy` varchar(50),
	PRIMARY KEY (`id`)
);

CREATE TABLE `users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`donor_id` (11) NOT NULL,
	`role` int(11),
	PRIMARY KEY (`id`)
);

CREATE TABLE `donate_event` (
	`id` int(200) NOT NULL AUTO_INCREMENT,
	`id_requestblood` int(20) NOT NULL,
	`id_becomedonor` int(20) NOT NULL,
	`status` BINARY(2) NOT NULL DEFAULT '00',
	`req_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
	`req_by_id` int(20) NOT NULL,
	`req_by` int(2) NOT NULL DEFAULT '0',
	`accept_date` DATE,
	`accept_by_id` int(20),
	`accept_by` int(2) NOT NULL DEFAULT '1',
	`approved_by` int(20),
	PRIMARY KEY (`id`)
);

ALTER TABLE `users` ADD CONSTRAINT `users_fk0` FOREIGN KEY (`donor_id`) REFERENCES `becomedonor`(`id`);

ALTER TABLE `donate_event` ADD CONSTRAINT `donate_event_fk0` FOREIGN KEY (`id_requestblood`) REFERENCES `requestblood`(`id`);

ALTER TABLE `donate_event` ADD CONSTRAINT `donate_event_fk1` FOREIGN KEY (`id_becomedonor`) REFERENCES `becomedonor`(`id`);




