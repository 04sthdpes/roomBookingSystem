<?php
	session_start();
	require_once('dbConnection.php');
	class dbFunction{
		function __construct(){
			$database=new dbConnection();
		}

		function __destruct(){

		}
		//check user
		public function check_user($username){
			$query=mysql_query("SELECT `username` FROM `tbl_user` WHERE username='$username' ");
			$count=mysql_num_rows($query);
			return $count;
		}

		//add user
		public function add_user($name,$address,$phone,$email,$username,$password){
			$query=mysql_query("INSERT INTO `tbl_user`(`user_id`,`name`,`address`,`phone`,`email`,`username`,`password`,`user_type`) VALUES ('','$name','$address','$phone','$email','$username','$password',1)");
			return $query;
		}

		//login verfication
		public function login_verify($username,$password){
			$query=mysql_query("SELECT * FROM `tbl_user` WHERE username='$username' AND password='$password'");
			$result=mysql_fetch_array($query);
			$_SESSION['user_id']=$result['user_id'];
			$user_type=$result['user_type']; ;
			return $user_type;die();
		}

		//counting the user
		public function count($username,$password){
			$query=mysql_query("SELECT * FROM `tbl_user` WHERE username='$username' AND password='$password'");
			$count=mysql_num_rows($query);
			return $count;
		}

		//getting detail of room
		public function get_room_detail(){
			$query=mysql_query("SELECT * FROM `tbl_room`");
			return $query;
		}

		//inserting in room inventory
		public function room_reservation(){
			$room_id=$_GET['room_id'];
			$user_id=$_SESSION['user_id'];
			$query=mysql_query("INSERT INTO `tbl_room_inventory`(`id`,`booked_date`,`qty_reserve`,`room_id`,`user_id`,`status`) VALUES ('', date('Y-m-d h-m-s'),1,'$room_id','$user_id','reserved')");
			return $query;
		}

		//updating
		public function remaining_room(){			
			$_SESSION['room_id']=$_GET['room_id'];
			$room_id=$_SESSION['room_id'];
			$query=mysql_query("UPDATE `tbl_room` SET remaining_room=remaining_room-1 WHERE room_id=$room_id");
			return $query;
		}

		//check avaliable
		public function check_room(){
			$room_id=$_GET['room_id'];
			$query=mysql_fetch_array(mysql_query("SELECT `remaining_room` FROM `tbl_room` WHERE room_id='$room_id'"));
			$remaining_room=$query['remaining_room'];
			return $remaining_room;
		}

		//checking user already booked the room or not
		public function reserve_room_by_user(){
			$user_id=$_SESSION['user_id'];
			$query=mysql_query("SELECT `user_id` FROM `tbl_room_inventory` WHERE user_id='$user_id'");
			$result=mysql_num_rows($query);
			return $result;
		}

		//getting detail from tbl_roon n tbl_room_inventory
		public function get_room_inventory(){
			$user_id=$_SESSION['user_id'];
			$query=mysql_query("SELECT * FROM `tbl_room_inventory` WHERE user_id='$user_id'");
			return $query;
		}

		//get floor
		public function get_floor(){			
			$room_id=$_GET['room_id'];
			$query=mysql_fetch_array(mysql_query("SELECT `floor` FROM `tbl_room` WHERE room_id='$room_id' "));
			return $query;
		}

		//delete room inventory
		public function delete_room_inventory($user_id){
			$qry=mysql_fetch_array(mysql_query("SELECT `room_id` FROM `tbl_room_inventory` WHERE user_id='$user_id'"));
			$room_id=$qry['room_id'];
			$qury=mysql_query("DELETE FROM `tbl_room_inventory` WHERE user_id='$user_id'");
			$query=mysql_query("UPDATE `tbl_room` SET remaining_room=remaining_room+1 WHERE room_id='$room_id'");
			return $query;
		}
		
		//listing the booked room by user
		public function get_list(){			
			$user_id=$_SESSION['user_id'];
			$qry=mysql_fetch_array(mysql_query("SELECT `room_id` FROM `tbl_room_inventory` WHERE user_id='$user_id'"));
			$room_id=$qry['room_id'];
			$query=mysql_fetch_array(mysql_query("SELECT `floor` FROM `tbl_room` WHERE room_id='$room_id'"));
			return $query;
		}

		//getting all detail
		public function get_detail(){
			$query=mysql_query("SELECT * FROM `tbl_room_inventory`");
			return $query;
		}

		//getting all user detail
		public function get_users($user_id){
			$query=mysql_fetch_array(mysql_query("SELECT * FROM `tbl_user` WHERE user_id='$user_id'"));
			return $query;
		}

		//getting all room detail
		public function get_rooms($room_id){
			$query=mysql_fetch_array(mysql_query("SELECT * FROM `tbl_room` WHERE room_id='$room_id'"));
			return $query;
		}

		//generating report
		public function generate_report(){
			$user_id=$_GET['id'];
			$query=mysql_query("SELECT * FROM `tbl_room_inventory` WHERE user_id='$user_id'");
			return $query;
		}

		//listing all comment
		public function get_comment(){
			$query=mysql_query("SELECT * FROM `tbl_comment`");
			return $query;
		}

		//inserting comment
		public function add_comment($name,$email,$comment){
			$query=mysql_query("INSERT INTO `tbl_comment`(`name`,`email`,`comment`) VALUES ('$name','$email','$comment')");
			return $query;
		}
	}
?>