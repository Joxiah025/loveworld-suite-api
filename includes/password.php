<?php
session_start();
include_once("config.php");


	$error= "";
	$success="";

	// retrieve form data
		$email= trim($_REQUEST['email']);
	
	// Validate form data (Server-side)

	if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)){ 
		$error= "Enter a valid email address";
		echo '<div role="alert" class="alert alert-danger alt alert-dismissible fade in mb-60">
              <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
			  '.$error.'</div>';
	}
	
	else{

		// Do curl post
		
		$ch = curl_init();
		$url= $api_baseUrl."resetPasswdExec.php";
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, true);

		$data = array(
		'key' => $key,
		'secret' => $secret,
		'email' => $email
		);

		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$output = curl_exec($ch);
		curl_close($ch);

		$resp= json_decode($output, true);
	
		if($resp['result'] == "OK"){
			
			// password change was successful. Send email

			$body= "Hello ".$email.",<p>
			Your ".$reseller_domain." password was reset.<p>
			
			User ID: ".$email."<br>
			New password: ".$resp['passwd']."<p>

			Please login at ".$reseller_url." to access your account.<br>
			We appreciate your business.<p>

			The Cystus Group Team
			
			<p><br><br><br><br>
			<hr>
			<span style='font:normal 12px Helvetica, arial'>
			This is an automated email. This mailbox is not monitored, and you will not receive a response. For assistance, contact ".$support_email.". You are receiving this email because you created an account at ".$reseller_domain." and maintain active services in your account. Thank you.</span>";
			
	
			// Do curl post
		
			$ch = curl_init();
			$url= $api_baseUrl."sendmailExec.php";
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, true);

			$data2 = array(
				'from' => 'no-reply@'.$reseller_domain,
				'fromName' => 'no-reply@'.$reseller_domain,
				'to' => $email,
				'subject' => 'New password',
				'body' => $body
			);

			curl_setopt($ch, CURLOPT_POSTFIELDS, $data2);
			$output2 = curl_exec($ch);
			curl_close($ch);

			$resp2= json_decode($output2, true);
		
			if($resp2['result'] == 'OK'){
				$success= "A new password has been emailed to you";
				echo '<div role="alert" class="alert alert-success alt alert-dismissible fade in mb-60">
              <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
			  '.$success.'</div>';
				
			}
			else{
				$error= "Password reset failed";
				echo '<div role="alert" class="alert alert-danger alt alert-dismissible fade in mb-60">
              <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
			  '.$error.'</div>';
			}
		
		}
		elseif($resp['result'] == "FAILED"){
			$error= $resp['message'];
			echo '<div role="alert" class="alert alert-danger alt alert-dismissible fade in mb-60">
              <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
			  '.$error.'</div>';
		}	
	}


?>

