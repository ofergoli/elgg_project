<?php
	class DataBase{

		var $connection;

		public function DataBase(){
			require("db_connection.php");
			$this->connection = $conn;
		}

		function Query($query){
			$result = mysqli_query($this->connection,$query);
			return $result;
		}
	}
?>