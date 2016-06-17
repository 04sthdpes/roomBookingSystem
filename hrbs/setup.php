<?php
//connection to localhost
mysql_connect("localhost","root","");

//to create database
mysql_query("create database hms");

//selecting database
mysql_select_db("hms");

//Table structure for table `comment`

mysql_query("CREATE TABLE IF NOT EXISTS `tbl_comment` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
);");
mysql_query("INSERT INTO `tbl_comment` (`id`, `name`, `email`, `comment`) VALUES
(1, 'Saujan Aryal', 'dpe@gmail.com', 'this a good hostel')");

//Table structure for table `room`
mysql_query("CREATE TABLE IF NOT EXISTS `tbl_room` (
`room_id` int(11) NOT NULL AUTO_INCREMENT,
  `floor` varchar(50) NOT NULL,
  `rate` double NOT NULL,
  `total_room` int(11) NOT NULL,
  `remaining_room` int(11) NOT NULL,
  PRIMARY KEY (`room_id`)
);");

mysql_query("INSERT INTO `tbl_room` (`room_id`, `floor`, `rate`, `total_room`, `remaining_room`) VALUES
(1, 'ground', 3500, 4, 3),
(2, 'first', 4000, 6, 6),
(3, 'second', 4500, 6, 6),
(4, 'third', 5000, 6, 6)
");

//Table structure for table `user`
mysql_query("CREATE TABLE IF NOT EXISTS `tbl_user` (
`user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ;");


//Dumping data for table `user`

mysql_query("INSERT INTO `tbl_user` (`user_id`, `name`, `address`, `phone`, `email`, `username`, `password`, `user_type`) VALUES
(1, 'Saujan Aryal', 'Balaju', '9808647327', 'saujan@saujan.com', 'admin', 'admin', 0),
(2, 'w', 'ktm', '8628438', 'w@yahoo.com', 'w', 'w', 1)");

//Table structure for table `roominventory`
mysql_query("CREATE TABLE IF NOT EXISTS `tbl_room_inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booked_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `qty_reserve` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
);");
mysql_query("INSERT INTO `tbl_room_inventory` (`id`, `booked_date`, `qty_reserve`, `room_id`, `user_id`, `status`) VALUES
(1, '2016-06-15 16:28:47', 1, 1, 2, 'reserved')");

header('location:index.php');
?>