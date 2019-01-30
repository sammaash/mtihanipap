<?php
include_once 'dbConnection.php';
ob_start();
$cname = $_POST['coursename'];
$fname = $_POST['facname'];
$ccode = $_POST['coursecode'];



$q3=mysqli_query($con,"INSERT INTO courses VALUES  ('$cname' , '$fname' ,'$ccode' )");
if($q3)
{
// session_start();
// $_SESSION["email"] = $email;
// $_SESSION["name"] = $name;

// header("location:account.php?q=1");
$message = "$cname has been successfully added";
echo "<script type='text/javascript'>alert('$message');
window.location.href='dash.php?q=29';
</script>";
}
else
{
// header("location:index.php?q7=Email Already Registered!!!");
	echo("not successful");
}
ob_end_flush();
?>