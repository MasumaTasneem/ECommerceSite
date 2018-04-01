<?php
session_start();
include'dbh2.php';


$ProductID=$_GET['ProductID'];
$UserName=$_SESSION['UserName'];
$sql_quantity="SELECT Quantity FROM product where ProductID=$ProductID";
$search_result=filterTable($sql_quantity);
$row=mysqli_fetch_array($search_result);
$Quantity=$row['Quantity'];



function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "");
	$connect_db=mysqli_select_db($connect,"sunrise");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}


if($Quantity>0 && !empty($UserName))
{
$sql="INSERT INTO cart( ProductID, UserID, PurchaseQuantity) VALUES ($ProductID,(SELECT UserID FROM userinfo WHERE UserName='$UserName'),1)";
	if(!mysqli_query($conn,$sql))
	{
	echo 'Not inserted';
	}
	else
	{
	$_SESSION['UserName'] = $UserName;
	$_SESSION['ProductID'] = $ProductID;
	$_SESSION['UserID'] = $UserID;
	$_SESSION['PurchaseQuantity'] = $PurchaseQuantity;
	$sql_dec="UPDATE product SET Quantity = Quantity-1 WHERE ProductID = $ProductID";
	$dec=mysqli_query($conn,$sql_dec);
	header("Location: showcart.php");
	}
}
else {
	echo 'Out of stock';
	//header("Location:sunrise.html");
	
}
?>