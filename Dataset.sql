DROP TABLE IF EXISTS tickets;
DROP TABLE IF EXISTS bookings;
DROP TABLE IF EXISTS transactions;
DROP TABLE IF EXISTS games;
DROP TABLE IF EXISTS seats;
DROP TABLE IF EXISTS customers;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS teams;



CREATE TABLE customers (
  Customer_Number int NOT NULL AUTO_INCREMENT,
  Name varchar(60),
  Address varchar(75),
  Post_Code varchar(15),
  Phone varchar(15),
  Email varchar(50),
PRIMARY KEY (Customer_Number)
);


INSERT INTO customers ( Name, Address, Post_Code, Phone, Email)
VALUES ( 'William Brown', '27 Cole Lane', 'NY5 7XJ', '07123456789', 'William@hotmail.com'),
( 'Sundas Toqir', '60 Happy Street', 'HA7 0PY', '0772345678', 'Sundas@googlemail.com'),
( 'James King', '1 King Cross', 'KG1 1KG', '07111111111', 'TOG12@gmail.com'),
( 'Katie White', '17 Snow Street', 'SS7 1NN', '07766976691', 'star@hotmail.com'),
( 'Jenny Hopkins', '107 Brewery Place', 'BE9 5ER', '07233723371', 'ilovefootball@hotmail.com'),
( 'Max Jarrel', '12 Willow Creek', 'CR3 3KK', '07273352733', 'football123@hotmail.com'),
( 'Sophie Smith', '72 Brindleton Bay', 'BR1 7BY', '07222223346', 'footbal4life@hotmail.com');



CREATE TABLE teams (
  Team_ID varchar(5),
  Team_Name varchar(30),
  Team_League varchar(30),
PRIMARY KEY (Team_ID)
);


INSERT INTO teams (Team_ID, Team_Name, Team_League)
VALUES ('001', 'Leeds United', 'Premier'),
('002', 'Manchester United', 'Premier'),
('003', 'Manchester City', 'FA Cup'),
('004', 'Bradford City A.F.C.', 'Premier'),
('005', 'Huddersfield Town A.F.C.', 'FA Cup'),
('006', 'Hull City', 'EFL Cup'),
('007', 'Sheffield United F.C.', 'Premier');



CREATE TABLE games (
  Game_ID int NOT NULL AUTO_INCREMENT,
  Team_1 varchar(10) DEFAULT NULL,
  Team_2 varchar(10) DEFAULT NULL,
  Game_Type varchar(15) DEFAULT NULL,
  Game_Date date DEFAULT NULL,
  Price int(10),
PRIMARY KEY (Game_ID),
FOREIGN KEY (Team_1) REFERENCES teams (Team_ID),
FOREIGN KEY (Team_2) REFERENCES teams (Team_ID)
);


INSERT INTO games ( Team_1, Team_2, Game_Type, Game_Date, Price)
VALUES ( '001', '005', 'World Cup', '2022-04-17', 50),
( '002', '007', 'FA Cup', '2022-05-05', 20),
( '003', '004', 'UEFA EURO CUP', '2022-04-05', 30),
( '004', '001', 'World Cup', '2022-05-17', 10),
( '005', '007', 'FA Cup', '2022-04-16',10),
( '006', '002', 'UEFA EURO', '2022-04-22',15),
( '007', '003', 'World Cup', '2022-04-02', 35);




CREATE TABLE seats (
  SeatNumber_ID varchar(10) NOT NULL,
  Seat_Number int NOT NULL,
  Seat_Row varchar(15) DEFAULT NULL,
  Seat_Zone varchar(15) DEFAULT NULL,
PRIMARY KEY (SeatNumber_ID)
);


INSERT INTO seats (SeatNumber_ID, Seat_Number, Seat_Row, Seat_Zone)
VALUES ('S001', 1, 'R1', 'Zone_A'),
('S002', 2, 'R2', 'Zone_B'),
('S003', 3, 'R3', 'Zone_C'),
('S004', 4, 'R4', 'Zone_D'),
('S005', 5, 'R5', 'Zone_E'),
('S006', 6, 'R6', 'Zone_F'),
('S007', 7, 'R7', 'Zone_G');




CREATE TABLE transactions (
  Transaction_ID int NOT NULL AUTO_INCREMENT,
  Order_Date date,
  Customer_Number int(100),
  Total_price int,
PRIMARY KEY (Transaction_ID)
);


INSERT INTO transactions ( `Order_Date`, `Customer_Number`, `Total_price`)
VALUES ( '2022-03-08', 'C001', 50),
( '2022-03-08', '2', 20),
( '2022-03-08', '3', 30),
( '2022-03-08', '4', 10),
( '2022-03-08', '5', 10),
( '2022-03-08', '6', 15),
( '2022-03-08', '7', 35);




CREATE TABLE bookings (
  Booking_ID int NOT NULL AUTO_INCREMENT,
  Transaction_ID INT(100),
  Game_ID INT(100),
  Customer_Number INT(100),
PRIMARY KEY (Booking_ID),
    FOREIGN KEY (Transaction_ID) REFERENCES transactions(Transaction_ID),
    FOREIGN KEY (Game_ID) REFERENCES games (Game_ID),
    FOREIGN KEY (Customer_Number) REFERENCES customers(Customer_Number)
);


INSERT INTO bookings ( Transaction_ID, Game_ID, Customer_Number)
VALUES (  '1', '1','1'),
(  '2', '2', '2'),
(  '3', '3', '3'),
(  '4', '4', '4'),
(  '5', '5', '5'),
( '6', '6', '6'),
( '7', '7', '7');





CREATE TABLE tickets (
  TicketNumber_ID int NOT NULL AUTO_INCREMENT,
  Game_ID int(100),
  SeatNumber_ID varchar(5),
  Total_price int,
  Transaction_ID int(100),
  Concession int,
  Adult int,
PRIMARY KEY (TicketNumber_ID), 
FOREIGN KEY (Game_ID) REFERENCES games (Game_ID),
FOREIGN KEY (Transaction_ID) REFERENCES transactions (Transaction_ID),
FOREIGN KEY (SeatNumber_ID) REFERENCES seats (SeatNumber_ID)
);


INSERT INTO tickets ( Game_ID, SeatNumber_ID, Total_price, Transaction_ID, Concession, Adult)
VALUES ( '1', 'S001', 50, '1', 2, 1),
( '7', 'S003', 50, '5', 0, 1),
( '5', 'S005', 50, '7', 2, 0),
( '3', 'S007', 50, '2', 2, 2),
( '4', 'S002', 50, '4', 2, 4),
( '2', 'S006', 50, '6', 3, 1),
( '6', 'S004', 50, '3', 1, 2);





CREATE TABLE users (
  id int NOT NULL AUTO_INCREMENT,
  name varchar(191),
  email varchar(191),
  password varchar(191),
  remember_token varchar(100),
  created_at timestamp,
  updated_at timestamp,
 PRIMARY KEY (`id`),
UNIQUE KEY `users_email_unique` (`email`)
);


INSERT INTO `users` ( name, email, password, remember_token, created_at, updated_at) VALUES
( 'Clay', 'u1860854@unimail.hud.ac.uk', '1234567890',  NULL, NULL, NULL),
( 'Sundas', 'u1758798@unimail.hud.ac.uk', '1234567890',  NULL, NULL, NULL),
( 'William', 'u1664217@unimail.hud.ac.uk', '1234567890',  NULL, NULL, NULL);