<?php
session_start();
include_once("config.php");
$error= "";

	// retrieve form data
	$email= trim($_REQUEST['email']);
	$password= trim($_REQUEST['password']);
	$pass= $password;
	//$service= trim($_POST['service']);
	$service= "voice_broadcast";

	
	// Do curl post
		
		$ch = curl_init();
		$url= $api_baseUrl."loginExec.php";
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, true);

		$data = array(
		'key' => $key,
		'secret' => $secret,
		'email' => $email,
		'password' => $pass
		);

		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$output = curl_exec($ch);
		//$info = curl_getinfo($ch);
		curl_close($ch);

		$resp= json_decode($output, true);
	
		if($resp['result'] == "OK"){

			$email= $resp['email'];
			$userid= $resp['userid'];
			$firstname= $resp['firstname'];
			$lastname= $resp['lastname'];

			// store session data
			//session_start();
			$_SESSION['email']= $resp['email'];
			$_SESSION['firstname']= $resp['firstname'];
			$_SESSION['lastname']= $resp['lastname'];
			$_SESSION['userid']= $resp['userid'];
			
			/*if($service == 'voice_broadcast'){
				header("location:dashboard.php");
			}
			if($service == 'phone_conference'){
				header("location:xconf/conferences.php");
			}*/
			echo '1';
			exit;
		}

		elseif($resp['result'] == "FAILED"){

			$error= $resp['message'];
			echo '<div role="alert" class="alert alert-danger alt alert-dismissible fade in mb-60">
              <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
			  '.$error.'</div>';
			
		}
?>



