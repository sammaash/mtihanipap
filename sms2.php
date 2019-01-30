<?php
session_start();
include 'dbcon.php';
// $phone = $_SESSION['pno'];
// $message=$_SESSION['message'];
// Be sure to include the file you've just downloaded
require_once('AfricasTalkingGateway.php');
// Specify your login credentials
$username   = "leahshikoh";
//$username = "tukmen mogoria";
$apikey     = "caa61bc97c6ca846c5975c4f95fe35e7b5229f70eec6777ddb47a0dd97706597";
//$apikey = "1b782a3fb473ee72f53f1bf90b19c4304e798d4290c4bd9cf5950c93c06e6489";
// Specify the numbers that you want to send to in a comma-separated list
// Please ensure you include the country code (+254 for Kenya in this case)
$recipients = "+254".$_SESSION['pno'].;
// And of course we want our recipients to know what we really do
$message    = $_SESSION['message'];
// Create a new instance of our awesome gateway class
$gateway    = new AfricasTalkingGateway($username, $apikey);
// Any gateway error will be captured by our custom Exception class below, 
// so wrap the call in a try-catch block
try 
{ 
  // Thats it, hit send and we'll take care of the rest. 
  $results = $gateway->sendMessage($recipients, $message);
            
  foreach($results as $result) {
    // status is either "Success" or "error message"
    echo "<script type='text/javascript'>
alert('$message');
window.location.href='grid8.php';
</script>";
  }

}
catch ( AfricasTalkingGatewayException $e )
{
	echo "<script type='text/javascript'>
alert('Encountered an error while sending:');
window.location.href='grid8.php';
</script>";
  // echo "Encountered an error while sending: ".$e->getMessage();
}