<?php

session_start();
include'dbh2.php';
$ReviewID=$_GET['ReviewID'];
$UserName=$_SESSION['UserName'];
$sql_ID="SELECT UserID FROM userinfo WHERE UserName='$UserName'";
$result=mysqli_query($conn,$sql_ID);
$rowID=mysqli_fetch_array($result);
$UserID=$rowID['UserID'];

$sql_del="SELECT UserID from review WHERE ReviewID=$ReviewID";
$res=mysqli_query($conn,$sql_del);
$res_del=mysqli_fetch_array($res);
$delUserID=$res_del['UserID'];


if($ReviewID && ($UserID == $delUserID || ($UserName=='Maisha' || $UserName=='sarah')))
{
	
  
   $sql2="DELETE FROM review WHERE ReviewID=$ReviewID ";
   if(!mysqli_query($conn,$sql2))
   {
	   echo 'Not deleted';
   }
   else
   {
	  header("Location: loggedinReview.php");
   }
}

else
{
	echo 'Sorry '.$UserName.' you cannot delete this post';
}


?>

	
	