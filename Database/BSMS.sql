-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2023 at 12:04 PM
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
-- Database: `bsms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(4) NOT NULL,
  `a_unm` varchar(30) NOT NULL,
  `a_pwd` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_unm`, `a_pwd`) VALUES
(1, 'NafizHC', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `b_id` int(10) NOT NULL,
  `b_nm` varchar(50) NOT NULL,
  `b_cat` int(10) NOT NULL,
  `b_desc` longtext NOT NULL,
  `b_price` int(4) NOT NULL,
  `b_img` varchar(50) NOT NULL,
  `b_avl` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`b_id`, `b_nm`, `b_cat`, `b_desc`, `b_price`, `b_img`, `b_avl`) VALUES
(1, 'Musicophilia', 1, 'In 2007, neurologist Oliver Sacks released his book Musicophilia: Tales of Music and the Brain in which he explores a range of psychological and physiological ailments and their intriguing connections to music.', 760, 'book_img/Musicophilia.jpg', 45),
(2, 'Alan Turing: The Enigma', 2, 'Alan Turing: The Enigma is a biography of the British mathematician, codebreaker, and early computer scientist, Alan Turing by Andrew Hodges. The book covers Alan Turings life and work.', 670, 'book_img/AlanTuring.jpg', 45),
(3, 'The Lean Startup', 3, 'The Lean Startup: How Todays Entrepreneurs Use Continuous Innovation to Create Radically Successful Businesses is a book by Eric Ries describing his proposed lean startup strategy for startup companies. Eric Ries applies science to entrepreneurship.', 450, 'book_img/TLS.jpg', 45),
(4, 'Spider-man', 4, 'Follows Peter Parker, a.k.a. Spider-Man, as he fights villains including Mysterio and the Green Goblin while protecting his Aunt May and his wife Mary Jane, as illustrated by Todd McFarlane.', 650, 'book_img/SpiderMan.jpg', 45),
(5, 'Oxford English Dictionary', 5, 'The foremost single volume authority on the English language, the Oxford Dictionary of English is at the forefront of language research, focusing on English as it is used today.', 1999, 'book_img/Oxford.jpg', 45),
(6, 'The Lord of the Rings', 6, 'The Lord of the Rings is an epic high-fantasy novel by the English author and scholar J. R. R. Tolkien. Set in Middle-earth, the story began as a sequel to Tolkiens 1937 childrens book The Hobbit, but eventually developed into a much larger work.', 9550, 'book_img/LOTR.jpg', 45),
(7, 'Genghis Khan Making of the Modern World', 7, 'Genghis Khan and the Making of the Modern World is a history book written by Jack Weatherford, Dewitt Wallace Professor of Anthropology at Macalester College. It is a narrative of the rise and influence of Mongol leader Genghis Khan and his successors, and their influence on European civilization.', 730, 'book_img/GKMMW.jpg', 45),
(8, 'To Kill a Mockingbird', 8, 'Set in small-town Alabama, the novel is a bildungsroman, or coming-of-age story, and chronicles the childhood of Scout and Jem Finch as their father Atticus defends a Black man falsely accused of rape. Scout and Jem are mocked by classmates for this. Unfortunately, the man is convicted by an all-white jury.', 470, 'book_img/TKaMB.jpg', 45),
(9, 'Immunohematology and Transfusion Medicine', 9, 'Provides an interactive tool that makes blood banking and transfusion medicine memorable, practical and relevant.', 500, 'book_img/ITM.jpg', 45),
(10, 'Dune', 10, 'It is one of the worlds best-selling science fiction novels. Dune is set in the distant future in a feudal interstellar society in which various noble houses control planetary fiefs. It tells the story of young Paul Atreides, whose family accepts the stewardship of the planet Arrakis.', 700, 'book_img/Dune.jpg', 45),
(12, 'HTML & CSS', 12, 'HTML & CSS: Design and Build Web Sites - A full-color introduction to the basics of HTML and CSS from the publishers of Wrox!  Every day, more and more people want to learn some HTML and CSS.', 600, 'book_img/HTML_CSS.jpg', 45);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) NOT NULL,
  `cat_nm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_nm`) VALUES
(1, 'Arts & Music'),
(2, 'Biographies'),
(3, 'Business'),
(4, 'Comics'),
(5, 'Educational'),
(6, 'Fantasy'),
(7, 'History'),
(8, 'Literature'),
(9, 'Medical'),
(10, 'SciFi'),
(11, 'Sports'),
(12, 'Programming');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `c_id` int(4) NOT NULL,
  `c_fnm` varchar(100) NOT NULL,
  `c_mno` int(10) NOT NULL,
  `c_email` varchar(60) NOT NULL,
  `c_msg` longtext NOT NULL,
  `c_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`c_id`, `c_fnm`, `c_mno`, `c_email`, `c_msg`, `c_time`) VALUES
(14, 'Nafiz Haider Chowdhury', 1779486666, 'nafizhc@oharamail.com', 'Test Case 1', '1696644513');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `o_id` int(11) NOT NULL,
  `o_name` varchar(30) NOT NULL,
  `o_address` varchar(200) NOT NULL,
  `o_pincode` int(20) NOT NULL,
  `o_city` varchar(30) NOT NULL,
  `o_state` varchar(30) NOT NULL,
  `o_mobile` int(20) NOT NULL,
  `o_rid` int(8) NOT NULL,
  `r_id` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`o_id`, `o_name`, `o_address`, `o_pincode`, `o_city`, `o_state`, `o_mobile`, `o_rid`, `r_id`) VALUES
(41, 'Nafiz Haider Chowdhury', 'sdfsdfefafweffwef', 1234, 'DGHJF', 'SDFqe', 1779486666, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `r_id` int(8) NOT NULL,
  `r_fnm` varchar(100) NOT NULL,
  `r_unm` varchar(50) NOT NULL,
  `r_pwd` varchar(30) NOT NULL,
  `r_cno` varchar(10) NOT NULL,
  `r_email` varchar(60) NOT NULL,
  `r_question` varchar(100) NOT NULL,
  `r_answer` varchar(50) NOT NULL,
  `r_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`r_id`, `r_fnm`, `r_unm`, `r_pwd`, `r_cno`, `r_email`, `r_question`, `r_answer`, `r_time`) VALUES
(1, 'Nafiz Haider Chowdhury', 'NafizHC', '12345678', '0177948777', 'nafizhc@oharamail.com', 'What is your Favourite Book?', 'Himu', '1696644398');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `c_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `r_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
