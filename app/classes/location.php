<?php
	class LocationTracking {
		
		public function addLocation($id,$long,$lat) {
		
			$sql = new Mysql();
			$con = $sql->dbConnect();
			
			$count = 0;
					
			$query = "SELECT professional_id FROM online WHERE professional_id = '" . $id. "'";
						
			$mysql = $sql->selectFreeRun($query);
			$count = mysqli_num_rows($mysql);
								
			if(!$count == 0) {
				return $this->updateLocation($id,$long,$lat);
			} else {
				$table = "online";
				$values = array(
					"professional_id"	=>	$id,
					"longitude"		=>	$long,
					"latitude"		=>	$lat
				);
				
				$mysql = $sql->insertInto($table,$values);
				if (!$mysql) {
					return "error";
				} else {
					return "success";
				}
			}
			
			mysqli_close($con);
		}
		function updateLocation($id,$long,$lat) {
			$sql = new Mysql();
			$con = $sql->dbConnect();
			
			$query = "UPDATE online SET longitude = '" . $long . "', latitude= '" . $lat . "' WHERE professional_id = '" . $id . "'";
			
			$mysql = $sql->freeRun($query);
									
			if (!$mysql) {
				return "error";
			} else {
				return "success";
			}
						
			mysqli_close($con);
		}
		
		function removeLocation($id) {
			$sql = new Mysql();
			$con = $sql->dbConnect();
			
			$query = "DELETE FROM online WHERE professional_id = '" . $id . "'";
			
			$mysql = $sql->freeRun($query);
						
			if (!$mysql) {
				return "error";
			} else {
				return "success";
			}
			
			mysqli_close($con);
		}
	}