<?php


$course=$_POST['course'];
$dept=$_POST['dept'];
$sem=$_POST['sem'];
$sub_code=$_POST['sub_code'];
$sub=$_POST['sub'];
$scheme=$_POST['scheme'];

$con=mysqli_connect('localhost','root','','sampledata');
if(!$con)
	{
		echo "connection failed";
		die();
	}
	else
	{
	 if(!empty($sub_code)||!empty($sub)||!empty($scheme))
	 {
		if(strcmp($dept,'M')==0)
		{
		mysqli_select_db($con,"m_subjectlist");
		$query="INSERT INTO m_subjectlist(sub_code,sub_name,sem,scheme,course) VALUES('$sub_code','$sub','$sem','$scheme','$course')";
	    }
	    elseif(strcmp($dept,'P')==0)
		{
		mysqli_select_db($con,"p_subjectlist");
		$query="INSERT INTO p_subjectlist(sub_code,sub_name,sem,scheme,course) VALUES('$sub_code','$sub','$sem','$scheme','$course')";
	    }
	    elseif(strcmp($dept,'U')==0)
		{
		mysqli_select_db($con,"u_subjectlist");
		$query="INSERT INTO u_subjectlist(sub_code,sub_name,sem,scheme,course) VALUES('$sub_code','$sub','$sem','$scheme','$course')";
	    }
	    elseif(strcmp($dept,'T')==0)
		{
		mysqli_select_db($con,"t_subjectlist");
		$query="INSERT INTO t_subjectlist(sub_code,sub_name,sem,scheme,course) VALUES('$sub_code','$sub','$sem','$scheme','$course')";
	    }
	    elseif(strcmp($dept,'B')==0)
		{
		mysqli_select_db($con,"b_subjectlist");
		$query="INSERT INTO b_subjectlist(sub_code,sub_name,sem,scheme,course) VALUES('$sub_code','$sub','$sem','$scheme','$course')";
	    }
	    elseif(strcmp($dept,'R')==0)
		{
		mysqli_select_db($con,"r_subjectlist");
		$query="INSERT INTO r_subjectlist(sub_code,sub_name,sem,scheme,course) VALUES('$sub_code','$sub','$sem','$scheme','$course')";
	    }

	  if(!mysqli_query($con,$query))
        {
    	  
           printf("ERROR: %s",mysqli_error($con));
    	   exit();
        }
        header("Location: hod_addsubpage.php");
        mysqli_close($con);
    }
    else
    {
    	header("Refresh:0;url:hod_addsubpage.php");
        echo '<script type="text/javascript">alert("Fields cannot be empty");window.history.go(-1);</script>';

    }
	}
	
?>