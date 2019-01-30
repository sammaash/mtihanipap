<?php
include_once 'dbConnection.php';
ob_start();
$name = $_POST['name'];
$name= ucwords(strtolower($name));
$colno = $_POST['colno'];
$email = $_POST['email'];
$mob = $_POST['mob'];
$password = $_POST['password'];
$course = $_POST['course'];
$faculty = $_POST['faculty'];
$name = stripslashes($name);
$name = addslashes($name);
$name = ucwords(strtolower($name));
$colno = stripslashes($colno);
$colno = addslashes($colno);
$email = stripslashes($email);
$email = addslashes($email);
// $college = stripslashes($college);
// $college = addslashes($college);
$mob = stripslashes($mob);
$mob = addslashes($mob);

$password = stripslashes($password);
$password = addslashes($password);
$password1=md5($password);

$q3=mysqli_query($con,"INSERT INTO user VALUES  ('$name' , '$colno' ,'$email' ,'$mob', '$password1','$faculty','$course')");
$to = $email;
  $subject = "Test mail";
  $message = "Your Username is ".$email."and password is"." ".$password;
  $from = "sammashme@gmail.com";
  $headers = "From:" . $from;
  mail($to,$subject,$message,$headers);
if($q3)
{
// session_start();
// $_SESSION["email"] = $email;
// $_SESSION["name"] = $name;

// header("location:account.php?q=1");
$message = "$name has been successfully added";
echo "<script type='text/javascript'>alert('$message');
window.location.href='dash.php?q=12';
</script>";
}
else
{
// header("location:index.php?q7=Email Already Registered!!!");
	echo("not successful");
}
ob_end_flush();
?>