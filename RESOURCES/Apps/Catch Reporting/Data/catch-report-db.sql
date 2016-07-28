-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: ` `
--

-- --------------------------------------------------------

--
-- Table structure for table `catches`
--

CREATE TABLE IF NOT EXISTS `catches` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `latitude` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `longitude` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `message` text COLLATE latin1_general_ci NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=193 ;

--
-- Dumping data for table `catches`
--

INSERT INTO `catches` (`id`, `latitude`, `longitude`, `message`, `time`) VALUES
(138, '38.909717', '-77.043304', 'Checking out the runners....soon to be chasers. ;)\n\n<img src="http://app.survivedc.com/uploaded_files/1305409343-selected_picture.jpg">', '2011-05-14 17:42:23'),
(139, '38.909686', '-77.043335', 'Checking out the runners....soon to be chasers. ;)\n\n<img src="http://app.survivedc.com/uploaded_files/1305409346-selected_picture.jpg">', '2011-05-14 17:42:26'),
(140, '38.909725', '-77.043279', 'Checking out the runners....soon to be chasers. ;)\n\n<img src="http://app.survivedc.com/uploaded_files/1305409399-selected_picture.jpg">', '2011-05-14 17:43:19'),
(141, '38.909733', '-77.043245', 'Checking out the runners....soon to be chasers. ;)\n\n<img src="http://app.survivedc.com/uploaded_files/1305409423-selected_picture.jpg">', '2011-05-14 17:43:44'),
(142, '38.909747', '-77.043403', 'The fountain is full of blue ribbons\n\n<img src="http://app.survivedc.com/uploaded_files/1305412580-selected_picture.jpg">', '2011-05-14 18:36:21'),
(143, '38.909747', '-77.043403', '', '2011-05-14 18:36:29'),
(144, '38.909855', '-77.043413', 'Test catch', '2011-05-14 19:01:20'),
(145, '38.909213', '-77.041909', 'Caught 3 tuning from circle. ', '2011-05-14 20:03:42'),
(146, '38.911090', '-77.042454', 'caught 1\n', '2011-05-14 20:03:45'),
(147, '38.910531', '-77.041226', 'Catch', '2011-05-14 20:06:12'),
(148, '38.911144', '-77.041550', 'Catch - non chaser. Zombie catch ', '2011-05-14 20:08:16'),
(149, '38.912606', '-77.042556', 'Catch 1', '2011-05-14 20:14:40'),
(150, '38.895377', '-77.041119', 'Busted. By batman. ', '2011-05-14 20:29:19'),
(151, '38.899879', '-77.050113', 'One down at 23rd an T St.', '2011-05-14 20:33:01'),
(152, '38.911054', '-77.045282', '\n\nGot one', '2011-05-14 20:42:42'),
(153, '38.898036', '-77.018203', 'Busted by the uberchaser. Thought you were safe in the gallery place metro. Hah!', '2011-05-14 20:53:08'),
(154, '38.901750', '-77.051198', 'Got one!!\n\n<img src="http://app.survivedc.com/uploaded_files/1305421294-selected_picture.jpg">', '2011-05-14 21:01:35'),
(155, '38.895940', '-77.048712', 'Four more tagged', '2011-05-14 21:11:53'),
(156, '38.905654', '-77.016312', 'Caught on the corner of M and 4th. ', '2011-05-14 21:24:48'),
(157, '38.898866', '-77.038023', 'And another one!!\n\n<img src="http://app.survivedc.com/uploaded_files/1305422965-selected_picture.jpg">', '2011-05-14 21:29:25'),
(158, '38.914083', '-77.023136', 'Caught two more around 2 o''clock so I''ve reached my catch limit :) still scaring kids tho', '2011-05-14 21:29:47'),
(159, '38.913052', '-77.025970', '\n\n   ', '2011-05-14 21:36:42'),
(160, '38.914546', '-77.046036', 'Got my scone', '2011-05-14 21:50:29'),
(161, '38.909725', '-77.045054', ' I caught him with a kiss :-0\n\n<img src="http://app.survivedc.com/uploaded_files/1305425042-selected_picture.jpg">', '2011-05-14 22:04:02'),
(162, '38.903721', '-77.057529', 'Caught eating fajitas \n\n<img src="http://app.survivedc.com/uploaded_files/1305426174-selected_picture.jpg">', '2011-05-14 22:22:55'),
(163, '38.901248', '-77.048754', ' ', '2011-05-14 22:24:28'),
(164, '38.909930', '-77.045144', 'No photo. Leftover chasers in Dupont. Oscar out.', '2011-05-14 22:24:51'),
(165, '38.903345', '-77.048857', 'We we lee stalked for 100 meters. Stupid speed dating service got us caught...', '2011-05-14 22:25:39'),
(135, '38.927116', '-77.028170', 'Join us tonight at Dupont Circle, rain or shine!\n\n<img src="http://app.survivedc.com/uploaded_files/1305387071-selected_picture.jpg">', '2011-05-14 11:31:11'),
(166, '38.906981', '-77.043584', 'team Michael Cera out #kalorama\n\n<img src="http://app.survivedc.com/uploaded_files/1305429118-selected_picture.jpg">', '2011-05-14 23:11:58'),
(167, '38.851944', '-77.043518', 'I caught a guy about 45 min ago one block s of safety and a complete finish. I was just going home to the metro. ', '2011-05-15 01:02:12'),
(168, '38.870008', '-77.320964', '', '2011-05-16 09:52:22'),
(169, '', '', '', '2011-09-29 18:01:05'),
(170, '', '', '', '2011-10-10 21:34:25'),
(171, '', '', '', '2011-10-23 05:04:40'),
(172, '', '', '', '2011-10-29 08:18:25'),
(173, '', '', '', '2011-11-05 17:36:45'),
(174, '', '', '', '2011-11-15 02:47:34'),
(175, '', '', '', '2011-11-16 00:44:51'),
(176, '', '', '', '2011-11-19 16:48:47'),
(177, '', '', '', '2011-11-26 09:22:45'),
(178, '', '', '', '2011-12-03 16:59:08'),
(179, '', '', '', '2012-03-21 14:56:17'),
(180, '', '', '', '2012-03-31 15:56:47'),
(181, '', '', '', '2012-04-08 11:29:15'),
(182, '', '', '', '2012-06-04 13:49:09'),
(183, '', '', '', '2012-07-12 03:44:53'),
(184, '', '', '', '2012-07-13 22:55:30'),
(185, '', '', '', '2012-07-16 05:51:27'),
(186, '', '', '', '2012-07-18 14:53:50'),
(187, '', '', '', '2012-07-20 15:01:19'),
(188, '', '', '', '2012-07-28 09:00:00'),
(189, '', '', '', '2012-08-04 09:58:23'),
(190, '', '', '', '2013-03-26 11:01:38'),
(191, '', '', '', '2013-04-14 15:44:08'),
(192, '', '', '', '2013-08-27 17:27:54');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
