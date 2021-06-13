/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.14-MariaDB : Database - db_reminder
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `ci_sessions` */

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ci_sessions` */

insert  into `ci_sessions`(`id`,`ip_address`,`timestamp`,`data`) values 
('eq0pcrm3k869p3o2kb8r1mqbmlf8cbkl','::1',1603954259,'__ci_last_regenerate|i:1603953962;username|s:5:\"admin\";is_login|b:1;nama_lengkap|N;level|s:5:\"Admin\";id_user|s:1:\"1\";'),
('srompg3r8tj8h8m4jv4jls5dlgqg16tr','::1',1603954563,'__ci_last_regenerate|i:1603954326;username|s:5:\"admin\";is_login|b:1;nama_lengkap|N;level|s:5:\"Admin\";id_user|s:1:\"1\";'),
('oe7cnt5un3rgu0j1khjbve906o6fpoa4','::1',1603954927,'__ci_last_regenerate|i:1603954650;username|s:5:\"admin\";is_login|b:1;nama_lengkap|N;level|s:5:\"Admin\";id_user|s:1:\"1\";'),
('g3lsicl5hvhdot7bddtsaice5b4rlc39','::1',1603955056,'__ci_last_regenerate|i:1603954995;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_user|s:1:\"1\";'),
('4vqortkitnj5hnkvoin3dfs3um929t72','::1',1603955859,'__ci_last_regenerate|i:1603955638;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_user|s:1:\"1\";'),
('ujckkub3gpeucihu4igf643n6c9rrqtu','::1',1604008414,'__ci_last_regenerate|i:1604008117;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_user|s:1:\"1\";'),
('cghlli04i4gmshfjgn4jdvn2u2vgv22n','::1',1604008446,'__ci_last_regenerate|i:1604008444;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_user|s:1:\"1\";'),
('283shrgmi42gckgrqa7q0q6isgeoson1','::1',1604009076,'__ci_last_regenerate|i:1604008748;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_user|s:1:\"1\";'),
('rs8qj6hijrdaq505b94e8ca4d6f4gb70','::1',1604009374,'__ci_last_regenerate|i:1604009076;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_user|s:1:\"1\";'),
('ujh8s2p9nvdslt0dbqj8lrorh7dtrtv7','::1',1604009647,'__ci_last_regenerate|i:1604009390;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_user|s:1:\"1\";'),
('3hkiiaig23jqb0utfg5aha6bb98q791l','::1',1604009992,'__ci_last_regenerate|i:1604009728;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_user|s:1:\"1\";'),
('2naj2316sd3rokfn5bsi5uhh602lhjc8','::1',1604010274,'__ci_last_regenerate|i:1604010044;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_user|s:1:\"1\";'),
('0brfd4v1f0dgsqeme8cuvl4miq12902h','::1',1604010618,'__ci_last_regenerate|i:1604010349;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_user|s:1:\"1\";'),
('vvcq9raj70gbruulf16l9rb95lhekkr0','::1',1604011078,'__ci_last_regenerate|i:1604010778;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_user|s:1:\"1\";'),
('bntq7e2ojai0ak25m0235vcetqdga2vt','::1',1604011072,'__ci_last_regenerate|i:1604011072;'),
('ord682ll3pbu1pt2v29bq6e3158d6srp','::1',1604011072,'__ci_last_regenerate|i:1604011072;'),
('fliv0if5op1odtnka57a2vi9gfvo5oh8','::1',1604011080,'__ci_last_regenerate|i:1604011080;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_user|s:1:\"1\";'),
('uic3loj09q7kvit73mbvin6tqtkgd3oa','::1',1604011203,'__ci_last_regenerate|i:1604011080;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_user|s:1:\"1\";'),
('5osfko062njhpeaqurlu4r5uj2vqklbl','::1',1604011690,'__ci_last_regenerate|i:1604011409;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_user|s:1:\"1\";'),
('hlnprpe6q6i13449qjhr9ec7jb5ofkok','::1',1604012024,'__ci_last_regenerate|i:1604011986;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_user|s:1:\"1\";'),
('g55s6fcm1e4lehu2s504tiugpdpihoj6','::1',1604012711,'__ci_last_regenerate|i:1604012396;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_user|s:1:\"1\";'),
('m3t0gkf0beditrllu4a4bmtvtmdrat99','::1',1604013106,'__ci_last_regenerate|i:1604012717;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_user|s:1:\"1\";'),
('dsn9pr2cvjhhcffdilkmq675inlkq6hg','::1',1604013296,'__ci_last_regenerate|i:1604013117;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_user|s:1:\"1\";'),
('do776jm56ub18sndju5du84meg2goqch','::1',1604013864,'__ci_last_regenerate|i:1604013598;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_user|s:1:\"1\";'),
('qe8h783ghdg1ac64fab9moosi2vp8ic1','::1',1604021522,'__ci_last_regenerate|i:1604021256;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('qg6dd86tvnvj7ao1gliuqoe9qo1l9se0','::1',1604021924,'__ci_last_regenerate|i:1604021687;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('04v2alu4iab8b1p300vvhh11lppv1bqh','::1',1604022302,'__ci_last_regenerate|i:1604022010;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('934nn0isj3v2f21s3ur8gru7j423v8j8','::1',1604022441,'__ci_last_regenerate|i:1604022341;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('ikp2f2a2ihc1ri2t9m7kf3ni02ic59t7','::1',1604023327,'__ci_last_regenerate|i:1604023054;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('al33pnpk1asc4d12ncd7cve3b3tpif62','::1',1604025945,'__ci_last_regenerate|i:1604023397;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('abje2tt3f2nkjtut78vonuk7s9pno70o','::1',1604026057,'__ci_last_regenerate|i:1604025948;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('iaq93acivjfhefc53kftvce2fhgorb8t','::1',1604026683,'__ci_last_regenerate|i:1604026393;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('pfmmkhkj31tsk9m4nb6csm57padib8md','::1',1604026899,'__ci_last_regenerate|i:1604026695;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('eooejrvupcfbk06ids099hu9kq3r3at3','::1',1604027445,'__ci_last_regenerate|i:1604027168;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('gtf2r5rb5187hjpvil53g8i7a98403q1','::1',1604027818,'__ci_last_regenerate|i:1604027520;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('dhoa5ihoubkg1vp8vet5r0flno3manuj','::1',1604028109,'__ci_last_regenerate|i:1604027849;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('tlpmg9v8ekksgama40pmu2q9ss92qmsa','::1',1604096321,'__ci_last_regenerate|i:1604096006;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('sjuclsiab43q9s7c5l1i1inpet3iah8a','::1',1604096479,'__ci_last_regenerate|i:1604096334;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('ddci0m73t26ft5nh3umemmmqdpvmtoa9','::1',1604097563,'__ci_last_regenerate|i:1604097527;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('qud7o764dpnt86vcp7raon3tgl2b1tu8','::1',1604436648,'__ci_last_regenerate|i:1604436634;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('oa32qvjv9hp9briuv8m29mtsavvpac5e','::1',1604437441,'__ci_last_regenerate|i:1604437141;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('ua63daus0augus6u3ntd8r57rco87k9t','::1',1604437454,'__ci_last_regenerate|i:1604437444;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('b6nh157ih1rjtd0opfvg0svb0hvq9e09','::1',1604438178,'__ci_last_regenerate|i:1604438039;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('hut50rnmooc00anuc5tejbcqutj9npn3','::1',1604439083,'__ci_last_regenerate|i:1604438792;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('i2smassmkbm6d9poij22t0r5mpl2vdr1','::1',1604439200,'__ci_last_regenerate|i:1604439093;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('82luteobaa2tvmdqej5rk08b8sal5vvf','::1',1604439840,'__ci_last_regenerate|i:1604439548;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('bslplhts9valiui7pgh7q6ipu4j5i3dr','::1',1604440024,'__ci_last_regenerate|i:1604439851;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('5992e3h41bd44lcfo2rkvt834q3psrkc','::1',1604440389,'__ci_last_regenerate|i:1604440169;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('st6n1l7h5hkt4qadgrujro9r5rebo744','::1',1604440507,'__ci_last_regenerate|i:1604440506;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('gnlh7m2id4iqdhjqar065k6traihbc76','::1',1604442486,'__ci_last_regenerate|i:1604442263;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('3mff610clsqmjcuctnbjvp9sra96hmm9','::1',1604442615,'__ci_last_regenerate|i:1604442611;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('u4jehn4b104a95vf7usj9vmpfov4bocv','::1',1604444254,'__ci_last_regenerate|i:1604444099;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('g9fuovdsguvqs6al4a09s591ccno22g2','::1',1616309280,'__ci_last_regenerate|i:1616309280;'),
('1hm2lsei90lm21m5grnfu01trnn27cii','::1',1618913670,'__ci_last_regenerate|i:1618913670;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('c2ddea2os39oipuveb5gptmog40iuihk','::1',1618914934,'__ci_last_regenerate|i:1618914934;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('lvg59mhe5fbikbkir699cb3mkdsjmfbt','::1',1618916704,'__ci_last_regenerate|i:1618916704;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('rt3bup2crr39g9t33ib2m8rh21gokv1b','::1',1618917195,'__ci_last_regenerate|i:1618917195;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('flgd049moe9okmjfemv2rv90uavku3ot','::1',1618917642,'__ci_last_regenerate|i:1618917642;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('p2d165pqbjr8ikjvgvkm482okt4gjvou','::1',1618921175,'__ci_last_regenerate|i:1618921175;'),
('vs690r510p6v4sog75d2nprscc21d0ob','::1',1618921546,'__ci_last_regenerate|i:1618921546;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('huigg5q5umfudvf1ho3q4jp1es7pj9tn','::1',1618922256,'__ci_last_regenerate|i:1618922256;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('esaceirdcgo9t9v6fvu8df1u2soqmtpu','::1',1618922992,'__ci_last_regenerate|i:1618922992;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('ijgr4hnbse93r573mminu1iaootml7ia','::1',1618923322,'__ci_last_regenerate|i:1618923322;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('7oniagb9gcusjme6q2bjpgld16067rfh','::1',1618923841,'__ci_last_regenerate|i:1618923841;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('htmlvh9u93qq22ajj3si0ls2qn23vjej','::1',1618924163,'__ci_last_regenerate|i:1618924163;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('o2brh2lkgi8cce6fo93og4js51nb8dqv','::1',1618924502,'__ci_last_regenerate|i:1618924502;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('cm6s3ak8kljodqul1o2q6av91jgusfb5','::1',1618925186,'__ci_last_regenerate|i:1618925186;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('m5vhak92ro4uf4v85p4s392icep6oapv','::1',1618925774,'__ci_last_regenerate|i:1618925774;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('1oc14eqfk24dip4cvoun6uqu4su0kaka','::1',1618926281,'__ci_last_regenerate|i:1618926281;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('oa39ilkpu2hfoq0o3t1410n6c8dsggj6','::1',1618926696,'__ci_last_regenerate|i:1618926696;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('31b45v3f3uld19qaejusdmg48fuhso22','::1',1618927333,'__ci_last_regenerate|i:1618927333;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('mr85b4aqg1ooca2vfbfmohmh3l63996d','::1',1618928262,'__ci_last_regenerate|i:1618928262;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('k8lqnjbpt2uqfrvjrkc65f611odteo5t','::1',1618928897,'__ci_last_regenerate|i:1618928897;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('6kca21rdv24fahb42k9g0e4sngs97c31','::1',1618929088,'__ci_last_regenerate|i:1618928897;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('25a0tglr5dsbi2po50h7at6pb0492vdv','::1',1619002477,'__ci_last_regenerate|i:1619002477;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('6918qcg58gr0aran1tnlfkjjk13tushc','::1',1619003272,'__ci_last_regenerate|i:1619003272;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('780pd982qenhqdjb76fhk9hgai69gn4n','::1',1619003613,'__ci_last_regenerate|i:1619003613;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('74s7a6gp1c8c3gsv24afi24ogv8vo0ms','::1',1619004263,'__ci_last_regenerate|i:1619004263;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('cu8akgkmtb8bdg1kdeptkntqs0p56oft','::1',1619004734,'__ci_last_regenerate|i:1619004734;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('ket7a9ej4nq2h11l988lbmek90fqf393','::1',1619006135,'__ci_last_regenerate|i:1619006135;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('elossjb7jlfnsdqdf5ll0e6s8g5sbes6','::1',1619006632,'__ci_last_regenerate|i:1619006632;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('5gagfbu17pjn6ce475df75rvu1puvt4q','::1',1619007060,'__ci_last_regenerate|i:1619007060;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('q2c49116nfok02247mtrpvreodr1nee3','::1',1619007428,'__ci_last_regenerate|i:1619007428;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('t8h1dcs9f15elb1jst84rj9u8qtit43d','::1',1619008300,'__ci_last_regenerate|i:1619008300;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('k85b4cm2vashgqk4s34jg2dj3edeqplj','::1',1619009667,'__ci_last_regenerate|i:1619009667;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('t85gssrcr73vuh2hpp3b12t0a5anuukl','::1',1619010020,'__ci_last_regenerate|i:1619010020;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('l3pjb1pvd2cogae197ql7mhpigm7p3j6','::1',1619010426,'__ci_last_regenerate|i:1619010426;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('6l45919pve6p8agq04uaob7u3ug2inga','::1',1619010807,'__ci_last_regenerate|i:1619010807;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('rb0bhbmuk1l84ghkpl0ciouc24bpmofr','::1',1619011217,'__ci_last_regenerate|i:1619011217;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('pcoq8viul8cm8mtpjee3sbugqpq8o3qk','::1',1619011654,'__ci_last_regenerate|i:1619011654;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('0t6p899dpt651bp5k954vreag26239pt','::1',1619011956,'__ci_last_regenerate|i:1619011956;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('g4euiaelvgsummch81l6bugqlmgs1kud','::1',1619012643,'__ci_last_regenerate|i:1619012643;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('9tm46p7nlltqcpumtn5rbmelje55vnhm','::1',1619012981,'__ci_last_regenerate|i:1619012981;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('t4fkivkeki7f9d6rovtft61chdo4f6pr','::1',1619013294,'__ci_last_regenerate|i:1619013294;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('hbbu5o2ro2enuqfk23b29g89c00i9vs8','::1',1619013712,'__ci_last_regenerate|i:1619013712;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('f73rss1bm5sappfshqssi255ch2t2737','::1',1619013729,'__ci_last_regenerate|i:1619013712;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('uqdbafqhr4e0r7tf4h74v6lcgj3pj6lp','::1',1619167658,'__ci_last_regenerate|i:1619167658;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('sq4247rllfpo4nl3n06e7kk5oaeqjob6','::1',1619168779,'__ci_last_regenerate|i:1619168779;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('sqel5f30bi8ck42mnksfl4qji3rdt8tj','::1',1619169378,'__ci_last_regenerate|i:1619169378;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('gphlfmtggcjp8m176si67qa6vqgepe1h','::1',1619169780,'__ci_last_regenerate|i:1619169780;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('3ndbj00s7o9plg5apaq2srosstq2t6p6','::1',1619170266,'__ci_last_regenerate|i:1619170266;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('f1ol556pjkdlhm93gh7ri8591asejekm','::1',1619174052,'__ci_last_regenerate|i:1619174052;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('kl1h0d4j99eanc5etvvf1cs7la1bg492','::1',1619174353,'__ci_last_regenerate|i:1619174353;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('2j1r3n8ce6t9mmr27dh7r4ebk70pmvdt','::1',1619174673,'__ci_last_regenerate|i:1619174673;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('fp51embr12ibk9oruecsqmgrgi8uapb0','::1',1619175148,'__ci_last_regenerate|i:1619175148;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('0iqc4edi2938b802jii55u63tu3v0mdc','::1',1619175471,'__ci_last_regenerate|i:1619175471;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('4t3auop1e0acijuo1u0cu2hda6pisv4o','::1',1619175832,'__ci_last_regenerate|i:1619175832;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('vsnls408seooik79f49j6hqcivg32vdi','::1',1619176177,'__ci_last_regenerate|i:1619176177;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('v8hvvn3r6sogpgmabaanh7206dlefj2m','::1',1619176528,'__ci_last_regenerate|i:1619176528;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('6n41md021jn66sl8q3f4qm5kavbbr0i8','::1',1619176869,'__ci_last_regenerate|i:1619176869;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('qhk21h9u6ons1egg43r70u1flkiskufr','::1',1619178216,'__ci_last_regenerate|i:1619178216;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('ed5jnahb7rqd8d2jng83680r6nf9s21m','::1',1619178532,'__ci_last_regenerate|i:1619178532;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('0lqh456o8kf7cgmm18nul70mar6prg7s','::1',1619178850,'__ci_last_regenerate|i:1619178850;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('tj7sem1ctdb169pisi5fu3597o1pq8o6','::1',1619179164,'__ci_last_regenerate|i:1619179164;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('n1ngtdn35p6l4v07h2h98rbvu1gsdb33','::1',1619179465,'__ci_last_regenerate|i:1619179465;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('dc0d190i2gnov3ps2bs1o09341cbpb66','::1',1619179838,'__ci_last_regenerate|i:1619179838;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('itcu1sorua1s2b598m3i9ackos2457f6','::1',1619180143,'__ci_last_regenerate|i:1619180143;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('8te4s8gubfnmt99d4lj6slc3kjsdqc0r','::1',1619180462,'__ci_last_regenerate|i:1619180462;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('evukt82snr10p0taoil54rplm0mc7als','::1',1619180749,'__ci_last_regenerate|i:1619180462;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('9u0lrrifpelghqf1nm0cp13404e2sgr4','::1',1619254165,'__ci_last_regenerate|i:1619254165;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";'),
('8cvr79tla17lu9k6sjsjdd2e79pp2usq','::1',1619254432,'__ci_last_regenerate|i:1619254165;username|s:5:\"admin\";is_login|b:1;level|s:5:\"Admin\";id_login|s:1:\"1\";');

/*Table structure for table `tb_bayar_penjualan` */

DROP TABLE IF EXISTS `tb_bayar_penjualan`;

CREATE TABLE `tb_bayar_penjualan` (
  `id_bayar_piutang` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` int(11) DEFAULT NULL,
  `id_outlet` int(11) DEFAULT NULL,
  `nomor_bayar` varchar(20) DEFAULT NULL,
  `tgl_nota` date DEFAULT NULL,
  `total_bayar` double DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `updated_by` varchar(100) DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id_bayar_piutang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_bayar_penjualan` */

/*Table structure for table `tb_det_do` */

DROP TABLE IF EXISTS `tb_det_do`;

CREATE TABLE `tb_det_do` (
  `id_det_do` int(11) NOT NULL AUTO_INCREMENT,
  `id_do` int(11) DEFAULT NULL,
  `id_muatan` int(11) DEFAULT NULL,
  `tarif` double DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_det_do`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tb_det_do` */

insert  into `tb_det_do`(`id_det_do`,`id_do`,`id_muatan`,`tarif`,`jumlah`) values 
(2,2,3,12000,20),
(3,3,1,2311,1000),
(4,4,4,235,12);

/*Table structure for table `tb_det_muatan` */

DROP TABLE IF EXISTS `tb_det_muatan`;

CREATE TABLE `tb_det_muatan` (
  `id_muatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(11) DEFAULT NULL,
  `dari` varchar(100) DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `muatan` varchar(100) DEFAULT NULL,
  `id_satuan` int(11) DEFAULT NULL,
  `tarif` double DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id_muatan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tb_det_muatan` */

insert  into `tb_det_muatan`(`id_muatan`,`id_pelanggan`,`dari`,`tujuan`,`muatan`,`id_satuan`,`tarif`,`keterangan`) values 
(1,2,'Lampung','Jakarta','Kasur',1,2311,'asd'),
(3,2,'Lampung','Bandung','Kasur',1,12000,''),
(4,4,'Lampung','Jakarta','Kasur',1,235,'sds');

/*Table structure for table `tb_do` */

DROP TABLE IF EXISTS `tb_do`;

CREATE TABLE `tb_do` (
  `id_do` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_do` date DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `no_do` varchar(30) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `id_kendaraan` int(11) DEFAULT NULL,
  `status_do` enum('belum','sudah') DEFAULT NULL,
  `id_invoice` int(11) DEFAULT 0,
  PRIMARY KEY (`id_do`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tb_do` */

insert  into `tb_do`(`id_do`,`tgl_do`,`id_pelanggan`,`no_do`,`keterangan`,`id_kendaraan`,`status_do`,`id_invoice`) values 
(2,'2021-04-21',2,'DO-0000000001','asas',1,'sudah',11),
(3,'2021-04-21',2,'DO-0000000002','asas',1,'sudah',0),
(4,'2021-04-23',4,'DO-0000000003','',1,'sudah',0);

/*Table structure for table `tb_driver` */

DROP TABLE IF EXISTS `tb_driver`;

CREATE TABLE `tb_driver` (
  `id_driver` int(11) NOT NULL AUTO_INCREMENT,
  `nama_driver` varchar(50) DEFAULT NULL,
  `no_telp` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_driver`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_driver` */

insert  into `tb_driver`(`id_driver`,`nama_driver`,`no_telp`) values 
(1,'Ridho','1212');

/*Table structure for table `tb_invoice` */

DROP TABLE IF EXISTS `tb_invoice`;

CREATE TABLE `tb_invoice` (
  `id_invoice` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(11) NOT NULL,
  `nomor_invoice` varchar(255) NOT NULL,
  `tgl_invoice` date NOT NULL,
  `status_bayar` enum('Cash','Credit') NOT NULL DEFAULT 'Credit',
  `keterangan` text NOT NULL,
  `total_bayar` double DEFAULT 0,
  `akumulasi_bayar` double DEFAULT 0,
  `next_tagih` date DEFAULT NULL,
  PRIMARY KEY (`id_invoice`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_invoice` */

insert  into `tb_invoice`(`id_invoice`,`id_pelanggan`,`nomor_invoice`,`tgl_invoice`,`status_bayar`,`keterangan`,`total_bayar`,`akumulasi_bayar`,`next_tagih`) values 
(11,2,'IN042100001','2021-04-21','Credit','sadasd',240000,200000,'2021-04-22'),
(12,4,'IN042100002','2021-04-24','Credit','dsa',0,0,'2021-04-30');

/*Table structure for table `tb_kategori` */

DROP TABLE IF EXISTS `tb_kategori`;

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kategori` varchar(255) DEFAULT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kategori` */

insert  into `tb_kategori`(`id_kategori`,`kode_kategori`,`nama_kategori`,`keterangan`) values 
(1,'KD-00001','kategori 11','tes 1');

/*Table structure for table `tb_kendaraan` */

DROP TABLE IF EXISTS `tb_kendaraan`;

CREATE TABLE `tb_kendaraan` (
  `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT,
  `id_driver` int(11) DEFAULT NULL,
  `merk_kendaraan` varchar(30) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `nomor_plat` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_kendaraan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kendaraan` */

insert  into `tb_kendaraan`(`id_kendaraan`,`id_driver`,`merk_kendaraan`,`tahun`,`nomor_plat`) values 
(1,1,'ASA','2020','be asu'),
(2,1,'ASA','2016',NULL);

/*Table structure for table `tb_login` */

DROP TABLE IF EXISTS `tb_login`;

CREATE TABLE `tb_login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `is_level` enum('Admin','Collection') DEFAULT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_login` */

insert  into `tb_login`(`id_login`,`username`,`password`,`email`,`is_level`) values 
(1,'admin','12345','admin@gmail.com','Admin');

/*Table structure for table `tb_order_detail` */

DROP TABLE IF EXISTS `tb_order_detail`;

CREATE TABLE `tb_order_detail` (
  `id_order_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` double DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `hpp` double DEFAULT 0,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_order_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_order_detail` */

insert  into `tb_order_detail`(`id_order_detail`,`id_order`,`id_produk`,`harga`,`qty`,`hpp`,`keterangan`) values 
(5,10,1,100,1,0,''),
(6,10,3,2000,2,0,'');

/*Table structure for table `tb_order_detail_temp` */

DROP TABLE IF EXISTS `tb_order_detail_temp`;

CREATE TABLE `tb_order_detail_temp` (
  `id_order_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) NOT NULL,
  `diskon` double NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_order_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_order_detail_temp` */

insert  into `tb_order_detail_temp`(`id_order_detail`,`id_produk`,`diskon`,`qty`,`harga`,`created_by`) values 
(1,1,0,1,100,'admin');

/*Table structure for table `tb_pelanggan` */

DROP TABLE IF EXISTS `tb_pelanggan`;

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pelanggan` varchar(255) DEFAULT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `alamat_pelanggan` text DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pelanggan` */

insert  into `tb_pelanggan`(`id_pelanggan`,`kode_pelanggan`,`nama_pelanggan`,`alamat_pelanggan`,`no_telp`) values 
(2,'KP-00001','PT Alfa Sentosa','sasas','123'),
(4,'KP-00003','kue','jalan terus aja','456');

/*Table structure for table `tb_produk` */

DROP TABLE IF EXISTS `tb_produk`;

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `kode_produk` varchar(255) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `stok` int(11) DEFAULT 0,
  `stok_minimum` int(11) DEFAULT 0,
  `hpp` double DEFAULT 0,
  `harga_jual` double DEFAULT 0,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_produk` */

insert  into `tb_produk`(`id_produk`,`id_kategori`,`id_satuan`,`kode_produk`,`nama_produk`,`keterangan`,`stok`,`stok_minimum`,`hpp`,`harga_jual`) values 
(1,1,1,'KP-00001','Bahan Mentah 1','tes',100,10,0,100),
(3,1,1,'KP-00002','Bahan Mentah 2','4545',565,454,0,2000);

/*Table structure for table `tb_satuan` */

DROP TABLE IF EXISTS `tb_satuan`;

CREATE TABLE `tb_satuan` (
  `id_satuan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_satuan` */

insert  into `tb_satuan`(`id_satuan`,`nama_satuan`,`keterangan`,`date_created`,`date_modified`) values 
(1,'kg','asd','2020-10-30 05:19:45',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
