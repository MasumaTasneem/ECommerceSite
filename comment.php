<?php
session_start();
include'dbh2.php';
$ProductID=$_GET['ProductID'];
$UserName=$_SESSION['UserName'];
$sql_ID="SELECT UserID FROM userinfo WHERE UserName='$UserName'";
$result=mysqli_query($conn,$sql_ID);
$rowID=mysqli_fetch_array($result);
$UserID=$rowID['UserID'];
//echo $ProductID, $UserId;

echo $ProductID;
if($ProductID && $UserID)
{
	$_SESSION['ProductID']=$ProductID;
	header("Location:loggedinReview.php");
 
	

}
else
{
	header("Location:allProducts.php");
}


 ?>
