-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2023 at 10:43 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news-site`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(34, 'Sport', 3),
(31, 'Entertainment', 2),
(32, 'Politics', 3),
(33, 'Health', 0),
(36, 'Gamming', 4);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(36, 'First Post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ultrices tempus eros, non porta risus cursus a. Pellentesque tempor justo at lectus faucibus mattis. Vestibulum interdum turpis orci, dapibus gravida lacus egestas id. Nunc quis egestas leo. Morbi eget pretium nulla, elementum placerat lacus. Phasellus fringilla mauris a mi scelerisque pretium. Vivamus lacus nisi, placerat ac mattis pharetra, tristique a urna. Aenean pharetra aliquet lacus, vitae tempor est tempus et. Sed sed nisi eleifend, tempus tortor ut, convallis massa. In mollis nisl a orci fermentum venenatis vel vitae turpis. Vivamus fermentum massa nibh, nec blandit est mattis iaculis.', '34', '19 Jan, 2020', 41, 'sports1.jpg'),
(37, 'Second Post', 'Maecenas turpis sapien, finibus nec augue a, commodo feugiat lectus. Nam feugiat, magna et vulputate varius, ligula dui placerat lorem, eu hendrerit magna mauris ut lectus. Suspendisse mattis diam est, rutrum ullamcorper eros congue sed. Nunc gravida sem nunc, et egestas quam sodales eget. Aliquam convallis varius dapibus. Nam ornare risus in quam condimentum, quis tempor nisi mattis. Cras id metus ut diam aliquet commodo. Curabitur quis sapien vitae massa tincidunt iaculis.', '31', '19 Jan, 2020', 41, 'entertainment1.jpg'),
(38, 'Third Post', 'Sed tincidunt sem vehicula, posuere est at, dapibus erat. Integer nec iaculis magna. Maecenas egestas sed odio sit amet maximus. Morbi viverra nisi euismod, convallis mi vitae, pretium quam. Sed hendrerit purus tortor, et cursus erat convallis eu. Integer quis consectetur arcu. Vivamus rutrum mollis volutpat.', '32', '19 Jan, 2020', 41, 'politics2.jpg'),
(39, 'Fourth Post', 'Pellentesque consectetur, turpis sit amet ullamcorper tristique, est massa consectetur ex, eget dapibus sapien augue eu turpis. Phasellus molestie euismod ultrices. Donec lorem lorem, volutpat vitae tincidunt quis, fringilla eu mauris. Morbi ac ipsum blandit, volutpat quam vitae, efficitur sem. Mauris a nunc nec dolor condimentum congue. Cras iaculis, ex rhoncus laoreet interdum, libero orci euismod risus, ut porta sem arcu ac lorem. Mauris lacinia efficitur ligula sed porta. Nullam a leo non risus ultricies cursus. Mauris scelerisque congue ipsum vel bibendum.', '34', '19 Jan, 2020', 41, 'sports2.jpg'),
(40, 'Fifth Post', 'Cras ullamcorper metus velit, in cursus lorem finibus eu. Pellentesque in risus sed diam pulvinar rhoncus sed in libero. Curabitur orci ipsum, convallis id bibendum sit amet, pretium sit amet massa. Mauris fermentum fermentum diam, et porttitor diam blandit a. Quisque tempor ante ut ligula convallis porta. Nulla nec ante mattis, auctor velit in, efficitur massa. Etiam aliquam massa vel sapien vulputate, ut congue est fringilla. Nunc non eros consequat, venenatis ligula eget, imperdiet risus. Maecenas ultrices purus et dolor pharetra rhoncus. Vestibulum congue augue ultricies leo cursus sollicitudin. Duis sollicitudin semper lectus, et tempus purus. Nam eleifend ante vitae nibh ultricies finibus. Vestibulum sollicitudin odio facilisis ex varius, et accumsan ipsum auctor. Nam non malesuada purus, et vestibulum libero. Phasellus gravida eu mi at vulputate.', '32', '19 Jan, 2020', 41, 'politics1.jpg'),
(41, 'New Salman Post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris feugiat mattis nisi tristique feugiat. Integer dictum vitae massa eu pulvinar. Aenean euismod sagittis diam in mattis. Pellentesque massa magna, imperdiet a ante non, vulputate blandit neque. Ut eu ipsum dui. Mauris imperdiet eros ac arcu egestas volutpat. Aenean nec urna feugiat, varius elit ut, bibendum velit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus placerat sodales felis at interdum. Duis dui lorem, luctus nec faucibus ut, sagittis a tortor.', '32', '21 Jan, 2020', 41, 'business.jpg'),
(42, 'Testing Recent Post ', '                     Suspendisse sed ultrices tortor. In imperdiet sem fringilla, ultricies nunc non, condimentum nunc. Praesent ac sollicitudin enim, commodo pellentesque nunc. Integer bibendum sollicitudin augue in sagittis. Proin scelerisque lacus maximus mauris ornare semper. Aliquam mi ante, euismod vitae ligula quis, fermentum tincidunt arcu. Etiam elementum sed nisi et scelerisque. Integer aliquet venenatis aliquam. Proin tempor dui sed dui pulvinar facilisis. Etiam imperdiet molestie iaculis.                ', '31', '21 Jan, 2020', 41, 'entertainment2.jpg'),
(43, 'Business', '                                                               fnasnjkfa vfvafdvikae vv\r\nbjkldvbjkev\r\nvjkvb gdbg\r\nbejlkg lkgfb\r\ngd                                                ', '31', '26 Jun, 2023', 40, '1687763466-business.jpg'),
(44, 'Sport', 'fkmsalfnlkasnklvga\r\n[va;kan;laern;kvgner;lrvglka vjadf  fj kvaedv\r\nv\r\ndv\r\nfd\r\nvfdvvefdverdv', '34', '26 Jun, 2023', 40, '1687763159-Sport.jpg'),
(45, 'GTA', 'Grand Theft Auto is a series of action-adventure games created by David Jones and Mike Dailly.[2] Later titles were developed under the oversight of brothers Dan and Sam Houser, Leslie Benzies and Aaron Garbut. It is primarily developed by British development house Rockstar North (formerly DMA Design), and published by its American parent company, Rockstar Games. The name of the series references the term \"grand theft auto\", used in the United States for motor vehicle theft.\r\n\r\nGameplay focuses on an open world where the player can complete missions to progress an overall story, as well as engage in various side activities. Most of the gameplay revolves around driving and shooting, with occasional role-playing and stealth elements. The series also has elements of the earlier beat \'em up games from the 16-bit era. The games in the Grand Theft Auto series are set in fictional locales modelled after real-life cities, at various points in time from the early 1960s to the 2010s. The original game\'s map encompassed three cities—Liberty City (based on New York City), San Andreas (based on San Francisco),[a] and Vice City (based on Miami)—but later titles tend to focus on a single setting; usually one of the original three locales, albeit remodelled and significantly expanded. The series centres on different protagonists who attempt to rise through the ranks of the criminal underworld, although their motives for doing so vary in each title. The antagonists are commonly characters who have betrayed the protagonist or their organisation, or characters who have the most impact impeding the protagonist\'s progress. Several film and music veterans have voiced characters in the games, including Ray Liotta, Dennis Hopper, Samuel L. Jackson, William Fichtner, James Woods, Debbie Harry, Axl Rose and Peter Fonda.[3]\r\n\r\nDMA Design began the series in 1997, with the release of the Grand Theft Auto. As of 2020, the series consists of seven standalone titles and four expansion packs. The third main title, Grand Theft Auto III, released in 2001, is considered a landmark game, as it brought the series to a three-dimensional (3D) setting and more immersive experience. Subsequent titles have followed and built upon the concept established in Grand Theft Auto III, and received significant acclaim. They have influenced other open-world action games, and led to the label Grand Theft Auto clone on similar titles.', '36', '26 Jun, 2023', 40, '1687764373-Gta.jpg'),
(46, 'Hitman 47', 'Hitman: Codename 47 is a stealth video game developed by IO Interactive and published by Eidos Interactive for Microsoft Windows in November 2000. In the game, players control Agent 47, a genetically enhanced human clone who is rigorously trained in methods of murder. Upon escaping from his testing facility, 47 is hired by the International Contract Agency (ICA), a global contract killing organisation. His missions take him to locations in Asia, Europe, and South America to assassinate wealthy and decadent criminals, who at first seem to share no connections with each other, but are soon revealed to have all played a role in a larger conspiracy. The gameplay revolves around finding ways to stealthily reach and eliminate each target; to this end, players can make use of various tools, including disguises and suppressed weaponry. However, some levels are more action-focused and do not feature stealth as a possibility, instead playing like a traditional third-person shooter.\r\n\r\n  Codename 47 received mixed reviews from critics, who praised the unique approach to stealth gameplay, considered revolutionary at the time, but criticized its difficulty and controls. It sold over 500,000 units by 2009.[2] The game went on to launch the Hitman video game franchise, beginning with the first sequel, Hitman 2: Silent Assassin, in 2002.', '36', '26 Jun, 2023', 40, '1687764471-Hitman 47.jpg'),
(47, 'Hitman Absolution', 'Hitman: Absolution is a 2012 stealth video game developed by IO Interactive and published by Square Enix\'s European branch.[3] It is the fifth installment in the Hitman series and the sequel to 2006\'s Hitman: Blood Money. Before release, the developers stated that Absolution would be easier to play and more accessible, while still retaining hardcore aspects of the franchise.[4] The game was released on 20 November 2012 for Windows, PlayStation 3, and Xbox 360.[5] On 15 May 2014, Hitman: Absolution – Elite Edition was released for OS X by Feral Interactive;[6] it contains all previously released downloadable content, including Hitman: Sniper Challenge, a \"making of\" documentary, and a 72-page artbook.[6] On 11 January 2019, Warner Bros. Interactive Entertainment released enhanced versions of Absolution and Blood Money for the PlayStation 4 and Xbox One as part of the Hitman HD Enhanced Collection.\r\n\r\nAbsolution\'s single-player campaign follows genetically engineered contract killer Agent 47 and his efforts to protect a similarly genetically enhanced teenage girl from various parties who wish to use her potential as an assassin for their own ends, including a private military company, several criminal syndicates, and 47\'s own former employers, the International Contract Agency (ICA). For the first time in the series, the game featured an online component called \"Contracts\", which allowed players to create their own custom objectives for any of the missions in the base game and share them with others.', '36', '26 Jun, 2023', 40, '1687764547-Hitman Absolution.jpg'),
(48, 'Hitman 3', 'Hitman 3 is a 2021 stealth game developed and published by IO Interactive. It is the eighth main installment in the Hitman video game series, the sequel to 2018\'s Hitman 2, and the third and final entry in the World of Assassination trilogy. Concluding the story arc started in 2016\'s Hitman, the game follows genetically-engineered assassin Agent 47 and his allies as they hunt down the leaders of the secretive organization Providence, which controls global affairs and was partially responsible for 47\'s creation and upbringing.\r\n\r\nThe game is presented from a third-person perspective, with a focus on interactive elements in 47\'s environment. Like its two predecessors, the game is structured around six levels, five of which are large sandbox locations that players can freely explore to find opportunities to eliminate their targets. Each mission also presents challenges that players can complete to unlock new items.\r\n\r\nHitman 3, the first game to be self-published by IO Interactive after becoming an independent studio, was released worldwide for PlayStation 4, PlayStation 5, Windows, Xbox One, Xbox Series X/S, Stadia, and Nintendo Switch (via cloud gaming) on 20 January 2021. It received positive reviews, with praise for its level design and atmosphere, stealth mechanics, and 47\'s abilities. Some critics called it the best entry in the series and it has been cited as one of the greatest stealth games of all time. The game won various awards including \"PC Game of the Year\" at the 2021 Golden Joystick Awards. Hitman 3 was also the most commercially successful game in the series, and was extensively supported by IO with several releases of downloadable content and free updates that added new features, game modes, and a new location.\r\n\r\nIn 2023, IO rebranded Hitman 3 as Hitman: World of Assassination, which was previously used in the Stadia version. This rebranding included the previous two Hitman games becoming available to Hitman 3 owners, free of charge, along with a new game mode called \"Freelancer\".[1]', '36', '26 Jun, 2023', 40, '1687764656-Hitman 3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `websitename` varchar(60) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `footerdesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `websitename`, `logo`, `footerdesc`) VALUES
(1, 'DP News', 'news.jpg', '© Copyright 2023 News | Powered by <a href=\"https://github.com/dhruvil-patel009\">DP News</a>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(31, 'Anil ', 'Kapoor', 'anil', '71b9b5bc1094ee6eaeae8253e787d654', 0),
(39, 'Dhruvil', 'Patel', 'Dhruvil', '123456789', 1),
(40, 'Dhruvil', 'Patel', 'Dhruvil123', 'e4ffa6507533c88f00e7e4722024637d', 1),
(41, 'Admin', 'a', 'Admin', '0e7517141fb53f21ee439b355b5a1d0a', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
