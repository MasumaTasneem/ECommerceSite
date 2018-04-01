<?php
session_start();
include'dbh2.php';

$Rate=$_GET['Rating'];
$ProductID=$_GET['ProductID'];

$UserName=$_SESSION['UserName'];
//$UserID=$_SESSION['UserID'];
$sql_ID="SELECT UserID FROM userinfo WHERE UserName='$UserName'";
$result=mysqli_query($conn,$sql_ID);
$rowID=mysqli_fetch_array($result);
$UserID=$rowID['UserID'];


if($ProductID && $Rate && $UserID)
{
//	echo $ProductID, $UserID, $Rate;
	$sql="INSERT INTO rate( ProductID, UserID, Rating) SELECT $ProductID, $UserID, $Rate  LIMIT 1";
	 $result = $conn->query($sql);
	//  echo $ProductID, $UserID, $Rate;
	if(!mysqli_query($conn,$sql))
	{
	echo 'Not inserted';
	}
	else
	{
	$sql_update_rating="UPDATE advertisement SET Rating= (SELECT cast(avg(Rating) as int) FROM rate where ProductID=$ProductID) WHERE ProductID=$ProductID ";
	$query=mysqli_query($conn,$sql_update_rating);
	header("Location: allProducts.php");
	} 

}
else{
	header("Location:sunrise.html");
}



?>
