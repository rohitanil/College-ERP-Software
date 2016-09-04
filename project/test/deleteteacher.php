<?php
session_start();
$user1=$_SESSION['user'];
$name=$_POST["name"];
$dept=$_POST["dept"];
$desig=$_POST["designation"];



$con=mysqli_connect('localhost','root','','sampledata');
if(!$con)
{
	echo"connection failed";
	exit();
}
elseif((!empty($name)))
    {
		mysqli_select_db($con,"teacher");
	   $query="DELETE FROM teacher WHERE username='$name' AND dept='$dept' AND desig='$desig'";
       
        if((mysqli_query($con,$query)))
        {
            header("Location:admin_deleteteacherpage.php");
            echo '<script type="text/javascript">alert("Deletion Successful!!");window.history.go(-1);</script>';
    	    
           
       
             mysqli_close($con);
           
        }
        
       else
       {
        printf("ERROR: %s",mysqli_error($con));
        exit();
       }
    }
else
    {
        header("Refresh:0;url:admin_deleteteacherpage.php");
        echo '<script type="text/javascript">alert("Fields cannot be empty");window.history.go(-1);</script>';

    }


?>