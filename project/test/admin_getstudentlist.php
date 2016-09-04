<?php
$con=mysqli_connect('localhost','root','','sampledata');
if(!$con)
{
	echo"connection failed";
	exit();
}
mysqli_select_db($con,"student_biodata");
$query="SELECT name,admissionno,sem,branch FROM student_biodata";
$result=mysqli_query($con,$query);



while ($row=mysqli_fetch_assoc($result))
{	
	$brch=$row['branch'];
	$sem=$row['sem'];
	$branchsem=$row['branch'];
	$branchsem.=$row['sem'];
	switch($branchsem)
	{
		case 'R7':
				$query1="INSERT INTO R7_sessionals(admno,name) SELECT admissionno,name FROM student_biodata WHERE branch='$brch' AND sem='$sem'";
				mysqli_query($con,$query1);
				break;
		case 'R8':
				$query1="INSERT INTO R8_sessionals(admno,name) SELECT admissionno,name FROM student_biodata WHERE branch='$brch' AND sem='$sem'";
				mysqli_query($con,$query1);
				break;		

	}
}
echo '<script type="text/javascript">alert("Updation Successful!!");window.history.go(-1);</script>';
    	       header("Refresh:0;url:adminhomepage.php");
             mysqli_close($con);



?>