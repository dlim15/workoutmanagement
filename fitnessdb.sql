-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2016 at 12:39 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitnessdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `body_part`
--

CREATE TABLE `body_part` (
  `Part_num` int(11) NOT NULL,
  `Part_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `body_part`
--

INSERT INTO `body_part` (`Part_num`, `Part_name`) VALUES
(1, 'Shoulder'),
(2, 'Bicep'),
(3, 'Tricep'),
(4, 'Chest'),
(5, 'Abs'),
(6, 'Back'),
(7, 'Leg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Personal_id` int(11) NOT NULL,
  `Training_period` int(11) DEFAULT NULL,
  `Muscle` float NOT NULL,
  `FAT` float NOT NULL,
  `WEIGHT` float NOT NULL,
  `Trainer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Personal_id`, `Training_period`, `Muscle`, `FAT`, `WEIGHT`, `Trainer_id`) VALUES
(10000, 3, 25850, 12399, 65000, 40002),
(10001, 5, 36062, 10040, 70000, 40002),
(10002, 10, 40000, 10000, 75000, 40000),
(10003, 8, 20000, 30000, 75000, 40001),
(10004, 24, 30150, 20090, 75000, 40002),
(10005, 24, 30000, 30000, 65000, 40001),
(10006, 36, 36000, 20000, 65000, 40004);

-- --------------------------------------------------------

--
-- Table structure for table `cust_body`
--

CREATE TABLE `cust_body` (
  `Customer_id` int(11) NOT NULL,
  `Body_num` int(11) NOT NULL,
  `Muscle` float NOT NULL,
  `Fat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust_body`
--

INSERT INTO `cust_body` (`Customer_id`, `Body_num`, `Muscle`, `Fat`) VALUES
(10000, 1, 3000, 2191.43),
(10000, 2, 3100, 2171.43),
(10000, 3, 4280, 2121.43),
(10000, 4, 5000, 2191.43),
(10000, 5, 3400, 491.429),
(10000, 6, 3300, 1041.43),
(10000, 7, 4000, 2191.43),
(10001, 1, 5000, 1020),
(10001, 2, 5000, 2020),
(10001, 3, 5000, 2020),
(10001, 4, 5000, 1020),
(10001, 5, 5000, 2020),
(10001, 6, 5200, 920),
(10001, 7, 5000, 1020),
(10002, 1, 2000, 1000),
(10002, 2, 2000, 2000),
(10002, 3, 3000, 1000),
(10002, 4, 3000, 2000),
(10002, 5, 2000, 2000),
(10002, 6, 4000, 2000),
(10002, 7, 2000, 1000),
(10003, 1, 2000, 2000),
(10003, 2, 3000, 2000),
(10003, 3, 4000, 1000),
(10003, 4, 3000, 2000),
(10003, 5, 1000, 2000),
(10003, 6, 2000, 2000),
(10003, 7, 3000, 1000),
(10004, 1, 4150, 1987.14),
(10004, 2, 4000, 2017.14),
(10004, 3, 4000, 2017.14),
(10004, 4, 4000, 2017.14),
(10004, 5, 4000, 4017.14),
(10004, 6, 5000, 4017.14),
(10004, 7, 5000, 4017.14),
(10005, 1, 2000, 1020),
(10005, 2, 3000, 2020),
(10005, 3, 2000, 1020),
(10005, 4, 4000, 2520),
(10005, 5, 2000, 2020),
(10005, 6, 3000, 1020),
(10005, 7, 5020, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `cust_eats_food`
--

CREATE TABLE `cust_eats_food` (
  `Customer_id` int(11) DEFAULT NULL,
  `Food_id` int(11) DEFAULT NULL,
  `Eating_amount` float NOT NULL,
  `Dates` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust_eats_food`
--

INSERT INTO `cust_eats_food` (`Customer_id`, `Food_id`, `Eating_amount`, `Dates`) VALUES
(10000, 4, 400, '2016-04-13'),
(10000, 4, 500, '2016-04-14'),
(10000, 3, 500, '2016-04-12'),
(10000, 7, 300, '2016-04-05'),
(10000, 2, 500, '2016-04-07'),
(10000, 3, 500, '2016-04-07'),
(10000, 7, 150, '2016-04-06'),
(10000, 6, 300, '2016-04-05'),
(10000, 5, 150, '2016-04-06'),
(10000, 1, 300, '2016-04-05'),
(10000, 4, 500, '2016-04-06'),
(10000, 7, 700, '2016-04-06'),
(10000, 15, 500, '2016-04-08'),
(10000, 18, 500, '2016-04-13'),
(10000, 19, 350, '2016-04-14'),
(10000, 3, 500, '2016-04-07'),
(10000, 4, 300, '2016-04-07'),
(10000, 1, 300, '2016-04-08'),
(10000, 18, 500, '2016-04-08'),
(10000, 6, 600, '2016-04-09'),
(10000, 15, 500, '2016-04-09'),
(10000, 19, 300, '2016-04-10'),
(10000, 5, 200, '2016-04-10'),
(10000, 6, 500, '2016-04-11'),
(10000, 18, 500, '2016-04-11'),
(10000, 19, 300, '2016-04-12'),
(10000, 4, 500, '2016-04-13'),
(10000, 3, 700, '2016-04-14'),
(10000, 7, 500, '2016-04-15'),
(10000, 15, 500, '2016-04-16'),
(10000, 18, 500, '2016-04-17'),
(10000, 15, 600, '2016-04-18'),
(10000, 6, 700, '2016-04-19'),
(10000, 4, 600, '2016-04-20'),
(10000, 3, 500, '2016-04-21'),
(10001, 6, 500, '2016-04-01'),
(10001, 2, 600, '2016-04-02'),
(10001, 3, 700, '2016-04-03'),
(10001, 19, 600, '2016-04-04'),
(10001, 6, 700, '2016-04-05'),
(10001, 7, 800, '2016-04-06'),
(10001, 2, 600, '2016-04-07'),
(10001, 19, 800, '2016-04-08'),
(10001, 7, 900, '2016-04-09'),
(10001, 2, 1000, '2016-04-10'),
(10001, 4, 600, '2016-04-11'),
(10001, 7, 700, '2016-04-12'),
(10001, 18, 600, '2016-04-13'),
(10001, 7, 800, '2016-04-14'),
(10001, 19, 600, '2016-04-15'),
(10001, 7, 400, '2016-04-16'),
(10001, 3, 600, '2016-04-17'),
(10001, 15, 800, '2016-04-18'),
(10001, 1, 900, '2016-04-19'),
(10001, 18, 1000, '2016-04-20'),
(10001, 1, 1000, '2016-04-21'),
(10001, 15, 600, '2016-04-22'),
(10004, 18, 560, '2016-04-01'),
(10004, 15, 600, '2016-04-02'),
(10004, 19, 500, '2016-04-03'),
(10004, 3, 700, '2016-04-04'),
(10004, 18, 600, '2016-04-05'),
(10004, 18, 1000, '2016-04-06'),
(10004, 6, 600, '2016-04-07'),
(10004, 1, 500, '2016-04-08'),
(10004, 2, 600, '2016-04-09'),
(10004, 7, 400, '2016-04-10'),
(10004, 7, 500, '2016-04-11'),
(10004, 7, 600, '2016-04-12'),
(10004, 6, 700, '2016-04-13'),
(10004, 1, 700, '2016-04-14'),
(10004, 3, 800, '2016-04-15'),
(10004, 7, 600, '2016-04-16'),
(10004, 15, 600, '2016-04-17'),
(10004, 7, 500, '2016-04-18'),
(10004, 15, 600, '2016-04-19'),
(10004, 7, 700, '2016-04-20'),
(10004, 7, 900, '2016-04-21'),
(10004, 3, 1000, '2016-04-22'),
(10004, 7, 500, '2016-04-23'),
(10002, 6, 500, '2016-04-01'),
(10002, 2, 600, '2016-04-02'),
(10002, 2, 630, '2016-04-03'),
(10002, 3, 700, '2016-04-04'),
(10002, 1, 600, '2016-04-05'),
(10002, 7, 550, '2016-04-06'),
(10002, 1, 650, '2016-04-07'),
(10002, 6, 550, '2016-04-08'),
(10002, 15, 600, '2016-04-09'),
(10002, 3, 750, '2016-04-10'),
(10002, 2, 600, '2016-04-11'),
(10002, 2, 800, '2016-04-12'),
(10002, 7, 500, '2016-04-13'),
(10002, 1, 600, '2016-04-14'),
(10002, 2, 400, '2016-04-15'),
(10002, 18, 450, '2016-04-16'),
(10002, 6, 600, '2016-04-17'),
(10002, 18, 700, '2016-04-18'),
(10002, 6, 500, '2016-04-19'),
(10002, 6, 800, '2016-04-20'),
(10002, 2, 600, '2016-04-21'),
(10002, 18, 500, '2016-04-22'),
(10002, 3, 400, '2016-04-23'),
(10003, 2, 500, '2016-04-01'),
(10003, 7, 500, '2016-04-02'),
(10003, 6, 500, '2016-04-03'),
(10003, 7, 600, '2016-04-04'),
(10003, 6, 700, '2016-04-05'),
(10003, 2, 1000, '2016-04-06'),
(10003, 2, 650, '2016-04-07'),
(10003, 2, 500, '2016-04-08'),
(10003, 7, 900, '2016-04-09'),
(10003, 18, 1000, '2016-04-10'),
(10003, 15, 600, '2016-04-11'),
(10003, 18, 700, '2016-04-12'),
(10003, 19, 700, '2016-04-13'),
(10003, 2, 600, '2016-04-14'),
(10003, 6, 500, '2016-04-15'),
(10003, 3, 500, '2016-04-16'),
(10003, 4, 600, '2016-04-17'),
(10003, 6, 400, '2016-04-18'),
(10003, 4, 500, '2016-04-19'),
(10003, 2, 600, '2016-04-20'),
(10003, 6, 700, '2016-04-21'),
(10003, 2, 800, '2016-04-22'),
(10003, 6, 500, '2016-04-23'),
(10005, 7, 500, '2016-04-01'),
(10005, 7, 600, '2016-04-02'),
(10005, 15, 500, '2016-04-03'),
(10005, 6, 550, '2016-04-04'),
(10005, 6, 605, '2016-04-05'),
(10005, 2, 700, '2016-04-06'),
(10005, 1, 650, '2016-04-07'),
(10005, 1, 700, '2016-04-08'),
(10005, 7, 800, '2016-04-09'),
(10005, 2, 500, '2016-04-10'),
(10005, 6, 600, '2016-04-11'),
(10005, 18, 500, '2016-04-12'),
(10005, 1, 700, '2016-04-13'),
(10005, 7, 800, '2016-04-14'),
(10005, 6, 500, '2016-04-15'),
(10005, 2, 600, '2016-04-16'),
(10005, 15, 800, '2016-04-17'),
(10005, 1, 400, '2016-04-18'),
(10005, 18, 450, '2016-04-19'),
(10005, 19, 650, '2016-04-20'),
(10005, 3, 700, '2016-04-21'),
(10005, 4, 800, '2016-04-22'),
(10005, 4, 800, '2016-04-23'),
(10000, 2, 500, '2016-04-06'),
(10000, NULL, 200, '2016-04-13'),
(10001, 21, 500, '2016-04-29'),
(10000, 22, 300, '2016-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `fitness_member`
--

CREATE TABLE `fitness_member` (
  `Personal_id` int(11) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Age` int(11) DEFAULT NULL,
  `Gender` char(1) DEFAULT NULL,
  `Phone` char(10) DEFAULT NULL,
  `Street` varchar(20) DEFAULT NULL,
  `City` varchar(15) DEFAULT NULL,
  `State` char(2) DEFAULT NULL,
  `Zip_code` char(5) DEFAULT NULL,
  `Ssn` char(9) DEFAULT NULL,
  `Web_id` varchar(20) DEFAULT NULL,
  `Web_pw` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fitness_member`
--

INSERT INTO `fitness_member` (`Personal_id`, `Lname`, `Fname`, `Age`, `Gender`, `Phone`, `Street`, `City`, `State`, `Zip_code`, `Ssn`, `Web_id`, `Web_pw`) VALUES
(10000, 'Smith', 'James', 20, 'M', '8184555454', '4232', 'Montrose', 'CA', '91020', '123456789', 'j_smith_10', '1234'),
(10001, 'Athur', 'Paublo', 22, 'M', '8089875458', '9587 Whatever Ave', 'Manteca', 'CA', '95337', '111223333', 'p_athur_11', '8089875458'),
(10002, 'Alex', 'King', 26, 'M', '8484565494', '7845 Mountain St', 'Stockton', 'CA', '95789', '777889999', 'k_alex_12', '8484565494'),
(10003, 'Kobe', 'Bryant', 30, 'M', '8083439876', '8374 Saint Blvd', 'Livermore', 'CA', '95765', '920882334', 'b_kobe_13', '8083439876'),
(10004, 'Piece', 'Cake', 23, 'M', '9998887777', '864 Nomnom Blvd', 'Livermore', 'CA', '95655', '987651342', 'p_cake_14', '1234'),
(10005, 'Ruth', 'Babe', 25, 'M', '2134544687', '22145 Atherton Dr', 'Manteca', 'CA', '95231', '241654978', 'r_babe_15', '2134544687'),
(10006, 'Felix', 'King', 26, 'M', '8798465454', '212 Fobus st', 'Stockton', 'CA', '95331', '546987976', 'f_king_16', '8798465454'),
(40000, 'Kim', 'Paul', 29, 'M', '9172328888', '8232 Jelly Ave', 'Stockton', 'CA', '95770', '909327867', 'p_kim_40', '123'),
(40001, 'Tom', 'Ford', 28, 'M', '8082324598', '203 Huntington Ave', 'Stockton', 'CA', '95777', '823667777', 'f_tom_41', '123'),
(40002, 'Will', 'Smith', 30, 'M', '8082328834', '709 Huntington Ave', 'Stockton', 'CA', '95777', '802348384', 's_will_42', '123'),
(40003, 'Harry', 'Porter', 26, 'M', '1234567894', '249 Beach Ave', 'Stockton', 'CA', '95677', '645312465', 'h_porter_43', '1234567894'),
(40004, 'Cooper', 'Sheldon', 29, 'M', '7848579879', '798 El Nino St', 'Livermore', 'CA', '95498', '464879546', 'c_sheldon_44', '7848579879'),
(70000, 'Bill', 'Lakes', 38, 'M', '9092334584', '70121', 'Modesto', 'CA', '95203', '920348768', 'l_bill_70', '123');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `Food_id` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Calorie_per_gram` float NOT NULL,
  `Protein_per_gram` float NOT NULL,
  `Fat_per_gram` float NOT NULL,
  `Carbohydrate_per_gram` float NOT NULL,
  `Updatedby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`Food_id`, `Name`, `Calorie_per_gram`, `Protein_per_gram`, `Fat_per_gram`, `Carbohydrate_per_gram`, `Updatedby`) VALUES
(1, 'Pizza', 2.64, 0.11, 0.11, 0.34, 70000),
(2, 'Hamburger', 2.56, 0.14, 0.11, 0.26, 70000),
(3, 'Chicken breast', 0.8, 0.18, 0, 0, 70000),
(4, 'Burrito', 2.14, 0.1, 0.07, 0.28, 70000),
(5, 'Tomato', 0.5, 0.03, 0.01, 0.05, 70000),
(6, 'Fried Rice', 2.4, 0.15, 0.1, 0.35, 70000),
(7, 'French Fries', 2.6, 0.16, 0.2, 0.37, 70000),
(15, 'Ramen', 3, 0.1, 0.24, 0.25, 70000),
(18, 'Protein drink', 3, 0.2, 0.01, 0.12, 70000),
(19, 'Sandwich', 2.22, 0.1, 0.09, 0.23, 70000),
(21, 'Quesadilla', 2.3, 0.12, 0.2, 0.3, 70000),
(22, 'Hot dog', 2.5, 0.15, 0.2, 0.22, 70000),
(23, 'Cheese Cake', 2.5, 0.09, 0.2, 0.2, 70000);

-- --------------------------------------------------------

--
-- Table structure for table `food_req`
--

CREATE TABLE `food_req` (
  `req_id` int(11) NOT NULL,
  `Customer_id` int(11) DEFAULT NULL,
  `Manager_id` int(11) DEFAULT NULL,
  `Food_name` varchar(50) DEFAULT NULL,
  `Gram` float NOT NULL,
  `Dates` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_req`
--

INSERT INTO `food_req` (`req_id`, `Customer_id`, `Manager_id`, `Food_name`, `Gram`, `Dates`) VALUES
(12, 10001, 70000, 'Ham And Chesse', 500, '2016-04-30'),
(13, 10001, 70000, 'Ice cream', 600, '2016-04-27'),
(14, 10001, 70000, 'N.Y. Steak', 700, '2016-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `Personal_id` int(11) NOT NULL,
  `Year_mngr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`Personal_id`, `Year_mngr`) VALUES
(70000, 8);

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `Personal_id` int(11) NOT NULL,
  `Salary` int(11) DEFAULT NULL,
  `Num_customer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`Personal_id`, `Salary`, `Num_customer`) VALUES
(40000, 36000, 1),
(40001, 40000, 2),
(40002, 45000, 3),
(40003, 46000, 0),
(40004, 36000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trainer_maintain_cust`
--

CREATE TABLE `trainer_maintain_cust` (
  `trainer_id` int(11) NOT NULL,
  `dates` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer_maintain_cust`
--

INSERT INTO `trainer_maintain_cust` (`trainer_id`, `dates`) VALUES
(40002, '2016-04-06'),
(40002, '2016-04-09'),
(40002, '2016-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `workout_method`
--

CREATE TABLE `workout_method` (
  `Workout_id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Gain_muscle_per_each` float NOT NULL,
  `Spending_calorie_per_each` float NOT NULL,
  `Suggested_protein_per_each` float NOT NULL,
  `Suggested_fat_per_each` float NOT NULL,
  `Suggested_carbohydrate_per_each` float NOT NULL,
  `Working_part` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workout_method`
--

INSERT INTO `workout_method` (`Workout_id`, `Name`, `Gain_muscle_per_each`, `Spending_calorie_per_each`, `Suggested_protein_per_each`, `Suggested_fat_per_each`, `Suggested_carbohydrate_per_each`, `Working_part`) VALUES
(1000, 'Dumbbell shoulder press', 5, 30, 3, 1, 2, 1),
(1001, 'Upright row', 5, 30, 3, 1, 3, 1),
(1002, 'Lateral raise', 3, 10, 2, 1, 1, 1),
(2000, 'Darbell curl', 7, 30, 6, 2, 3, 2),
(2001, 'Alternate hammer curl', 5, 20, 3, 1, 2, 2),
(3000, 'Bench dips', 4, 20, 3, 1, 2, 3),
(3001, 'Ez-bar skullcrusher', 6, 30, 4, 1, 3, 3),
(4000, 'Barbell bench press', 4, 40, 5, 2, 4, 4),
(4001, 'Alternating floor press', 2, 40, 3, 1, 2, 4),
(5000, 'Plank', 4, 40, 4, 2, 2, 5),
(5001, 'Sit up', 6, 50, 6, 3, 2, 5),
(6000, 'Bent over barbell row', 6, 50, 4, 3, 2, 6),
(6001, 'Incline bench pull', 4, 30, 5, 2, 4, 6),
(7000, 'Squat', 7, 50, 4, 2, 3, 7),
(7001, 'Leg press', 5, 40, 4, 3, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `workout_session`
--

CREATE TABLE `workout_session` (
  `Trainer_id` int(11) NOT NULL,
  `Customer_id` int(11) NOT NULL,
  `Workout_id` int(11) NOT NULL,
  `Count` int(11) NOT NULL,
  `Dates` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workout_session`
--

INSERT INTO `workout_session` (`Trainer_id`, `Customer_id`, `Workout_id`, `Count`, `Dates`) VALUES
(40000, 10002, 2001, 25, '2016-04-19'),
(40000, 10002, 2000, 20, '2016-04-19'),
(40000, 10002, 1001, 30, '2016-04-19'),
(40000, 10002, 6000, 10, '2016-04-13'),
(40000, 10002, 7001, 30, '2016-04-13'),
(40002, 10000, 2001, 20, '2016-04-06'),
(40002, 10000, 6000, 30, '2016-04-06'),
(40002, 10000, 6001, 30, '2016-04-06'),
(40002, 10000, 2001, 50, '2016-04-01'),
(40002, 10000, 7001, 40, '2016-04-02'),
(40002, 10000, 7001, 60, '2016-04-03'),
(40002, 10000, 4000, 70, '2016-04-04'),
(40002, 10000, 3000, 50, '2016-04-05'),
(40002, 10000, 5001, 100, '2016-04-06'),
(40002, 10000, 6000, 50, '2016-04-07'),
(40002, 10000, 7001, 60, '2016-04-08'),
(40002, 10000, 5000, 70, '2016-04-09'),
(40002, 10000, 6000, 90, '2016-04-10'),
(40002, 10000, 6001, 60, '2016-04-11'),
(40002, 10000, 3000, 70, '2016-04-12'),
(40002, 10000, 7000, 60, '2016-04-13'),
(40002, 10000, 1001, 70, '2016-04-14'),
(40002, 10000, 6001, 80, '2016-04-15'),
(40002, 10000, 3001, 90, '2016-04-16'),
(40002, 10000, 3001, 120, '2016-04-17'),
(40002, 10000, 1002, 100, '2016-04-18'),
(40002, 10000, 7001, 50, '2016-04-19'),
(40002, 10000, 7001, 40, '2016-04-20'),
(40002, 10000, 1000, 60, '2016-04-21'),
(40002, 10000, 5000, 40, '2016-04-22'),
(40002, 10000, 7000, 40, '2016-04-23'),
(40002, 10001, 6000, 50, '2016-04-01'),
(40002, 10001, 1000, 60, '2016-04-02'),
(40002, 10001, 6000, 70, '2016-04-03'),
(40002, 10001, 2000, 50, '2016-04-04'),
(40002, 10001, 7001, 40, '2016-04-05'),
(40002, 10001, 3001, 50, '2016-04-06'),
(40002, 10001, 3000, 60, '2016-04-07'),
(40002, 10001, 1000, 30, '2016-04-08'),
(40002, 10001, 6000, 40, '2016-04-09'),
(40002, 10001, 6000, 60, '2016-04-10'),
(40002, 10001, 1002, 50, '2016-04-11'),
(40002, 10001, 6001, 50, '2016-04-12'),
(40002, 10001, 1000, 60, '2016-04-13'),
(40002, 10001, 7001, 40, '2016-04-14'),
(40002, 10001, 1002, 60, '2016-04-15'),
(40002, 10001, 2000, 50, '2016-04-16'),
(40002, 10001, 2000, 40, '2016-04-17'),
(40002, 10001, 3001, 60, '2016-04-18'),
(40002, 10001, 5000, 30, '2016-04-19'),
(40002, 10001, 7001, 40, '2016-04-20'),
(40002, 10001, 1000, 20, '2016-04-21'),
(40002, 10001, 2000, 30, '2016-04-22'),
(40002, 10001, 4001, 40, '2016-04-23'),
(40002, 10004, 5001, 60, '2016-04-01'),
(40002, 10004, 5000, 40, '2016-04-02'),
(40002, 10004, 5000, 50, '2016-04-03'),
(40002, 10004, 7000, 60, '2016-04-04'),
(40002, 10004, 7000, 60, '2016-04-05'),
(40002, 10004, 6001, 50, '2016-04-06'),
(40002, 10004, 4000, 50, '2016-04-07'),
(40002, 10004, 1002, 60, '2016-04-08'),
(40002, 10004, 7001, 40, '2016-04-09'),
(40002, 10004, 5000, 60, '2016-04-10'),
(40002, 10004, 1001, 50, '2016-04-11'),
(40002, 10004, 1000, 30, '2016-04-12'),
(40002, 10004, 7000, 55, '2016-04-13'),
(40002, 10004, 3000, 60, '2016-04-14'),
(40002, 10004, 4000, 50, '2016-04-15'),
(40002, 10004, 5001, 40, '2016-04-16'),
(40002, 10004, 6001, 60, '2016-03-17'),
(40002, 10004, 5000, 20, '2016-04-18'),
(40002, 10004, 2000, 60, '2016-04-19'),
(40002, 10004, 1000, 30, '2016-04-20'),
(40002, 10004, 3000, 40, '2016-04-21'),
(40002, 10004, 4001, 50, '2016-04-22'),
(40002, 10004, 5001, 60, '2016-04-23'),
(40000, 10002, 1000, 50, '2016-04-01'),
(40000, 10002, 3001, 60, '2016-04-02'),
(40000, 10002, 1000, 60, '2016-04-03'),
(40000, 10002, 3001, 70, '2016-04-04'),
(40000, 10002, 1000, 50, '2016-04-05'),
(40000, 10002, 1000, 50, '2016-04-06'),
(40000, 10002, 7001, 40, '2016-04-07'),
(40000, 10002, 3001, 60, '2016-04-08'),
(40000, 10002, 1000, 30, '2016-04-09'),
(40000, 10002, 6001, 50, '2016-04-10'),
(40000, 10002, 6000, 60, '2016-04-11'),
(40000, 10002, 1002, 50, '2016-04-12'),
(40000, 10002, 7000, 60, '2016-04-13'),
(40000, 10002, 3001, 50, '2016-04-14'),
(40000, 10002, 2000, 50, '2016-04-15'),
(40000, 10002, 1000, 60, '2016-04-16'),
(40000, 10002, 7001, 50, '2016-04-17'),
(40000, 10002, 6001, 50, '2016-04-18'),
(40000, 10002, 7001, 70, '2016-04-19'),
(40000, 10002, 1002, 50, '2016-04-20'),
(40000, 10002, 7001, 60, '2016-04-21'),
(40000, 10002, 1001, 50, '2016-04-22'),
(40000, 10002, 5001, 60, '2016-04-23'),
(40001, 10003, 3000, 50, '2016-04-01'),
(40001, 10003, 4001, 60, '2016-04-02'),
(40001, 10003, 3000, 70, '2016-04-03'),
(40001, 10003, 3000, 60, '2016-04-04'),
(40001, 10003, 3001, 50, '2016-04-05'),
(40001, 10003, 3001, 60, '2016-04-06'),
(40001, 10003, 6000, 50, '2016-04-07'),
(40001, 10003, 5000, 60, '2016-04-08'),
(40001, 10003, 3000, 50, '2016-04-09'),
(40001, 10003, 2000, 60, '2016-04-10'),
(40001, 10003, 6001, 70, '2016-04-11'),
(40001, 10003, 6001, 80, '2016-04-12'),
(40001, 10003, 2000, 60, '2016-04-13'),
(40001, 10003, 5001, 50, '2016-04-14'),
(40001, 10003, 1001, 50, '2016-04-15'),
(40001, 10003, 7001, 60, '2016-04-16'),
(40001, 10003, 1002, 50, '2016-04-17'),
(40001, 10003, 5000, 55, '2016-04-18'),
(40001, 10003, 1002, 65, '2016-04-19'),
(40001, 10003, 1000, 75, '2016-04-20'),
(40001, 10003, 7001, 65, '2016-04-21'),
(40001, 10003, 3001, 50, '2016-04-22'),
(40001, 10003, 3000, 45, '2016-04-23'),
(40001, 10005, 5000, 50, '2016-04-01'),
(40001, 10005, 2000, 40, '2016-04-02'),
(40001, 10005, 2000, 60, '2016-04-03'),
(40001, 10005, 3001, 70, '2016-04-04'),
(40001, 10005, 7001, 80, '2016-04-05'),
(40001, 10005, 5000, 90, '2016-04-06'),
(40001, 10005, 7001, 100, '2016-04-07'),
(40001, 10005, 5001, 50, '2016-04-08'),
(40001, 10005, 3001, 60, '2016-04-09'),
(40001, 10005, 2000, 50, '2016-04-10'),
(40001, 10005, 4000, 60, '2016-04-11'),
(40001, 10005, 3001, 50, '2016-04-12'),
(40001, 10005, 5001, 60, '2016-04-13'),
(40001, 10005, 5001, 70, '2016-04-14'),
(40001, 10005, 6001, 60, '2016-04-15'),
(40001, 10005, 1000, 50, '2016-04-16'),
(40001, 10005, 2000, 80, '2016-04-17'),
(40001, 10005, 2000, 50, '2016-04-18'),
(40001, 10005, 1002, 60, '2016-04-19'),
(40001, 10005, 7000, 50, '2016-04-20'),
(40001, 10005, 5001, 60, '2016-04-21'),
(40001, 10005, 2000, 50, '2016-04-22'),
(40001, 10005, 3000, 40, '2016-04-23'),
(40002, 10000, 4000, 20, '2016-04-28'),
(40002, 10000, 3000, 30, '2016-04-28'),
(40002, 10004, 6001, 60, '2016-04-28'),
(40002, 10004, 1002, 50, '2016-04-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `body_part`
--
ALTER TABLE `body_part`
  ADD PRIMARY KEY (`Part_num`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Personal_id`),
  ADD KEY `Trainer_id` (`Trainer_id`);

--
-- Indexes for table `cust_body`
--
ALTER TABLE `cust_body`
  ADD PRIMARY KEY (`Customer_id`,`Body_num`),
  ADD KEY `Body_num` (`Body_num`);

--
-- Indexes for table `cust_eats_food`
--
ALTER TABLE `cust_eats_food`
  ADD KEY `Customer_id` (`Customer_id`),
  ADD KEY `cust_eats_food_ibfk_2` (`Food_id`);

--
-- Indexes for table `fitness_member`
--
ALTER TABLE `fitness_member`
  ADD PRIMARY KEY (`Personal_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`Food_id`),
  ADD KEY `food_ibfk_1` (`Updatedby`);

--
-- Indexes for table `food_req`
--
ALTER TABLE `food_req`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `Customer_id` (`Customer_id`),
  ADD KEY `Manager_id` (`Manager_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`Personal_id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`Personal_id`);

--
-- Indexes for table `trainer_maintain_cust`
--
ALTER TABLE `trainer_maintain_cust`
  ADD PRIMARY KEY (`trainer_id`,`dates`);

--
-- Indexes for table `workout_method`
--
ALTER TABLE `workout_method`
  ADD PRIMARY KEY (`Workout_id`),
  ADD KEY `Working_part` (`Working_part`);

--
-- Indexes for table `workout_session`
--
ALTER TABLE `workout_session`
  ADD KEY `Trainer_id` (`Trainer_id`),
  ADD KEY `Customer_id` (`Customer_id`),
  ADD KEY `workout_session_ibfk_3` (`Workout_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `Food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `food_req`
--
ALTER TABLE `food_req`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`Personal_id`) REFERENCES `fitness_member` (`Personal_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`Trainer_id`) REFERENCES `trainer` (`Personal_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `cust_body`
--
ALTER TABLE `cust_body`
  ADD CONSTRAINT `cust_body_ibfk_1` FOREIGN KEY (`Customer_id`) REFERENCES `customer` (`Personal_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cust_body_ibfk_2` FOREIGN KEY (`Body_num`) REFERENCES `body_part` (`Part_num`) ON UPDATE CASCADE;

--
-- Constraints for table `cust_eats_food`
--
ALTER TABLE `cust_eats_food`
  ADD CONSTRAINT `cust_eats_food_ibfk_1` FOREIGN KEY (`Customer_id`) REFERENCES `customer` (`Personal_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cust_eats_food_ibfk_2` FOREIGN KEY (`Food_id`) REFERENCES `food` (`Food_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`Updatedby`) REFERENCES `manager` (`Personal_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `food_req`
--
ALTER TABLE `food_req`
  ADD CONSTRAINT `food_req_ibfk_1` FOREIGN KEY (`Customer_id`) REFERENCES `customer` (`Personal_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `food_req_ibfk_2` FOREIGN KEY (`Manager_id`) REFERENCES `manager` (`Personal_id`) ON UPDATE CASCADE;

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`Personal_id`) REFERENCES `fitness_member` (`Personal_id`) ON UPDATE CASCADE;

--
-- Constraints for table `trainer`
--
ALTER TABLE `trainer`
  ADD CONSTRAINT `trainer_ibfk_1` FOREIGN KEY (`Personal_id`) REFERENCES `fitness_member` (`Personal_id`) ON UPDATE CASCADE;

--
-- Constraints for table `trainer_maintain_cust`
--
ALTER TABLE `trainer_maintain_cust`
  ADD CONSTRAINT `trainer_maintain_cust_ibfk_1` FOREIGN KEY (`trainer_id`) REFERENCES `trainer` (`Personal_id`) ON UPDATE CASCADE;

--
-- Constraints for table `workout_method`
--
ALTER TABLE `workout_method`
  ADD CONSTRAINT `workout_method_ibfk_1` FOREIGN KEY (`Working_part`) REFERENCES `body_part` (`Part_num`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `workout_session`
--
ALTER TABLE `workout_session`
  ADD CONSTRAINT `workout_session_ibfk_1` FOREIGN KEY (`Trainer_id`) REFERENCES `trainer` (`Personal_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `workout_session_ibfk_2` FOREIGN KEY (`Customer_id`) REFERENCES `customer` (`Personal_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `workout_session_ibfk_3` FOREIGN KEY (`Workout_id`) REFERENCES `workout_method` (`Workout_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
