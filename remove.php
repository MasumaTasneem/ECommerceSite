<?php

session_start();
include'dbh2.php';

$ProductID=$_GET['ProductID'];




if($ProductID )
{
	
	$sql="DELETE FROM cart WHERE ProductID=$ProductID ";
	if(!mysqli_query($conn,$sql))
{
	echo 'Not deleted';
}
else
{ 
   
	//   echo 'Data is deleted';
	  header("Location: showcart.php");
   
}
}




?>

	
	