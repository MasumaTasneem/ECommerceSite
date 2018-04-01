<?php

session_start();
include'dbh2.php';

	$UserName=$_SESSION['UserName'];
	//echo $UserName;
	$sql_ID="SELECT UserID FROM userinfo WHERE UserName='$UserName'";
	$result=mysqli_query($conn,$sql_ID);
	$rowID=mysqli_fetch_array($result);
	$UserID=$rowID['UserID'];
	$PaymentID=$_GET['PaymentID'];
	$sql="SELECT PaymentID FROM payment WHERE PaymentID='$PaymentID'";
	$query=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($query);
	$PaymentID=$row['PaymentID'];
	$_SESSION['PaymentID']=$PaymentID;
	
	//echo $PaymentID;
	//echo $UserID;
	
	$sql_book="SELECT * from cart where UserID=$UserID";
	$res=mysqli_query($conn,$sql_book);
	
	while($row=mysqli_fetch_array($res)):
	
	$ProductID=$row['ProductID'];
	$sql="INSERT INTO purchase(UserID,ProductID,UnitPrice,PurchaseQuantity,PaymentID) VALUES ($UserID,$ProductID,(SELECT UnitPrice FROM product WHERE ProductID=$ProductID),1,$PaymentID)";
	$query=mysqli_query($conn,$sql);
	if($query)
	{
		$sql2="DELETE FROM cart WHERE UserID=$UserID";
		$query2=mysqli_query($conn,$sql2);
		//echo 'inserted and deleted';
		header("Location: profilesunrise.html");
		
	} 
	else echo 'not inserted';
	//echo 'Thanks for shopping with us! :)';
	
	endwhile;
			
?>


