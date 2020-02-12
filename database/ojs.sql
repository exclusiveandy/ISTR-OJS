-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8111
-- Generation Time: Feb 12, 2020 at 08:25 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

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

--
-- Dumping data for table `announcement_table`
--

INSERT INTO `announcement_table` (`announcement_id`, `announcement_title`, `announcement_description`, `announcement_date`) VALUES
(20, 'Call For Papers!', 'Newly created research in the fields of Biology and Geology are needed!\r\n\r\nIt will be publish accordingly!\r\n\r\nWhat are you waiting for!?\r\nCome login!', '2020-02-04 00:00:00');

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
(217, '\n																																						User Test																																					', '\n																																																																											', '\n																																						Author																																					', '\n																																						author@gmail.com																																					', '\n																																						Polytechnic University of the Philippines																																					', 1),
(218, '\n																																						User Test																																					', '\n																																																																											', '\n																																						Author																																					', '\n																																						author@gmail.com																																					', '\n																																						Polytechnic University of the Philippines																																					', 1),
(219, '\n																																						User Test																																					', '\n																																																																											', '\n																																						Author																																					', '\n																																						author@gmail.com																																					', '\n																																						Polytechnic University of the Philippines																																					', 3),
(220, '\n																																						User Test																																					', '\n																																																																											', '\n																																						Author																																					', '\n																																						author@gmail.com																																					', '\n																																						Polytechnic University of the Philippines																																					', 4),
(221, '\n																																						User Test																																					', '\n																																																																											', '\n																																						Author																																					', '\n																																						author@gmail.com																																					', '\n																																						Polytechnic University of the Philippines																																					', 5),
(222, '\n                                  User Testa                                ', '\n                                                                  ', '\n                                  Author                                ', '\n                                  author@gmail.com                                ', '\n                                  Polytechnic University of the Philippines                                ', 6),
(223, '\n                                  User Testa                                ', '\n                                                                  ', '\n                                  Author                                ', '\n                                  author@gmail.com                                ', '\n                                  Polytechnic University of the Philippines                                ', 7),
(224, '\n                                  User Testa                                ', '\n                                                                  ', '\n                                  Author                                ', '\n                                  author@gmail.com                                ', '\n                                  Polytechnic University of the Philippines                                ', 8),
(225, '\n                                  User Testa                                ', '\n                                                                  ', '\n                                  Author                                ', '\n                                  author@gmail.com                                ', '\n                                  Polytechnic University of the Philippines                                ', 9),
(226, '\n                                  User Testa                                ', '\n                                                                  ', '\n                                  Author                                ', '\n                                  author@gmail.com                                ', '\n                                  Polytechnic University of the Philippines                                ', 1),
(227, '\n                                  User Testa                                ', '\n                                                                  ', '\n                                  Author                                ', '\n                                  author@gmail.com                                ', '\n                                  Polytechnic University of the Philippines                                ', 1),
(228, '\n                                  User Testa                                ', '\n                                                                  ', '\n                                  Author                                ', '\n                                  author@gmail.com                                ', '\n                                  Polytechnic University of the Philippines                                ', 2),
(229, '\n                                  User Testa                                ', '\n                                                                  ', '\n                                  Author                                ', '\n                                  author@gmail.com                                ', '\n                                  Polytechnic University of the Philippines                                ', 1),
(230, '\n                                  User Testa                                ', '\n                                                                  ', '\n                                  Author                                ', '\n                                  author@gmail.com                                ', '\n                                  Polytechnic University of the Philippines                                ', 2);

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
(147, 'User Test', '', 'ME', '2147483647', '28 BAWA ROAD NIA VILLAGE, SAUYO, QUEZON CITY', 'PUP', 'Sas', 'me@gmail.com', '$2y$12$5J0cbIS7j.XWOtNO1iEqTOdt37u55ZjNNnZO1Kj/SBLtMHbMkdIpy', 2, 1, 'KO ', 'Male', 'Mr', '2019-08-15 12:49:30', '0523e721cfa3fbf86d0406a2a8fb7906'),
(149, 'User Test', '', 'EIC', '2147483647', 'edd@gmail.com', 'Polytechnic University of The Philippines', 'Polytechnic University of The Philippines', 'eic@gmail.com', '$2y$12$/tNUQ.D0ty.lbgCuJ7uJI.E6ttahSBgh2vNANco4xqnTSUsFju5wW', 3, 1, 'Physics', 'Male', 'Mr', '0000-00-00 00:00:00', '0'),
(150, 'User Test', '', 'IR', '2147483647', 'Pureza', 'UST', 'Graduated from University of Santo Tomas', 'ir@gmail.com', '$2y$12$qCH8zGoHwbRHEs5oYwu.juBeIBy0ACRnUJYG5zx0487yJFzK.Mi9m', 4, 1, 'Physics', 'Male', 'Mr', '0000-00-00 00:00:00', '0'),
(154, 'User Test', '', 'ER', '09369317843', 'SAD', 'UST', 'Graduated in UST (2015)', 'er@gmail.com', '$2y$12$8zQuHhoqnF3GJYwvL3z4vuuqaLlv8TkSFyzqIdUcr7RAGKIJmk0bS', 5, 1, 'Physics', 'Male', 'Mr.', '0000-00-00 00:00:00', '0'),
(155, 'User Test', '', 'LE', '09369317843', 'PUREZA', 'admin', 'admin', 'le@gmail.com', '$2y$12$qCH8zGoHwbRHEs5oYwu.juBeIBy0ACRnUJYG5zx0487yJFzK.Mi9m', 7, 1, 'admin', 'Male', 'Mr', '0000-00-00 00:00:00', '0'),
(156, 'User Test', '', 'PR', '09369317843', 'PUREZA', 'PUP', 'OJS', 'pr@gmail.com', '$2y$12$RQBFAhU0OGxE8NPtlF8UBuCy4Ndyy7UWS78wXJB3WMU/PR42JloTi', 6, 1, 'OJS', 'Male', 'Mr', '0000-00-00 00:00:00', '0'),
(160, 'User Testa', '', 'Author', '093693178432', 'Pureza', 'Polytechnic University of the Philippines', 'Polytechnic University of the Philippines', 'author@gmail.com', '$2y$12$YBCiQZ6Nw4Lxqw5A7mBkc.Ajvanb2MSrmCuxMykLvHedJZ1MTSm6S', 1, 1, 'Science and Technologies', 'Male', 'Mr2', '2019-08-23 13:42:03', 'f669bc67e9e713e9d7a4b74bb01402ab'),
(165, 'User Test', '', 'PO', '63225081620', '28 BAWA ROAD NIA VILLAGE, SAUYO, QUEZON CITY', 'Dr', 'Polytechnic University of the Philippines', 'po@gmail.com', '$2y$12$XURSgTe0BW845/iJKd4UH.YaXx/6.4dtE3Hqrqda.EvHRnRuuTiRC', 8, 1, 'General Science and Technology', 'Male', '123', '0000-00-00 00:00:00', ''),
(166, 'Admin Test', '', 'Admin', '09369317843', 'Admin Address', 'SA', 'Ewan', 'admin@gmail.com', '$2y$12$q0MwR6D6TX7omxsKLwmE1.esQsGAClODJyQFrlnFWH6Zf3TCxHIvC', 9, 1, 'General Science and Technology', 'Male', 'Mr.', '0000-00-00 00:00:00', '');

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
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `apply_reviewer_table`
--
ALTER TABLE `apply_reviewer_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `authors_table`
--
ALTER TABLE `authors_table`
  MODIFY `authors_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `backup_author_table`
--
ALTER TABLE `backup_author_table`
  MODIFY `authors_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `comment_table`
--
ALTER TABLE `comment_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=393;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

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
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;

--
-- AUTO_INCREMENT for table `research_file_table`
--
ALTER TABLE `research_file_table`
  MODIFY `research_file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

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
  MODIFY `timeline_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1804;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

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
