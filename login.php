<?php
session_start();
if(isset($_SESSION["email"])){
session_destroy();
}
include_once 'dbConnection.php';
$ref=@$_GET['q'];
$email = $_POST['email'];
$password = $_POST['password'];

$email = stripslashes($email);
$email = addslashes($email);
$password = stripslashes($password); 
$password = addslashes($password);
$password=md5($password); 
$result = mysqli_query($con,"SELECT * FROM user WHERE email = '$email' and password = '$password'") or die('Error');
$count=mysqli_num_rows($result);
if($count==1){
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$faculty = $row['facaulty'];
	$course = $row['course'];
}
$_SESSION["name"] = $name;
$_SESSION["email"] = $email;
$_SESSION["faculty"] = $faculty;
$_SESSION["course"] = $course;
header("location:account.php?q=1");
}
else
{$message = "Username and/or Password incorrect.\\nTry again.";
echo "<script type='text/javascript'>alert('$message');
window.location.href='index.php';
</script>";
#header("location:index.php");
}
#
	#header("location:$ref?w=Warning : Access denied");
#header("location:$ref?w=Wrong Username or Password");


?>