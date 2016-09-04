<?php
session_start();
$admnno=$_POST['admnno'];
$course=$_POST['course'];
$name=$_POST['name'];
$age=$_POST['age'];
$sex=$_POST['sex'];
$contact=$_POST['contact'];
$emailid=$_POST['emailid'];
$newpass=$_POST['newpass'];
$confpass=$_POST['confirmpass'];

$address=$_POST['address'];
$guardian=$_POST['guardian'];
$guardcontact=$_POST['guardcontact'];
$reli=$_POST['religion'];
$reser=$_POST['reservation'];

$Xmrk=$_POST['10marks'];
$XIImrk=$_POST['12marks'];
$Xboard=$_POST['10board'];
$XIIboard=$_POST['12board'];
$Xschool=$_POST['10school'];
$XIIschool=$_POST['12school'];
$dipmrk=$_POST['Dipmarks'];
$dipclg=$_POST['Dipcolg'];

$keam=$_POST['rank'];
$branch=$_POST['branch'];
$sem=$_POST['sem'];
$yoj=$_POST['YOJ'];


$desig='7';
$con=mysqli_connect('localhost','root','','sampledata');
if(!$con)
{
	echo"connection failed";
	exit();
}

if((!empty($admnno))&&(!empty($name))&&(!empty($age))&&(!empty($contact))&&(!empty($emailid))&&(!empty($newpass))&&(!empty($confpass))&&(!empty($address))&&(!empty($guardian))&&(!empty($guardcontact))&&(!empty($reli))&&(!empty($Xmrk))&&(!empty($Xschool))&&(!empty($Xboard))&&(!empty($XIImrk))&&(!empty($XIIschool))&&(!empty($XIIboard))&&(!empty($keam))&&(!empty($yoj)))
    
    {	 
    	

    
if (filter_var($emailid, FILTER_VALIDATE_EMAIL)) 
{
         

   

    if(strcmp($newpass, $confpass)==0)
    {
    	$query1="INSERT INTO student_biodata (admissionno,course,name,age,sex,address,emailid,mobno,guardian_name,guard_contact,religion,reservation,sem,X_marks,X_board,X_school,XII_marks,XII_board,XII_school,diploma,diploma_clg,keam_rank,branch,year_of_join) VALUES ('$admnno','$course','$name','$age','$sex','$address','$emailid','$contact','$guardian','$guardcontact','$reli','$reser','$sem','$Xmrk','$Xboard','$Xschool','$XIImrk','$XIIboard','$XIIschool','$dipmrk','$dipclg','$keam','$branch','$yoj')";

    	if((mysqli_query($con,$query1)))
    	{
    		$query2="INSERT INTO login (user2,pass,access_level,dept) VALUES ('$admnno','$newpass','$desig','$branch')";
            if(!mysqli_query($con,$query2))
            {
            	printf("ERROR: %s",mysqli_error($con));
                exit();
            }
            echo '<script type="text/javascript">alert("Insertion Successful!!Please logout!!");window.history.go(-1);</script>';          
        
            
    	}
    	else
    	{
    		printf("ERROR: %s",mysqli_error($con));
            exit();
    	}
    }
    else
    {
    
	echo '<script type="text/javascript">alert("Password mismatch!!!");window.history.go(-1);</script>';
	header("Refresh:0;url:admissionpage.php");
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
	header("Refresh:0;url:admissionpage.php");
    echo '<script type="text/javascript">alert("Fields cannot be empty!!!");window.history.go(-1);</script>';
}
mysqli_close($con);

?>