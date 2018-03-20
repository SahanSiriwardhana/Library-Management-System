<?php
	// Authorisation details.
	$username = "sudeerasahan@gmail.com";
	$hash = "550824fc4a55bc2b1bc027bcf51b4972b0768714";

	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "API Test"; // This is who the message appears to be from.

	$numbers = "44777000000"; // A single number or a comma-seperated list of numbers

	$message = "This is a test message from the PHP API script.";
	// 612 chars or less

	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);

	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.txtlocal.com/send/?');

	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
?>