-- --------------------------------------------------------

--
-- Table structure for table `becomedonor`
--

CREATE TABLE `becomedonor` (
  `id` int(20) NOT NULL,
  `profileStatus` int(2) NOT NULL DEFAULT '0',
  `name` varchar(200) NOT NULL,
  `bloodGroup` varchar(50) NOT NULL,
  `mobile` varchar(30) DEFAULT NULL,
  `lastDateOfDonate` date DEFAULT NULL,
  `password` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(200) NOT NULL,
  `dob` date DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `address` longtext NOT NULL,
  `socialUrl` varchar(200) DEFAULT NULL,
  `gender` varchar(50) NOT NULL,
  `UpdatedOrAcceptBy` varchar(50) DEFAULT NULL,
  `reg_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donate_event`
--

CREATE TABLE `donate_event` (
  `id` int(200) NOT NULL,
  `id_requestblood` int(20) NOT NULL,
  `id_becomedonor` int(20) NOT NULL,
  `status` binary(2) DEFAULT '0\0',
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requestblood`
--

CREATE TABLE `requestblood` (
  `id` int(30) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '',
  `requeststatus` int(5) NOT NULL DEFAULT '1',
  `name` varchar(250) DEFAULT NULL,
  `bloodgroup` varchar(30) NOT NULL,
  `blooddonatelastdate` date DEFAULT NULL,
  `mobile` varchar(30) NOT NULL,
  `requiredonatebag` int(10) NOT NULL DEFAULT '1',
  `district` varchar(50) DEFAULT NULL,
  `hospitalandaddress` longtext,
  `socialurl` varchar(250) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `requestdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedOrAcceptBy` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Indexes for dumped tables
--

--
-- Indexes for table `becomedonor`
--
ALTER TABLE `becomedonor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `donate_event`
--
ALTER TABLE `donate_event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donate_event_fk0` (`id_requestblood`),
  ADD KEY `donate_event_fk1` (`id_becomedonor`);

--
-- Indexes for table `requestblood`
--
ALTER TABLE `requestblood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `donor_id` (`donor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `becomedonor`
--
ALTER TABLE `becomedonor`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `donate_event`
--
ALTER TABLE `donate_event`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requestblood`
--
ALTER TABLE `requestblood`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donate_event`
--
ALTER TABLE `donate_event`
  ADD CONSTRAINT `donate_event_fk0` FOREIGN KEY (`id_requestblood`) REFERENCES `requestblood` (`id`),
  ADD CONSTRAINT `donate_event_fk1` FOREIGN KEY (`id_becomedonor`) REFERENCES `becomedonor` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk0` FOREIGN KEY (`donor_id`) REFERENCES `becomedonor` (`id`);
COMMIT;