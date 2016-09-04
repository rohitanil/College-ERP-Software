<?php
session_start();
$contact= $_POST["contact"];
$e_id=$_POST["emailid"];
$new_pass=$_POST["newpass"];
$conf_pass=$_POST["confirmpass"];
$address=$_POST["address"];
$publi=$_POST["publication"];
$user=$_SESSION['user'];


$con=mysqli_connect('localhost','root','','sampledata');
if(!$con)
{
	echo"connection failed";
	exit();
}

elseif((!empty($contact))&&(!empty($e_id))&&(!empty($new_pass))&&(!empty($conf_pass))&&(!empty($address)))
{
 if (filter_var($e_id, FILTER_VALIDATE_EMAIL)) 
 {
  if(strcmp($new_pass,$conf_pass)==0)
  {	
	mysqli_select_db($con,"login");
	mysqli_query($con,"UPDATE login SET pass= '$new_pass' WHERE user='$user'");
	mysqli_select_db($con,"teacher");
	mysqli_query($con,"UPDATE teacher SET address= '$address' WHERE name='$user'");
	mysqli_query($con,"UPDATE teacher SET mob_no= '$contact' WHERE name='$user'");
	mysqli_query($con,"UPDATE teacher SET mail_id= '$e_id' WHERE name='$user'");
	mysqli_query($con,"UPDATE teacher SET publication= '$publi' WHERE name='$user'");
	header("Location:home.php");

  }
 else
  {
	header("Refresh:0;url:teacherdetailpage.php");
	echo '<script type="text/javascript">alert("Password mismatch!!!");window.history.go(-1);</script>';

  }
}
else
{

   echo '<script type="text/javascript">alert("Invalid email address!");window.history.go(-1);</script>';
	header("Refresh:0;url:admissionpage.php");
}
}
else
{
header("Refresh:0;url:teacherdetailpage.php");
echo '<script type="text/javascript">alert("Fields cannot be empty!!!");window.history.go(-1);</script>';

}
mysqli_close($con);
?>