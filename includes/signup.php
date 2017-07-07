<?php
session_start();
include_once ("config.php");

//If the form is submitted

	 // Initializing the message to hold the error messages

	$msg= "";

	// retrieve form data
	$fname= trim($_REQUEST['fname']);
	$lname= trim($_REQUEST['lname']);
	$pass= trim($_REQUEST['pass']);
	$cpass= trim($_REQUEST['cpass']);
	$email= trim($_REQUEST['email']);
	$phone= trim($_REQUEST['phone']);
	
	// Validate form data (Server-side)

	if(strlen($fname) < 2){
		$msg= $msg . "Invalid firstname. <br>";
		echo '<div role="alert" class="alert alert-danger alt alert-dismissible fade in mb-60">
              <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
			  '.$msg.'</div>';
	}

	if(strlen($lname) < 2){
		$msg= $msg . "Invalid lastname. <br>";
		echo '<div role="alert" class="alert alert-danger alt alert-dismissible fade in mb-60">
              <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
			  '.$msg.'</div>';
	}

	if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)){ 
		$msg= $msg . "Invalid email <br>";
		echo '<div role="alert" class="alert alert-danger alt alert-dismissible fade in mb-60">
              <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
			  '.$msg.'</div>';
	}
	if (empty($pass) || $pass != $cpass){
		$msg= $msg . "Passwords do not match. <br>";
		echo '<div role="alert" class="alert alert-danger alt alert-dismissible fade in mb-60">
              <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
			  '.$msg.'</div>';
	}

	if (strlen($phone) < 7 || !preg_match("/^[0-9]+$/",$phone)){
		$msg= $msg . "Invalid phone number. <br>";
		echo '<div role="alert" class="alert alert-danger alt alert-dismissible fade in mb-60">
              <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
			  '.$msg.'</div>';
	}

	if (empty($msg)){

		// generate activation key
		$activationKey="";
		for($i=0; $i<31; $i++){
			$activationKey .= rand(0,9) . chr(rand(0,25)+97);
		}

		// Do curl post
		
		$ch = curl_init();
		$url= $api_baseUrl."signupExec.php";
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, true);

		$data = array(
		'key' => $key,
		'secret' => $secret,
		'email' => $email,
		'firstname' => $fname,
		'lastname' => $lname,
		'password' => $pass,
		'activationKey' => $activationKey,
		'phone' => $phone
		);

		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$output = curl_exec($ch);
		//$info = curl_getinfo($ch);
		curl_close($ch);

		$resp= json_decode($output, true);
	
		if($resp['result'] == "OK"){

			// Show result
		echo '1';
			
			// send welcome email
		
			$from= $support_email;
			$fromName= $reseller_name;
			$to = $email;
			$subject = 'New Acccount Confirmation';

			$activationLink= $reseller_url."/activation?email=".$email."&key=".$activationKey;

			$body= "<font face='arial' size='2'> Dear ".$fname." ". $lname.",<br><br>Thank you for signing up at ". $reseller_domain.". Your login details are: <br><br>User ID: <b>". $email . "</b> <br>
			Password: <b>". $pass . "</b> <br><br>
		
			You must activate your account to use it. Click on the link below to activate your account now. <br><br>
			<a href='". $activationLink. "'>". $activationLink. "</a> <br><br>
			Best regards,<p>The ".$reseller_name." Team";

			// Do curl post
		
			$ch = curl_init();
			$url= $api_baseUrl."sendmailExec.php";
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, true);

			$data2 = array(
			'key' => $key,
			'secret' => $secret,
			'from' => $from,
			'fromName' => $fromName,
			'to' => $to,
			'subject' => $subject,
			'body' => $body
			);

			curl_setopt($ch, CURLOPT_POSTFIELDS, $data2);
			$output = curl_exec($ch);
			//$info = curl_getinfo($ch);
			curl_close($ch);
			$resp2= json_decode($output, true);
			exit;
		}

		elseif($resp['result'] == "FAILED"){

			$msg= $resp['message'];
			echo '<div role="alert" class="alert alert-danger alt alert-dismissible fade in mb-60">
              <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
			  '.$msg.'</div>';
		}		

	}

?>

