<?php
/*
		An example implementation of the Wincast PHP class.
		Written by Lewis Smallwood on 16/05/2016.
*/

// If something breaks, don't show errors.
error_reporting(0);

// Import the file where the class is located.
include("./SMS.php");

// Initialise the class with values authenticated with an SMS gateway.
$url = "http://www.winplc.com/gateway-location-xyz";
$username = "username";		// Gateway authenication
$password = "password";		// Ditto
$from = "Bespoke"; 				// (One word) Who should the SMS display from?

$SMS = new SMSGateway($url, $username, $password, $from);

// Send the text
echo($SMS->send("+440123456789", "Hello there. This is a test from PHP."));

?>
