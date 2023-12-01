-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 07:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `northdxx_dms_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `authorid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`authorid`, `name`) VALUES
(1, 'Pranav'),
(2, 'Tejas Thakur'),
(3, 'John Doe'),
(4, 'Shreyash'),
(5, 'Palak Pardeshi ');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `authorid` int(11) NOT NULL,
  `rackid` int(11) NOT NULL,
  `name` text NOT NULL,
  `publisherid` int(11) NOT NULL,
  `isbn` varchar(30) NOT NULL,
  `no_of_copy` int(5) NOT NULL,
  `available_copy` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookid`, `categoryid`, `authorid`, `rackid`, `name`, `publisherid`, `isbn`, `no_of_copy`, `available_copy`, `added_on`, `updated_on`) VALUES
(1, 3, 1, 1, 'Arpita', 12, '1234', 10, 1, '2023-12-01 11:44:12', '2023-12-01 11:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` enum('Enable','Disable') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `name`, `status`) VALUES
(3, 'Commerce 2', 'Enable'),
(8, 'App Development', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `issued_book`
--

CREATE TABLE `issued_book` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `student_prn` int(11) NOT NULL,
  `issue_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `expected_return_date` datetime NOT NULL,
  `return_date_time` datetime NOT NULL,
  `status` enum('Issued','Returned') NOT NULL,
  `return_quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `issued_book`
--

INSERT INTO `issued_book` (`id`, `book_id`, `student_prn`, `issue_date_time`, `expected_return_date`, `return_date_time`, `status`, `return_quantity`) VALUES
(18, 1, 12220120, '2023-12-01 12:02:55', '2023-12-09 00:00:00', '2023-12-01 12:07:44', 'Returned', 0),
(19, 1, 12220306, '2023-12-01 12:05:50', '2023-12-09 00:00:00', '0000-00-00 00:00:00', 'Issued', 0),
(20, 1, 12220120, '2023-12-01 12:08:21', '2023-12-09 00:00:00', '2023-12-01 12:09:34', 'Returned', 0),
(21, 1, 12220120, '2023-12-01 12:09:50', '2023-12-09 00:00:00', '2023-12-01 12:10:04', 'Returned', 0);

--
-- Triggers `issued_book`
--
DELIMITER $$
CREATE TRIGGER `after_issue_book` AFTER INSERT ON `issued_book` FOR EACH ROW BEGIN
    DECLARE book_name VARCHAR(255);
    DECLARE issued_to VARCHAR(255);

    -- Assuming there is a book table named 'book'
    SELECT name INTO book_name FROM book WHERE bookid = NEW.book_id;

    SET issued_to = NEW.student_prn;

    -- Inserting into issued_book_log
    INSERT INTO issued_book_log (book_name, issued_to, date_time)
    VALUES (book_name, issued_to, NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_return_book` AFTER INSERT ON `issued_book` FOR EACH ROW BEGIN
    -- Declare variables for cursor
    DECLARE done INT DEFAULT FALSE;
    DECLARE book_id INT;
    DECLARE return_qty INT;

    -- Cursor declaration
    DECLARE return_cursor CURSOR FOR
        SELECT book_id, return_quantity
        FROM issued_book
        WHERE return_date_time IS NOT NULL AND book_id = NEW.book_id;

    -- Cursor handler
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

    -- Open the cursor
    OPEN return_cursor;

    -- Loop through cursor
    return_loop: LOOP
        FETCH return_cursor INTO book_id, return_qty;
        IF done THEN
            LEAVE return_loop;
        END IF;

        -- Update available_copy in the book table
        UPDATE book
        SET available_copy = available_copy + 1
        WHERE book_id = book_id;
    END LOOP;

    -- Close the cursor
    CLOSE return_cursor;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `issued_book_log`
--

CREATE TABLE `issued_book_log` (
  `id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `issued_to` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issued_book_log`
--

INSERT INTO `issued_book_log` (`id`, `book_name`, `issued_to`, `date_time`) VALUES
(8, 'Arpita', '12220306', '2023-12-01 12:05:50'),
(9, 'Arpita', '12220120', '2023-12-01 12:08:21'),
(10, 'Arpita', '12220120', '2023-12-01 12:09:50');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `userid`, `password`) VALUES
(1, 'Tejas', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisherid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('Enable','Disable') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisherid`, `name`, `status`) VALUES
(4, 'Vintage Publishing', 'Enable'),
(5, 'Macmillan Publishers', 'Enable'),
(6, 'Simon &amp; Schuster', 'Enable'),
(7, 'HarperCollins', 'Enable'),
(8, 'Plum Island', 'Enable'),
(9, 'O’Reilly', 'Enable'),
(11, 'Shreyash Publications', 'Enable'),
(12, 'SangWays', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `rack`
--

CREATE TABLE `rack` (
  `rackid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` enum('Enable','Disable') NOT NULL DEFAULT 'Enable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rack`
--

INSERT INTO `rack` (`rackid`, `name`, `status`) VALUES
(1, 'R1', 'Enable'),
(2, 'R2', 'Disable'),
(5, 'R4', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `stud_prn` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`stud_prn`, `first_name`, `last_name`, `email`, `password`) VALUES
(12220120, 'Pranav ', 'Sangave', 'pranav.sangave22@vit.edu', '303bb5a75e9691d0d61b06d48cf18c11'),
(12220121, 'Varad', 'Uplanchiwar', 'varad.uplanchiwar22@vit.edu', '8d633e146c4daa0c086da71b1ed75ced'),
(12220306, 'Shreyash', 'Bandi', 'mayanksharma19102001@gmail.com', '4c6ab61328172dfd62ec247c3e98eacd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`authorid`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookid`),
  ADD KEY `authorid` (`authorid`),
  ADD KEY `categoryid` (`categoryid`),
  ADD KEY `book_ibfk_3` (`publisherid`),
  ADD KEY `book_ibfk_4` (`rackid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `issued_book`
--
ALTER TABLE `issued_book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `issued_book_ibfk_2` (`student_prn`);

--
-- Indexes for table `issued_book_log`
--
ALTER TABLE `issued_book_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisherid`);

--
-- Indexes for table `rack`
--
ALTER TABLE `rack`
  ADD PRIMARY KEY (`rackid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`stud_prn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `authorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `issued_book`
--
ALTER TABLE `issued_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `issued_book_log`
--
ALTER TABLE `issued_book_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisherid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rack`
--
ALTER TABLE `rack`
  MODIFY `rackid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `stud_prn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12220307;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`authorid`) REFERENCES `author` (`authorid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`categoryid`) REFERENCES `category` (`categoryid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`publisherid`) REFERENCES `publisher` (`publisherid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_4` FOREIGN KEY (`rackid`) REFERENCES `rack` (`rackid`) ON UPDATE CASCADE;

--
-- Constraints for table `issued_book`
--
ALTER TABLE `issued_book`
  ADD CONSTRAINT `issued_book_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`bookid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `issued_book_ibfk_2` FOREIGN KEY (`student_prn`) REFERENCES `users` (`stud_prn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
