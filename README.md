# Login-System
login system with php ,MVC &amp; PDO ,phpmailer

If you want open project
1.clone this project
2.Create database and 2 tables
 2.1 database name is reg_system
 2.2
 
 
 
 
 
 
 
      CREATE TABLE users(
          id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
          username varchar(128) NOT NULL,
          mail varchar(128) NOT NULL,
          password varchar(128) NOT NULL
      
      );
      
      
      CREATE TABLE resetPassword(
        resetPasswordId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
        resetPasswordEmail TEXT NOT NULL,
        resetPasswordSelector TEXT NOT NULL,
        resetPasswordToken TEXT NOT NULL,
        resetPasswordExpires TEXT NOT NULL,
      
      );
      
      
      
      
