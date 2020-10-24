-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2020 at 03:39 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raagam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pswrd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `pswrd`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `artist` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `artworkPath` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `title`, `artist`, `genre`, `artworkPath`) VALUES
(14, 'Dark Lane Demo Tapes', 14, 15, 'assets/images/artwork1602449600_18586802855340_darklane.jpg'),
(15, 'Aalas Ka pedh', 15, 16, 'assets/images/artwork1602454262_6583163412471_aalas-ka-pedh.jpg'),
(16, 'Ghost Stories', 17, 18, 'assets/images/artwork1602456155_85719539741598_ghoststories.jpg'),
(17, 'Discovery', 16, 27, 'assets/images/artwork1602456243_6739031708591_discovery.jpg'),
(18, 'Head Full of Dreams', 17, 18, 'assets/images/artwork1602460404_17629262162323_Coldplay_-_A_Head_Full_of_Dreams.png'),
(19, 'Cold Mess', 19, 18, 'assets/images/artwork1602462338_42200501550669_cold_mess.jpg'),
(20, 'Baarishein', 20, 19, 'assets/images/artwork1602463854_98965499934108_baarishein.jpg'),
(21, 'Riha', 20, 19, 'assets/images/artwork1602464154_2540386249647_riha.jpg'),
(22, 'Dynamite', 18, 27, 'assets/images/artwork1602464587_30767914258849_BTS_-_Dynamite_(official_cover).png'),
(23, 'Everything at Once', 21, 18, 'assets/images/artwork1602465241_63454091468891_Lenka-everything_at_once_s.jpg'),
(24, 'Nobody Love', 22, 18, 'assets/images/artwork1602618756_7170772461509_nobody_love.png');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`) VALUES
(14, 'Drake'),
(15, 'The Local Train'),
(16, 'Daft Punk'),
(17, 'Coldplay'),
(18, 'BTS'),
(19, 'Prateek Kuhad'),
(20, 'Anuv Jain'),
(21, 'Lenka'),
(22, 'Maroon 5');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `feedback` varchar(2000) NOT NULL,
  `user_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `feedback`, `user_name`) VALUES
(2, 'hahahah', 'johndoe');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(15, 'Hip Hop'),
(16, 'Rock'),
(17, 'Jazz'),
(18, 'Pop'),
(19, 'Folk'),
(20, 'Blues'),
(21, 'Classical'),
(22, 'Pop Rock'),
(23, 'Country'),
(24, 'Alternative Rock'),
(25, 'EDM'),
(26, 'Soul'),
(27, 'Disco'),
(28, 'Techno');

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `playlistsongs`
--

CREATE TABLE `playlistsongs` (
  `id` int(11) NOT NULL,
  `songId` int(11) NOT NULL,
  `playlistId` int(11) NOT NULL,
  `playlistOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `artist` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `duration` varchar(8) NOT NULL,
  `path` varchar(500) NOT NULL,
  `albumOrder` int(11) NOT NULL,
  `plays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist`, `album`, `genre`, `duration`, `path`, `albumOrder`, `plays`) VALUES
(60, 'Toosie Slide', 14, 14, 15, '05:11', 'assets/music/1602452684_5046334801623_toosie_slide.mp3', 0, 6),
(61, 'When To Say When', 14, 14, 15, '03:44', 'assets/music/1602452813_9894616274425_when_to_say_when.mp3', 0, 0),
(62, 'Chicago Freestyle', 14, 14, 15, '03:41', 'assets/music/1602452561_6579054809554_chicago_freestyle.mp3', 0, 1),
(63, 'Pain', 14, 14, 15, '02:30', 'assets/music/1602452457_7443139329363_pain.mp3', 0, 0),
(64, 'Deep Pockets', 14, 14, 15, '03:44', 'assets/music/1602452972_62632791469187_deep_pockets.mp3', 0, 0),
(65, 'Not You Too', 14, 14, 15, '04:30', 'assets/music/1602453184_10054809250151_not_you_too.mp3', 0, 1),
(66, 'D4L', 14, 14, 15, '03:10', 'assets/music/1602453399_69559859577875_future_drake_young_thug.mp3', 0, 0),
(67, 'Time Flies', 14, 14, 15, '03:14', 'assets/music/1602453605_62606104386127_time_flies.mp3', 0, 1),
(68, 'Desires', 14, 14, 15, '03:59', 'assets/music/1602453975_80727117645269_desires.mp3', 0, 0),
(69, 'Landed', 14, 14, 15, '02:33', 'assets/music/1602454115_39904143615279_landed.mp3', 0, 0),
(70, 'Manzil', 15, 15, 16, '04:49', 'assets/music/1602454877_78337732531832_manzil.mp3', 0, 1),
(71, 'Aaoge Tum Kabhi', 15, 15, 16, '04:24', 'assets/music/1602455015_5867927083969_aaoge_tum_kabhi.mp3', 0, 1),
(72, 'Bandey', 15, 15, 16, '05:17', 'assets/music/1602455159_20836156879000_bandey.mp3', 0, 0),
(73, 'Choo Lo', 15, 15, 16, '03:53', 'assets/music/1602455331_87887387183372_chool_lo.mp3', 0, 0),
(74, 'Kaisey Jiyun', 15, 15, 16, '04:21', 'assets/music/1602455699_2231628113593_kaise_jiyun.mp3', 0, 1),
(75, 'Kaisey Jiyun (Acoustic)', 15, 15, 16, '03:39', 'assets/music/1602455640_13476801611644_kaisey_jiyun_acoustic.mp3', 0, 0),
(76, 'Yeh Zindagi Hai', 15, 15, 16, '04:19', 'assets/music/1602455861_55669316001410_yeh_zindagi_hai.mp3', 0, 0),
(77, 'Dil Mere', 15, 15, 16, '04:20', 'assets/music/1602455965_9733028469389_dil_mere.mp3', 0, 0),
(78, 'Always in My Head', 17, 16, 18, '03:36', 'assets/music/1602456443_80453073471534_Always_in_My_Head.mp3', 0, 1),
(80, 'Magic', 17, 16, 18, '04:45', 'assets/music/1602456575_34183785083753_Magic.mp3', 0, 2),
(81, 'Ink', 17, 16, 18, '03:48', 'assets/music/1602456734_66688763217979_Ink.mp3', 0, 0),
(82, 'True Love', 17, 16, 18, '04:06', 'assets/music/1602457164_7404908344036_True_Love.mp3', 0, 0),
(83, 'Midnight', 17, 16, 18, '04:54', 'assets/music/1602457236_29936662640219_Midnight.mp3', 0, 0),
(84, 'Another Arms', 17, 16, 18, '03:54', 'assets/music/1602465916_7655505293038_Another_Arms.mp3', 0, 3),
(85, 'Oceans', 17, 16, 18, '05:21', 'assets/music/1602457752_6040043458744_Oceans.mp3', 0, 0),
(86, 'A Sky Full of Stars', 17, 16, 18, '04:27', 'assets/music/1602458011_78718273040231_A_Sky_Full_of_Stars.mp3', 0, 0),
(87, 'O', 17, 16, 18, '05:23', 'assets/music/1602458146_92590737354252_O.mp3', 0, 2),
(88, 'One More Time', 16, 17, 27, '05:20', 'assets/music/1602458540_9404976275237_one_more_time.mp3', 0, 0),
(89, 'Aerodynamic', 16, 17, 27, '03:32', 'assets/music/1602466039_3219235873797_aerodynamic.mp3', 0, 0),
(90, 'Digital Love', 16, 17, 27, '05:01', 'assets/music/1602458964_23103123749358_digital_love.mp3', 0, 0),
(91, 'Harder Better Faster Stronger', 16, 17, 27, '03:46', 'assets/music/1602459056_28643545738026_harder_better_faster_stronger.mp3', 0, 0),
(92, 'Crescendolls', 16, 17, 27, '03:32', 'assets/music/1602459257_33895947576836_crescendolls.mp3', 0, 0),
(93, 'Nightvision', 16, 17, 27, '01:44', 'assets/music/1602459405_67269742087321_nightvision.mp3', 0, 0),
(94, 'Superheroes', 16, 17, 27, '03:57', 'assets/music/1602459677_335984255070_superheroes.mp3', 0, 0),
(95, 'High Life', 16, 17, 27, '03:21', 'assets/music/1602459757_37603394019643_high_life.mp3', 0, 0),
(96, 'Something About Us', 16, 17, 27, '03:52', 'assets/music/1602459896_66815444441509_something_about_us.mp3', 0, 0),
(97, 'Voyager', 16, 17, 27, '03:47', 'assets/music/1602459980_83850552050753_voyager.mp3', 0, 0),
(98, 'A Head Full of Dreams', 17, 18, 18, '03:43', 'assets/music/1602460674_7396761873366_A_Head_Full_of_Dreams.mp3', 0, 1),
(99, 'Up and Up', 17, 18, 18, '04:10', 'assets/music/1602466846_8848007678530_up_and_up.mp3', 0, 2),
(100, 'Adventure of a Lifetime', 17, 18, 18, '05:15', 'assets/music/1602467615_7147891030077_adventure.mp3', 0, 6),
(101, 'Everglow', 17, 18, 18, '04:42', 'assets/music/1602461225_4262044380431_Everglow.mp3', 0, 1),
(102, 'Hymn for the Weekend', 17, 18, 18, '04:20', 'assets/music/1602467424_9034446795935_hymn_weekend.mp3', 0, 5),
(103, 'Birds', 17, 18, 18, '03:52', 'assets/music/1602467045_2804142171177_birds.mp3', 0, 2),
(104, 'With You For You', 19, 19, 18, '03:52', 'assets/music/1602462614_64434809977984_Prateek_Kuhad_-_with_youfor_you.mp3', 0, 2),
(105, 'Did you Fall Apart', 19, 19, 18, '02:52', 'assets/music/1602462784_20259874616851_Prateek_Kuhad_-_did_youfall_apart.mp3', 0, 2),
(106, 'Cold Mess', 19, 19, 18, '04:41', 'assets/music/1602463140_79350915985750_Prateek_Kuhad_-_coldmess.mp3', 0, 2),
(107, '100 Words', 19, 19, 18, '03:30', 'assets/music/1602463285_69394374444681_Prateek_Kuhad_-_100_words.mp3', 0, 1),
(108, 'Baarishein', 20, 20, 19, '03:27', 'assets/music/1602466254_4474973306716_baarishein.mp3', 0, 10),
(109, 'Riha', 20, 21, 19, '04:53', 'assets/music/1602466488_4913768934289_RIHA.mp3', 0, 5),
(110, 'Dynamite', 18, 22, 27, '03:43', 'assets/music/1602464895_2217390678138_BTS_-_Dynamite.mp3', 0, 2),
(111, 'Everything at Once', 21, 23, 18, '02:38', 'assets/music/1602466650_7474858241385_everything.mp3', 0, 13),
(113, 'Nobody Love', 22, 24, 18, '03:30', 'assets/music/1602620103_78751584337230_nobody_love.mp3', 0, 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `signUpDate` datetime NOT NULL,
  `profilePic` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `password`, `signUpDate`, `profilePic`) VALUES
(3, 'johndoe', 'John', 'Doe', 'john@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-10-03 00:00:00', 'assets/images/profile-pics/head_emerald.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlistsongs`
--
ALTER TABLE `playlistsongs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `playlistsongs`
--
ALTER TABLE `playlistsongs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
