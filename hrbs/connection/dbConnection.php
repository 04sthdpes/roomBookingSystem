<?php
	class dbConnection{
		function __construct(){
			require_once('dbConfig.php');
			$connection=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
			mysql_select_db(DB_DATABASE,$connection);
			if (!$connection) {
				die('Cannot connect to database');
			}
			return $connection;
		}
		public function Close(){
			mysql_close();
		}
	}
?>