# Login-System
login system with php ,MVC &amp; PDO 

      

CREATE TABLE `users` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `confirm_password` varchar(45) DEFAULT NULL,
  `firstname` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `dateOfBirth` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `phoneNumber` varchar(55) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `confirmation_token` varchar(60) DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL,
  `reset_token` varchar(60) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `remind_token` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

   
      CREATE TABLE `images` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `name` varchar(100) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `image_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
      
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_FK_1` (`user_id`);

  