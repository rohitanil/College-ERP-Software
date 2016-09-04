<?php
session_start();
$db=$_SESSION['dbsel'];
$subcode=$_SESSION['subcode'];

$s="s";
$s.=$subcode;
$con=mysqli_connect('localhost','root','','sampledata');
if(!$con)
	{
		echo "connection failed";
		die();
	}

	$query="SELECT count(*) FROM `$db`";
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_array($result);
	$bound=$row[0];
	for($i=1;$i<=$bound;++$i)
	{
		$name="name";
		$admno="admno";
		$series1="series1";
		$series2="series2";
		$ass1="ass1";
		$ass2="ass2";
		$ass3="ass3";
		$attn="attn";
		$name.=$i;
		$admno.=$i;
		$series1.=$i;
		$series2.=$i;
		$ass1.=$i;
		$ass2.=$i;
		$ass3.=$i;
		$attn.=$i;
		

		$name=$_POST[$name];
		$admno=$_POST[$admno];
		$series1=$_POST[$series1];
		$series2=$_POST[$series2];
		$ass1=$_POST[$ass1];
		$ass2=$_POST[$ass2];
		$ass3=$_POST[$ass3];
		$attn=$_POST[$attn];

		$avg_marks=($series1+$series2)/4;
		$assgn_mrks=($ass1+$ass2+$ass3);
		$sessional=$avg_marks+$assgn_mrks+$attn;

		
		$query2="UPDATE `$db` SET  $s='$sessional' WHERE admno='$admno'";
		if(!mysqli_query($con,$query2))
		{
			printf("Error %s",mysqli_error($con));
			exit();
		}
		header("Location:home.php");

	}


?>