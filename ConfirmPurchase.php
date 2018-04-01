<?php


include 'dbh2.php';


$PurchaseID=$_GET['PurchaseID'];
	
	
$sql="UPDATE purchase SET confirm =1 WHERE PurchaseID=$PurchaseID";
$query=mysqli_query($conn,$sql);




	header("Location:PurchaseConfirmed.php");
	
	

	
?>