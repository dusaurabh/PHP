-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2018 at 08:02 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_panel`
--

CREATE TABLE IF NOT EXISTS `admin_panel` (
`id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `post` varchar(10000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_panel`
--

INSERT INTO `admin_panel` (`id`, `datetime`, `title`, `category`, `author`, `image`, `post`) VALUES
(15, 'May-01-2018 22:59:34', 'PHP logo', 'PHP', 'Saurabh Dubey', 'php.png', 'The first version, by Steve Wainstead, was in December 1999 and was the first Wiki written in PHP to be publicly released. The first version ran under PHP 3.x and ran on DBM files only. It was a feature-for-feature reimplementation of the original WikiWikiWeb at c2.com.[citation needed]\r\n\r\nIn early 2000 Arno Hollosi contributed a second database library to run PhpWiki on MySQL.[citation needed] From then on the features and contributions started to grow, including a templating system, color diffs, rewrites of the rendering engine and much more. Arno was interested in running a wiki for the game Go.\r\n\r\nJeff Dairiki was the next major contributor, and soon headed the project for the next few years, then Reini Urban up to 1.4, and then Marc-Etienne Vargenau since 1.5.\r\n\r\nSupports Wikicreole 1.0 including additions and MediaWiki markup syntax since Version 1.4.0. With Version 1.5.0 PHP 4 was deprecated.'),
(16, 'May-01-2018 23:02:36', 'HTML5 project', 'HTML5', 'Saurabh Dubey', 'html5.png', 'It was published in October 2014 by the World Wide Web Consortium (W3C)to improve the language with support for the latest multimedia, while keeping it both easily readable by humans and consistently understood by computers and devices such as web browsers, parsers, etc. HTML5 is intended to subsume not only HTML 4, but also XHTML 1 and DOM Level 2 HTML.\r\n\r\nHTML5 includes detailed processing models to encourage more interoperable implementations; it extends, improves and rationalizes the markup available for documents, and introduces markup and application programming interfaces (APIs) for complex web applications. For the same reasons, HTML5 is also a candidate for cross-platform mobile applications, because it includes features designed with low-powered devices in mind.\r\n\r\nMany new syntactic features are included. To natively include and handle multimedia and graphical content, the new <video>, <audio> and <canvas> elements were added, and support for scalable vector graphics (SVG) content and MathML for mathematical formulas. To enrich the semantic content of documents, new page structure elements such as <main>, <section>, <article>, <header>, <footer>, <aside>, <nav> and <figure>, are added. New attributes are introduced, some elements and attributes have been removed, and others such as <a>, <cite> and <menu> have been changed, redefined or standardized.\r\n\r\nThe APIs and Document Object Model (DOM) are now fundamental parts of the HTML5 specification and HTML5 also better defines the processing for any invalid documents.[7]'),
(17, 'May-01-2018 23:04:33', 'CSS3 logo', 'CSS3', 'Saurabh Dubey', 'css3.png', 'Cascading Style Sheets (CSS) is a style sheet language used for describing the presentation of a document written in a markup language like HTML. CSS is a cornerstone technology of the World Wide Web, alongside HTML and JavaScript.\r\n\r\nCSS is designed to enable the separation of presentation and content, including layout, colors, and fonts. This separation can improve content accessibility, provide more flexibility and control in the specification of presentation characteristics, enable multiple web pages to share formatting by specifying the relevant CSS in a separate .css file, and reduce complexity and repetition in the structural content.\r\n\r\nSeparation of formatting and content also makes it feasible to present the same markup page in different styles for different rendering methods, such as on-screen, in print, by voice (via speech-based browser or screen reader), and on Braille-based tactile devices. CSS also has rules for alternate formatting if the content is accessed on a mobile device.[4]\r\n\r\nThe name cascading comes from the specified priority scheme to determine which style rule applies if more than one rule matches a particular element. This cascading priority scheme is predictable.\r\n\r\nThe CSS specifications are maintained by the World Wide Web Consortium (W3C). Internet media type (MIME type) text/css is registered for use with CSS by RFC 2318 (March 1998). The W3C operates a free CSS validation service for CSS documents.\r\n\r\nIn addition to HTML, other markup languages support the use of CSS, including XHTML, plain XML, SVG, and XUL.'),
(18, 'May-03-2018 10:42:39', 'Java Logo', 'Java', 'Saurabh Dubey', 'java.png', 'Java is a set of computer software and specifications developed by Sun Microsystems, which was later acquired by the Oracle Corporation, that provides a system for developing application software and deploying it in a cross-platform computing environment. Java is used in a wide variety of computing platforms from embedded devices and mobile phones to enterprise servers and supercomputers. Java applets, which are less common than standalone Java applications, were commonly run in secure, sandboxed environments to provide many features of native applications through being embedded in HTML pages. It''s still possible to run Java in web browsers after most of them having dropped support for Java''s VM.\r\n\r\nWriting in the Java programming language is the primary way to produce code that will be deployed as byte code in a Java virtual machine (JVM); byte code compilers are also available for other languages, including Ada, JavaScript, Python, and Ruby. In addition, several languages have been designed to run natively on the JVM, including Scala, Clojure and Apache Groovy. Java syntax borrows heavily from C and C++, but object-oriented features are modeled after Smalltalk and Objective-C.[10] Java eschews certain low-level constructs such as pointers and has a very simple memory model where objects are allocated on the heap (while some implementations e.g. all currently supported by Oracle, may use escape analysis optimization to allocating on the stack instead) and all variables of object types are references. Memory management is handled through integrated automatic garbage collection performed by the JVM.\r\n\r\nOn November 13, 2006, Sun Microsystems made the bulk of its implementation of Java available under the GNU General Public License (GPL).\r\n\r\nThe current and only long-term-support (LTS) version is Java 8, and Java 10 the only rapid release version supported. Oracle recommended that Java SE 9 users upgrade to Java SE 9.0.4, that was the final security update in March 2018, and since then Java 9 is no longer supported, so Oracle advices its users to "immediately transition" to Java 10. Oracle (and others) has announced that using older (than Java 8) versions of their JVM implementation presents serious risks, due to unresolved security issues.'),
(19, 'May-03-2018 16:43:46', 'Teacher', 'Teaching', 'Saurabh Dubey', 'img-1.jpg', 'High School Teacher              '),
(44, 'May-14-2018 17:18:05', 'Testing-23', 'Testing', 'saurabh', 'pexels-1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora provident dolore, ex veritatis necessitatibus similique explicabo porro quo quibusdam rerum. Repellendus quisquam tempora quis quia quo autem consequatur nobis labore inventore. Rem, laudantium! Sequi reiciendis a corporis voluptate delectus ea quo architecto deleniti, cum explicabo, dignissimos perspiciatis maiores at qui!'),
(45, 'May-14-2018 17:18:18', 'Testing-24', 'Testing', 'saurabh', 'pexels-2.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora provident dolore, ex veritatis necessitatibus similique explicabo porro quo quibusdam rerum. Repellendus quisquam tempora quis quia quo autem consequatur nobis labore inventore. Rem, laudantium! Sequi reiciendis a corporis voluptate delectus ea quo architecto deleniti, cum explicabo, dignissimos perspiciatis maiores at qui!'),
(46, 'May-14-2018 17:18:30', 'Testing-25', 'Testing', 'saurabh', 'pexels-3.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora provident dolore, ex veritatis necessitatibus similique explicabo porro quo quibusdam rerum. Repellendus quisquam tempora quis quia quo autem consequatur nobis labore inventore. Rem, laudantium! Sequi reiciendis a corporis voluptate delectus ea quo architecto deleniti, cum explicabo, dignissimos perspiciatis maiores at qui!'),
(47, 'May-14-2018 17:18:44', 'Testing-26', 'Testing', 'saurabh', 'pexels-4.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora provident dolore, ex veritatis necessitatibus similique explicabo porro quo quibusdam rerum. Repellendus quisquam tempora quis quia quo autem consequatur nobis labore inventore. Rem, laudantium! Sequi reiciendis a corporis voluptate delectus ea quo architecto deleniti, cum explicabo, dignissimos perspiciatis maiores at qui!'),
(48, 'May-14-2018 17:18:56', 'Testing-27', 'Testing', 'saurabh', 'pexels-5.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora provident dolore, ex veritatis necessitatibus similique explicabo porro quo quibusdam rerum. Repellendus quisquam tempora quis quia quo autem consequatur nobis labore inventore. Rem, laudantium! Sequi reiciendis a corporis voluptate delectus ea quo architecto deleniti, cum explicabo, dignissimos perspiciatis maiores at qui!'),
(49, 'May-14-2018 17:19:22', 'Testing-28', 'Testing', 'saurabh', 'author-1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora provident dolore, ex veritatis necessitatibus similique explicabo porro quo quibusdam rerum. Repellendus quisquam tempora quis quia quo autem consequatur nobis labore inventore. Rem, laudantium! Sequi reiciendis a corporis voluptate delectus ea quo architecto deleniti, cum explicabo, dignissimos perspiciatis maiores at qui!'),
(50, 'May-14-2018 17:19:37', 'Testing-29', 'Testing', 'saurabh', 'author-2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora provident dolore, ex veritatis necessitatibus similique explicabo porro quo quibusdam rerum. Repellendus quisquam tempora quis quia quo autem consequatur nobis labore inventore. Rem, laudantium! Sequi reiciendis a corporis voluptate delectus ea quo architecto deleniti, cum explicabo, dignissimos perspiciatis maiores at qui!'),
(51, 'May-14-2018 17:19:55', 'Testing-30', 'Testing', 'saurabh', 'author-3.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora provident dolore, ex veritatis necessitatibus similique explicabo porro quo quibusdam rerum. Repellendus quisquam tempora quis quia quo autem consequatur nobis labore inventore. Rem, laudantium! Sequi reiciendis a corporis voluptate delectus ea quo architecto deleniti, cum explicabo, dignissimos perspiciatis maiores at qui!'),
(52, 'May-18-2018 22:36:56', 'For Checking', 'Checking', 'Saurabh Dubey', 'mountain.jpg', '               This is First sentence.\r\nThis is Second Sentence.This is Second Sentence.This is Second Sentence.This is Second Sentence.\r\nThis is Second Sentence.This is Second Sentence.This is Second Sentence.This is Second Sentence.\r\nThis is Second Sentence.This is Second Sentence.This is Second Sentence.This is Second Sentence.    \r\n<ul>\r\n<li><h1>Saurabh</h1></li>  \r\n<li><h2>Dubey</h2> </li>\r\n<li><h3>Don</h3> </li>\r\n<li><h4>Marvel</h4> </li>\r\n<li><h5>Iron Man</h5></li>  \r\n</ul> \r\n<img class="img-responsive"  src="images/php.png">              ');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `creatorname` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `approveby` varchar(200) NOT NULL,
  `status` varchar(5) NOT NULL,
  `admin_panel_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
`id` int(11) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `addedby` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `datetime`, `username`, `password`, `addedby`) VALUES
(6, 'May-12-2018 13:11:11', 'saurabh', 'saurabhdubey', 'Saurabh Dubey');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_panel`
--
ALTER TABLE `admin_panel`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`), ADD KEY `admin_panel_id` (`admin_panel_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_panel`
--
ALTER TABLE `admin_panel`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `Foreign Key to admin_panel table` FOREIGN KEY (`admin_panel_id`) REFERENCES `admin_panel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
