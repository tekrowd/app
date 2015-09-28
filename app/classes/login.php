<?php
	class DoLogin {

		public function login($email,$pass) {

			$sql = new Mysql();
			$con = $sql->dbConnect();

			$query = "SELECT * FROM professional WHERE email = '" . $email . "' AND password = '" . $pass . "'";

			$mysql = $sql->selectFreeRun($query);

			$row = mysqli_fetch_assoc($mysql);

			$data[data] = $row;

			if($data) {
				return json_encode($data);
			} else {
				return "error";
			}
			mysqli_close($con);
		}
	}
?>