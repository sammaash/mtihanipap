<?php
if(isset($_POST['get_course'])){
  $faculty = $_POST['get_course'];
  $course = getCourses($faculty);
  echo json_encode($course),
  die();
}
if(isset($_POST['get_codes'])){
  $faculty = $_POST['get_codes'];
  $code = getCodes($course);
  echo json_encode($code);
  die();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Project Worlds || DASHBOARD </title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>
<style type="text/css">
  a.disable {
  pointer-events: none;
  cursor: default;
}

</style>
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

<script>
$(function () {
    $(document).on( 'scroll', function(){
        console.log('scroll top : ' + $(window).scrollTop());
        if($(window).scrollTop()>=$(".logo").height())
        {
             $(".navbar").addClass("navbar-fixed-top");
        }

        if($(window).scrollTop()<$(".logo").height())
        {
             $(".navbar").removeClass("navbar-fixed-top");
        }
    });
});</script>

</head>

<body  style="background:#eee;">
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">EXAM SIMULATOR</span></div>
<?php
 include_once 'dbConnection.php';
session_start();
$email=$_SESSION['email'];
$faculty=$_SESSION['faculty'];
$course=$_SESSION['course'];
  if(!(isset($_SESSION['email']))){
header("location:index.php");

}
else
{
$name = $_SESSION['name'];;

include_once 'dbConnection.php';
echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="account.php" class="log log1">'.$name.'</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
}?>

</div></div>
<!-- admin start-->

<!--navigation menu-->
<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="dash.php?q=0"><b>Dashboard</b></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(@$_GET['q']==0) echo'class="active"'; ?>><a href="dash.php?q=0">Home<span class="sr-only">(current)</span></a></li>
        
           
    <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="dash.php?q=2">Ranking</a></li>
    <li <?php if(@$_GET['q']==3) echo'class="active"'; ?>><a href="dash.php?q=3">Feedback</a></li>
        <li class="dropdown <?php if(@$_GET['q']==4 || @$_GET['q']==5) echo'active"'; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quiz<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="dash.php?q=4">Add Quiz</a></li>
            <li><a href="dash.php?q=5">Remove Quiz</a></li>
      
          </ul>
          <li class="dropdown <?php if(@$_GET['q']==1 || @$_GET['q']==12) echo'active"'; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User(s)<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="dash.php?q=12">Add user</a></li>
            <li><a href="dash.php?q=1">View Users</a></li>
      
          </ul>


        </li>

        <li class="dropdown <?php if(@$_GET['q']==19 || @$_GET['q']==29) echo'active"'; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Course(s)<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a <?php if($email!="admin@admin.com") echo'class="disable"'; ?> href="dash.php?q=29">Add course</a></li>
            <li><a  <?php if($email!="admin@admin.com") echo'class="disable"'; ?>href="dash.php?q=19">View courses</a></li>
      
          </ul>


        </li>
        <li class="dropdown <?php if(@$_GET['q']==21 && $email=="admin@admin.com" || @$_GET['q']==31 && $email=="admin@admin.com" ) echo'active"';  ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin(s)<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a <?php if($email!="admin@admin.com") echo'class="disable"'; ?> href="dash.php?q=21">Add admins</a></li>
            <li><a  <?php if($email!="admin@admin.com") echo'class="disable"'; ?>href="dash.php?q=31">View admins</a></li>
      
          </ul>


        </li>
        



        <li class="pull-right"> <a href="logout.php?q=account.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Signout</a></li>
    
      </ul>
          </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">
<!--home start-->

<?php if(@$_GET['q']==0) {
  $email=$_SESSION['email'];

  if($email=="admin@admin.com"){

  $result = mysqli_query($con,"SELECT * FROM quiz  ORDER BY date DESC") or die('You have no exams set yet');
  }
  elseif($email!="admin@admin.com")
{
$result = mysqli_query($con,"SELECT * FROM quiz WHERE faculty='$faculty' and course='$course' ORDER BY date DESC") or die('You have no exams set yet');  
}

echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
  $title = $row['title'];
  $total = $row['total'];
  $sahi = $row['sahi'];
    $time = $row['time'];
  $eid = $row['eid'];/**/
/*$q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error98');
$rowcount=mysqli_num_rows($q12);  
*/
/*if($rowcount == 0){
  echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
  <td><b></b></td></tr>';
}
else
{*/
echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
  <td><b></b></td></tr>';

}
$c=0;
echo '</table></div></div>';

}

//ranking start
if(@$_GET['q']== 2) 
{
  $faculty=$_SESSION['faculty'];
$course=$_SESSION['course'];
$q=mysqli_query($con,"SELECT * FROM rank WHERE faculty='$faculty' and course='$course'" )or die('Error223');
echo  '<div class="panel title"><div class="table-responsive">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>Rank</b></td><td><b>Name</b></td><td><b>College No:</b></td><td><b>Score</b></td><td><b>Email</b></td></tr>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
  $faculty=$_SESSION['faculty'];
$course=$_SESSION['course'];
$e=$row['email'];
$s=$row['score'];
$faculty=$row['faculty'];
$course=$row['course'];
$q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e'")or die('Error231');
while($row=mysqli_fetch_array($q12) )
{
$name=$row['name'];
$colno=$row['colno'];

}
$c++;
echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$name.'</td><td>'.$colno.'</td><td>'.$s.'</td><td>'.$email.'</td><td>';
}
echo '</table></div></div>';}

?>


<!--home closed-->
<!--users start-->
<?php if(@$_GET['q']==1) {  
$faculty=$_SESSION['faculty'];
$course=$_SESSION['course'];
$email=$_SESSION['email'];

  if($email=="admin@admin.com"){

  $result = mysqli_query($con,"SELECT * FROM user ") or die('You have no exams set yet');
  }
  elseif($email!="admin@admin.com")
{
$result = mysqli_query($con,"SELECT * FROM user  WHERE facaulty='$faculty' and course='$course'") or die('No students enrolled in your unit yet');
}
echo  '<div class="panel"><div class="tabranle-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Name</b></td><td><b>college number</b></td><td><b>Email</b></td><td><b>Mobile</b></td><td><b>Faculty</b></td><td><b>Course</b></td><td></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
  $name = $row['name'];
  $mob = $row['mob'];
  $colno = $row['colno'];
    $email = $row['email'];
    $emaili = $_SESSION['email'];
    $course = $row['course'];
    $faculty = $row['facaulty'];
    if($emaili!="admin@admin.com"){
      echo '<tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$colno.'</td><td>'.$email.'</td><td>'.$mob.'</td><td>'.$faculty.'</td><td>'.$course.'</td>
  <td><a class="disable" title="Delete User" href="update.php?demail='.$email.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
    }
    elseif ($emaili=="admin@admin.com") {
    echo '<tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$colno.'</td><td>'.$email.'</td><td>'.$mob.'</td><td>'.$faculty.'</td><td>'.$course.'</td>
  <td><a title="Delete User" href="update.php?demail='.$email.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';

    }
    
  
}
$c=0;
echo '</table></div></div>';

}?>

<?php if(@$_GET['q']==19) {

$result = mysqli_query($con,"SELECT * FROM courses") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Course</b></td><td><b>Faculty</b></td><td><b>code</b></td><td></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
  $course = $row['course'];
  $faculty = $row['faculty'];
  $code = $row['code'];
 echo '<tr><td>'.$c++.'</td><td>'.$course.'</td><td>'.$faculty.'</td><td>'.$code.'</td>
  <td><a title="Delete Course" href="update.php?demaili='.$code.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
}
$c=0;
echo '</table></div></div>';
}
if(@$_GET['q']==29) {
  echo'
  <script>

</script>
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter course details</b></span><br/><br/>
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="coursereg.php"  method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="facname" placeholder="Enter the Faculty" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="coursename" placeholder="Enter the Course" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="coursecode" placeholder="Enter the course code" class="form-control input-md" type="text">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>
</div>';

}


?>


<!--user end-->
<!--add user -->
<?php
if(@$_GET['q']==12) {
$result = mysqli_query($con,"SELECT * FROM courses") or die('Error');
while($row = mysqli_fetch_array($result)) {
  $course = $row['course'];
  $faculty = $row['faculty'];
  $code = $row['code'];
}
echo ' 
<script>

function randomPassword(length) {
    var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
    var pass = "";
    for (var x = 0; x < length; x++) {
        var i = Math.floor(Math.random() * chars.length);
        pass += chars.charAt(i);
    }
    return pass;
}

function generate() {
    form.password.value = randomPassword(form.length.value);
}
</script>
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter New User Details</b></span><br/><br/>
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="sign.php"  method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Enter your name" class="form-control input-md" type="text">
    <input type="hidden" name="length" value="6"> 
  </div>
</div>




<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="college" name="colno" placeholder="Enter your college Admission No" class="form-control input-md" type="text">
    
  </div>
</div> 



<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  Select the Faculty of your course
  <select id="faculty" name="faculty" placeholder="Enter your faculty" class="form-control input-md">
  <option value = "" ></option>
 <option value="CIT">CIT</option>
  <option value="ENG">ENG</option>
  <option value="Social sciences">Social sciences</option>
  <option value="FAMECO">FAMECO</option>
  </select>
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  Select the Course
  <select id="course" name="course" placeholder="Enter your course" class="form-control input-md">
    <option value = "" ></option>
  </select>
    
  </div>
</div>

 
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label title1" for="email"></label>
  <div class="col-md-12">
    <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="mob"></label>  
  <div class="col-md-12">
  <input id="mob" name="mob" placeholder="Enter your mobile number" class="form-control input-md" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="password"></label>
  <div class="col-md-12">
    <input id="password" name="password" placeholder="Enter your password" class="form-control input-md" type="password">&nbsp;
                <input type="button" class="button" value="Generate" onClick="generate();" tabindex="2">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>
</div>';



}
?>

<?php
if(@$_GET['q']==21) {

echo ' 
<script>
function validateForm() {var x = document.forms["form"]["email"].value;var atpos = x.indexOf("@");
var dotpos = x.lastIndexOf(".");if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {alert("Not a valid e-mail address.");return false;}var a = document.forms["form"]["password"].value;if(a == null || a == ""){alert("Password must be filled out");return false;}if(a.length<5 || a.length>25){alert("Passwords must be 5 to 25 characters long.");return false;}
}
function randomPassword(length) {
    var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
    var pass = "";
    for (var x = 0; x < length; x++) {
        var i = Math.floor(Math.random() * chars.length);
        pass += chars.charAt(i);
    }
    return pass;
}

function generate() {
    form.password.value = randomPassword(form.length.value);
}
</script>
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter New Admin Details</b></span><br/><br/>
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="asign.php"  method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Enter lecturers name" class="form-control input-md" type="text">
    <input type="hidden" name="length" value="6"> 
  </div>
</div>




<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="college" name="colno" placeholder="Enter the lecturers number" class="form-control input-md" type="text">
    
  </div>
</div> 

<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  Select the Faculty of your course
  <select id="faculty" name="faculty" placeholder="Enter your faculty" class="form-control input-md">
  <option value = "" ></option>
 <option value="CIT">CIT</option>
  <option value="ENG">ENG</option>
  <option value="Social sciences">Social sciences</option>
  <option value="FAMECO">FAMECO</option>
  </select>
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  Select the Course
  <select id="course" name="course" placeholder="Enter your course" class="form-control input-md">
    <option value = "" ></option>
  </select>
    
  </div>
</div>

 
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label title1" for="email"></label>
  <div class="col-md-12">
    <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="mob"></label>  
  <div class="col-md-12">
  <input id="mob" name="mob" placeholder="Enter your mobile number" class="form-control input-md" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="password"></label>
  <div class="col-md-12">
    <input id="password" name="password" placeholder="Enter your password" class="form-control input-md" type="password">&nbsp;
                <input type="button" class="button" value="Generate" onClick="generate();" tabindex="2">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>
</div>';



}
?>

<?php if(@$_GET['q']==31) {

$result = mysqli_query($con,"SELECT * FROM Admin") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Admin name</b></td><td><b>Email</b></td><td><b>Lec number</b></td><td></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
  $name = $row['name'];
  $email = $row['email'];
  $code = $row['colno'];
 echo '<tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$email.'</td><td>'.$code.'</td>
  <td><a title="Delete admin" href="update.php?demailie='.$code.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
}
$c=0;
echo '</table></div></div>';
}
?>

<?php

if(@$_GET['q']==39) {

echo ' 
<script>
function validateForm() {var x = document.forms["form"]["email"].value;var atpos = x.indexOf("@");
var dotpos = x.lastIndexOf(".");if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {alert("Not a valid e-mail address.");return false;}var a = document.forms["form"]["password"].value;if(a == null || a == ""){alert("Password must be filled out");return false;}if(a.length<5 || a.length>25){alert("Passwords must be 5 to 25 characters long.");return false;}
}

</script>
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter New Admin Details</b></span><br/><br/>
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="asign.php"  method="POST">
<fieldset>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="college" name="colno" placeholder="Enter the unit name" class="form-control input-md" type="text">
    
  </div>
</div> 

<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  Select the Faculty of your course
  <select id="faculty" name="faculty" placeholder="Enter the faculty" class="form-control input-md">
  <option value = "" ></option>
 <option value="CIT">CIT</option>
  <option value="ENG">ENG</option>
  <option value="Social sciences">Social sciences</option>
  <option value="FAMECO">FAMECO</option>
  </select>
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  Select the Course
  <select id="course" name="course" placeholder="Enter your course" class="form-control input-md">
    <option value = "" ></option>
  </select>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  Select the Course code
  <select id="code" name="code" placeholder="Enter the course code" class="form-control input-md">
    <option value = "" ></option>
  </select>
    
  </div>
</div>




 



<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>
</div>';



}
?>




<?php if(@$_GET['q']==3) {
  $faculty=$_SESSION['faculty'];
$course=$_SESSION['course'];
$result = mysqli_query($con,"SELECT * FROM `feedback` WHERE course='$course' ORDER BY `feedback`.`date` DESC") or die('No feedback');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Subject</b></td><td><b>Email</b></td><td><b>Date</b></td><td><b>Time</b></td><td><b>By</b></td><td></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
  $date = $row['date'];
  $date= date("d-m-Y",strtotime($date));
  $time = $row['time'];
  $subject = $row['subject'];
  $name = $row['name'];
  $email = $row['email'];
  $id = $row['id'];
   echo '<tr><td>'.$c++.'</td>';
  echo '<td><a title="Click to open feedback" href="dash.php?q=3&fid='.$id.'">'.$subject.'</a></td><td>'.$email.'</td><td>'.$date.'</td><td>'.$time.'</td><td>'.$name.'</td>
  <td><a title="Open Feedback" href="dash.php?q=3&fid='.$id.'"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b></a></td>';
  echo '<td><a title="Delete Feedback" href="update.php?fdid='.$id.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td>

  </tr>';
}
echo '</table></div></div>';
}
?>
<!--feedback closed-->

<!--feedback reading portion start-->
<?php if(@$_GET['fid']) {
echo '<br />';
$id=@$_GET['fid'];
$result = mysqli_query($con,"SELECT * FROM feedback WHERE id='$id' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
  $name = $row['name'];
  $subject = $row['subject'];
  $date = $row['date'];
  $date= date("d-m-Y",strtotime($date));
  $time = $row['time'];
  $feedback = $row['feedback'];
  
echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>'.$subject.'</b></h1>';
 echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">-&nbsp;<b>DATE:</b>&nbsp;'.$date.'</span>
<span style="line-height:35px;padding:5px;">&nbsp;<b>Time:</b>&nbsp;'.$time.'</span><span style="line-height:35px;padding:5px;">&nbsp;<b>By:</b>&nbsp;'.$name.'</span><br />'.$feedback.'</div></div>';}
}?>
<!--Feedback reading portion closed-->

<!--add quiz start-->
<?php
if(@$_GET['q']==4 && !(@$_GET['step']) ) {
echo ' 

<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Quiz Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Enter Quiz title" class="form-control input-md" type="text">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  Select the Faculty
  <select id="faculty" name="faculty" placeholder="Enter your faculty" class="form-control input-md">
  <option value = "" ></option>
 <option value="CIT">CIT</option>
  <option value="ENG">ENG</option>
  <option value="Social sciences">Social sciences</option>
  <option value="FAMECO">FAMECO</option>
  </select>
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  Select the Course
  <select id="course" name="course" placeholder="Enter your course" class="form-control input-md">
    <option value = "" ></option>
  </select>
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>  
  <div class="col-md-12">
  <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">
    
  </div>
</div>
<!-- Date input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="right"></label>  
  <div class="col-md-12">
  Scheduled date and time for exam
  <input type="datetime-local" name="date">
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="right"></label>  
  <div class="col-md-12">
  <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="wrong"></label>  
  <div class="col-md-12">
  <input id="wrong" name="wrong" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="time"></label>  
  <div class="col-md-12">
  <input id="time" name="time" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="tag"></label>  
  <div class="col-md-12">
  <input id="tag" name="tag" placeholder="Enter #tag which is used for searching" class="form-control input-md" type="text">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="desc"></label>  
  <div class="col-md-12">
  <textarea rows="8" cols="8" name="desc" class="form-control" placeholder="Write description here..."></textarea>  
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?>
<!--add quiz end-->

<!--add quiz step2 start-->
<?php
if(@$_GET['q']==4 && (@$_GET['step'])==2 ) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">
<fieldset>
';
 
 for($i=1;$i<=@$_GET['n'];$i++)
 {
echo '<b>Question number&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..."></textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'1"></label>  
  <div class="col-md-12">
  <input id="'.$i.'1" name="'.$i.'1" placeholder="Enter option a" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'2"></label>  
  <div class="col-md-12">
  <input id="'.$i.'2" name="'.$i.'2" placeholder="Enter option b" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'3"></label>  
  <div class="col-md-12">
  <input id="'.$i.'3" name="'.$i.'3" placeholder="Enter option c" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'4"></label>  
  <div class="col-md-12">
  <input id="'.$i.'4" name="'.$i.'4" placeholder="Enter option d" class="form-control input-md" type="text">
    
  </div>
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer " class="form-control input-md" >
   <option value="a">Select answer for question '.$i.'</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br />'; 
 }
    
echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?><!--add quiz step 2 end-->

<!--remove quiz-->
<?php if(@$_GET['q']==5) {

$result = mysqli_query($con,"SELECT * FROM quiz  WHERE faculty='$faculty' and course='$course' ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
  $title = $row['title'];
  $total = $row['total'];
  $sahi = $row['sahi'];
    $time = $row['time'];
  $eid = $row['eid'];
  echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
  <td><b><a href="update.php?q=rmquiz&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></td></tr>';
}
$c=0;
echo '</table></div></div>';

}
?>


</div><!--container closed-->
</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $("#course").parent().hide();
    $("#faculty").change(function(){
      if($(this).val().trim() != ""){
        $("#course").parent().slideDown();
        $.ajax({
          url: "dash.php",
          type: "POST",
          dataType: "json",
          data:{"get_course":$(this).val().trim()}
        }).done(function(data){
          //alert(data);
          $("#course").html("<option>select the course</option>");
          for(var course in data){
            //alert(data[course]);
            $('#course').append($('<option>', {
                                                    value: data[course],
                                                    text: data[course]
                                                }));
        
          }
          
        });        
      }  else {
            $("#course").parent().slideUp();
          }
    });
  });
</script>
</body>
</html>
<?php
  function  getCourses($faculty_name){
      $con= mysqli_connect("localhost","root" ,"","quiz_new") or die("error");
      $q = "SELECT DISTINCT course FROM `courses` WHERE faculty LIKE '$faculty_name'";
      $courses = array();
      if($query = mysqli_query($con,$q)){
        $count=0;
          while($res = mysqli_fetch_assoc($query)){
            $courses["course".$count] = $res["course"];
            $count++;
          }
      }
      //print_r($courses);
      return $courses;
  }
  function  getCodes($faculty_name){
      $con= mysqli_connect("localhost","root" ,"","quiz_new") or die("error");
      $q = "SELECT DISTINCT code FROM `courses` WHERE course LIKE '$course_name'";
      $codes = array();
      if($query = mysqli_query($con,$q)){
        $count=0;
          while($res = mysqli_fetch_assoc($query)){
            $codes["code".$count] = $res["code"];
            $count++;
          }
      }
      //print_r($courses);
      return $codes;
  }
?>
