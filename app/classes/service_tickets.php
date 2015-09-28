<?php

class ServiceTicket {
	
	public function list_service_tickets($id) {
		$sql = new Mysql();
		$con = $sql->dbConnect();
		
		$query = "SELECT sr.sr_code, sr.description, sr.request_time, sr.status, l.* AS location FROM service_request AS sr, account_location AS l WHERE sr.id IN (SELECT service_id FROM professional_service WHERE professional_id = '" . $id . "') AND sr.account_location_id = l.id";
		
		$mysql = $sql->selectFreeRun($query);

		$row = mysqli_fetch_assoc($mysql);
		
		foreach ($row as $key=>$value) {
			$ticket[$key] = $value;
		}
		
		$data[data] = $ticket;
		
		if($data) {
			return json_encode($data);
		} else {
			return "error";
		}
		mysqli_close($con);
	}
	
	public function list_accepted_tickets($id) {
		$sql = new Mysql();
		$con = $sql->dbConnect();
		
		$query = "SELECT sr.sr_code, sr.description, sr.request_time, sr.status, l.* AS location FROM service_request AS sr, account_location AS l WHERE sr.id IN (SELECT service_id FROM professional_service WHERE professional_id = '" . $id . "' AND status = 'accepted') AND sr.account_location_id = l.id";
		
		$mysql = $sql->selectFreeRun($query);

		$row = mysqli_fetch_assoc($mysql);
		
		foreach ($row as $key=>$value) {
			$ticket[$key] = $value;
		}
		
		$data[data] = $ticket;
		
		if($data) {
			return json_encode($data);
		} else {
			return "error";
		}
		mysqli_close($con);
	}
	
	public function accept_service_ticket($id) {
		
	}
	
	public function start_service_ticket($id) {
		
	}
	
	public function stop_service_ticket($id) {
			
	}
	
	public function service_location($id) {
		
	}
}
?>