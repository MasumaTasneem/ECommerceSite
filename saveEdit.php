<?php

session_start();
include'dbh2.php';

$ReviewID=$_SESSION['ReviewID'];
if($ReviewID)
{
	echo $ReviewID;
	
}else {echo 'ID not received';}
if(isset($_POST['Save']))
{
	$Review=$_POST['Review'];
	

	
$sql_3="UPDATE review SET Review= '$Review'  WHERE ReviewID= $ReviewID";
if(!mysqli_query($conn,$sql_3))
{
	echo 'Not inserted';
}
else
{
	header("Location: loggedinReview.php");
}

	
}
?>