# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.6.28)
# Database: movies
# Generation Time: 2017-01-21 22:33:24 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table films
# ------------------------------------------------------------

DROP TABLE IF EXISTS `films`;

CREATE TABLE `films` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `synopsis` varchar(1000) NOT NULL,
  `director` varchar(100) NOT NULL,
  `stars` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `films` WRITE;
/*!40000 ALTER TABLE `films` DISABLE KEYS */;

INSERT INTO `films` (`id`, `title`, `synopsis`, `director`, `stars`)
VALUES
	(1,'The Godfather','When the aging head of a famous crime family decides to transfer his position to one of his subalterns, a series of unfortunate events start happening to the family, and a war begins between all the well-known families leading to insolence, deportation, murder and revenge, and ends with the favorable successor being finally chosen.','Francis Ford Coppola','Marlon Brando, Al Pacino, James Caan'),
	(2,'Goodfellas','Henry Hill might be a small time gangster, who may have taken part in a robbery with Jimmy Conway and Tommy De Vito, two other gangsters who might have set their sights a bit higher. His two partners could kill off everyone else involved in the robbery, and slowly start to think about climbing up through the hierarchy of the Mob. Henry, however, might be badly affected by his partners\' success, but will he consider stooping low enough to bring about the downfall of Jimmy and Tommy?','Martin Scorsese','Robert De Niro, Ray Liotta, Joe Pesci'),
	(3,'Pulp Fiction','Jules Winnfield (Samuel L. Jackson) and Vincent Vega (John Travolta) are two hit men who are out to retrieve a suitcase stolen from their employer, mob boss Marsellus Wallace (Ving Rhames). Wallace has also asked Vincent to take his wife Mia (Uma Thurman) out a few days later when Wallace himself will be out of town. Butch Coolidge (Bruce Willis) is an aging boxer who is paid by Wallace to lose his weight. The lives of these seemingly unrelated people are woven together comprising of a series of funny, bizarre and uncalled-for incidents.','Quentin Tarantino','John Travolta, Uma Thurman, Samuel L. Jackson, Bruce Willis'),
	(4,'Back to the Future','Marty McFly, a typical American teenager of the Eighties, is accidentally sent back to 1955 in a plutonium-powered DeLorean \"time machine\" invented by a slightly mad scientist. During his often hysterical, always amazing trip back in time, Marty must make certain his teenage parents-to-be meet and fall in love - so he can get back to the future.','Robert Zemeckis',' Michael J. Fox, Christopher Lloyd, Lea Thompson'),
	(5,'Scarface','Tony Montana manages to leave Cuba during the Mariel exodus of 1980. He finds himself in a Florida refugee camp but his friend Manny has a way out for them: undertake a contract killing and arrangements will be made to get a green card. He\'s soon working for drug dealer Frank Lopez and shows his mettle when a deal with Colombian drug dealers goes bad. He also brings a new level of violence to Miami. Tony is protective of his younger sister but his mother knows what he does for a living and disowns him. Tony is impatient and wants it all however, including Frank\'s empire and his mistress Elvira Hancock. Once at the top however, Tony\'s outrageous actions make him a target and everything comes crumbling down.','Brian De Palma','Al Pacino, Michelle Pfeiffer, Steven Bauer'),
	(6,'Inglourious Basterds','In German-occupied France, young Jewish refugee Shosanna Dreyfus witnesses the slaughter of her family by Colonel Hans Landa. Narrowly escaping with her life, she plots her revenge several years later when German war hero Fredrick Zoller takes a rapid interest in her and arranges an illustrious movie premiere at the theater she now runs. With the promise of every major Nazi officer in attendance, the event catches the attention of the \"Basterds\", a group of Jewish-American guerrilla soldiers led by the ruthless Lt. Aldo Raine. As the relentless executioners advance and the conspiring young girl\'s plans are set in motion, their paths will cross for a fateful evening that will shake the very annals of history.','Quentin Tarantino','Brad Pitt, Diane Kruger, Eli Roth'),
	(7,'Jurassic Park','Huge advancements in scientific technology have enabled a mogul to create an island full of living dinosaurs. John Hammond has invited four individuals, along with his two grandchildren, to join him at Jurassic Park. But will everything go according to plan? A park employee attempts to steal dinosaur embryos, critical security systems are shut down and it now becomes a race for survival with dinosaurs roaming freely over the island.','Steven Spielberg','Sam Neill, Laura Dern, Jeff Goldblum'),
	(8,'Forrest Gump','Forrest Gump is a simple man with a low I.Q. but good intentions. He is running through childhood with his best and only friend Jenny. His \'mama\' teaches him the ways of life and leaves him to choose his destiny. Forrest joins the army for service in Vietnam, finding new friends called Dan and Bubba, he wins medals, creates a famous shrimp fishing fleet, inspires people to jog, starts a ping-pong craze, creates the smiley, writes bumper stickers and songs, donates to people and meets the president several times. However, this is all irrelevant to Forrest who can only think of his childhood sweetheart Jenny Curran, who has messed up her life. Although in the end all he wants to prove is that anyone can love anyone.','Robert Zemeckis','Tom Hanks, Robin Wright, Gary Sinise'),
	(9,'The Pianist','In this adaptation of the autobiography \"The Pianist: The Extraordinary True Story of One Man\'s Survival in Warsaw, 1939-1945,\" Wladyslaw Szpilman, a Polish Jewish radio station pianist, sees Warsaw change gradually as World War II begins. Szpilman is forced into the Warsaw Ghetto, but is later separated from his family during Operation Reinhard. From this time until the concentration camp prisoners are released, Szpilman hides in various locations among the ruins of Warsaw.','Roman Polanski','Adrien Brody, Thomas Kretschmann, Frank Finlay'),
	(10,'The Wolf of Wall Street','Jordan Belfort is a Long Island penny stockbroker who served 22 months in prison for defrauding investors in a massive 1990s securities scam that involved widespread corruption on Wall Street and in the corporate banking world, including shoe designer Steve Madden.','Martin Scorsese','Leonardo DiCaprio, Jonah Hill, Margot Robbie');

/*!40000 ALTER TABLE `films` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
