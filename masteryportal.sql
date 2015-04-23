-- phpMyAdmin SQL Dump
-- version 4.3.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 23, 2015 at 02:30 PM
-- Server version: 5.5.41
-- PHP Version: 5.4.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kadion_uam`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`kadion`@`localhost` PROCEDURE `dynamic_view2`(in sdate date,in edate date)
begin
declare finish int default 0;
declare cdate date;
declare str varchar(10000) default "select studentid,";
declare curs cursor for select incident_date from periodattendance where incident_date between sdate and edate group by studentid;
declare continue handler for not found set finish = 1;
open curs;
my_loop:loop
fetch curs into cdate;
if finish = 1 then
leave my_loop;
end if;
set str = concat(str, "max(case when incident_date = '",cdate,"' then status else null end) as `",cdate,"`,");
end loop;
close curs;
set str = substr(str,1,char_length(str)-1);
set @str = concat(str," from periodattendance
            group by studentid");

prepare stmt from @str;
execute stmt;
deallocate prepare stmt;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `canvas`
--

CREATE TABLE IF NOT EXISTS `canvas` (
  `RecordID` int(10) NOT NULL,
  `studentname` varchar(50) DEFAULT NULL,
  `studentid` int(10) DEFAULT NULL,
  `studentsisid` varchar(14) DEFAULT NULL,
  `assessmenttitle` varchar(100) DEFAULT NULL,
  `assessmentid` int(13) DEFAULT NULL,
  `assessmenttype` varchar(15) DEFAULT NULL,
  `submissiondate` varchar(15) DEFAULT NULL,
  `submissionscore` varchar(16) DEFAULT NULL,
  `learningoutcomename` varchar(100) DEFAULT NULL,
  `learningoutcomeid` varchar(19) DEFAULT NULL,
  `attempt` varchar(7) DEFAULT NULL,
  `outcomescore` varchar(13) DEFAULT NULL,
  `assessmentquestion` varchar(50) DEFAULT NULL,
  `assessmentquestionid` varchar(22) DEFAULT NULL,
  `coursename` varchar(50) DEFAULT NULL,
  `courseid` varchar(9) DEFAULT NULL,
  `coursesisid` varchar(13) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45671 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customreport307`
--

CREATE TABLE IF NOT EXISTS `customreport307` (
  `StudentID` varchar(255) NOT NULL DEFAULT '',
  `LastName` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `GradeLevel` int(11) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `OffClass` varchar(255) DEFAULT NULL,
  `Promo_Flag` varchar(30) NOT NULL,
  `GEC` varchar(255) NOT NULL,
  `DOB` text NOT NULL,
  `AdmitDate` text,
  `GeoCode` varchar(255) DEFAULT NULL,
  `EthnicCode` varchar(255) DEFAULT NULL,
  `HomeLangCode` varchar(255) DEFAULT NULL,
  `MealCode` varchar(255) DEFAULT NULL,
  `ParentLN` varchar(255) DEFAULT NULL,
  `ParentFN` varchar(255) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `AptNum` varchar(255) DEFAULT NULL,
  `Street` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `State` varchar(255) DEFAULT NULL,
  `Zip` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `login_id` varchar(22) DEFAULT NULL,
  `user_id` int(9) DEFAULT NULL,
  `canvas_user_id` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE IF NOT EXISTS `userlog` (
  `username` varchar(25) NOT NULL,
  `logintime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` varchar(25) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) DEFAULT '',
  `firstname` varchar(25) NOT NULL DEFAULT '',
  `lastname` varchar(25) NOT NULL,
  `addusers` tinyint(1) NOT NULL,
  `addcategories` tinyint(1) NOT NULL,
  `adddiscipline` tinyint(1) NOT NULL,
  `viewprivate` tinyint(1) NOT NULL,
  `fulladmin` tinyint(1) NOT NULL,
  `teacher` tinyint(1) NOT NULL,
  `student` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `canvas`
--
ALTER TABLE `canvas`
  ADD PRIMARY KEY (`RecordID`);

--
-- Indexes for table `customreport307`
--
ALTER TABLE `customreport307`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `canvas`
--
ALTER TABLE `canvas`
  MODIFY `RecordID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45671;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
