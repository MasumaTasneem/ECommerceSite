<?php
session_start();
include 'dbh2.php';
$UserName=$_SESSION['UserName'];
//$UserID=$_SESSION['UserID'];
$sql_ID="SELECT UserID FROM userinfo WHERE UserName='$UserName'";
$result=mysqli_query($conn,$sql_ID);
$rowID=mysqli_fetch_array($result);
$UserID=$rowID['UserID'];

if($UserID)
{
	header("Location: profileSunrise.html");
	$_SESSION['UserID']=$UserID;
	$_SESSION['UserName']=$UserName;
}
else
{
	header("Location: sunrise.html");
}

?>



 


 