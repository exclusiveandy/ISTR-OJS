-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2019 at 07:53 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ojs`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_ojs`
--

CREATE TABLE `about_ojs` (
  `about_ojs_id` int(11) NOT NULL,
  `ojs_title` varchar(255) NOT NULL,
  `ojs_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_ojs`
--

INSERT INTO `about_ojs` (`about_ojs_id`, `ojs_title`, `ojs_description`) VALUES
(5, 'Institute of Science and Technology Research', 'This project is an information system that will facilitate online submission of PUP Journal articles; implementation of an editorial management, workflow, and publish approved articles to their corresponding journal onlin'),
(7, 'Objectives', 'This project is an information system that will facilitate online submission of PUP Journal articles; implementation of an editorial management, workflow, and publish approved articles to their corresponding journal online.');

-- --------------------------------------------------------

--
-- Table structure for table `about_ojs_picture`
--

CREATE TABLE `about_ojs_picture` (
  `picture_id` int(11) NOT NULL,
  `picture_name` varchar(255) NOT NULL,
  `picture_location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_ojs_picture`
--

INSERT INTO `about_ojs_picture` (`picture_id`, `picture_name`, `picture_location`) VALUES
(14, 'ojslogo.png', '../../images/ojslogo.png'),
(15, 'ojslogo.png', '../../images/ojslogo.png'),
(16, 'ojslogo.png', '../../images/ojslogo.png'),
(17, 'istrlogo.png', '../../images/istrlogo.png'),
(18, 'jst.jpg', '../../images/jst.jpg'),
(19, 'jst.jpg', '../../images/jst.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_table`
--

CREATE TABLE `announcement_table` (
  `announcement_id` int(11) NOT NULL,
  `announcement_title` text NOT NULL,
  `announcement_description` text NOT NULL,
  `announcement_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `apply_reviewer_table`
--

CREATE TABLE `apply_reviewer_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_applied` datetime NOT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apply_reviewer_table`
--

INSERT INTO `apply_reviewer_table` (`id`, `user_id`, `date_applied`, `pdf_file`, `note`, `filename`, `status`) VALUES
(17, 160, '2019-10-09 04:02:13', '2000-DST_Jan_2018_final(160)', '', '2000-DST Jan 2018 final.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `authors_table`
--

CREATE TABLE `authors_table` (
  `authors_id` int(11) NOT NULL,
  `authors_first_name` varchar(255) NOT NULL,
  `authors_middle_name` varchar(255) NOT NULL,
  `authors_last_name` varchar(255) NOT NULL,
  `authors_email` varchar(255) NOT NULL,
  `authors_affliation` text NOT NULL,
  `research_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authors_table`
--

INSERT INTO `authors_table` (`authors_id`, `authors_first_name`, `authors_middle_name`, `authors_last_name`, `authors_email`, `authors_affliation`, `research_id`) VALUES
(190, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 1),
(191, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 2),
(192, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 3),
(193, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 4),
(194, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 5),
(195, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 6),
(196, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 7),
(197, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 8),
(198, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 9),
(199, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 10),
(200, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 11),
(201, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 12),
(202, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 13),
(203, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 14),
(204, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 15),
(205, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 16),
(206, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 17),
(207, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 18),
(208, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 19),
(209, 'Alet', 'Fabregas', 'Carolino', 'isaacnovero1998@gmail.com', 'polytechnic', 24),
(210, 'Alet', 'Fabregas', 'Carolino', 'isaacnovero1998@gmail.com', 'polytechnic', 25),
(211, 'Alet', '', 'Fabregas', 'isaacnovero1998@gmail.com', 'polytechnic', 26),
(212, 'Alet', '', 'Fabregas', 'isaacnovero1998@gmail.com', 'polytechnic', 27),
(213, 'Alet', '', 'Fabregas', 'aletfabregas@gmail.com', 'sad', 28),
(214, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 31),
(215, 'Isaac ', '', 'Novero', 'sacnoobero@gmail.com', 'UST', 32);

-- --------------------------------------------------------

--
-- Table structure for table `backup_author_table`
--

CREATE TABLE `backup_author_table` (
  `authors_id` int(11) NOT NULL,
  `authors_first_name` varchar(255) NOT NULL,
  `authors_middle_name` varchar(255) NOT NULL,
  `authors_last_name` varchar(255) NOT NULL,
  `authors_email` varchar(255) NOT NULL,
  `authors_affliation` varchar(255) NOT NULL,
  `research_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `backup_author_table`
--

INSERT INTO `backup_author_table` (`authors_id`, `authors_first_name`, `authors_middle_name`, `authors_last_name`, `authors_email`, `authors_affliation`, `research_id`) VALUES
(176, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 1),
(177, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 2),
(182, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 5),
(183, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 3),
(184, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 4),
(186, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 6),
(187, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 7),
(188, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 8),
(189, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 9),
(193, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 13),
(194, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 14),
(195, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 15),
(196, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 16),
(199, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 11),
(200, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 18),
(201, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 17),
(202, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 10),
(204, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 19),
(206, 'Alet', 'Fabregas', 'Carolino', 'isaacnovero1998@gmail.com', 'polytechnic', 24),
(208, 'Alet', '', 'Fabregas', 'isaacnovero1998@gmail.com', 'polytechnic', 26),
(209, 'Alet', '', 'Fabregas', 'isaacnovero1998@gmail.com', 'polytechnic', 27),
(210, 'Alet', 'Fabregas', 'Carolino', 'isaacnovero1998@gmail.com', 'polytechnic', 25),
(212, 'Alet', '', 'Fabregas', 'aletfabregas@gmail.com', 'sad', 28),
(214, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 31),
(215, 'James', 'Paul', 'Carolino', 'paulcarolino2@gmail.com', 'Polytechnic University of the Philippines', 12),
(216, 'Isaac ', '', 'Novero', 'sacnoobero@gmail.com', 'UST', 32);

-- --------------------------------------------------------

--
-- Table structure for table `comment_table`
--

CREATE TABLE `comment_table` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date_uploaded` datetime NOT NULL,
  `research_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_table`
--

INSERT INTO `comment_table` (`id`, `content`, `date_uploaded`, `research_id`) VALUES
(280, 'Rejected due to plagiarism', '2019-10-13 20:52:57', 1),
(281, 'Rejected due to format of the document', '2019-10-13 20:54:21', 2),
(283, 'Rejected due to the scope of the article                             \n                           ', '2019-10-13 21:40:12', 5),
(293, 'Finalizing for Volume and Issue                             \n                           ', '2019-10-13 23:02:51', 4),
(299, 'Ewan                             \n                           ', '2019-10-13 23:09:33', 3),
(304, 'This is ready for publishing                           ', '2019-10-13 23:23:36', 6),
(310, 'Open a Volume and Issue for this article', '2019-10-14 02:44:22', 11),
(311, 'This document is good', '2019-10-14 10:16:35', 17),
(338, 'For pubishing', '2019-10-14 10:34:11', 10),
(340, 'Submitted the Layout of the Document', '2019-10-14 12:03:20', 19),
(342, 'Rejected due to the scope of the article                             \n                           ', '2019-10-14 13:22:04', 24),
(343, 'Rejected due to plagiarism', '2019-10-14 13:35:27', 23),
(348, 'GG', '2019-10-14 15:25:50', 28),
(349, 'Accepted with revisions by Managing Editor', '2019-10-25 17:41:04', 31),
(355, 'Rejected due to the scope of the article                             \n                                                        \n                           ', '2019-10-25 18:26:07', 12),
(356, 'Rejected due to plagiarism', '2019-10-25 18:44:13', 13),
(357, 'Rejected due to plagiarism', '2019-10-25 18:44:57', 14),
(358, 'Rejected due to plagiarism', '2019-10-25 18:45:54', 15),
(359, 'Rejected due to plagiarism', '2019-10-25 18:47:03', 26),
(360, 'Rejected due to plagiarism', '2019-10-25 18:47:39', 16),
(361, 'Rejected due to the scope of the article                             \n                           ', '2019-10-25 19:14:49', 30),
(370, 'Did not pass through the standards of the Internal Reviewer in terms of the content                             \n                                                        \n                           ', '2019-10-25 20:40:11', 20),
(391, 'for publishing                             \n                           ', '2019-10-26 11:10:33', 25);

-- --------------------------------------------------------

--
-- Table structure for table `journal_table`
--

CREATE TABLE `journal_table` (
  `journal_id` int(11) NOT NULL,
  `journal_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `print_issn` varchar(255) NOT NULL,
  `online_issn` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `journal_image` varchar(255) DEFAULT 'image-placeholder.jpg',
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journal_table`
--

INSERT INTO `journal_table` (`journal_id`, `journal_name`, `description`, `print_issn`, `online_issn`, `email_address`, `journal_image`, `status`) VALUES
(63, 'PUP Journal for Science and Technology', 'It aims for providing information about the research in Science and Technology', '112.2', '112.1', 'pupjst@gmail.com', 'NBA.jpg', 'Inactive'),
(64, 'PUP Journal of Life Research Sciences', 'It aims for providing information about the research in Life Sciences', '1131.1331.1', '1121.1231.1', 'pupbealive@gmail.com', 'sad.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `layouteditor_table`
--

CREATE TABLE `layouteditor_table` (
  `id` int(11) NOT NULL,
  `research_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_uploaded` datetime NOT NULL,
  `date_expired` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layouteditor_table`
--

INSERT INTO `layouteditor_table` (`id`, `research_id`, `user_id`, `date_uploaded`, `date_expired`) VALUES
(1, 43, 155, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 45, 155, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 48, 155, '2019-10-12 12:49:18', '2019-10-15 12:49:18'),
(13, 50, 155, '2019-10-12 13:48:13', '2019-10-15 13:48:13'),
(15, 4, 155, '2019-10-13 22:58:29', '2019-10-16 22:58:29'),
(16, 3, 155, '2019-10-13 23:05:53', '2019-10-16 23:05:53'),
(17, 6, 155, '2019-10-13 23:21:50', '2019-10-16 23:21:50'),
(18, 11, 155, '2019-10-14 02:42:36', '2019-10-17 02:42:36'),
(19, 10, 155, '2019-10-14 10:28:56', '2019-10-17 10:28:56'),
(20, 19, 155, '2019-10-14 12:02:23', '2019-10-17 12:02:23'),
(21, 28, 155, '2019-10-14 15:23:29', '2019-10-17 15:23:29'),
(22, 25, 155, '2019-10-26 10:52:22', '2019-10-29 10:52:22');

-- --------------------------------------------------------

--
-- Table structure for table `line_number`
--

CREATE TABLE `line_number` (
  `line_number_id` int(11) NOT NULL,
  `research_id` int(11) NOT NULL,
  `line_number` varchar(255) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `month_table`
--

CREATE TABLE `month_table` (
  `id` int(11) NOT NULL,
  `month` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `month_table`
--

INSERT INTO `month_table` (`id`, `month`) VALUES
(1, 'January'),
(2, 'Febuary'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `notification_type` varchar(25) NOT NULL,
  `user_id` int(11) NOT NULL,
  `research_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `status`, `message`, `date`, `notification_type`, `user_id`, `research_id`) VALUES
(67, 'read', 'You article titled:Software  has been published in the website', '2019-10-14 02:47:57', 'publish', 160, 3),
(68, 'read', 'You article titled:Software Models  has been published in the website', '2019-10-14 02:47:57', 'publish', 160, 4),
(69, 'read', 'You article titled:Software is everything has been published in the website', '2019-10-14 02:47:57', 'publish', 160, 6),
(70, 'read', 'You article titled:Electronics Today has been published in the website', '2019-10-14 02:47:57', 'publish', 160, 11),
(72, 'read', 'You article titled:Software  has been published in the website', '2019-10-14 15:26:29', 'publish', 160, 3),
(73, 'read', 'You article titled:Software Models  has been published in the website', '2019-10-14 15:26:29', 'publish', 160, 4),
(74, 'read', 'You article titled:Software is everything has been published in the website', '2019-10-14 15:26:29', 'publish', 160, 6),
(75, 'read', 'You article titled:Electronics Today has been published in the website', '2019-10-14 15:26:29', 'publish', 160, 11),
(76, 'read', 'You article titled:Software  has been published in the website', '2019-10-14 15:26:29', 'publish', 168, 28),
(77, 'read', 'There is an article entitled:sadathat you need to review', '2019-10-25 17:38:04', 'review_me', 147, 31),
(91, 'read', 'The article that you send entitled:Electronic 203 is rejected', '2019-10-25 18:26:07', 'rejected', 160, 12),
(92, 'unread', 'The article that you send entitled:Electronics for the love of god is rejected', '2019-10-25 18:44:13', 'rejected', 0, 13),
(93, 'unread', 'The article that you send entitled:Software Models is rejected', '2019-10-25 18:44:57', 'rejected', 0, 14),
(94, 'unread', 'The article that you send entitled:Software Models is rejected', '2019-10-25 18:45:54', 'rejected', 0, 15),
(95, 'read', 'The article that you send entitled:sad is rejected', '2019-10-25 18:47:03', 'rejected', 167, 26),
(96, 'read', 'The article that you send entitled:Electronics 404 is rejected', '2019-10-25 18:47:39', 'rejected', 160, 16),
(97, 'read', 'The article that you send entitled:sad is rejected', '2019-10-25 19:14:49', 'rejected', 160, 30),
(118, 'read', 'The article that you send entitled:Software Process Models is rejected', '2019-10-25 20:40:11', 'rejected', 160, 20),
(133, 'unread', 'There is an article entitled: that is needed to be send to the Publication Office', '2019-10-26 09:23:23', 'for_PO', 0, 0),
(154, 'read', 'There is an article entitled:r_id and this is ready for assigning of volume and issue', '2019-10-26 11:10:33', 'assigning_volume', 165, 25),
(155, 'read', 'There is an article entitled:sadasdthat you need to review', '2019-10-26 11:17:52', 'review_me', 147, 32);

-- --------------------------------------------------------

--
-- Table structure for table `ojs_downloadbles`
--

CREATE TABLE `ojs_downloadbles` (
  `downloadble_id` int(11) NOT NULL,
  `downloadable_name` varchar(255) NOT NULL,
  `downloadable_file` varchar(255) NOT NULL,
  `location` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ojs_downloadbles`
--

INSERT INTO `ojs_downloadbles` (`downloadble_id`, `downloadable_name`, `downloadable_file`, `location`) VALUES
(12, '1', 'demodoc.pdf', '../../downloadbles/demodoc.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `ojs_home_page_picture`
--

CREATE TABLE `ojs_home_page_picture` (
  `picture_id` int(11) NOT NULL,
  `picture_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date_uploaded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ojs_home_page_picture`
--

INSERT INTO `ojs_home_page_picture` (`picture_id`, `picture_name`, `location`, `date_uploaded`) VALUES
(11, '1.png', '../../images/1.png', '2019-09-27 10:42:42'),
(13, '2.png', '../../images/2.png', '2019-10-08 08:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `ojs_page_url`
--

CREATE TABLE `ojs_page_url` (
  `url_id` int(11) NOT NULL,
  `url_title` varchar(255) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ojs_page_url`
--

INSERT INTO `ojs_page_url` (`url_id`, `url_title`, `url`) VALUES
(7, 'Facebook', 'https://www.facebook.com/ojs'),
(9, 'twitter', 'Twitter.com');

-- --------------------------------------------------------

--
-- Table structure for table `page_content`
--

CREATE TABLE `page_content` (
  `page_content` int(11) NOT NULL,
  `facebook_url` varchar(255) NOT NULL,
  `twitter_url` varchar(255) NOT NULL,
  `google_url` varchar(255) NOT NULL,
  `guide_author` text NOT NULL,
  `home_image` varchar(255) NOT NULL,
  `ojs author_guide` varchar(255) NOT NULL,
  `ojs document_template` varchar(255) NOT NULL,
  `ojs_title` varchar(255) NOT NULL,
  `ojs_description` varchar(255) NOT NULL,
  `ojs_about_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_content`
--

INSERT INTO `page_content` (`page_content`, `facebook_url`, `twitter_url`, `google_url`, `guide_author`, `home_image`, `ojs author_guide`, `ojs document_template`, `ojs_title`, `ojs_description`, `ojs_about_image`) VALUES
(7, 'https://www.facebook.com/ojs', 'https://www.twitter.com/ojs', 'https://plus.google.com/ojs', 'Hirap mabuhay', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `proofreader_table`
--

CREATE TABLE `proofreader_table` (
  `id` int(11) NOT NULL,
  `research_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_uploaded` datetime NOT NULL,
  `date_expired` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proofreader_table`
--

INSERT INTO `proofreader_table` (`id`, `research_id`, `user_id`, `date_uploaded`, `date_expired`) VALUES
(1, 43, 156, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 45, 156, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 48, 156, '2019-10-12 09:45:36', '2019-10-15 09:45:36'),
(9, 50, 156, '2019-10-12 13:46:05', '2019-10-15 13:46:05'),
(12, 4, 156, '2019-10-13 22:57:12', '2019-10-16 22:57:12'),
(13, 3, 156, '2019-10-13 23:05:09', '2019-10-16 23:05:09'),
(14, 6, 156, '2019-10-13 23:20:55', '2019-10-16 23:20:55'),
(15, 11, 156, '2019-10-14 02:42:03', '2019-10-17 02:42:03'),
(16, 10, 156, '2019-10-14 10:22:17', '2019-10-17 10:22:17'),
(17, 19, 156, '2019-10-14 11:59:19', '2019-10-17 11:59:19'),
(18, 28, 156, '2019-10-14 15:22:26', '2019-10-17 15:22:26'),
(19, 25, 156, '2019-10-26 08:47:16', '2019-10-29 08:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `research_file_history_table`
--

CREATE TABLE `research_file_history_table` (
  `history_id` int(11) NOT NULL,
  `research_id` int(11) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `date_submitted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `research_file_history_table`
--

INSERT INTO `research_file_history_table` (`history_id`, `research_id`, `user_role_id`, `date_submitted`) VALUES
(187, 1, 1, '2019-10-13 20:52:41'),
(188, 2, 1, '2019-10-13 20:54:02'),
(189, 3, 1, '2019-10-13 21:18:34'),
(190, 4, 1, '2019-10-13 21:20:16'),
(191, 5, 1, '2019-10-13 21:21:07'),
(192, 3, 2, '2019-10-13 21:39:14'),
(193, 3, 3, '2019-10-13 21:39:26'),
(194, 5, 2, '2019-10-13 21:39:46'),
(195, 3, 4, '2019-10-13 22:08:00'),
(196, 4, 2, '2019-10-13 22:15:46'),
(197, 4, 3, '2019-10-13 22:15:59'),
(198, 4, 4, '2019-10-13 22:16:24'),
(199, 6, 1, '2019-10-13 22:48:31'),
(200, 6, 2, '2019-10-13 22:48:55'),
(201, 6, 3, '2019-10-13 22:49:11'),
(202, 6, 4, '2019-10-13 22:52:57'),
(203, 4, 5, '2019-10-13 22:53:36'),
(204, 4, 6, '2019-10-13 22:57:25'),
(205, 4, 7, '2019-10-13 23:00:40'),
(206, 3, 5, '2019-10-13 23:03:57'),
(207, 6, 5, '2019-10-13 23:04:06'),
(208, 3, 6, '2019-10-13 23:05:38'),
(209, 3, 7, '2019-10-13 23:07:52'),
(210, 6, 6, '2019-10-13 23:21:14'),
(211, 6, 7, '2019-10-13 23:23:04'),
(212, 7, 1, '2019-10-14 02:27:20'),
(213, 8, 1, '2019-10-14 02:27:58'),
(214, 9, 1, '2019-10-14 02:28:46'),
(215, 10, 1, '2019-10-14 02:29:35'),
(216, 11, 1, '2019-10-14 02:33:22'),
(217, 12, 1, '2019-10-14 02:34:16'),
(218, 13, 1, '2019-10-14 02:35:06'),
(219, 14, 1, '2019-10-14 02:35:59'),
(220, 15, 1, '2019-10-14 02:36:33'),
(221, 16, 1, '2019-10-14 02:37:14'),
(222, 17, 1, '2019-10-14 02:38:01'),
(223, 10, 2, '2019-10-14 02:38:25'),
(224, 10, 3, '2019-10-14 02:38:37'),
(225, 11, 2, '2019-10-14 02:39:58'),
(226, 11, 3, '2019-10-14 02:40:34'),
(227, 11, 4, '2019-10-14 02:41:00'),
(228, 11, 5, '2019-10-14 02:41:32'),
(229, 11, 6, '2019-10-14 02:42:22'),
(230, 11, 7, '2019-10-14 02:43:48'),
(231, 18, 1, '2019-10-14 10:07:09'),
(232, 17, 2, '2019-10-14 10:16:34'),
(233, 17, 3, '2019-10-14 10:17:10'),
(234, 10, 4, '2019-10-14 10:21:04'),
(235, 10, 5, '2019-10-14 10:21:34'),
(236, 10, 6, '2019-10-14 10:28:17'),
(237, 10, 7, '2019-10-14 10:33:23'),
(238, 19, 1, '2019-10-14 11:33:23'),
(239, 19, 2, '2019-10-14 11:41:24'),
(240, 19, 3, '2019-10-14 11:43:55'),
(241, 19, 4, '2019-10-14 11:50:55'),
(242, 19, 5, '2019-10-14 11:57:56'),
(243, 19, 6, '2019-10-14 12:01:59'),
(244, 20, 1, '2019-10-14 12:14:04'),
(245, 21, 1, '2019-10-14 12:16:03'),
(246, 22, 1, '2019-10-14 12:18:03'),
(247, 23, 1, '2019-10-14 12:20:23'),
(248, 24, 1, '2019-10-14 13:14:46'),
(249, 24, 2, '2019-10-14 13:16:29'),
(250, 25, 1, '2019-10-14 13:24:13'),
(251, 26, 1, '2019-10-14 13:29:33'),
(252, 27, 1, '2019-10-14 13:37:06'),
(253, 25, 2, '2019-10-14 13:37:47'),
(254, 28, 1, '2019-10-14 15:16:24'),
(255, 28, 2, '2019-10-14 15:17:22'),
(256, 28, 3, '2019-10-14 15:18:25'),
(257, 28, 4, '2019-10-14 15:18:58'),
(258, 28, 5, '2019-10-14 15:21:01'),
(259, 28, 6, '2019-10-14 15:22:47'),
(260, 28, 7, '2019-10-14 15:25:24'),
(261, 29, 1, '2019-10-25 17:35:40'),
(262, 30, 1, '2019-10-25 17:37:15'),
(263, 31, 1, '2019-10-25 17:38:03'),
(264, 30, 2, '2019-10-25 18:04:57'),
(265, 12, 2, '2019-10-25 18:13:04'),
(266, 20, 2, '2019-10-25 19:15:15'),
(267, 20, 3, '2019-10-25 19:17:20'),
(268, 20, 4, '2019-10-25 20:25:13'),
(269, 25, 3, '2019-10-25 20:44:00'),
(270, 25, 4, '2019-10-25 20:44:33'),
(271, 25, 5, '2019-10-25 20:45:15'),
(272, 25, 6, '2019-10-26 10:42:35'),
(273, 25, 7, '2019-10-26 11:03:30'),
(274, 32, 1, '2019-10-26 11:17:51');

-- --------------------------------------------------------

--
-- Table structure for table `research_file_table`
--

CREATE TABLE `research_file_table` (
  `research_file_id` int(11) NOT NULL,
  `research_id` int(11) NOT NULL,
  `research_file` text NOT NULL,
  `supplementary_file` text NOT NULL,
  `r_location` varchar(255) NOT NULL,
  `s_location` varchar(255) NOT NULL,
  `date_uploaded` datetime NOT NULL,
  `counter` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `abstract` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `research_file_table`
--

INSERT INTO `research_file_table` (`research_file_id`, `research_id`, `research_file`, `supplementary_file`, `r_location`, `s_location`, `date_uploaded`, `counter`, `title`, `abstract`) VALUES
(191, 1, 'Software_Process_Model(V1-1).docx', '', '../../../upload_original_file/Software_Process_Model(V1-1).docx', '', '2019-10-13 20:52:41', 0, 'Software Process Models', 'A software process model is an abstract representation of a software process. In this section a number of general process models are introduced and they are presented from an architectural viewpoint. These models can be used to explain different approaches to software development.'),
(192, 2, 'Software_Process_Model(V1-2).docx', '', '../../../upload_original_file/Software_Process_Model(V1-2).docx', '', '2019-10-13 20:54:02', 0, 'Software Process', 'A software process model is an abstract representation of a software process. In this section a number of general process models are introduced and they are presented from an architectural viewpoint. These models can be used to explain different approaches to software development.'),
(195, 5, 'Software_Process_Model(V1-5).docx', '', '../../../upload_original_file/Software_Process_Model(V1-5).docx', '', '2019-10-13 21:21:07', 0, 'Software and Everything', 'Software and Everything'),
(198, 4, 'ISTR-OJS_Business_Plan_5-20-19(V2-4).docx', '', '../../../upload_original_file/ISTR-OJS_Business_Plan_5-20-19(V2-4).docx', '', '2019-10-13 22:59:37', 0, '', ''),
(199, 3, 'Software_Process_Model(V3-3).docx', '', '../../../upload_original_file/Software_Process_Model(V3-3).docx', '', '2019-10-13 23:06:39', 0, '', ''),
(200, 6, 'LayPerson(Cellphone)(V2-6).docx', '', '../../../upload_original_file/LayPerson(Cellphone)(V2-6).docx', '', '2019-10-13 23:22:24', 0, '', ''),
(201, 7, 'Software_Process_Model(V1-7).docx', '', '../../../upload_original_file/Software_Process_Model(V1-7).docx', '', '2019-10-14 02:27:20', 0, 'Software and its usage', 'Software and its usagev'),
(202, 8, 'Software_Process_Model(V1-8).docx', '', '../../../upload_original_file/Software_Process_Model(V1-8).docx', '', '2019-10-14 02:27:58', 0, 'Software', 'Software and its usage'),
(203, 9, 'Software_Process_Model(V1-9).docx', '', '../../../upload_original_file/Software_Process_Model(V1-9).docx', '', '2019-10-14 02:28:46', 0, 'Cobol 2019', 'Cobol 2019 Cobol 2019 Cobol 2019'),
(206, 12, 'Software_Process_Model(V1-12).docx', '', '../../../upload_original_file/Software_Process_Model(V1-12).docx', '', '2019-10-14 02:34:16', 0, 'Electronic 203', 'The realization of an abstract programming language is a good approach for automating the software production process and facilitating the correctness proof of a software system. This paper introduces a formal language for programming at the abstract level by combining Pascal with VDM (Vienna Development Method).'),
(207, 13, 'Software_Process_Model(V1-13).docx', '', '../../../upload_original_file/Software_Process_Model(V1-13).docx', '', '2019-10-14 02:35:06', 0, 'Electronics for the love of god', 'The realization of an abstract programming language is a good approach for automating the software production process and facilitating the correctness proof of a software system. This paper introduces a formal language for programming at the abstract level by combining Pascal with VDM (Vienna Development Method).'),
(208, 14, 'Software_Process_Model(V1-14).docx', '', '../../../upload_original_file/Software_Process_Model(V1-14).docx', '', '2019-10-14 02:35:59', 0, 'Software Models', 'The realization of an abstract programming language is a good approach for automating the software production process and facilitating the correctness proof of a software system. This paper introduces a formal language for programming at the abstract level by combining Pascal with VDM (Vienna Development Method).'),
(209, 15, 'Software_Process_Model(V1-15).docx', '', '../../../upload_original_file/Software_Process_Model(V1-15).docx', '', '2019-10-14 02:36:33', 0, 'Software Models', 'The realization of an abstract programming language is a good approach for automating the software production process and facilitating the correctness proof of a software system. This paper introduces a formal language for programming at the abstract level by combining Pascal with VDM (Vienna Development Method).'),
(210, 16, 'Software_Process_Model(V1-16).docx', '', '../../../upload_original_file/Software_Process_Model(V1-16).docx', '', '2019-10-14 02:37:14', 0, 'Electronics 404', 'The realization of an abstract programming language is a good approach for automating the software production process and facilitating the correctness proof of a software system. This paper introduces a formal language for programming at the abstract level by combining Pascal with VDM (Vienna Development Method).'),
(211, 17, 'Software_Process_Model(V1-17).docx', '', '../../../upload_original_file/Software_Process_Model(V1-17).docx', '', '2019-10-14 02:38:01', 0, 'Software Process Models', 'The realization of an abstract programming language is a good approach for automating the software production process and facilitating the correctness proof of a software system. This paper introduces a formal language for programming at the abstract level by combining Pascal with VDM (Vienna Development Method).'),
(212, 11, 'Business_Background_and_Definition(V2-11).docx', '', '../../../upload_original_file/Business_Background_and_Definition(V2-11).docx', '', '2019-10-14 02:43:06', 0, '', ''),
(213, 18, 'Software_Process_Model(V1-18).docx', '', '../../../upload_original_file/Software_Process_Model(V1-18).docx', '', '2019-10-14 10:07:09', 0, 'Software ', 'Software and everything'),
(218, 10, 'ISTR-OJS_Business_Plan_5-20-19(V5-10).docx', '', '../../../upload_original_file/ISTR-OJS_Business_Plan_5-20-19(V5-10).docx', '', '2019-10-14 10:32:24', 0, '', ''),
(219, 19, 'Software_Process_Model(V1-19).docx', '', '../../../upload_original_file/Software_Process_Model(V1-19).docx', '', '2019-10-14 11:33:23', 0, 'Software', 'Software'),
(220, 19, 'ProjectProposal(V2-19).docx', '', '../../../upload_original_file/ProjectProposal(V2-19).docx', '', '2019-10-14 12:03:20', 0, '', ''),
(222, 21, 'Software_Process_Model(V1-21).docx', '', '../../../upload_original_file/Software_Process_Model(V1-21).docx', '', '2019-10-14 12:16:03', 0, 'Software Process Models', 'Software Process Models'),
(223, 22, 'Software_Process_Model(V1-22).docx', '', '../../../upload_original_file/Software_Process_Model(V1-22).docx', '', '2019-10-14 12:18:03', 0, 'echo $email_me;', 'echo $email_me;'),
(224, 23, 'Software_Process_Model(V1-23).docx', '', '../../../upload_original_file/Software_Process_Model(V1-23).docx', '', '2019-10-14 12:20:23', 0, 'echo $email_me;', 'echo $email_me;'),
(225, 24, 'Software_Process_Model(V1-24).docx', '', '../../../upload_original_file/Software_Process_Model(V1-24).docx', '', '2019-10-14 13:14:46', 0, 'polytechnic', 'polytechnic'),
(227, 26, 'Software_Process_Model(V1-26).docx', '', '../../../upload_original_file/Software_Process_Model(V1-26).docx', '', '2019-10-14 13:29:33', 0, 'sad', 'sad'),
(228, 27, 'Software_Process_Model(V1-27).docx', '', '../../../upload_original_file/Software_Process_Model(V1-27).docx', '', '2019-10-14 13:37:06', 0, 'r_id', 'r_id'),
(230, 28, 'Compartive_Essay(V2-28).docx', '', '../../../upload_original_file/Compartive_Essay(V2-28).docx', '', '2019-10-14 15:24:20', 0, '', ''),
(231, 29, 'Software_Process_Model(V1-29).docx', '', '../../../upload_original_file/Software_Process_Model(V1-29).docx', '', '2019-10-25 17:35:40', 0, 'sadas', 'dadadsada'),
(233, 31, 'Software_Process_Model(V1-31).docx', '', '../../../upload_original_file/Software_Process_Model(V1-31).docx', '', '2019-10-25 17:38:03', 0, 'sada', 'dadadsada'),
(236, 30, 'Software_Process_Model(V4-30).docx', '', '../../../upload_original_file/Software_Process_Model(V4-30).docx', '', '2019-10-25 17:56:21', 0, 'sad', 'sad'),
(237, 30, 'Software_Process_Model(V5-30).docx', '', '../../../upload_original_file/Software_Process_Model(V5-30).docx', '', '2019-10-25 17:56:39', 0, 'sad', 'sad'),
(238, 30, 'Software_Process_Model(V6-30).docx', '', '../../../upload_original_file/Software_Process_Model(V6-30).docx', '', '2019-10-25 18:01:27', 0, 'sad', 'sad'),
(239, 20, 'Software_Process_Model(V2-20).docx', '', '../../../upload_original_file/Software_Process_Model(V2-20).docx', '', '2019-10-25 19:57:59', 0, 'Software Process Models', 'Software Process Models'),
(242, 25, 'Steps(V3-25).docx', '', '../../../upload_original_file/Steps(V3-25).docx', '', '2019-10-26 11:02:53', 0, '', ''),
(243, 32, 'Software_Process_Model(V1-32).docx', '', '../../../upload_original_file/Software_Process_Model(V1-32).docx', '', '2019-10-26 11:17:51', 0, 'sadasd', 'adadasada');

-- --------------------------------------------------------

--
-- Table structure for table `research_table`
--

CREATE TABLE `research_table` (
  `research_id` int(11) NOT NULL,
  `journal_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `abstract` text NOT NULL,
  `research_file` varchar(255) NOT NULL,
  `supplementary_file` text NOT NULL,
  `date_submitted` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `reference_code` varchar(255) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `r_filename` varchar(255) NOT NULL,
  `s_filename` varchar(255) NOT NULL,
  `counter` int(11) NOT NULL,
  `plagiarism_file` varchar(255) NOT NULL,
  `volume_id` int(11) NOT NULL,
  `date_published` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `research_table`
--

INSERT INTO `research_table` (`research_id`, `journal_id`, `title`, `abstract`, `research_file`, `supplementary_file`, `date_submitted`, `user_id`, `status`, `reference_code`, `user_role_id`, `r_filename`, `s_filename`, `counter`, `plagiarism_file`, `volume_id`, `date_published`) VALUES
(1, 63, 'Software Process Models', 'A software process model is an abstract representation of a software process. In this section a number of general process models are introduced and they are presented from an architectural viewpoint. These models can be used to explain different approaches to software development.', '../../../upload_original_file/Software_Process_Model(V1-1).docx', '', '2019-10-13 20:52:41', 160, 'Rejected', '2019-63-1', 1, 'Software_Process_Model(V1-1).docx', '', 1, '', 0, '0000-00-00 00:00:00'),
(2, 63, 'Software Process', 'A software process model is an abstract representation of a software process. In this section a number of general process models are introduced and they are presented from an architectural viewpoint. These models can be used to explain different approaches to software development.', '../../../upload_original_file/Software_Process_Model(V1-2).docx', '', '2019-10-13 20:54:02', 160, 'Rejected', '2019-63-2', 1, 'Software_Process_Model(V1-2).docx', '', 1, '', 0, '0000-00-00 00:00:00'),
(3, 63, 'Software ', '  Software  is a must when it comes to the', '../../../upload_original_file/Software_Process_Model(V3-3).docx', '', '2019-10-13 21:46:07', 160, 'Published', '2019-63-3', 8, 'Software_Process_Model(V3-3).docx', '', 2, '', 7, '2019-10-14 15:26:29'),
(4, 63, 'Software Models ', 'Software Models', '../../../upload_original_file/ISTR-OJS_Business_Plan_5-20-19(V2-4).docx', '', '2019-10-13 21:20:16', 160, 'Published', '2019-63-4', 8, 'ISTR-OJS_Business_Plan_5-20-19(V2-4).docx', '', 1, '', 7, '2019-10-14 15:26:29'),
(5, 63, 'Software and Everything', 'Software and Everything', '../../../upload_original_file/Software_Process_Model(V1-5).docx', '', '2019-10-13 21:21:07', 160, 'Rejected', '2019-63-5', 1, 'Software_Process_Model(V1-5).docx', '', 1, '', 0, '0000-00-00 00:00:00'),
(6, 63, 'Software is everything', 'Just give me passing', '../../../upload_original_file/LayPerson(Cellphone)(V2-6).docx', '', '2019-10-13 22:48:31', 160, 'Published', '2019-63-6', 8, 'LayPerson(Cellphone)(V2-6).docx', '', 1, '', 7, '2019-10-14 15:26:29'),
(7, 63, 'Software and its usage', 'Software and its usagev', '../../../upload_original_file/Software_Process_Model(V1-7).docx', '', '2019-10-14 02:27:20', 160, 'On Managing Editor', '2019-63-7', 2, 'Software_Process_Model(V1-7).docx', '', 1, '', 0, '0000-00-00 00:00:00'),
(8, 63, 'Software', 'Software and its usage', '../../../upload_original_file/Software_Process_Model(V1-8).docx', '', '2019-10-14 02:27:58', 160, 'On Managing Editor', '2019-63-8', 2, 'Software_Process_Model(V1-8).docx', '', 1, '', 0, '0000-00-00 00:00:00'),
(9, 63, 'Cobol 2019', 'Cobol 2019 Cobol 2019 Cobol 2019', '../../../upload_original_file/Software_Process_Model(V1-9).docx', '', '2019-10-14 02:28:46', 160, 'On Managing Editor', '2019-63-9', 2, 'Software_Process_Model(V1-9).docx', '', 1, '', 0, '0000-00-00 00:00:00'),
(10, 63, 'Software Process Models', 'Software Process Models', '../../../upload_original_file/ISTR-OJS_Business_Plan_5-20-19(V5-10).docx', '', '2019-10-14 10:30:57', 160, 'Assigning of Volume and Issue', '2019-63-10', 8, 'ISTR-OJS_Business_Plan_5-20-19(V5-10).docx', '', 4, '', 0, '0000-00-00 00:00:00'),
(11, 63, 'Electronics Today', 'The realization of an abstract programming language is a good approach for automating the software production process and facilitating the correctness proof of a software system. This paper introduces a formal language for programming at the abstract level by combining Pascal with VDM (Vienna Development Method).', '../../../upload_original_file/Business_Background_and_Definition(V2-11).docx', '', '2019-10-14 02:33:22', 160, 'Published', '2019-63-11', 8, 'Business_Background_and_Definition(V2-11).docx', '', 1, '', 7, '2019-10-14 15:26:29'),
(12, 63, 'Electronic 203', 'The realization of an abstract programming language is a good approach for automating the software production process and facilitating the correctness proof of a software system. This paper introduces a formal language for programming at the abstract level by combining Pascal with VDM (Vienna Development Method).', '../../../upload_original_file/Software_Process_Model(V1-12).docx', '', '2019-10-14 02:34:16', 160, 'Rejected', '2019-63-12', 1, 'Software_Process_Model(V1-12).docx', '', 1, '', 0, '0000-00-00 00:00:00'),
(13, 63, 'Electronics for the love of god', 'The realization of an abstract programming language is a good approach for automating the software production process and facilitating the correctness proof of a software system. This paper introduces a formal language for programming at the abstract level by combining Pascal with VDM (Vienna Development Method).', '../../../upload_original_file/Software_Process_Model(V1-13).docx', '', '2019-10-14 02:35:06', 160, 'Rejected', '2019-63-13', 1, 'Software_Process_Model(V1-13).docx', '', 1, '', 0, '0000-00-00 00:00:00'),
(14, 63, 'Software Models', 'The realization of an abstract programming language is a good approach for automating the software production process and facilitating the correctness proof of a software system. This paper introduces a formal language for programming at the abstract level by combining Pascal with VDM (Vienna Development Method).', '../../../upload_original_file/Software_Process_Model(V1-14).docx', '', '2019-10-14 02:35:59', 160, 'Rejected', '2019-63-14', 1, 'Software_Process_Model(V1-14).docx', '', 1, '', 0, '0000-00-00 00:00:00'),
(15, 63, 'Software Models', 'The realization of an abstract programming language is a good approach for automating the software production process and facilitating the correctness proof of a software system. This paper introduces a formal language for programming at the abstract level by combining Pascal with VDM (Vienna Development Method).', '../../../upload_original_file/Software_Process_Model(V1-15).docx', '', '2019-10-14 02:36:33', 160, 'Rejected', '2019-63-15', 1, 'Software_Process_Model(V1-15).docx', '', 1, '', 0, '0000-00-00 00:00:00'),
(16, 63, 'Electronics 404', 'The realization of an abstract programming language is a good approach for automating the software production process and facilitating the correctness proof of a software system. This paper introduces a formal language for programming at the abstract level by combining Pascal with VDM (Vienna Development Method).', '../../../upload_original_file/Software_Process_Model(V1-16).docx', '', '2019-10-14 02:37:14', 160, 'Rejected', '2019-63-16', 1, 'Software_Process_Model(V1-16).docx', '', 1, '', 0, '0000-00-00 00:00:00'),
(17, 63, 'Software Process Models', 'The realization of an abstract programming language is a good approach for automating the software production process and facilitating the correctness proof of a software system. This paper introduces a formal language for programming at the abstract level by combining Pascal with VDM (Vienna Development Method).', '../../../upload_original_file/Software_Process_Model(V1-17).docx', '', '2019-10-14 02:38:01', 160, 'On Internal Reviewer', '2019-63-17', 4, 'Software_Process_Model(V1-17).docx', '', 1, '', 0, '0000-00-00 00:00:00'),
(18, 63, 'Software ', 'Software and everything', '../../../upload_original_file/Software_Process_Model(V1-18).docx', '', '2019-10-14 10:07:09', 160, 'On Managing Editor', '2019-63-18', 2, 'Software_Process_Model(V1-18).docx', '', 1, '', 0, '0000-00-00 00:00:00'),
(19, 63, 'Software', 'Software', '../../../upload_original_file/Software_Process_Model(V1-19).docx', '', '2019-10-14 11:33:23', 160, 'To the Author for Consent', '2019-63-19', 3, 'Software_Process_Model(V1-19).docx', '', 1, '', 0, '0000-00-00 00:00:00'),
(20, 63, 'Software Process Models', 'Software Process Models', '../../../upload_original_file/Software_Process_Model(V2-20).docx', '', '2019-10-25 19:57:59', 160, 'Rejected', '2019-63-20', 1, 'Software_Process_Model(V2-20).docx', '', 2, '', 0, '0000-00-00 00:00:00'),
(21, 63, 'Software Process Models', 'Software Process Models', '../../../upload_original_file/Software_Process_Model(V1-21).docx', '', '2019-10-14 12:16:03', 160, 'On Managing Editor', '2019-63-21', 2, 'Software_Process_Model(V1-21).docx', '', 1, '', 0, '0000-00-00 00:00:00'),
(22, 63, 'echo $email_me;', 'echo $email_me;', '../../../upload_original_file/Software_Process_Model(V1-22).docx', '', '2019-10-14 12:18:03', 160, 'On Managing Editor', '2019-63-22', 2, 'Software_Process_Model(V1-22).docx', '', 1, '', 0, '0000-00-00 00:00:00'),
(23, 63, 'echo $email_me;', 'echo $email_me;', '../../../upload_original_file/Software_Process_Model(V1-23).docx', '', '2019-10-14 12:20:23', 160, 'Rejected', '2019-63-23', 1, 'Software_Process_Model(V1-23).docx', '', 1, '', 0, '0000-00-00 00:00:00'),
(24, 63, 'polytechnic', 'polytechnic', '../../../upload_original_file/Software_Process_Model(V1-24).docx', '', '2019-10-14 13:14:46', 167, 'Rejected', '2019-63-24', 1, 'Software_Process_Model(V1-24).docx', '', 1, '', 0, '0000-00-00 00:00:00'),
(25, 63, 'r_id', 'r_id', '../../../upload_original_file/Steps(V3-25).docx', '', '2019-10-26 11:00:19', 167, 'Assigning of Volume and Issue', '2019-63-25', 8, 'Steps(V3-25).docx', '', 2, '', 0, '0000-00-00 00:00:00'),
(26, 63, 'sad', 'sad', '../../../upload_original_file/Software_Process_Model(V1-26).docx', '', '2019-10-14 13:29:33', 167, 'Rejected', '2019-63-26', 1, 'Software_Process_Model(V1-26).docx', '', 1, '', 0, '0000-00-00 00:00:00'),
(27, 63, 'r_id', 'r_id', '../../../upload_original_file/Software_Process_Model(V1-27).docx', '', '2019-10-14 13:37:06', 167, 'On Managing Editor', '2019-63-27', 2, 'Software_Process_Model(V1-27).docx', '', 1, '', 0, '0000-00-00 00:00:00'),
(28, 63, 'Software ', 'Software ', '../../../upload_original_file/Compartive_Essay(V2-28).docx', '', '2019-10-14 15:16:24', 168, 'Published', '2019-63-28', 8, 'Compartive_Essay(V2-28).docx', '', 1, '', 7, '2019-10-14 15:26:29'),
(29, 63, 'sadas', 'dadadsada', '../../../upload_original_file/Software_Process_Model(V1-29).docx', '', '2019-10-25 17:35:40', 160, 'On Managing Editor', '2019-63-29', 2, 'Software_Process_Model(V1-29).docx', '', 1, '', 0, '0000-00-00 00:00:00'),
(30, 63, 'sad', 'sad', '../../../upload_original_file/Software_Process_Model(V6-30).docx', '', '2019-10-25 18:01:27', 160, 'Rejected', '2019-63-30', 1, 'Software_Process_Model(V6-30).docx', '', 6, '', 0, '0000-00-00 00:00:00'),
(31, 63, 'sada', 'dadadsada', '../../../upload_original_file/Software_Process_Model(V1-31).docx', '', '2019-10-25 17:38:03', 160, 'Accepted with Revisions', '2019-63-31', 1, 'Software_Process_Model(V1-31).docx', '', 1, '', 0, '0000-00-00 00:00:00'),
(32, 63, 'sadasd', 'adadasada', '../../../upload_original_file/Software_Process_Model(V1-32).docx', '', '2019-10-26 11:17:51', 150, 'On Managing Editor', '2019-63-32', 2, 'Software_Process_Model(V1-32).docx', '', 1, '', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reviewer_table`
--

CREATE TABLE `reviewer_table` (
  `reviewer_id` int(11) NOT NULL,
  `research_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_uploaded` datetime NOT NULL,
  `date_expired` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviewer_table`
--

INSERT INTO `reviewer_table` (`reviewer_id`, `research_id`, `user_id`, `date_uploaded`, `date_expired`) VALUES
(112, 3, 150, '2019-10-13 21:44:10', '2019-10-16 21:44:10'),
(113, 3, 154, '2019-10-13 22:08:29', '2019-10-16 22:08:29'),
(114, 4, 150, '2019-10-13 22:16:05', '2019-10-16 22:16:05'),
(115, 4, 154, '2019-10-13 22:16:48', '2019-10-13 22:16:48'),
(117, 6, 150, '2019-10-13 22:52:01', '2019-10-16 22:52:01'),
(118, 6, 154, '2019-10-13 22:53:19', '2019-10-16 22:53:19'),
(119, 10, 150, '2019-10-14 02:38:50', '2019-10-14 02:38:50'),
(120, 11, 150, '2019-10-14 02:40:38', '2019-10-17 02:40:38'),
(121, 11, 154, '2019-10-14 02:41:17', '2019-10-17 02:41:17'),
(122, 17, 150, '2019-10-14 10:17:26', '2019-10-17 10:17:26'),
(123, 10, 154, '2019-10-14 10:21:18', '2019-10-17 10:21:18'),
(124, 19, 150, '2019-10-14 11:46:03', '2019-10-17 11:46:03'),
(125, 19, 154, '2019-10-14 11:54:46', '2019-10-17 11:54:46'),
(126, 28, 150, '2019-10-14 15:18:40', '2019-10-17 15:18:40'),
(127, 28, 154, '2019-10-14 15:20:10', '2019-10-17 15:20:10'),
(128, 20, 150, '2019-10-25 19:23:07', '2019-10-28 19:23:07'),
(129, 20, 154, '2019-10-25 20:28:46', '2019-10-28 20:28:46'),
(130, 25, 150, '2019-10-25 20:44:07', '2019-10-28 20:44:07'),
(131, 25, 154, '2019-10-25 20:45:00', '2019-10-28 20:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `timeline_table`
--

CREATE TABLE `timeline_table` (
  `timeline_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `Type` varchar(11) NOT NULL,
  `Remarks` varchar(255) NOT NULL,
  `timeline_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeline_table`
--

INSERT INTO `timeline_table` (`timeline_id`, `document_id`, `Type`, `Remarks`, `timeline_date`) VALUES
(1454, 1, 'Submitted', 'Submitted the file', '2019-10-13 20:52:41'),
(1455, 1, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-13 20:52:42'),
(1456, 1, 'Rejected', 'Rejected by Managing Editor', '2019-10-13 20:52:57'),
(1457, 2, 'Submitted', 'Submitted the file', '2019-10-13 20:54:02'),
(1458, 2, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-13 20:54:03'),
(1459, 2, 'Rejected', 'Rejected by Managing Editor', '2019-10-13 20:54:21'),
(1460, 3, 'Submitted', 'Submitted the file', '2019-10-13 21:18:34'),
(1461, 3, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-13 21:18:35'),
(1462, 4, 'Submitted', 'Submitted the file', '2019-10-13 21:20:16'),
(1463, 4, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-13 21:20:17'),
(1464, 5, 'Submitted', 'Submitted the file', '2019-10-13 21:21:07'),
(1465, 5, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-13 21:21:08'),
(1466, 3, 'Accepted', 'Accepted the Document by Maniging Editor', '2019-10-13 21:39:14'),
(1467, 3, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-13 21:39:15'),
(1468, 3, 'Accepted', 'Accepted the Document by Editor in Chief', '2019-10-13 21:39:26'),
(1469, 5, 'Accepted', 'Accepted the Document by Maniging Editor', '2019-10-13 21:39:46'),
(1470, 5, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-13 21:39:47'),
(1471, 5, 'Rejected', 'Rejected by Editor in Chief', '2019-10-13 21:40:01'),
(1472, 3, 'Reviewing', 'Being Processed by an Internal Reviewer', '2019-10-13 21:44:10'),
(1473, 3, 'Accepted', 'Accepted with Revision', '2019-10-13 21:44:29'),
(1474, 3, 'Resubmitted', 'Resubmitted the file', '2019-10-13 21:46:07'),
(1475, 3, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-13 21:46:08'),
(1476, 3, 'Reviewing', 'Being Processed by an Internal Reviewer', '2019-10-13 22:07:27'),
(1477, 3, 'Accepted', 'Accepted the Document by the Internal Reviewer', '2019-10-13 22:08:00'),
(1478, 3, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-13 22:08:01'),
(1479, 3, 'Reviewing', 'Being Processed by an External Reviewer', '2019-10-13 22:08:29'),
(1480, 4, 'Accepted', 'Accepted the Document by Maniging Editor', '2019-10-13 22:15:46'),
(1481, 4, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-13 22:15:47'),
(1482, 4, 'Accepted', 'Accepted the Document by Editor in Chief', '2019-10-13 22:15:59'),
(1483, 4, 'Reviewing', 'Being Processed by an Internal Reviewer', '2019-10-13 22:16:05'),
(1484, 4, 'Accepted', 'Accepted the Document by the Internal Reviewer', '2019-10-13 22:16:24'),
(1485, 4, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-13 22:16:25'),
(1486, 4, 'Reviewing', 'Being Processed by an External Reviewer', '2019-10-13 22:16:48'),
(1487, 6, 'Submitted', 'Submitted the file', '2019-10-13 22:48:31'),
(1488, 6, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-13 22:48:32'),
(1489, 6, 'Accepted', 'Accepted the Document by Maniging Editor', '2019-10-13 22:48:55'),
(1490, 6, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-13 22:48:56'),
(1491, 6, 'Accepted', 'Accepted the Document by Editor in Chief', '2019-10-13 22:49:11'),
(1492, 6, 'Reviewing', 'Being Processed by an Internal Reviewer', '2019-10-13 22:49:13'),
(1493, 6, 'Reviewing', 'Pulled back the document by the Editor in Chief', '2019-10-13 22:51:58'),
(1494, 6, 'Reviewing', 'Being Processed by an Internal Reviewer', '2019-10-13 22:52:01'),
(1495, 6, 'Accepted', 'Accepted the Document by the Internal Reviewer', '2019-10-13 22:52:57'),
(1496, 6, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-13 22:52:58'),
(1497, 6, 'Reviewing', 'Being Processed by an External Reviewer', '2019-10-13 22:53:19'),
(1498, 4, 'Accepted', 'Accepted the Document by the External Reviewer', '2019-10-13 22:53:36'),
(1499, 4, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-13 22:53:37'),
(1500, 4, 'Reviewing', 'Send to the Publication Office for assigning a proofreader', '2019-10-13 22:53:54'),
(1501, 4, 'Reviewing', 'Send to the Proofreader', '2019-10-13 22:54:06'),
(1502, 4, 'Reviewing', 'Being Processed by the Publication Office', '2019-10-13 22:54:06'),
(1503, 4, 'Reviewing', 'Pulled back to the Publication Office', '2019-10-13 22:54:29'),
(1504, 4, 'Reviewing', 'Send to the Proofreader', '2019-10-13 22:55:30'),
(1505, 4, 'Reviewing', 'Being Processed by the Publication Office', '2019-10-13 22:55:30'),
(1506, 4, 'Reviewing', 'Pulled back to the Publication Office', '2019-10-13 22:55:50'),
(1507, 4, 'Reviewing', 'Send to the Proofreader', '2019-10-13 22:57:12'),
(1508, 4, 'Reviewing', 'Being Processed by the Publication Office', '2019-10-13 22:57:12'),
(1509, 4, 'Accepted', 'Passed on Proofreading', '2019-10-13 22:57:25'),
(1510, 4, 'Reviewing', 'Being Processed by the Layout Editor', '2019-10-13 22:57:26'),
(1511, 4, 'Reviewing', 'Send to the Layout Editor', '2019-10-13 22:57:36'),
(1512, 4, 'Reviewing', 'Being Processed by the Layout Editor', '2019-10-13 22:57:36'),
(1513, 4, 'Reviewing', 'Pulled back to the Publication Office', '2019-10-13 22:58:26'),
(1514, 4, 'Reviewing', 'Send to the Layout Editor', '2019-10-13 22:58:29'),
(1515, 4, 'Reviewing', 'Being Processed by the Layout Editor', '2019-10-13 22:58:29'),
(1516, 4, 'Submitted', 'Submitted the layout file', '2019-10-13 22:59:37'),
(1517, 4, 'Accepted', 'Author Accepted the Final Document', '2019-10-13 23:00:41'),
(1518, 4, 'Publishing', 'Issuing of Volume/Finalizing Document', '2019-10-13 23:02:51'),
(1519, 3, 'Accepted', 'Accepted the Document by the External Reviewer', '2019-10-13 23:03:57'),
(1520, 3, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-13 23:03:58'),
(1521, 6, 'Accepted', 'Accepted the Document by the External Reviewer', '2019-10-13 23:04:06'),
(1522, 6, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-13 23:04:07'),
(1523, 3, 'Reviewing', 'Send to the Publication Office for assigning a proofreader', '2019-10-13 23:04:48'),
(1524, 3, 'Reviewing', 'Send to the Proofreader', '2019-10-13 23:05:09'),
(1525, 3, 'Reviewing', 'Being Processed by the Publication Office', '2019-10-13 23:05:09'),
(1526, 3, 'Accepted', 'Passed on Proofreading', '2019-10-13 23:05:38'),
(1527, 3, 'Reviewing', 'Being Processed by the Layout Editor', '2019-10-13 23:05:39'),
(1528, 3, 'Reviewing', 'Send to the Layout Editor', '2019-10-13 23:05:53'),
(1529, 3, 'Reviewing', 'Being Processed by the Layout Editor', '2019-10-13 23:05:53'),
(1530, 3, 'Submitted', 'Submitted the layout file', '2019-10-13 23:06:39'),
(1531, 3, 'Accepted', 'Author Accepted the Final Document', '2019-10-13 23:07:53'),
(1532, 3, 'Publishing', 'Issuing of Volume/Finalizing Document', '2019-10-13 23:09:33'),
(1533, 6, 'Reviewing', 'Send to the Publication Office for assigning a proofreader', '2019-10-13 23:19:58'),
(1534, 6, 'Reviewing', 'Send to the Proofreader', '2019-10-13 23:20:55'),
(1535, 6, 'Reviewing', 'Being Processed by the Publication Office', '2019-10-13 23:20:55'),
(1536, 6, 'Accepted', 'Passed on Proofreading', '2019-10-13 23:21:14'),
(1537, 6, 'Reviewing', 'Being Processed by the Layout Editor', '2019-10-13 23:21:15'),
(1538, 6, 'Reviewing', 'Send to the Layout Editor', '2019-10-13 23:21:50'),
(1539, 6, 'Reviewing', 'Being Processed by the Layout Editor', '2019-10-13 23:21:50'),
(1540, 6, 'Submitted', 'Submitted the layout file', '2019-10-13 23:22:24'),
(1541, 6, 'Accepted', 'Author Accepted the Final Document', '2019-10-13 23:23:05'),
(1542, 6, 'Publishing', 'Issuing of Volume/Finalizing Document', '2019-10-13 23:23:52'),
(1543, 7, 'Submitted', 'Submitted the file', '2019-10-14 02:27:20'),
(1544, 7, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-14 02:27:21'),
(1545, 8, 'Submitted', 'Submitted the file', '2019-10-14 02:27:58'),
(1546, 8, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-14 02:27:59'),
(1547, 9, 'Submitted', 'Submitted the file', '2019-10-14 02:28:46'),
(1548, 9, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-14 02:28:47'),
(1549, 10, 'Submitted', 'Submitted the file', '2019-10-14 02:29:35'),
(1550, 10, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-14 02:29:36'),
(1551, 11, 'Submitted', 'Submitted the file', '2019-10-14 02:33:22'),
(1552, 11, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-14 02:33:23'),
(1553, 12, 'Submitted', 'Submitted the file', '2019-10-14 02:34:16'),
(1554, 12, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-14 02:34:17'),
(1555, 13, 'Submitted', 'Submitted the file', '2019-10-14 02:35:06'),
(1556, 13, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-14 02:35:07'),
(1557, 14, 'Submitted', 'Submitted the file', '2019-10-14 02:35:59'),
(1558, 14, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-14 02:36:00'),
(1559, 15, 'Submitted', 'Submitted the file', '2019-10-14 02:36:33'),
(1560, 15, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-14 02:36:34'),
(1561, 16, 'Submitted', 'Submitted the file', '2019-10-14 02:37:14'),
(1562, 16, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-14 02:37:15'),
(1563, 17, 'Submitted', 'Submitted the file', '2019-10-14 02:38:01'),
(1564, 17, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-14 02:38:02'),
(1565, 10, 'Accepted', 'Accepted the Document by Maniging Editor', '2019-10-14 02:38:25'),
(1566, 10, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-14 02:38:26'),
(1567, 10, 'Accepted', 'Accepted the Document by Editor in Chief', '2019-10-14 02:38:37'),
(1568, 10, 'Reviewing', 'Being Processed by an Internal Reviewer', '2019-10-14 02:38:50'),
(1569, 11, 'Accepted', 'Accepted the Document by Maniging Editor', '2019-10-14 02:39:58'),
(1570, 11, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-14 02:39:59'),
(1571, 11, 'Accepted', 'Accepted the Document by Editor in Chief', '2019-10-14 02:40:34'),
(1572, 11, 'Reviewing', 'Being Processed by an Internal Reviewer', '2019-10-14 02:40:38'),
(1573, 11, 'Accepted', 'Accepted the Document by the Internal Reviewer', '2019-10-14 02:41:00'),
(1574, 11, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-14 02:41:01'),
(1575, 11, 'Reviewing', 'Being Processed by an External Reviewer', '2019-10-14 02:41:17'),
(1576, 11, 'Accepted', 'Accepted the Document by the External Reviewer', '2019-10-14 02:41:32'),
(1577, 11, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-14 02:41:33'),
(1578, 11, 'Reviewing', 'Send to the Publication Office for assigning a proofreader', '2019-10-14 02:41:48'),
(1579, 11, 'Reviewing', 'Send to the Proofreader', '2019-10-14 02:42:03'),
(1580, 11, 'Reviewing', 'Being Processed by the Publication Office', '2019-10-14 02:42:03'),
(1581, 11, 'Accepted', 'Passed on Proofreading', '2019-10-14 02:42:22'),
(1582, 11, 'Reviewing', 'Being Processed by the Layout Editor', '2019-10-14 02:42:23'),
(1583, 11, 'Reviewing', 'Send to the Layout Editor', '2019-10-14 02:42:36'),
(1584, 11, 'Reviewing', 'Being Processed by the Layout Editor', '2019-10-14 02:42:36'),
(1585, 11, 'Submitted', 'Submitted the layout file', '2019-10-14 02:43:06'),
(1586, 11, 'Accepted', 'Author Accepted the Final Document', '2019-10-14 02:43:49'),
(1587, 11, 'Publishing', 'Issuing of Volume/Finalizing Document', '2019-10-14 02:44:51'),
(1588, 18, 'Submitted', 'Submitted the file', '2019-10-14 10:07:09'),
(1589, 18, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-14 10:07:10'),
(1590, 17, 'Accepted', 'Accepted the Document by Maniging Editor', '2019-10-14 10:16:34'),
(1591, 17, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-14 10:16:35'),
(1592, 17, 'Accepted', 'Accepted the Document by Editor in Chief', '2019-10-14 10:17:10'),
(1593, 17, 'Reviewing', 'Being Processed by an Internal Reviewer', '2019-10-14 10:17:26'),
(1594, 10, 'Accepted', 'Accepted with Revision', '2019-10-14 10:17:53'),
(1595, 10, 'Resubmitted', 'Resubmitted the file', '2019-10-14 10:18:59'),
(1596, 10, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-14 10:19:00'),
(1597, 10, 'Reviewing', 'Being Processed by an Internal Reviewer', '2019-10-14 10:20:35'),
(1598, 10, 'Accepted', 'Accepted the Document by the Internal Reviewer', '2019-10-14 10:21:04'),
(1599, 10, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-14 10:21:05'),
(1600, 10, 'Reviewing', 'Being Processed by an External Reviewer', '2019-10-14 10:21:18'),
(1601, 10, 'Accepted', 'Accepted the Document by the External Reviewer', '2019-10-14 10:21:34'),
(1602, 10, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-14 10:21:35'),
(1603, 10, 'Reviewing', 'Send to the Publication Office for assigning a proofreader', '2019-10-14 10:21:56'),
(1604, 10, 'Reviewing', 'Send to the Proofreader', '2019-10-14 10:22:17'),
(1605, 10, 'Reviewing', 'Being Processed by the Publication Office', '2019-10-14 10:22:17'),
(1606, 10, 'Submitted', 'Submitted the revised file', '2019-10-14 10:23:06'),
(1607, 10, 'Revision', 'Not Accepted by the Author', '2019-10-14 10:23:53'),
(1608, 10, 'Reviewing', 'Send to the Publication Office for assigning a proofreader', '2019-10-14 10:24:28'),
(1609, 10, 'Reviewing', 'Send to the Proofreader', '2019-10-14 10:26:11'),
(1610, 10, 'Reviewing', 'Being Processed by the Publication Office', '2019-10-14 10:26:11'),
(1611, 10, 'Submitted', 'Submitted the revised file', '2019-10-14 10:26:43'),
(1612, 10, 'Revision', 'Not Accepted by the Author', '2019-10-14 10:27:29'),
(1613, 10, 'Reviewing', 'Send to the Assigned proofreader', '2019-10-14 10:27:55'),
(1614, 10, 'Accepted', 'Passed on Proofreading', '2019-10-14 10:28:17'),
(1615, 10, 'Reviewing', 'Being Processed by the Layout Editor', '2019-10-14 10:28:18'),
(1616, 10, 'Reviewing', 'Send to the Layout Editor', '2019-10-14 10:28:56'),
(1617, 10, 'Reviewing', 'Being Processed by the Layout Editor', '2019-10-14 10:28:56'),
(1618, 10, 'Submitted', 'Submitted the layout file', '2019-10-14 10:29:33'),
(1619, 10, 'Revision', 'Not Accepted by the Author', '2019-10-14 10:30:57'),
(1620, 10, 'Reviewing', 'Send to the Assigned Layout Editor', '2019-10-14 10:31:29'),
(1621, 10, 'Submitted', 'Submitted the layout file', '2019-10-14 10:32:24'),
(1622, 10, 'Accepted', 'Author Accepted the Final Document', '2019-10-14 10:33:24'),
(1623, 10, 'Publishing', 'Issuing of Volume/Finalizing Document', '2019-10-14 10:34:31'),
(1624, 19, 'Submitted', 'Submitted the file', '2019-10-14 11:33:23'),
(1625, 19, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-14 11:33:24'),
(1626, 19, 'Accepted', 'Accepted the Document by Maniging Editor', '2019-10-14 11:41:24'),
(1627, 19, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-14 11:41:25'),
(1628, 19, 'Accepted', 'Accepted the Document by Editor in Chief', '2019-10-14 11:43:55'),
(1629, 19, 'Reviewing', 'Being Processed by an Internal Reviewer', '2019-10-14 11:46:03'),
(1630, 19, 'Accepted', 'Accepted the Document by the Internal Reviewer', '2019-10-14 11:50:55'),
(1631, 19, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-14 11:50:56'),
(1632, 19, 'Reviewing', 'Being Processed by an External Reviewer', '2019-10-14 11:54:46'),
(1633, 19, 'Accepted', 'Accepted the Document by the External Reviewer', '2019-10-14 11:57:56'),
(1634, 19, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-14 11:57:57'),
(1635, 19, 'Reviewing', 'Send to the Publication Office for assigning a proofreader', '2019-10-14 11:58:25'),
(1636, 19, 'Reviewing', 'Send to the Proofreader', '2019-10-14 11:59:19'),
(1637, 19, 'Reviewing', 'Being Processed by the Publication Office', '2019-10-14 11:59:19'),
(1638, 19, 'Accepted', 'Passed on Proofreading', '2019-10-14 12:01:59'),
(1639, 19, 'Reviewing', 'Being Processed by the Layout Editor', '2019-10-14 12:02:00'),
(1640, 19, 'Reviewing', 'Send to the Layout Editor', '2019-10-14 12:02:23'),
(1641, 19, 'Reviewing', 'Being Processed by the Layout Editor', '2019-10-14 12:02:23'),
(1642, 19, 'Submitted', 'Submitted the layout file', '2019-10-14 12:03:20'),
(1643, 20, 'Submitted', 'Submitted the file', '2019-10-14 12:14:04'),
(1644, 20, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-14 12:14:05'),
(1645, 21, 'Submitted', 'Submitted the file', '2019-10-14 12:16:03'),
(1646, 21, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-14 12:16:04'),
(1647, 22, 'Submitted', 'Submitted the file', '2019-10-14 12:18:03'),
(1648, 22, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-14 12:18:04'),
(1649, 23, 'Submitted', 'Submitted the file', '2019-10-14 12:20:23'),
(1650, 23, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-14 12:20:24'),
(1651, 24, 'Submitted', 'Submitted the file', '2019-10-14 13:14:46'),
(1652, 24, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-14 13:14:47'),
(1653, 24, 'Accepted', 'Accepted the Document by Maniging Editor', '2019-10-14 13:16:29'),
(1654, 24, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-14 13:16:30'),
(1655, 24, 'Rejected', 'Rejected by Editor in Chief', '2019-10-14 13:21:48'),
(1656, 25, 'Submitted', 'Submitted the file', '2019-10-14 13:24:13'),
(1657, 25, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-14 13:24:14'),
(1658, 26, 'Submitted', 'Submitted the file', '2019-10-14 13:29:33'),
(1659, 26, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-14 13:29:34'),
(1660, 23, 'Rejected', 'Rejected by Managing Editor', '2019-10-14 13:35:27'),
(1661, 27, 'Submitted', 'Submitted the file', '2019-10-14 13:37:06'),
(1662, 27, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-14 13:37:07'),
(1663, 25, 'Accepted', 'Accepted the Document by Maniging Editor', '2019-10-14 13:37:47'),
(1664, 25, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-14 13:37:48'),
(1665, 28, 'Submitted', 'Submitted the file', '2019-10-14 15:16:24'),
(1666, 28, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-14 15:16:25'),
(1667, 28, 'Accepted', 'Accepted the Document by Maniging Editor', '2019-10-14 15:17:22'),
(1668, 28, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-14 15:17:23'),
(1669, 28, 'Accepted', 'Accepted the Document by Editor in Chief', '2019-10-14 15:18:25'),
(1670, 28, 'Reviewing', 'Being Processed by an Internal Reviewer', '2019-10-14 15:18:40'),
(1671, 28, 'Accepted', 'Accepted the Document by the Internal Reviewer', '2019-10-14 15:18:58'),
(1672, 28, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-14 15:18:59'),
(1673, 28, 'Reviewing', 'Being Processed by an External Reviewer', '2019-10-14 15:20:10'),
(1674, 28, 'Accepted', 'Accepted the Document by the External Reviewer', '2019-10-14 15:21:01'),
(1675, 28, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-14 15:21:02'),
(1676, 28, 'Reviewing', 'Send to the Publication Office for assigning a proofreader', '2019-10-14 15:21:54'),
(1677, 28, 'Reviewing', 'Send to the Proofreader', '2019-10-14 15:22:26'),
(1678, 28, 'Reviewing', 'Being Processed by the Publication Office', '2019-10-14 15:22:26'),
(1679, 28, 'Accepted', 'Passed on Proofreading', '2019-10-14 15:22:47'),
(1680, 28, 'Reviewing', 'Being Processed by the Layout Editor', '2019-10-14 15:22:48'),
(1681, 28, 'Reviewing', 'Send to the Layout Editor', '2019-10-14 15:23:29'),
(1682, 28, 'Reviewing', 'Being Processed by the Layout Editor', '2019-10-14 15:23:29'),
(1683, 28, 'Submitted', 'Submitted the layout file', '2019-10-14 15:24:20'),
(1684, 28, 'Accepted', 'Author Accepted the Final Document', '2019-10-14 15:25:25'),
(1685, 28, 'Publishing', 'Issuing of Volume/Finalizing Document', '2019-10-14 15:26:06'),
(1686, 29, 'Submitted', 'Submitted the file', '2019-10-25 17:35:40'),
(1687, 29, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-25 17:35:41'),
(1688, 30, 'Submitted', 'Submitted the file', '2019-10-25 17:37:15'),
(1689, 30, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-25 17:37:16'),
(1690, 31, 'Submitted', 'Submitted the file', '2019-10-25 17:38:03'),
(1691, 31, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-25 17:38:04'),
(1692, 31, 'Accepted', 'Accepted with Revisions', '2019-10-25 17:41:04'),
(1693, 30, 'Accepted', 'Accepted with Revisions', '2019-10-25 17:48:09'),
(1694, 30, 'Resubmitted', 'Resubmitted the file', '2019-10-25 17:53:34'),
(1695, 30, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-25 17:53:35'),
(1696, 30, 'Resubmitted', 'Resubmitted the file', '2019-10-25 17:54:48'),
(1697, 30, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-25 17:54:49'),
(1698, 30, 'Resubmitted', 'Resubmitted the file', '2019-10-25 17:56:21'),
(1699, 30, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-25 17:56:22'),
(1700, 30, 'Resubmitted', 'Resubmitted the file', '2019-10-25 17:56:39'),
(1701, 30, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-25 17:56:40'),
(1702, 30, 'Accepted', 'Accepted with Revisions', '2019-10-25 17:59:44'),
(1703, 30, 'Resubmitted', 'Resubmitted the file', '2019-10-25 18:01:27'),
(1704, 30, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-25 18:01:28'),
(1705, 30, 'Accepted', 'Accepted the Document by Maniging Editor', '2019-10-25 18:04:57'),
(1706, 30, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-25 18:04:58'),
(1707, 30, 'Accepted', 'Accepted the Document by Maniging Editor', '2019-10-25 18:06:26'),
(1708, 30, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-25 18:06:27'),
(1709, 30, 'Rejected', 'Rejected by Editor in Chief', '2019-10-25 18:12:14'),
(1710, 12, 'Accepted', 'Accepted the Document by Maniging Editor', '2019-10-25 18:13:04'),
(1711, 12, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-25 18:13:05'),
(1712, 12, 'Rejected', 'Rejected by Editor in Chief', '2019-10-25 18:14:07'),
(1713, 13, 'Rejected', 'Rejected by Managing Editor', '2019-10-25 18:44:13'),
(1714, 14, 'Rejected', 'Rejected by Managing Editor', '2019-10-25 18:44:57'),
(1715, 15, 'Rejected', 'Rejected by Managing Editor', '2019-10-25 18:45:54'),
(1716, 26, 'Rejected', 'Rejected by Managing Editor', '2019-10-25 18:47:03'),
(1717, 16, 'Rejected', 'Rejected by Managing Editor', '2019-10-25 18:47:39'),
(1718, 20, 'Accepted', 'Accepted the Document by Maniging Editor', '2019-10-25 19:15:15'),
(1719, 20, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-25 19:15:16'),
(1720, 20, 'Accepted', 'Accepted the Document by Maniging Editor', '2019-10-25 19:15:24'),
(1721, 20, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-25 19:15:25'),
(1722, 20, 'Accepted', 'Accepted the Document by Editor in Chief', '2019-10-25 19:17:20'),
(1723, 20, 'Accepted', 'Accepted the Document by Editor in Chief', '2019-10-25 19:18:28'),
(1724, 20, 'Reviewing', 'Being Processed by an Internal Reviewer', '2019-10-25 19:23:07'),
(1725, 20, 'Reviewing', 'Being Processed by an Internal Reviewer', '2019-10-25 19:23:14'),
(1726, 20, 'Accepted', 'Accepted with Revision', '2019-10-25 19:45:45'),
(1727, 20, 'Resubmitted', 'Resubmitted the file', '2019-10-25 19:57:59'),
(1728, 20, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-25 19:58:00'),
(1729, 20, 'Reviewing', 'Being Processed by an Internal Reviewer', '2019-10-25 20:17:10'),
(1730, 20, 'Accepted', 'Accepted the Document by the Internal Reviewer', '2019-10-25 20:25:13'),
(1731, 20, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-25 20:25:14'),
(1732, 20, 'Accepted', 'Accepted the Document by the Internal Reviewer', '2019-10-25 20:25:54'),
(1733, 20, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-25 20:25:55'),
(1734, 20, 'Reviewing', 'Being Processed by an External Reviewer', '2019-10-25 20:28:46'),
(1735, 20, 'Rejected', 'Rejected by the External Reviewer', '2019-10-25 20:39:47'),
(1736, 25, 'Accepted', 'Accepted the Document by Editor in Chief', '2019-10-25 20:44:00'),
(1737, 25, 'Reviewing', 'Being Processed by an Internal Reviewer', '2019-10-25 20:44:07'),
(1738, 25, 'Accepted', 'Accepted the Document by the Internal Reviewer', '2019-10-25 20:44:33'),
(1739, 25, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-25 20:44:34'),
(1740, 25, 'Reviewing', 'Being Processed by an External Reviewer', '2019-10-25 20:45:00'),
(1741, 25, 'Accepted', 'Accepted the Document by the External Reviewer', '2019-10-25 20:45:15'),
(1742, 25, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-25 20:45:16'),
(1743, 25, 'Accepted', 'Accepted the Document by the External Reviewer', '2019-10-25 20:46:05'),
(1744, 25, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-25 20:46:06'),
(1745, 25, 'Accepted', 'Accepted the Document by the External Reviewer', '2019-10-25 20:46:31'),
(1746, 25, 'Reviewing', 'Being Processed by Editor in Chief', '2019-10-25 20:46:32'),
(1747, 25, 'Reviewing', 'Send to the Publication Office for assigning a proofreader', '2019-10-26 08:41:36'),
(1748, 25, 'Reviewing', 'Send to the Proofreader', '2019-10-26 08:47:16'),
(1749, 25, 'Reviewing', 'Being Processed by the Publication Office', '2019-10-26 08:47:16'),
(1750, 25, 'Submitted', 'Submitted the revised file', '2019-10-26 08:51:37'),
(1751, 25, 'Revision', 'Not Accepted by the Author', '2019-10-26 09:09:17'),
(1752, 25, 'Reviewing', 'Send to the Assigned proofreader', '2019-10-26 09:29:26'),
(1753, 25, 'Accepted', 'Passed on Proofreading', '2019-10-26 10:42:35'),
(1754, 25, 'Reviewing', 'Being Processed by the Layout Editor', '2019-10-26 10:42:36'),
(1755, 25, 'Accepted', 'Passed on Proofreading', '2019-10-26 10:45:40'),
(1756, 25, 'Reviewing', 'Being Processed by the Layout Editor', '2019-10-26 10:45:41'),
(1757, 25, 'Accepted', 'Passed on Proofreading', '2019-10-26 10:45:58'),
(1758, 25, 'Reviewing', 'Being Processed by the Layout Editor', '2019-10-26 10:45:59'),
(1759, 25, 'Accepted', 'Passed on Proofreading', '2019-10-26 10:47:03'),
(1760, 25, 'Reviewing', 'Being Processed by the Layout Editor', '2019-10-26 10:47:04'),
(1761, 25, 'Accepted', 'Passed on Proofreading', '2019-10-26 10:48:11'),
(1762, 25, 'Reviewing', 'Being Processed by the Layout Editor', '2019-10-26 10:48:12'),
(1763, 25, 'Reviewing', 'Send to the Layout Editor', '2019-10-26 10:52:22'),
(1764, 25, 'Reviewing', 'Being Processed by the Layout Editor', '2019-10-26 10:52:22'),
(1765, 25, 'Submitted', 'Submitted the layout file', '2019-10-26 10:57:43'),
(1766, 25, 'Revision', 'Not Accepted by the Author', '2019-10-26 11:00:19'),
(1767, 25, 'Reviewing', 'Send to the Assigned Layout Editor', '2019-10-26 11:02:01'),
(1768, 25, 'Submitted', 'Submitted the layout file', '2019-10-26 11:02:53'),
(1769, 25, 'Accepted', 'Author Accepted the Final Document', '2019-10-26 11:03:31'),
(1770, 25, 'Publishing', 'Issuing of Volume/Finalizing Document', '2019-10-26 11:06:08'),
(1771, 25, 'Publishing', 'Issuing of Volume/Finalizing Document', '2019-10-26 11:10:33'),
(1772, 32, 'Submitted', 'Submitted the file', '2019-10-26 11:17:51'),
(1773, 32, 'Reviewing', 'Being Processed by Managing Editor', '2019-10-26 11:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_journal_table`
--

CREATE TABLE `user_journal_table` (
  `user_journal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `journal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_journal_table`
--

INSERT INTO `user_journal_table` (`user_journal_id`, `user_id`, `journal_id`) VALUES
(34, 149, 63),
(35, 147, 63),
(36, 150, 63),
(46, 154, 63);

-- --------------------------------------------------------

--
-- Table structure for table `user_research_field`
--

CREATE TABLE `user_research_field` (
  `research_field_id` int(11) NOT NULL,
  `research_field_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_research_field`
--

INSERT INTO `user_research_field` (`research_field_id`, `research_field_name`) VALUES
(1, 'Chemistry'),
(2, 'Physics'),
(3, 'Biology'),
(4, 'General Science and Technology'),
(6, 'Zoology'),
(8, 'Herbarium'),
(9, 'Mathematics'),
(10, 'Geology'),
(11, 'Anthropology');

-- --------------------------------------------------------

--
-- Table structure for table `user_role_table`
--

CREATE TABLE `user_role_table` (
  `user_role_id` int(11) NOT NULL,
  `user_role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role_table`
--

INSERT INTO `user_role_table` (`user_role_id`, `user_role_name`) VALUES
(1, 'Author'),
(2, 'Managing Editor'),
(3, 'Editor in Chief'),
(4, 'Internal Reviewer'),
(5, 'External Reviewer'),
(6, 'Proofreader'),
(7, 'Layout Editor'),
(8, 'Publication Office'),
(9, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_mname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_contact` varchar(15) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_affliation` varchar(255) NOT NULL,
  `user_bio` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `activate` int(11) NOT NULL DEFAULT 0,
  `expertise` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `user_salutation` varchar(25) NOT NULL,
  `register_date` datetime NOT NULL,
  `validation_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_fname`, `user_mname`, `user_lname`, `user_contact`, `user_address`, `user_affliation`, `user_bio`, `user_email`, `user_password`, `user_role_id`, `activate`, `expertise`, `gender`, `user_salutation`, `register_date`, `validation_code`) VALUES
(147, 'FLORDELIZA', 'MINIMO', 'CALADO', '2147483647', '28 BAWA ROAD NIA VILLAGE, SAUYO, QUEZON CITY', 'PUP', 'Sa', 'flordelizacarolino12@gmail.com', '$2y$12$5J0cbIS7j.XWOtNO1iEqTOdt37u55ZjNNnZO1Kj/SBLtMHbMkdIpy', 2, 1, 'KO ', 'Male', 'Mr', '2019-08-15 12:49:30', '0523e721cfa3fbf86d0406a2a8fb7906'),
(149, 'Andrywin', '', 'Maquinto', '2147483647', 'andrywin@gmail.com', 'Polytechnic University of The Philippines', 'Polytechnic University of The Philippines', 'andrywin@gmail.com', '$2y$12$/tNUQ.D0ty.lbgCuJ7uJI.E6ttahSBgh2vNANco4xqnTSUsFju5wW', 3, 1, 'Physics', 'Male', 'Mr', '0000-00-00 00:00:00', '0'),
(150, 'Isaac ', '', 'Novero', '2147483647', 'Pureza', 'UST', 'Graduated from University of Santo Tomas', 'sacnoobero@gmail.com', '$2y$12$qCH8zGoHwbRHEs5oYwu.juBeIBy0ACRnUJYG5zx0487yJFzK.Mi9m', 4, 1, 'Physics', 'Male', 'Mr', '0000-00-00 00:00:00', '0'),
(154, 'Jaster', '', 'Cepillo', '09369317843', 'SAD', 'UST', 'Graduated in UST (2015)', 'jaster@gmail.com', '$2y$12$8zQuHhoqnF3GJYwvL3z4vuuqaLlv8TkSFyzqIdUcr7RAGKIJmk0bS', 5, 1, 'Physics', 'Male', 'Mr.', '0000-00-00 00:00:00', '0'),
(155, 'Lebron', 'Giannis', 'Antetokounmpo', '09369317843', 'PUREZA', 'admin', 'admin', 'layouteditor@gmail.com', '$2y$12$qCH8zGoHwbRHEs5oYwu.juBeIBy0ACRnUJYG5zx0487yJFzK.Mi9m', 7, 1, 'admin', 'Male', 'Mr', '0000-00-00 00:00:00', '0'),
(156, 'Stephen', '', 'James', '09369317843', 'PUREZA', 'PUP', 'OJS', 'proofreader@gmail.com', '$2y$12$RQBFAhU0OGxE8NPtlF8UBuCy4Ndyy7UWS78wXJB3WMU/PR42JloTi', 6, 1, 'OJS', 'Male', 'Mr', '0000-00-00 00:00:00', '0'),
(160, 'James', 'Paul', 'Carolino', '09369317843', 'Pureza', 'Polytechnic University of the Philippines', 'Polytechnic University of the Philippines', 'paulcarolino2@gmail.com', '$2y$12$R4K8thze9ZB34Rd9hpVEuuFofSc/xw5w4u9X.0thVj1ZnXbXRnDiq', 1, 1, 'Science and Technologies', 'Male', 'Mr', '2019-08-23 13:42:03', 'f669bc67e9e713e9d7a4b74bb01402ab'),
(161, 'Isaac', '', 'Novero', '09369317843', 'Sta Mesa, Manila', 'Polytechnic University Of the Philippines', 'Polytechnic University Of the Philippines', 'jasterjohnsadsad213@gmail.com', '$2y$12$b9tnU/x6dpeIGMFDEgW/Ze9gIGAeuigYv0/o5IqgSEX51vgw0a9Q.', 1, 0, 'Science and Technology', 'Male', 'Mr', '0000-00-00 00:00:00', '0'),
(162, 'asdasd', 'asdad', 'sadadsa', '09369317843', 'aw', 'aw', 'sadsadada', 'sadsad@gmail.com', '$2y$12$27sLk748OjPqsbPfyegHz.q7g.ombCKt3k3RticUOkIYvp.LwYRL.', 1, 0, 'sadsadada', 'Male', 'asd', '0000-00-00 00:00:00', ''),
(163, 'asdasd', 'asdad', 'sadadsa', '09369317843', 'aw', 'aw', 'wqeqeq', 'sadsadsad@gmail.com', '$2y$12$7YiWUBswBzN8n9O3Q0vD2.UuVcVBjlDzk8lnhvC5ja96AQzFY9IfG', 1, 0, 'Chemistry', 'Male', 'asd', '0000-00-00 00:00:00', ''),
(164, 'dadadsadasda', '', 'sadsadsa', '09369317843', 'asdadsa', 'sadsada', 'sadasdsad', 'asdas@gmail.com', '$2y$12$dd2sKmUTIpSh3F3b04Xl7.SRSOUphPxu8HLO2GL9rJeFDHN5nQeQu', 1, 0, 'General Science and Technology', 'Male', 'asd', '0000-00-00 00:00:00', ''),
(165, 'FLORDELIZA', 'MINIMO', 'CALADO', '63225081620', '28 BAWA ROAD NIA VILLAGE, SAUYO, QUEZON CITY', 'Dr', 'Polytechnic University of the Philippines', 'publicationoffice@gmail.com', '$2y$12$XURSgTe0BW845/iJKd4UH.YaXx/6.4dtE3Hqrqda.EvHRnRuuTiRC', 8, 1, 'General Science and Technology', 'Male', '123', '0000-00-00 00:00:00', ''),
(166, 'admin', 'admin', 'admin', '09369317843', 'cannot be', 'SA', 'Ewan', 'admin@gmail.com', '$2y$12$q0MwR6D6TX7omxsKLwmE1.esQsGAClODJyQFrlnFWH6Zf3TCxHIvC', 9, 1, 'General Science and Technology', 'Male', 'Mr.', '0000-00-00 00:00:00', ''),
(167, 'Alet', '', 'Fabregas', '09369317843', '28 BAWA ROAD NIA VILLAGE, TANDANG SORA, QUEZON CITY, TANDANG SORA', 'polytechnic', 'polytechnic', 'isaacnovero1998@gmail.com', '$2y$12$UThy6se2DYYhn3rpiOnr5u5BhXK.SbSwBY.HNvo6qQ5aJ5x68aCDy', 1, 1, 'General Science and Technology', 'Male', 'Mr.', '2019-10-14 13:13:36', ''),
(168, 'Alet', '', 'Fabregas', '09369317843', 'sad', 'sad', 'sad', 'aletfabregas@gmail.com', '$2y$12$Z/zSvKlF8Oo7ZBHg0OHHPOJWmhjJuO3QtQo1MWT1l9z1FBkQoNzcW', 1, 1, 'Anthropology', 'Male', 'Mr', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `volume_table`
--

CREATE TABLE `volume_table` (
  `volume_id` int(11) NOT NULL,
  `journal_id` int(11) NOT NULL,
  `issue` int(11) NOT NULL,
  `date_open` date NOT NULL,
  `cover_page` varchar(255) NOT NULL,
  `volume` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_published` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volume_table`
--

INSERT INTO `volume_table` (`volume_id`, `journal_id`, `issue`, `date_open`, `cover_page`, `volume`, `status`, `date_published`) VALUES
(7, 63, 1, '2019-10-13', 'jst.jpg', 1, 1, '2019-10-14 15:26:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_ojs`
--
ALTER TABLE `about_ojs`
  ADD PRIMARY KEY (`about_ojs_id`);

--
-- Indexes for table `about_ojs_picture`
--
ALTER TABLE `about_ojs_picture`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `announcement_table`
--
ALTER TABLE `announcement_table`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `apply_reviewer_table`
--
ALTER TABLE `apply_reviewer_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_reviewer_id` (`user_id`);

--
-- Indexes for table `authors_table`
--
ALTER TABLE `authors_table`
  ADD PRIMARY KEY (`authors_id`),
  ADD KEY `research_fk` (`research_id`);

--
-- Indexes for table `backup_author_table`
--
ALTER TABLE `backup_author_table`
  ADD PRIMARY KEY (`authors_id`);

--
-- Indexes for table `comment_table`
--
ALTER TABLE `comment_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `research_comment_fk` (`research_id`);

--
-- Indexes for table `journal_table`
--
ALTER TABLE `journal_table`
  ADD PRIMARY KEY (`journal_id`);

--
-- Indexes for table `layouteditor_table`
--
ALTER TABLE `layouteditor_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `line_number`
--
ALTER TABLE `line_number`
  ADD PRIMARY KEY (`line_number_id`),
  ADD KEY `line_research_fk` (`research_id`);

--
-- Indexes for table `month_table`
--
ALTER TABLE `month_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ojs_downloadbles`
--
ALTER TABLE `ojs_downloadbles`
  ADD PRIMARY KEY (`downloadble_id`);

--
-- Indexes for table `ojs_home_page_picture`
--
ALTER TABLE `ojs_home_page_picture`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `ojs_page_url`
--
ALTER TABLE `ojs_page_url`
  ADD PRIMARY KEY (`url_id`);

--
-- Indexes for table `page_content`
--
ALTER TABLE `page_content`
  ADD PRIMARY KEY (`page_content`);

--
-- Indexes for table `proofreader_table`
--
ALTER TABLE `proofreader_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research_file_history_table`
--
ALTER TABLE `research_file_history_table`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `research_history_fk` (`research_id`);

--
-- Indexes for table `research_file_table`
--
ALTER TABLE `research_file_table`
  ADD PRIMARY KEY (`research_file_id`),
  ADD KEY `research_id_fk` (`research_id`);

--
-- Indexes for table `research_table`
--
ALTER TABLE `research_table`
  ADD PRIMARY KEY (`research_id`),
  ADD KEY `research_journal_fk` (`journal_id`),
  ADD KEY `research_user_fk` (`user_id`);

--
-- Indexes for table `reviewer_table`
--
ALTER TABLE `reviewer_table`
  ADD PRIMARY KEY (`reviewer_id`),
  ADD KEY `research_reviewer_fk` (`research_id`),
  ADD KEY `reviewer_user_fk` (`user_id`);

--
-- Indexes for table `timeline_table`
--
ALTER TABLE `timeline_table`
  ADD PRIMARY KEY (`timeline_id`),
  ADD KEY `document_fk` (`document_id`);

--
-- Indexes for table `user_journal_table`
--
ALTER TABLE `user_journal_table`
  ADD PRIMARY KEY (`user_journal_id`),
  ADD KEY `user_id_fk` (`user_id`),
  ADD KEY `journal_id_fk` (`journal_id`);

--
-- Indexes for table `user_research_field`
--
ALTER TABLE `user_research_field`
  ADD PRIMARY KEY (`research_field_id`);

--
-- Indexes for table `user_role_table`
--
ALTER TABLE `user_role_table`
  ADD PRIMARY KEY (`user_role_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_role_fk` (`user_role_id`);

--
-- Indexes for table `volume_table`
--
ALTER TABLE `volume_table`
  ADD PRIMARY KEY (`volume_id`),
  ADD KEY `volume_journal_fk` (`journal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_ojs`
--
ALTER TABLE `about_ojs`
  MODIFY `about_ojs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `about_ojs_picture`
--
ALTER TABLE `about_ojs_picture`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `announcement_table`
--
ALTER TABLE `announcement_table`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `apply_reviewer_table`
--
ALTER TABLE `apply_reviewer_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `authors_table`
--
ALTER TABLE `authors_table`
  MODIFY `authors_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `backup_author_table`
--
ALTER TABLE `backup_author_table`
  MODIFY `authors_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `comment_table`
--
ALTER TABLE `comment_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=392;

--
-- AUTO_INCREMENT for table `journal_table`
--
ALTER TABLE `journal_table`
  MODIFY `journal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `layouteditor_table`
--
ALTER TABLE `layouteditor_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `line_number`
--
ALTER TABLE `line_number`
  MODIFY `line_number_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `month_table`
--
ALTER TABLE `month_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `ojs_downloadbles`
--
ALTER TABLE `ojs_downloadbles`
  MODIFY `downloadble_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ojs_home_page_picture`
--
ALTER TABLE `ojs_home_page_picture`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ojs_page_url`
--
ALTER TABLE `ojs_page_url`
  MODIFY `url_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `page_content`
--
ALTER TABLE `page_content`
  MODIFY `page_content` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `proofreader_table`
--
ALTER TABLE `proofreader_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `research_file_history_table`
--
ALTER TABLE `research_file_history_table`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT for table `research_file_table`
--
ALTER TABLE `research_file_table`
  MODIFY `research_file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `research_table`
--
ALTER TABLE `research_table`
  MODIFY `research_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `reviewer_table`
--
ALTER TABLE `reviewer_table`
  MODIFY `reviewer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `timeline_table`
--
ALTER TABLE `timeline_table`
  MODIFY `timeline_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1774;

--
-- AUTO_INCREMENT for table `user_journal_table`
--
ALTER TABLE `user_journal_table`
  MODIFY `user_journal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `user_research_field`
--
ALTER TABLE `user_research_field`
  MODIFY `research_field_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_role_table`
--
ALTER TABLE `user_role_table`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `volume_table`
--
ALTER TABLE `volume_table`
  MODIFY `volume_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apply_reviewer_table`
--
ALTER TABLE `apply_reviewer_table`
  ADD CONSTRAINT `user_reviewer_id` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authors_table`
--
ALTER TABLE `authors_table`
  ADD CONSTRAINT `research_fk` FOREIGN KEY (`research_id`) REFERENCES `research_table` (`research_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment_table`
--
ALTER TABLE `comment_table`
  ADD CONSTRAINT `research_comment_fk` FOREIGN KEY (`research_id`) REFERENCES `research_table` (`research_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `line_number`
--
ALTER TABLE `line_number`
  ADD CONSTRAINT `line_research_fk` FOREIGN KEY (`research_id`) REFERENCES `research_table` (`research_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `research_file_history_table`
--
ALTER TABLE `research_file_history_table`
  ADD CONSTRAINT `research_history_fk` FOREIGN KEY (`research_id`) REFERENCES `research_table` (`research_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `research_file_table`
--
ALTER TABLE `research_file_table`
  ADD CONSTRAINT `research_id_fk` FOREIGN KEY (`research_id`) REFERENCES `research_table` (`research_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `research_table`
--
ALTER TABLE `research_table`
  ADD CONSTRAINT `research_journal_fk` FOREIGN KEY (`journal_id`) REFERENCES `journal_table` (`journal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `research_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviewer_table`
--
ALTER TABLE `reviewer_table`
  ADD CONSTRAINT `research_reviewer_fk` FOREIGN KEY (`research_id`) REFERENCES `research_table` (`research_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviewer_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timeline_table`
--
ALTER TABLE `timeline_table`
  ADD CONSTRAINT `document_fk` FOREIGN KEY (`document_id`) REFERENCES `research_table` (`research_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_journal_table`
--
ALTER TABLE `user_journal_table`
  ADD CONSTRAINT `journal_id_fk` FOREIGN KEY (`journal_id`) REFERENCES `journal_table` (`journal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_table`
--
ALTER TABLE `user_table`
  ADD CONSTRAINT `user_role_fk` FOREIGN KEY (`user_role_id`) REFERENCES `user_role_table` (`user_role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `volume_table`
--
ALTER TABLE `volume_table`
  ADD CONSTRAINT `volume_journal_fk` FOREIGN KEY (`journal_id`) REFERENCES `journal_table` (`journal_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
