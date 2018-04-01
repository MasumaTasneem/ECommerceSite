<?php
session_start();
include 'dbh2.php';
$ProductID=$_SESSION['ProductID'];
$UserName=$_SESSION['UserName'];

echo $ProductID;
$sql_ID="SELECT UserID FROM userinfo WHERE UserName='$UserName'";
$result=mysqli_query($conn,$sql_ID);
$rowID=mysqli_fetch_array($result);
$UserID=$rowID['UserID'];
$Review= $_POST['Review'];
echo $Review;

if(isset($_POST)){
		
		$sql_3="INSERT INTO review( UserID,ProductID,Review) VALUES ('$UserID','$ProductID','$Review')";
		if(!mysqli_query($conn,$sql_3))
		{
			echo 'Not inserted';
		}
		else
		{
			echo 'Message is inserted';
		}
}

header("Location: loggedinReview.php");
?>



 


 