<?php
session_start();
$con=mysqli_connect('localhost','root','','sampledata');
$selected=mysqli_select_db($con,"r_subjectlist");
$dept = $_GET["dept-choice"];
if($dept == "R")
{
	$dbselected='r_subjectlist';
}
if($dept == "M")
{
	$dbselected='m_subjectlist';
}
if($dept == "P")
{
	$dbselected='p_subjectlist';
}
if($dept == "U")
{
	$dbselected='u_subjectlist';
}
if($dept == "B")
{
	$dbselected='b_subjectlist';
}
if($dept == "T")
{
	$dbselected='t_subjectlist';
}
$choice=$_GET["first-choice"];
$query="SELECT `sub_name` FROM `$dbselected` WHERE `sem`='$choice'";
$result=mysqli_query($con, $query);
while($row=mysqli_fetch_assoc($result))
{
	echo "<option>".$row['sub_name']."</option>";
	
} 

?>