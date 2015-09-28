<?php
	require_once('classes/classes.php');
	
	$action = isset($_POST['action']) ? $_POST['action'] : '';
		
	switch($action) {
		
		case "login":
			$login = new DoLogin();
			$email = $_POST['email'];
			$pass = md5($_POST['password']);
			$response = $login->login($email,$pass);
			echo $response;
			break;
			
		case "start_tracking":
			$add = new LocationTracking();
			$id = $_POST["id"];
			$long = $_POST["long"];
			$lat = $_POST["lat"];
			$response = $add->addLocation($id,$long,$lat);
			echo $response;
			break;
			
		case "stop_tracking":
			$add = new LocationTracking();
			$id = $_POST["id"];
			$response = $add->removeLocation($id);
			echo $response;
			break;
			
		case "service_tickets_list":
			$st = new ServiceTicket();
			$id = $_POST["id"];
			$response = $st->list_service_tickets($id);
			echo $response;
			break;
		
		case "accepted_service_tickets_list":
			break;
			
		case "accept_service_ticket":
			break;
			
		case "service_ticket_start":
			break;
			
		case "service_ticket_stop":
			break;
		
		case "service_location":
			break;
			
		default:
			echo "error";
			break;
	}

?>