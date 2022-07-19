<?php

include('VPCPaymentConnection.php');
$conn = new VPCPaymentConnection();


// This is secret for encoding the SHA256 hash
// This secret will vary from merchant to merchant

$secureSecret = "E8D11F9F846D045B2175396CB2A1E30F";

// Set the Secure Hash Secret used by the VPC connection object
$conn->setSecureSecret($secureSecret);


// *******************************************
// START OF MAIN PROGRAM
// *******************************************
// Sort the POST data - it's important to get the ordering right
ksort ($_REQUEST);

// add the start of the vpcURL querystring parameters
$vpcURL = $_REQUEST["virtualPaymentClientURL"];

// This is the title for display
$title  = $_REQUEST["Title"];


// Remove the Virtual Payment Client URL from the parameter hash as we 
// do not want to send these fields to the Virtual Payment Client.
unset($_REQUEST["virtualPaymentClientURL"]); 
unset($_REQUEST["SubButL"]);
unset($_REQUEST["Title"]);

// Add VPC post data to the Digital Order
foreach($_REQUEST as $key => $value) {
	if (strlen($value) > 0) {
		$conn->addDigitalOrderField($key, $value);
	}
}

// Add original order HTML so that another transaction can be attempted.
$conn->addDigitalOrderField("AgainLink", $againLink);

// Obtain a one-way hash of the Digital Order data and add this to the Digital Order
$secureHash = $conn->hashAllFields();
$conn->addDigitalOrderField("Title", $title);
$conn->addDigitalOrderField("vpc_SecureHash", $secureHash);
$conn->addDigitalOrderField("vpc_SecureHashType", "SHA256");

// Obtain the redirection URL and redirect the web browser
$vpcURL = $conn->getDigitalOrder($vpcURL);

header("Location: ".$vpcURL);
//echo "<a href=$vpcURL>$vpcURL</a>";

?>