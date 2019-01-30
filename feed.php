<?php
include_once 'dbConnection.php';
$ref=@$_GET['q'];
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$faculty = $_POST['faculty'];
$course= $_POST['course'];
$id=uniqid();
$date=date("Y-m-d");
$time=date("h:i:sa");
$feedback = $_POST['feedback'];
$q=mysqli_query($con,"INSERT INTO feedback VALUES  ('$id' , '$name', '$email' , '$subject', '$feedback' , '$date' , '$time','$course','$faculty')");
if($q){
	$message = "Thank you for your valuable feedback";
echo "<script type='text/javascript'>alert('$message');
window.location.href='account.php?q=1';
</script>";
}
?>