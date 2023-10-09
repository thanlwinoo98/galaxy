-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2019 at 03:31 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galaxy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `ausername` varchar(255) NOT NULL,
  `apassword` char(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `ausername`, `apassword`, `email`, `date_created`) VALUES
(1, 'adminuser', 'hellopassword', 'hello@gmail.com', '2019-11-05 20:30:56');

-- --------------------------------------------------------

--
-- Table structure for table `dev`
--

CREATE TABLE `dev` (
  `dev_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dev_team_id` int(11) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `approval` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dev`
--

INSERT INTO `dev` (`dev_id`, `user_id`, `dev_team_id`, `date_registered`, `approval`) VALUES
(9, 16, 2, '2019-11-17 21:31:41', 1),
(15, 14, 10, '2019-11-23 02:01:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dev_team`
--

CREATE TABLE `dev_team` (
  `dev_team_id` int(11) NOT NULL,
  `dev_team` varchar(255) NOT NULL,
  `dev_team_email` varchar(255) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `approval` tinyint(1) DEFAULT NULL,
  `team_admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dev_team`
--

INSERT INTO `dev_team` (`dev_team_id`, `dev_team`, `dev_team_email`, `date_registered`, `approval`, `team_admin_id`) VALUES
(2, 'naruto', 'naruto@gmail.com', '2019-11-15 10:41:51', 1, 9),
(5, 'one', 'one@gmail.com', '2019-11-21 16:28:43', 1, 12),
(6, 'two', 'two@gmail.com', '2019-11-15 10:51:01', 1, 13),
(8, 'Extreme', '1234@gmail.com', '2019-11-22 08:20:07', 1, 17),
(9, 'True', 'True@gmail.com', '2019-11-22 11:03:54', 1, 19),
(10, 'Banana', 'banana@gmail.com', '2019-11-23 01:50:18', 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `dev_team_id` int(11) NOT NULL,
  `description` longtext NOT NULL DEFAULT 'No Description',
  `approval` tinyint(1) NOT NULL,
  `developer` varchar(255) DEFAULT NULL,
  `img_path1` varchar(255) DEFAULT 'No Image Available',
  `img_path2` varchar(255) DEFAULT 'No Image Available',
  `img_path3` varchar(255) DEFAULT 'No Image Available',
  `img_path4` varchar(255) DEFAULT 'No Image Available',
  `file_name` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `publisher` varchar(255) DEFAULT 'No Publisher Available',
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `dev_team_id`, `description`, `approval`, `developer`, `img_path1`, `img_path2`, `img_path3`, `img_path4`, `file_name`, `date_created`, `publisher`, `price`) VALUES
(26, 'Death Stranding', 6, 'Death Stranding[c] is an action game developed by Kojima Productions. It is the first game from director Hideo Kojima and Kojima Productions after their disbandment from Konami in 2015. It was released by Sony Interactive Entertainment for the PlayStation 4 in November 2019 and is scheduled for release by 505 Games on Microsoft Windows in mid-2020.\r\n\r\nThe game is set in the United States during the aftermath of the eponymous Death Stranding, which caused destructive creatures from a realm between life and death to begin roaming the Earth. Players control Sam Bridges (Norman Reedus), a courier tasked with delivering supplies to the fractured and isolated colonies that remain and reconnecting them via a wireless communications network.\r\n\r\nAlongside Reedus, the game features actors Mads Mikkelsen, Léa Seydoux, Margaret Qualley, Troy Baker, Tommie Earl Jenkins, and Lindsay Wagner, in addition to the likenesses of film directors Guillermo del Toro and Nicolas Winding Refn as supporting characters. Death Stranding received generally favorable reviews from critics, who saw it as a unique experience and praised its voice acting, soundtrack, and graphics, although many were polarized by its gameplay and story.', 1, 'Hideo Kojima', 'productimg/5dd58def399dd1.16434800.jpg', 'productimg/5dd58def399ed4.26718507.jpg', 'productimg/5dd58def399f15.39411787.jpg', 'productimg/5dd58def399f35.00505470.jpg', '6deathstranding.rar', '2019-11-20 19:03:11', 'Sony', 59.99),
(29, 'Monster Hunter: World', 5, 'Monster Hunter: World is an action role-playing game developed and published by Capcom. A part of the Monster Hunter series, it was released worldwide for PlayStation 4 and Xbox One in January 2018, with a Microsoft Windows version in August 2018.', 1, 'Capcom', 'productimg/5dd6bd7c88a821.62280401.jpeg', 'productimg/5dd6bd7c88a8c7.26029488.jpg', 'productimg/5dd6bd7c88a8f3.24181905.jpg', 'productimg/5dd6bd7c88a927.19186672.jpeg', '5monsterhunterworld.zip', '2019-11-21 16:38:20', 'Capcom', 59.99),
(30, 'Shenmue III', 2, 'Shenmue is a artistic masterpiece by Yu Suzuki, a unique experience like no other. In this game you take control of a young Japanese man named Ryo who is on a quest to search for his father~s killer.', 1, 'Sega', 'productimg/5dd6c6ad3a6538.57115293.png', 'productimg/5dd6c6ad3a65c3.82195114.png', 'productimg/5dd6c6ad3a65f2.96223285.jpg', 'productimg/5dd6c6ad3a6621.42204938.jpg', '2shenmueiii.zip', '2019-11-21 17:17:33', 'Sega', 49.99),
(33, 'Final Fantasy X/X-2 Remaster', 2, 'Content. The HD remaster covers both Final Fantasy X and its sequel Final Fantasy X-2. The first game follows the journey of the teenager Tidus who is transported to the world of Spira after an encounter with a creature known as Sin.', 1, 'Square Enix', 'productimg/5dd6d7757cdaf9.59238826.jpg', 'productimg/5dd6d7757cdb79.11585129.jpg', 'productimg/5dd6d7757cdba3.99647685.jpg', 'productimg/5dd6d7757cdbd1.74916539.jpg', '2finalfantasy10remaster.zip', '2019-11-21 18:29:09', 'Square Enix', 29.99),
(34, 'Final Fantasy XIII Trilogy', 8, 'Final Fantasy XIII[a] is a science fiction role-playing video game developed and published by Square Enix for the PlayStation 3 and Xbox 360 consoles and later for the Microsoft Windows operating system. Released in Japan in December 2009 and worldwide in March 2010, it is the thirteenth title in the mainline Final Fantasy series. The game includes fast-paced combat, a new system for the series for determining which abilities are developed for the characters called \"Crystarium\", and a customizable \"Paradigm\" system to control which abilities are used by the characters. Final Fantasy XIII includes elements from the previous games in the series, such as summoned monsters, chocobos, and airships.\r\n\r\nThe game takes place in the fictional floating world of Cocoon, whose government, the Sanctum, is ordering a purge of civilians who have supposedly come into contact with Pulse, the much-feared world below. The former soldier Lightning begins her fight against the government in order to save her sister who has been branded as an unwilling servant to a god-like being from Pulse, making her an enemy of Cocoon. Lightning is soon joined by a band of allies, and together the group also become marked by the same Pulse creature. They rally against the Sanctum while trying to discover their assigned task and whether they can avoid being turned into monsters or crystals at the completion.\r\n\r\nDevelopment began in 2004, and the game was first announced at Electronic Entertainment Expo (E3) 2006. Final Fantasy XIII is the flagship title of the Fabula Nova Crystallis collection of Final Fantasy games and is the first game to use Square Enix~s Crystal Tools engine. Final Fantasy XIII received mostly positive reviews from video game publications, which praised the game~s graphics, presentation, and battle system. The game~s story received a mixed response from reviewers, and its linearity compared to previous games in the series was mostly criticized. Selling 1.7 million copies in Japan in 2009, Final Fantasy XIII became the fastest-selling title in the history of the series. As of 2017, the game has sold over 7 million copies worldwide on consoles.[2] The Microsoft Windows version has sold over 746,000 copies according to SteamSpy. A sequel, titled Final Fantasy XIII-2, was released in December 2011 in Japan and in February 2012 in North America and PAL regions. A second sequel, titled Lightning Returns: Final Fantasy XIII, which concludes Lightning~s story and the Final Fantasy XIII series,[3] was released in November 2013 in Japan and in February 2014 in North America and PAL regions. In September 2014, Square Enix announced the Final Fantasy XIII series has been widely successful and has shipped over 11 million copies worldwide.', 1, 'Square Enix', 'productimg/5dd79ad60f88a4.32173326.jpg', 'productimg/5dd79ad60f89d6.02705313.jpg', 'productimg/5dd79ad60f8a01.43085215.jpg', 'productimg/5dd79ad60f8a35.37550967.jpg', '8finalfantasy13.zip', '2019-11-22 08:22:46', 'Square Enix', 39.99),
(35, 'Naruto Shippuden Ultimate Ninja Storm 4', 8, 'Naruto Shippuden: Ultimate Ninja Storm 4, known in Japan as Naruto Shippūden: Narutimate Storm 4 (Japanese: NARUTO-ナルト- 疾風伝ナルティメットストーム 4 Hepburn: Naruto Shippūden: Narutimetto Sutōmu 4),[3] is a fighting game developed by CyberConnect2 and published by Bandai Namco Entertainment for PlayStation 4, Xbox One, and Steam in February 2016. It is the sequel to Naruto Shippuden: Ultimate Ninja Storm Revolution. Developed for PlayStation 4 and Xbox One, a two-year development schedule took place. The expansion version is entitled Naruto Shippuden: Ultimate Ninja Storm 4 - Road to Boruto and this version is under development to be compiled with three other titles in the series as Naruto Shippuden: Ultimate Ninja Storm Legacy, released August 25, 2017. The game received generally positive reviews, with much praise going to the game~s narrative and graphics.', 1, 'Cyber Connect', 'productimg/5dd7a16e4e4bb5.62748266.jpg', 'productimg/5dd7a16e4e4c32.33421758.jpg', 'productimg/5dd7a16e4e4c64.33021903.jpg', 'productimg/5dd7a16e4e4c82.87890744.jpeg', '8narutosuns4.zip', '2019-11-22 08:50:54', 'Cyber Connect', 49.99),
(36, 'Final Fantasy XV', 5, 'Final Fantasy XV[a] is an action role-playing game developed and published by Square Enix as part of the long-running Final Fantasy series. It was released for the PlayStation 4 and Xbox One in 2016, and for Microsoft Windows in 2018, for Google Stadia as a launch title in 2019. The game features an open world environment and action-based battle system, incorporating quick-switching weapons, elemental magic, and other features such as vehicle travel and camping. The base campaign was later expanded with downloadable content (DLC), adding further gameplay options such as additional playable characters and multiplayer.\r\n\r\nFinal Fantasy XV takes place on the fictional world of Eos; aside from the capital of Lucis, all the world is dominated by the empire of Niflheim, who seek control of the magical Crystal protected by Lucis~s royal family. On the eve of peace negotiations, Niflheim attacks the capital and steals the Crystal. Noctis Lucis Caelum, heir to the Lucian throne, goes on a quest to rescue the Crystal and defeat Niflheim. He later learns his full role as the \"True King\", destined to use the Crystal~s powers to save Eos from eternal darkness. The game shares a thematic connection with Fabula Nova Crystallis Final Fantasy, a subseries of games linked by a common mythos which includes Final Fantasy XIII and Final Fantasy Type-0.\r\n\r\nThe game~s development began in 2006 as a PlayStation 3 spin-off titled Final Fantasy Versus XIII.[b] Tetsuya Nomura served as the original director and character designer. After a development period of six years, it was changed to the next mainline title in the series in 2012; Nomura was replaced as director by Hajime Tabata, and the game shifted to eighth generation platforms. Due to the changes, the story needed to be rewritten and some scenes and characters were repurposed or removed. The setting of Final Fantasy XV was \"a fantasy based on reality\", with locations and creatures based on elements from the real world.\r\n\r\nTo supplement the game, Square Enix created a multimedia project called the \"Final Fantasy XV Universe\", which includes a few spin-off games, as well as an anime series and feature film. Gameplay and story-based DLC was released between 2017 and 2019. Upon release, Final Fantasy XV was well received by journalists. Praise was given for its gameplay, visuals, and emotional weight, while reception towards its story and presentation was mixed. By November 2018, the game had sold over 8.4 million copies worldwide.', 1, 'Square Enix', 'productimg/5dd7a973b1e126.94889578.png', 'productimg/5dd7a973b1e1d1.95879856.jpg', 'productimg/5dd7a973b1e208.05045994.jpg', 'productimg/5dd7a973b1e246.90347144.jpg', '5ff15.zip', '2019-11-22 09:25:07', 'Square Enix', 59.99),
(37, 'Bayonetta', 5, 'Bayonetta[b] is an action-adventure hack and slash video game developed by PlatinumGames and published by Sega. The game was originally released for Xbox 360 and PlayStation 3 in Japan in October 2009, and in North America and Europe in January 2010. The game was later released on the Wii U alongside its sequel, Bayonetta 2, releasing in September 2014 in Japan and worldwide the following month. An enhanced port for Microsoft Windows was released in April 2017 with support for 4K visuals. The game was released on the Nintendo Switch in February 2018 worldwide, also alongside its sequel. A third game, Bayonetta 3, is currently in development and is set to release for the Switch as well.\r\n\r\nBayonetta takes place in Vigrid, a fictional city in Europe. The game stars the eponymous character, a witch who is capable of shapeshifting and using various firearms. She also possesses magical attacks, and she can use her hair to summon demons to dispatch her foes. The game features a rating system, which gives players a grade based on their performance, and a combat system that is similar to the Devil May Cry series, also created by Bayonetta creator Hideki Kamiya.\r\n\r\nDevelopment of the game was started in January 2007, with Hideki Kamiya being the game~s director. According to Kamiya, the game was completely original, though he drew some inspirations from Scandinavian mythology, and played Devil May Cry 4 for reference. The game~s theme is \"sexiness” and “partial nudity”, and that the characters were designed to be \"fashionable\". Kamiya and artist Mari Shimazaki spent more than a year to create Bayonetta~s design. Several demos were released for the game prior to its launch. Bayonetta was the third project released by PlatinumGames, which was founded by former Clover Studio employees. Upon release, the game received generally positive reviews. The game was praised for its combat, presentation and soundtrack, but was criticized for its story and quick-time-events. The game was awarded and nominated for several end-of-the year accolades, and had sold over a million units worldwide by 2010. An anime film adaptation of the game by Gonzo, titled Bayonetta: Bloody Fate, was released in Japan in November 2013.', 1, 'PlatinumGames', 'productimg/5dd7aa9f2ca102.55395097.jpg', 'productimg/5dd7aa9f2ca184.45454002.jpg', 'productimg/5dd7aa9f2ca1c0.28322868.jpg', 'productimg/5dd7aa9f2ca282.21535394.jpg', '5bayo.zip', '2019-11-22 09:30:07', 'PlatinumGames', 29.99),
(38, 'Rise of the Tomb Raider', 6, 'Rise of the Tomb Raider is an action-adventure video game developed by Crystal Dynamics. It is the sequel to the 2013 video game, Tomb Raider, and the eleventh entry in the Tomb Raider series. The game was released by Microsoft Studios for Xbox One and Xbox 360 in 2015. Square Enix released the game for Microsoft Windows and PlayStation 4 in 2016. In April 2018 Feral Interactive published the game for Linux and Mac, with a Google Stadia release set for November 2019.\r\n\r\nIts story follows Lara Croft as she ventures into Siberia in search of the legendary city of Kitezh while battling the paramilitary organization Trinity, which intends to uncover the city~s promise of immortality. Lara must traverse the environment and combat enemies with firearms and stealth as she explores semi-open hubs. In these hubs she can raid challenge tombs to unlock new rewards, complete side missions, and scavenge for resources which can be used to craft useful materials.\r\n\r\nDevelopment of Rise of the Tomb Raider closely followed the conclusion of development of the 2013 reboot. Player feedback was considered during development, with the team reducing the number of quick time events and introducing more puzzles and challenge tombs. The team traveled to several locations in Turkey, including Cappadocia, Istanbul and Ephesus, to design Kitezh. Camilla Luddington returned to provide voice and motion-capture work for Lara. Powered by the Foundation engine, the game was also developed by Eidos Montreal and Nixxes Software.\r\n\r\nRise of the Tomb Raider was announced at E3 2014 by Microsoft Studios. It was revealed as a timed exclusive for Microsoft at Gamescom 2014, which sparked player outrage and widespread criticism from the gaming press and community. The game was praised, with critics liking its graphics, gameplay, and characterization; however, some reviewers felt that it did not take enough risks. By November 2017, the game had sold nearly seven million copies. Several downloadable story and content additions have been released for digital purchase. A sequel, Shadow of the Tomb Raider, was released in September 2018.', 1, 'Square Enix', 'productimg/5dd7ad1ee73213.65730784.jpg', 'productimg/5dd7ad1ee732b5.84759360.jpg', 'productimg/5dd7ad1ee732f5.99528200.jpg', 'productimg/5dd7ad1ee73320.20095868.jpg', '6riseoftombraider.zip', '2019-11-22 09:40:46', 'Square Enix', 59.99),
(39, 'Atelier Ryza: Ever Darkness & the Secret Hideout', 8, 'Gathering \r\nAtelier Ryza features a variety of gathering tools such as axes, hammers and scythes. Using different tools on the same gathering spot allows the player to obtain different materials. For example, in a tree you can use the axe to get lumber, the staff to get fruit and the scythe to get wood chips.\r\n\r\nGathering areas can be created with alchemy. With different materials, players can tune the type of field, the obtainable items and the enemies present. These areas can also be shared twithother players.\r\n\r\nCombat \r\nA new real-time, turn-based system is introduced. During battle, time continuously passes, and characters and enemies can only act when it~s their turn, without time stopping. Up to three characters can take part in battles, and the player can switch freely which one to control, while the AI takes care of the other two.\r\n\r\nThe MP bar, present in every previous entry, is replaced by a shared AP (Action Points) system. Action Points are gained during the course of the battle, and they are used to trigger skills. During combat, the new \"Tactics Lever\" meter increases. This system serves to boost skill effects.\r\n\r\nFollow-up attacks between party members can be triggered with \"Action Orders\".\r\n\r\nA difficulty selector (from \"easy\" to \"hard\") is also present.\r\n\r\nAtelier Customization \r\nThe \"secret hideout\" (the workshop) can be decorated. Unlike Atelier Firis, where only furniture could be changed, in Atelier Ryza players can also change the walls and roof.', 1, 'Koei Tecmo', 'productimg/5dd7af5a2244d4.92740141.jpg', 'productimg/5dd7af5a224588.96191459.jpg', 'productimg/5dd7af5a2245b2.90127910.jpg', 'productimg/5dd7af5a2245e6.09643478.jpg', '8atelierryza.zip', '2019-11-22 09:50:18', 'Koei Tecmo', 59.99),
(40, 'Sincerely Violet-Evergarden (music)', 9, 'The story revolves around Auto Memory Dolls (自動手記人形 Jidō Shuki Ningyō): people initially employed by a scientist named Dr. Orland to assist his blind wife Mollie in writing her novels, and later hired by other people who needed their services. In the present time, the term refers to the industry of writing for others. The story follows Violet Evergarden~s journey of reintegrating back into society after the war is over and her search for her life~s purpose now that she is no longer a soldier in order to understand the last words her major, Gilbert, had told her: \"I love you.\"', 1, 'True', 'productimg/5dd7c6744bb1b2.45032855.jpg', 'productimg/5dd7c6744bb1b2.45032855.jpg', 'productimg/5dd7c6744bb1b2.45032855.jpg', 'productimg/5dd7c6744bb1b2.45032855.jpg', '9sincerely.zip', '2019-11-22 11:28:52', 'Lantis', 0.99);

-- --------------------------------------------------------

--
-- Table structure for table `product_spec`
--

CREATE TABLE `product_spec` (
  `spec_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `os` varchar(255) NOT NULL DEFAULT 'Windows Vista or later',
  `processor` varchar(255) NOT NULL DEFAULT '2.4GHz quad-core CPU',
  `memory` varchar(255) NOT NULL DEFAULT '4GB',
  `graphics` varchar(255) NOT NULL DEFAULT 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later',
  `directx` varchar(255) NOT NULL DEFAULT 'Version 11',
  `network` varchar(255) NOT NULL DEFAULT 'Broadband Internet connection',
  `storage` varchar(255) NOT NULL DEFAULT '10 GB available space',
  `soundcard` varchar(255) NOT NULL DEFAULT 'DirectX compatible audio card',
  `additional` varchar(255) NOT NULL DEFAULT 'Best experiences with headphones',
  `minos` varchar(255) NOT NULL DEFAULT 'Windows Vista or later',
  `minprocessor` varchar(255) NOT NULL DEFAULT '2 GHz quad-core CPU',
  `minmemory` varchar(255) NOT NULL DEFAULT '4GB',
  `mingraphics` varchar(255) NOT NULL DEFAULT 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later',
  `mindirectx` varchar(255) NOT NULL DEFAULT 'Version 11',
  `minnetwork` varchar(255) NOT NULL DEFAULT 'Broadband Internet connection',
  `minstorage` varchar(255) NOT NULL DEFAULT '10 GB',
  `minsoundcard` varchar(255) NOT NULL DEFAULT 'DirectX compatible audio card',
  `minadditional` varchar(255) NOT NULL DEFAULT 'Best experiences with headphones'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_spec`
--

INSERT INTO `product_spec` (`spec_id`, `product_id`, `os`, `processor`, `memory`, `graphics`, `directx`, `network`, `storage`, `soundcard`, `additional`, `minos`, `minprocessor`, `minmemory`, `mingraphics`, `mindirectx`, `minnetwork`, `minstorage`, `minsoundcard`, `minadditional`) VALUES
(1, 33, 'Windows Vista or later', '2.4GHz quad-core CPU', '4GB', 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later', 'Version 11', 'Broadband Internet connection', '10 GB available space', 'DirectX compatible audio card', 'Best experiences with headphones', 'Windows Vista or later', '2 GHz quad-core CPU', '4GB', 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later', 'Version 11', 'Broadband Internet connection', '10 GB', 'DirectX compatible audio card', 'Best experiences with headphones'),
(2, 26, 'Windows Vista or later', '2.4GHz quad-core CPU', '4GB', 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later', 'Version 11', 'Broadband Internet connection', '10 GB available space', 'DirectX compatible audio card', 'Best experiences with headphones', 'Windows Vista or later', '2 GHz quad-core CPU', '4GB', 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later', 'Version 11', 'Broadband Internet connection', '10 GB', 'DirectX compatible audio card', 'Best experiences with headphones'),
(3, 29, 'Windows Vista or later', '2.4GHz quad-core CPU', '4GB', 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later', 'Version 11', 'Broadband Internet connection', '10 GB available space', 'DirectX compatible audio card', 'Best experiences with headphones', 'Windows Vista or later', '2 GHz quad-core CPU', '4GB', 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later', 'Version 11', 'Broadband Internet connection', '10 GB', 'DirectX compatible audio card', 'Best experiences with headphones'),
(4, 30, 'Windows Vista or later', '2.4GHz quad-core CPU', '4GB', 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later', 'Version 11', 'Broadband Internet connection', '10 GB available space', 'DirectX compatible audio card', 'Best experiences with headphones', 'Windows Vista or later', '2 GHz quad-core CPU', '4GB', 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later', 'Version 11', 'Broadband Internet connection', '10 GB', 'DirectX compatible audio card', 'Best experiences with headphones'),
(5, 34, 'Windows Vista or later', '2.4GHz quad-core CPU', '4GB', 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later', 'Version 11', 'Broadband Internet connection', '10 GB available space', 'DirectX compatible audio card', 'Best experiences with headphones', 'Windows Vista or later', '2 GHz quad-core CPU', '4GB', 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later', 'Version 11', 'Broadband Internet connection', '10 GB', 'DirectX compatible audio card', 'Best experiences with headphones'),
(6, 35, 'Windows Vista or later', '2.4GHz quad-core CPU', '4GB', 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later', 'Version 11', 'Broadband Internet connection', '10 GB available space', 'DirectX compatible audio card', 'Best experiences with headphones', 'Windows Vista or later', '2 GHz quad-core CPU', '4GB', 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later', 'Version 11', 'Broadband Internet connection', '10 GB', 'DirectX compatible audio card', 'Best experiences with headphones'),
(7, 36, 'Windows Vista or later', '2.4GHz quad-core CPU', '4GB', 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later', 'Version 11', 'Broadband Internet connection', '10 GB available space', 'DirectX compatible audio card', 'Best experiences with headphones', 'Windows Vista or later', '2 GHz quad-core CPU', '4GB', 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later', 'Version 11', 'Broadband Internet connection', '10 GB', 'DirectX compatible audio card', 'Best experiences with headphones'),
(8, 37, 'Windows Vista or later', '2.4GHz quad-core CPU', '4GB', 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later', 'Version 11', 'Broadband Internet connection', '10 GB available space', 'DirectX compatible audio card', 'Best experiences with headphones', 'Windows Vista or later', '2 GHz quad-core CPU', '4GB', 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later', 'Version 11', 'Broadband Internet connection', '10 GB', 'DirectX compatible audio card', 'Best experiences with headphones'),
(9, 38, 'Windows Vista or later', '2.4GHz quad-core CPU', '4GB', 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later', 'Version 11', 'Broadband Internet connection', '10 GB available space', 'DirectX compatible audio card', 'Best experiences with headphones', 'Windows Vista or later', '2 GHz quad-core CPU', '4GB', 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later', 'Version 11', 'Broadband Internet connection', '10 GB', 'DirectX compatible audio card', 'Best experiences with headphones'),
(10, 39, 'Windows Vista or later', '2.4GHz quad-core CPU', '4GB', 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later', 'Version 11', 'Broadband Internet connection', '10 GB available space', 'DirectX compatible audio card', 'Best experiences with headphones', 'Windows Vista or later', '2 GHz quad-core CPU', '4GB', 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later', 'Version 11', 'Broadband Internet connection', '10 GB', 'DirectX compatible audio card', 'Best experiences with headphones'),
(11, 40, 'Windows Vista or later', '2.4GHz quad-core CPU', '4GB', 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later', 'Version 11', 'Broadband Internet connection', '10 GB available space', 'DirectX compatible audio card', 'Best experiences with headphones', 'Windows Vista or later', '2 GHz quad-core CPU', '4GB', 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later', 'Version 11', 'Broadband Internet connection', '10 GB', 'DirectX compatible audio card', 'Best experiences with headphones'),
(12, 42, 'Windows Vista or later', '2.4GHz quad-core CPU', '4GB', 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later', 'Version 11', 'Broadband Internet connection', '10 GB available space', 'DirectX compatible audio card', 'Best experiences with headphones', 'Windows Vista or later', '2 GHz quad-core CPU', '4GB', 'NVIDIA Geforce 9600GT VRAM 512MB or later / ATI Radeon HD 2600XT VRAM 512MB or later', 'Version 11', 'Broadband Internet connection', '10 GB', 'DirectX compatible audio card', 'Best experiences with headphones');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `dev_team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `product_id`, `dev_team_id`, `user_id`, `date_created`) VALUES
(12, 26, 6, 13, '2019-11-20 19:06:57'),
(15, 26, 6, 17, '2019-11-20 19:06:57'),
(16, 26, 6, 16, '2019-11-20 19:06:57'),
(22, 29, 5, 13, '2019-11-21 16:41:12'),
(23, 34, 8, 17, '2019-11-22 10:04:44'),
(24, 40, 9, 9, '2019-11-22 11:35:45'),
(26, 40, 9, 20, '2019-11-23 02:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` char(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_name` varchar(50) NOT NULL,
  `img_path` varchar(255) DEFAULT 'profileimg/default.png',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `profile_name`, `img_path`, `date_created`) VALUES
(9, 'koru', 'naruto', 'thanlwinoo98@gmail.com', 'myboy', 'profileimg/default.png', '2019-11-22 08:15:26'),
(10, 'hello', 'hello1', 'naruto@gmail.com', 'helloman', 'profileimg/default.png', '2019-11-22 08:15:29'),
(11, 'thanlwinoo98', '123', 'asdf@gmail.com', 'narutoman', 'profileimg/default.png', '2019-11-22 08:15:31'),
(12, 'one', 'two', 'one@gmail.com', 'one', 'profileimg/default.png', '2019-11-22 08:15:33'),
(13, 'two', 'three', 'two@gmail.com', 'two', 'profileimg/default.png', '2019-11-22 08:15:42'),
(14, 'three', 'four', 'three@gmail.com', 'three', 'profileimg/default.png', '2019-11-22 08:15:46'),
(15, 'four', 'five', 'four@gmail.com', 'four', 'profileimg/default.png', '2019-11-22 08:15:49'),
(16, 'five', 'six', 'five@gmail.com', 'five', 'profileimg/default.png', '2019-11-22 08:15:51'),
(17, 'six', 'seven', '1234@gmail.com', 'Finalman', 'profileimg/default.png', '2019-11-22 08:18:18'),
(18, 'ten', 'eleven', 'ten@gmail.com', 'Bruh', 'profileimg/5dd2de87a10dc1.98695298.png', '2019-11-18 18:10:15'),
(19, 'true', 'false', 'true@gmail.com', 'True', 'profileimg/default.png', '2019-11-22 11:03:20'),
(20, 'banana', 'apple', 'banana@gmail.com', 'Cat', 'profileimg/5dd886706a9605.85876019.png', '2019-11-23 01:08:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `dev`
--
ALTER TABLE `dev`
  ADD PRIMARY KEY (`dev_id`),
  ADD UNIQUE KEY `dev` (`user_id`,`dev_team_id`),
  ADD KEY `user_id` (`user_id`,`dev_team_id`),
  ADD KEY `dev_team_id` (`dev_team_id`);

--
-- Indexes for table `dev_team`
--
ALTER TABLE `dev_team`
  ADD PRIMARY KEY (`dev_team_id`),
  ADD UNIQUE KEY `dev_team_email` (`dev_team_email`),
  ADD KEY `team_admin_id` (`team_admin_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_name` (`product_name`),
  ADD KEY `dev_team_id` (`dev_team_id`);

--
-- Indexes for table `product_spec`
--
ALTER TABLE `product_spec`
  ADD PRIMARY KEY (`spec_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`),
  ADD UNIQUE KEY `sales_id` (`sales_id`,`product_id`,`user_id`),
  ADD UNIQUE KEY `product_id` (`product_id`,`user_id`),
  ADD KEY `sales_ibfk_2` (`dev_team_id`),
  ADD KEY `sales_ibfk_3` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dev`
--
ALTER TABLE `dev`
  MODIFY `dev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dev_team`
--
ALTER TABLE `dev_team`
  MODIFY `dev_team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `product_spec`
--
ALTER TABLE `product_spec`
  MODIFY `spec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dev`
--
ALTER TABLE `dev`
  ADD CONSTRAINT `dev_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `dev_ibfk_2` FOREIGN KEY (`dev_team_id`) REFERENCES `dev_team` (`dev_team_id`);

--
-- Constraints for table `dev_team`
--
ALTER TABLE `dev_team`
  ADD CONSTRAINT `dev_team_ibfk_1` FOREIGN KEY (`team_admin_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`dev_team_id`) REFERENCES `dev_team` (`dev_team_id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`dev_team_id`) REFERENCES `dev_team` (`dev_team_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
