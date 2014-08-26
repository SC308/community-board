/*
 Navicat MySQL Data Transfer

 Source Server         : local
 Source Server Version : 50529
 Source Host           : localhost
 Source Database       : community_board_dev

 Target Server Version : 50529
 File Encoding         : utf-8

 Date: 07/22/2014 15:44:39 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `cashwall_assets`
-- ----------------------------
-- DROP TABLE IF EXISTS `cashwall_assets`;
-- CREATE TABLE `cashwall_assets` (
--   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
--   `store_id` int(11) NOT NULL,
--   `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `community_events`
-- ----------------------------
-- DROP TABLE IF EXISTS `community_events`;
-- CREATE TABLE `community_events` (
--   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
--   `store_id` int(11) NOT NULL,
--   `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `type` int(11) NOT NULL,
--   `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   `end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   `description` text COLLATE utf8_unicode_ci NOT NULL,
--   `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `event_types`
-- ----------------------------
-- DROP TABLE IF EXISTS `event_types`;
-- CREATE TABLE `event_types` (
--   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
--   `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `features`
-- ----------------------------
-- DROP TABLE IF EXISTS `features`;
-- CREATE TABLE `features` (
--   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
--   `store_id` int(11) NOT NULL,
--   `published` int(11) NOT NULL,
--   `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `content` text COLLATE utf8_unicode_ci NOT NULL,
--   `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `flyers`
-- ----------------------------
-- DROP TABLE IF EXISTS `flyers`;
-- CREATE TABLE `flyers` (
--   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
--   `store_id` int(11) NOT NULL,
--   `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `order` int(11) NOT NULL,
--   `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `migrations`
-- ----------------------------
-- DROP TABLE IF EXISTS `migrations`;
-- CREATE TABLE `migrations` (
--   `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `batch` int(11) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `migrations`
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES ('2013_11_08_172818_create_users_table', '1'), ('2013_11_08_172842_create_photos_table', '1'), ('2013_11_08_215507_create_event_types_table', '1'), ('2013_11_08_224914_create_photo_collections_table', '1'), ('2014_07_17_164416_create_stores_table', '1'), ('2014_07_17_164612_create_store_types_table', '1'), ('2014_07_17_171336_create_user_roles_table', '1'), ('2014_07_17_203606_create_community_events_table', '1'), ('2014_07_17_203732_create_cashwall_assets_table', '1'), ('2014_07_17_203915_create_features_table', '1'), ('2014_07_17_204355_create_staff_bios_table', '1'), ('2014_07_17_210832_create_flyers_table', '1'), ('2014_07_17_211148_create_top_picks_table', '1');
COMMIT;

-- ----------------------------
--  Table structure for `photo_collections`
-- ----------------------------
-- DROP TABLE IF EXISTS `photo_collections`;
-- CREATE TABLE `photo_collections` (
--   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
--   `store_id` int(11) NOT NULL,
--   `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `collection_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `photos`
-- ----------------------------
-- DROP TABLE IF EXISTS `photos`;
-- CREATE TABLE `photos` (
--   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
--   `store_id` int(11) NOT NULL,
--   `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `publish` int(11) NOT NULL,
--   `collection` int(11) NOT NULL,
--   `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `photographer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `taken_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `description` text COLLATE utf8_unicode_ci NOT NULL,
--   `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `staff_bios`
-- ----------------------------
-- DROP TABLE IF EXISTS `staff_bios`;
-- CREATE TABLE `staff_bios` (
--   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
--   `store_id` int(11) NOT NULL,
--   `first` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `last` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `favorite_sport` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `bio` text COLLATE utf8_unicode_ci NOT NULL,
--   `cash_wall` int(11) NOT NULL,
--   `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=235 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `staff_bios`
-- ----------------------------
BEGIN;
INSERT INTO `staff_bios` VALUES ('190', '0', 'Ryan', 'A.', 'Footwear Manager', 'Hockey', '3c159410a16cb6975c867c9fa08a82d05354ce69.JPG', 'I have had a great 7 years with Sport Chek, I have worked in clothing, footwear both as a part time advisor and a full time advisor. I currently play hockey twice a week and I use the stairs instead of the elevator at work and at home. My fitness goals include, going to the gym 3 times a week and I would love to move into a higher hockey level.', '1', '2014-03-19 13:42:32', '2014-07-15 20:01:36'), ('191', '0', 'Ryan', 'K.', 'Store General Manager', 'Hockey', '28e8f94699920536f5fc2e55d9fdec75e5c7eeda.JPG', 'I started with Sport Chek 6.5 years ago in BC. Some of the positions within the company that I have had are F/T Visual and Footwear Manager. I got the opportunity to join the flaship team last in January 2013 and with this I have grown and learned alot. I participate in such sports as hockey, golf, biking and running. I hope to one day be able to run a marathon.', '1', '2014-03-19 13:53:21', '2014-07-15 20:02:05'), ('192', '0', 'Candace', 'T.', 'Community Manager', 'Golf', '3166defc71449d2cb04d0022cba1e9f97bc7e2d8.jpg', 'I started with Sport Chek 4 years ago as a Part Time Clothing advisor, from there I went on to become a Full Time Clothing Advisor and a year or so later became the Clothing Manager. I had the opportunity of coming to Sport Chek Uptown as the Community Manager and it has been great! I would love to become a long distance runner one day  as well as get out on the golf course alot more in the warmer months!', '1', '2014-03-19 13:57:09', '2014-07-15 20:02:38'), ('193', '0', 'Jordan', 'Evaristo', 'Clothing Manager', 'Basketball', 'eb9e697e180c0ce2e33276c1e49122a0d9195707.JPG', 'I have been with Sport Chek for 8 years now, and it has been such an informative adventure. I have worked in both clothing and footwear. Over the next few years I would like to maintain my physical shape and still be able to play Basketball as much as possible. My big goal is to be able to run a marathon!', '1', '2014-03-19 13:59:01', '2014-03-25 17:48:56'), ('194', '0', 'Nick', 'Bissett', 'Footwear Advisor', 'Cross Training', '5669912204d3c060c63ae8fba6bfb9b1a5dd443f.JPG', 'I have been with Sport Chek for 4 years, I have worked in both the Clothing and Footwear department. I currently go to the gym 6 days a week  as well as do Hot Yoga, attend boot camps and MOST of all Mountain Biking.  My fitness goals for the future are to stay in the best shape I can. I would love to be able to play any sport I choose for as long as possible.', '1', '2014-03-19 14:07:17', '2014-03-26 18:15:52'), ('196', '0', 'Natosca', 'Josephs', 'Footwear Advisor', 'Track and Field/Volleyball', '881bc5d7cb8e4c75207bee92ecbd065568d13ae5.JPG', 'I have been with Sport Chek for 6 years, and have worked at various stores. I have worked in both Clothing and Footwear. Currently to stay active I try to go to the gym as much as possible and maintain a healthy lifestyle. I would love to maintain my physic for as long as possible!!', '1', '2014-03-19 14:11:09', '2014-03-25 20:37:01'), ('197', '0', 'Andre', 'Joseph', 'Footwear Advisor', 'Basketball/ Track and Field/ Weight Lifting', 'edd6d0bed500c61b1106e2c9dd485bb8ff4a9a32.JPG', 'I have been with Sport Chek for close to 7 years, I have become an expert in Footwear! As a recent graduate in Kinesiology its within my nature to maintain and inspire others to achieve \"optimum\" fitness. In the future I would like to participate in a Strong Man Competition and engage in Olympic lifting.', '1', '2014-03-19 14:16:23', '2014-04-12 13:46:42'), ('199', '0', 'Jeff', 'Sears', 'Hardgoods Advisor', 'Hockey', '64cc62c87f163fea84e4ed385d4109182d809c65.JPG', 'I have been with Sport Chek for 7 years now, and have worked at a few different stores. From each store I have learned something new!  I enjoy playing hockey twice a week, as well as play, tennis and squash once a week. In the future I would love to maintain my health by continuing to play hockey and squash.', '1', '2014-03-19 14:37:47', '2014-03-25 17:35:27'), ('203', '0', 'Quinn ', 'Wheat', 'Full Time Hardgoods Advisor', 'Snowboarding', '3856bb2155b62b68356f543fad53512e1eb8f386.JPG', 'I have been with Sport Chek for 5 years, started at Leaside as a Part Time Hardgoods Advisor. I have been at our Flagship store now over a year and it has been awesome. Snowboarding is my passion and I love to do activities that will help enhance my skills on the hill. Over the next year I would love to focus on building strength,and upper body mass.', '1', '2014-03-19 15:36:51', '2014-04-03 13:35:52'), ('204', '0', 'Matt', 'Ramdhanie', 'Clothing Advisor', 'Football', 'efe2676f6a7fa788fd151c6391a2fd00f0c00c7c.JPG', 'I have been with Sport Chek for 2 years now, I started at Yorkdale and came to Uptown about 6 months ago. I love to swim at the pool in my condo, I also really enjoy going to gym. My future fitness goals would have to been to increase the amount of times I go to the gym. I would also like to get into Football again!', '1', '2014-03-19 16:05:50', '2014-04-03 19:00:44'), ('205', '0', 'Alex', 'Procajlo', 'Clothing Advisor', 'Personal Training', '1c88fa39fc66d1d017062b5220eafce27e9e84f4.JPG', 'I have been with Sport Chek Uptown for 7 months now, and it has been awesome. I go to the gym 5 times a week, I try to take care of myself as best as I can. In the future I would love to become a personal trainer or a performance coach.', '1', '2014-03-19 16:12:22', '2014-03-25 18:14:54'), ('206', '0', 'Airees', 'Angellakis', 'Clothing Advisor', 'Zumba/Running', '764e76ae8ef93df0e2422837c27dbb8f62f06154.JPG', 'I have been with Sport Chek Uptown for 6 months, and it has been a fun experience. I currently attend Zumba 3 times a week and it is such a great work out. A  future fitness goal of mine is to continue to Zumba well into my Senior days.', '1', '2014-03-19 16:52:30', '2014-03-25 18:16:33'), ('207', '0', 'Jona ', 'Malile', 'Part Time Clothing', 'Running', '8f9398b0df4ea026efaea2cf76052f0ad6d15264.JPG', 'I have been with Sport Chek for 1 year now as a Clothing Advisor. My passion is Running and working here has really encouraged me to get into many more sports. I recently started spinning classes as well as Pilates! In the future I hope to learn to play Squash and definately participate in a Triathalon.', '1', '2014-03-25 14:43:03', '2014-03-25 17:56:34'), ('208', '0', 'Cassandra ', 'Mason', 'Cash Manager', 'Swimming', '9f025247c4c37f2df983e89ec2c80a5e535387e9.JPG', 'I have been with Sport Chek for 4 years now, and have worked in both Clothing and Cash. I thrive to live healthy and be healthy in all meanings of the word. In order to stay active I hike, swim and I look forward to the Summer months so I can start running again.', '1', '2014-03-25 15:00:47', '2014-03-25 17:57:58'), ('209', '0', 'Diamond', 'Le', 'Full Time Clothing', 'Weight Training', '0b868f42c34aec3713a280be32e6b09c57ac886b.JPG', 'I have been with Sport Chek for 5 years now, and would say I am well rounded as far as each department goes in our stores. I go to the gym 5 days a week and also love to play Volleyball. I hope to one day become a personal trainer and help coach others to live healthy active lifestyles.', '1', '2014-03-25 15:05:40', '2014-04-03 13:38:13'), ('210', '0', 'Brent ', 'Thomas', 'Hardgoods Advisor', 'Skiing', 'b890838876e631d9b8a4984c6b49c2a809ba0ad0.JPG', 'I have been with Sport Chek for 8 years now, and have worked worked in Hardgoods for all 8 years. Skiing is my passion but I do love to go to the gym as much as possible. My goal over the next few years is to just maintain my fitness and be able to play golf for as long as possible.', '1', '2014-03-25 15:16:38', '2014-03-31 16:44:59'), ('212', '0', 'Maria ', 'Kim', 'Part Time Cashier', 'Yoga', 'c59bb430cc779760a9fdcda917e7eb98c9617099.JPG', 'I am new to Sport Chek, and have learned alot the past few months. Right now I do yoga a few times a week and have noticed a great difference in my flexibility. In the long run I would love to find a Sport that I am great at!', '1', '2014-03-25 16:13:45', '2014-03-25 18:06:10'), ('213', '0', 'Jonny ', 'Mendelson', 'Head Technician', 'Biking', '76e1c31ac0e5fcf6f5eccd1ec3c9ed641243fa58.JPG', 'I have been with Sport Chek for 5 years and have worked at various locations. I love being a technician and really have a passion for outdoor sports. I also really love to Ski in the winter, and in the summer months I bike to get around.  In the next few months I would love to get into going to the gym, this is something I feel is really important in maintaining a healthy active lifestyle.', '1', '2014-03-25 16:19:35', '2014-04-03 13:34:12'), ('215', '0', 'Meghan', 'Sherk', 'Clothing Advisor', 'Kick Boxing', '8ca19efbb8b63a19d8b4b9d5b5d5fd56a4313bd8.JPG', 'I have been with Sport Chek for just over a year now, and it has been a fantastic experience. Working here has encouraged me to go to the gym more often as well as help continue to live a healthy active lifestyle. In the near future I would love to start Kick boxing!!', '1', '2014-03-26 19:45:28', '2014-03-26 19:45:28'), ('217', '0', 'Samantha ', 'Reid', 'Footwear Advisor', 'Basketball', '0c65d0329084ee84250a82793949e6ede2c7a3de.JPG', 'Samantha has worked at Sport Chek for a few years now, and she loves it! Basketball is her passion and she still plays a few times a week for Basketball World Toronto. Sam was awared MVP on her college basketball team, and this shows that she has a love for the game, and is excited about being active and having fun!', '1', '2014-03-31 17:06:40', '2014-06-16 03:37:39'), ('218', '0', 'Sasha', 'Khan', 'Cash Advisor', 'Yoga', 'a2f3f938ad74fbd7b1b93f4b7b44310f25296dc1.JPG', 'Sasha has been with Sport Chek for 5 years and loves it! Her passion is Yoga but plans to get into running long distance in the future!!', '1', '2014-03-31 17:08:45', '2014-07-15 19:17:16'), ('219', '0', 'Corey', 'Diaz', 'Technician', 'Snowboarding', 'adc270d971750af2a6536fd66cc6303e5e468bab.JPG', 'I have been with Sport Chek for 7 great months! I have learned so much these past few months and look forward to even more knowledge come the Summer sports seasons. Right now to stay active I snowboard and going to the gym as much as possible. I would love to be a more flexible, stronger and more exsplosive snowboarder!!', '1', '2014-03-31 19:37:09', '2014-03-31 19:37:09'), ('220', '0', 'Anna', 'K.', 'Visual Merchandiser', 'Walking', 'cae233e0226e193d10c5e0cc69c4e094736f71b0.JPG', 'I have been with Sport Chek for 5 years, and fell in love with Visual Merchandising! I enjoy walking and being outdoors, in the future I hope to maintain my fitness and encourage others to be healthy and active.', '0', '2014-04-01 16:20:03', '2014-04-03 13:17:57'), ('221', '0', 'Arun', 'Manoharan', 'Footwear Advisor', 'Basketball', '0e69ab3738def71b735c25bcb1efd3b7a17a0131.JPG', 'I have worked at Sport Chek for many years, and it has really encouraged me to be more active in my every day life. I love to play basketball, and I try to get on the courts a few times a week. I also really like to go to the gym, and this is also something I push myself to do a few times a week. In the future I hope to maintain my fitness, and perhaps one day coach a kids basketball team.', '0', '2014-04-12 13:40:00', '2014-04-12 13:40:00'), ('222', '0', 'Celia ', 'Bradfield', 'Footwear Advisor', 'Softball', '5cf678595088022444f278344bc6ed01b5628439.JPG', 'I have been with Sport Chek for only a year, and time has flown by. To stay active I cheerlead on my schools cheer squad and I also love to get out for a run as much as possible!!', '0', '2014-04-12 13:44:31', '2014-04-12 13:44:31'), ('223', '0', 'George', 'Kouleles', 'Hardgoods Advisor', 'Hockey', 'f787b2b389e0efff52d4427b4bba3e12996e5302.JPG', 'George has been with Sport Chek for about 6 months, and has worked in the Hardgoods Department.  He loved to run, and go to the gym as much as possible. He also tries to play Hockey during the winter months, as he has played all over the world and is definately his true passion.', '0', '2014-04-29 14:43:52', '2014-04-29 14:43:52'), ('224', '0', 'Tophy', 'David', 'Footwear Advisor', 'Ultimate Frisbee', '622e48177ff08878a9a19518022a97c0be10cd9d.jpg', 'Tophy has worked with Sport Chek for a couple years now, and has worked in both clothing and footwear. Tophy loves to engage in all sports but really loves to play ultimate frisbee on his down time. He also goes to gym as much as possible, and hopes to continue to play ultimate frisbee for years to come!!', '0', '2014-04-29 14:46:55', '2014-05-12 19:02:22'), ('225', '0', 'Joel', 'Perera', 'Footwear Advisor', 'Soccer / Track and Field', 'ca1567a475db510ee9ef122f99c78844eb321e75.JPG', 'Joel has been with Sport Chek for a year and a half, and has worked in the Footwear department. To stay active Joel runs approximately 60-70km a week, he has been running for many years, and plans to continue to do so in the future. Joels love for running as carried him on to start Ryersons first ever Cross Country Team this Fall!!', '0', '2014-04-29 21:41:00', '2014-04-29 21:41:00'), ('227', '0', 'Brittany ', 'Annan', 'Clothing Advisor', 'Dancing', 'e261ed484d617a75e90b8348faf49b957676ce9e.JPG', 'I have been with Sport Chek for 4 years, and have worked at various locations across the province! To stay active I love to dance, I have danced for 13 years and try to dance as much as possible every day! In the future to stay active I plan to continue to go to the gym, and become a physiotherapist!', '0', '2014-05-12 20:17:07', '2014-05-12 20:17:07'), ('228', '0', 'Domonic', 'Edwards', 'Assistant Manager', 'Basketballl', '19c7eae05a55f6907fe0cffb7dd900a70263c73b.JPG', 'I have been with Sport Chek for 12 years, and what a ride it has been! I have worked at many locations across the province and have done a little bit of everything! \r\nTo stay active I work out at the gym 3 times a week, and love to swim in the warmer months! In the future, I hope to maintain my health and gain another 10 pounds!\r\n', '0', '2014-05-20 20:11:54', '2014-05-20 20:11:54'), ('230', '0', 'Katie ', 'MacKenzie', 'Cash Advisor ', 'Rowing', '0b8906adab7e3452bfe1116fb91e6d79b3146556.jpg', 'I have been with Sport Chek for 8 months, and have loved interacting with customers at the cash! To stay active I row 6 days a week, I also do a little bit of weights but rowing is my passion. My future fitness goals are to row competitvely for the University of Toronto!', '0', '2014-06-11 18:52:27', '2014-06-16 15:39:33'), ('231', '0', 'Kim', 'Canaria', 'Clothing Advisor', 'Soccer', '4e016927b6186d835923194ff1148bb8628bb1a3.JPG', 'I have worked for Sport Chek for over a year now, and it has been awesome! To stay active I play soccer a few times a week. In the future I hope to coach my own soccer team, and encourage others to be excited about the sport!', '0', '2014-06-11 19:09:37', '2014-07-14 21:53:50'), ('232', '0', 'Alexandra', 'Bethlenfalvy', 'Clothing Advisor', 'Basketballl', 'eb9f3178a909270cef743a80be2437cadfcdc29d.JPG', 'I have worked with Sport Chek for a few months now, and it has been an awesome learning experience. To stay active I play baseball with my younger brother, we love being outdoors and sometimes we even get a little competitive!!  I have recently started running, and would love to run my first 5k by the end of the summer! ', '0', '2014-06-16 15:51:02', '2014-06-16 15:51:02'), ('233', '0', 'Mike', 'Campbell', 'Hardgoods Manager', 'Hockey', '69862e91aeeb9acf040510811b6f0a7d9691f210.JPG', 'Mike has been with Sport Chek for 5 years and has learned so much! He loves hockey, but stays active by being outdoors as much as possible!', '0', '2014-07-14 21:58:25', '2014-07-15 19:18:41'), ('234', '0', 'Andy', 'Chau', 'Footwear Advisor', 'Running', 'a8e4a5499f7ad1bbfeffa95aec1bda3790200c78.JPG', 'Andy is a big runner and tries to go everyday! It helps him stay fit and encourages him to stay active in the future! ', '0', '2014-07-14 22:20:42', '2014-07-15 19:20:05');
COMMIT;

-- ----------------------------
--  Table structure for `store_types`
-- ----------------------------
-- DROP TABLE IF EXISTS `store_types`;
-- CREATE TABLE `store_types` (
--   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
--   `store_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `store_desc` text COLLATE utf8_unicode_ci NOT NULL,
--   `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `store_types`
-- ----------------------------
BEGIN;
INSERT INTO `store_types` VALUES ('1', 'flagship', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('2', 'hero', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('3', 'fleet', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
COMMIT;

-- ----------------------------
--  Table structure for `stores`
-- ----------------------------
-- DROP TABLE IF EXISTS `stores`;
-- CREATE TABLE `stores` (
--   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
--   `store_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `store_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `store_type` int(11) NOT NULL,
--   `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `prov` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `active` tinyint(1) NOT NULL,
--   `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `stores`
-- ----------------------------
BEGIN;
INSERT INTO `stores` VALUES ('1', '5111', 'Yonge Street', '1', 'Yonge Street', 'Toronto', 'ON', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('2', '314', 'West Edmonton Mall', '1', 'West Edmonton Mall', 'Edmonton', 'AB', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
COMMIT;

-- ----------------------------
--  Table structure for `top_picks`
-- ----------------------------
-- DROP TABLE IF EXISTS `top_picks`;
-- CREATE TABLE `top_picks` (
--   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
--   `store_id` int(11) NOT NULL,
--   `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `publish` int(11) NOT NULL,
--   `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `user_roles`
-- ----------------------------
-- DROP TABLE IF EXISTS `user_roles`;
-- CREATE TABLE `user_roles` (
--   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
--   `role_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `desc` text COLLATE utf8_unicode_ci NOT NULL,
--   `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
-- DROP TABLE IF EXISTS `users`;
-- CREATE TABLE `users` (
--   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
--   `store_id` int(11) NOT NULL,
--   `first` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `last` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
--   `role` int(11) NOT NULL,
--   `last_seen` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   `active` tinyint(1) NOT NULL,
--   `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- SET FOREIGN_KEY_CHECKS = 1;
