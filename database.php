<?php
	class DataBase{

		var $conn;

		public function DataBase($conn){
			$this->conn = $conn;
		}

		function Query($query){
			$result = mysqli_query($this->conn,$query);
			return $result;
		}
	}
?>