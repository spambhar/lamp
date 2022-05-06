SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------

CREATE TABLE `booking_details` (
  `BookingID` int(10) NOT NULL,
  `BookingTimeStamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `UserID` varchar(10) NOT NULL,
  `EventID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

CREATE TABLE `event_details` (
  `EventID` int(10) NOT NULL,
  `EventName` varchar(100) NOT NULL,
  `EventDate` date NOT NULL,
  `EventTime` time NOT NULL,
  `VenueID` int(10) NOT NULL,
  `UserID` varchar(10),
  `available` int(10) NOT NULL,
  `max` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `event_details` (`EventID`, `EventName`, `EventDate`, `EventTime`, `VenueID`,`available`,`max`) VALUES
(1, 'Debate Competition', '2022-05-07' , '07:00', 1, 10, 10),
(2, 'Photography Competition', '2022-05-07' , '09:00', 2, 10, 10),
(3, 'Dance Competition', '2022-05-08' , '10:00', 3, 10, 10),
(4, 'Singing Competition', '2022-05-08' , '12:00', 3, 10, 10),
(5, 'Stand up', '2022-05-09' , '08:00', 1, 10, 10),
(6, 'Face painting', '2022-05-09' , '10:00', 2, 10, 10),
(7, 'On the spot painting', '2022-05-09' , '12:00', 2, 10,10),
(8, 'Games', '2022-05-09' , '09:00', 3, 10,10);
-- --------------------------------------------------------

CREATE TABLE `user_details` (
  `UserNo` int(10) NOT NULL,
  `UserID` varchar(10) NOT NULL,
  `UserFullName` varchar(80) NOT NULL,
  `UserPassword` varchar(12) NOT NULL,
  `UserEmail` varchar(50) NOT NULL,
  `Usertype` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- --------------------------------------------------------

-- Table structure for table `venue_details`

CREATE TABLE `venue_details` (
  `VenueID` int(11) NOT NULL,
  `VenueName` varchar(80) NOT NULL,
  `VenueInfo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `venue_details` (`VenueID`, `VenueName`, `VenueInfo`) VALUES
(1, 'C-audi', 'Auditoriam'),
(2, 'Dome Ground', 'Open'),
(3, 'NIM-audi', 'Auditoriam');

-- Indexes for dumped tables

-- Indexes for table `booking_details`
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`BookingID`),
  ADD KEY `booking_details_ibfk_1` (`UserID`),
  ADD KEY `booking_details_ibfk_2` (`EventID`);

-- Indexes for table `event_details`
ALTER TABLE `event_details`
  ADD PRIMARY KEY (`EventID`),
  ADD KEY `event_details_ibfk_1` (`VenueID`),
  ADD KEY `event_details_ibfk_3` (`UserID`);

-- Indexes for table `user_details`
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`UserNo`),
  ADD UNIQUE KEY `UserID` (`UserID`);

-- Indexes for table `venue_details`
ALTER TABLE `venue_details`
  ADD PRIMARY KEY (`VenueID`);

-- AUTO_INCREMENT for dumped tables

-- AUTO_INCREMENT for table `booking_details`
ALTER TABLE `booking_details`
  MODIFY `BookingID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

-- AUTO_INCREMENT for table `event_details`
ALTER TABLE `event_details`
  MODIFY `EventID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

-- AUTO_INCREMENT for table `user_details`
ALTER TABLE `user_details`
  MODIFY `UserNo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

-- AUTO_INCREMENT for table `venue_details`
ALTER TABLE `venue_details`
  MODIFY `VenueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

-- Constraints for dumped tables

-- Constraints for table `booking_details`
ALTER TABLE `booking_details`
  ADD CONSTRAINT `booking_details_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user_details` (`UserID`),
  ADD CONSTRAINT `booking_details_ibfk_2` FOREIGN KEY (`EventID`) REFERENCES `event_details` (`EventID`);

-- Constraints for table `event_details`
ALTER TABLE `event_details`
  ADD CONSTRAINT `event_details_ibfk_1` FOREIGN KEY (`VenueID`) REFERENCES `venue_details` (`VenueID`),
  ADD CONSTRAINT `event_details_ibfk_3` FOREIGN KEY (`UserID`) REFERENCES `user_details` (`UserID`);
COMMIT;

