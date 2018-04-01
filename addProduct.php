<?php


include 'dbh2.php';


$ProductID=$_GET['ProductID'];
	
	
$sql="UPDATE advertisement SET showAdd =1 WHERE ProductID=$ProductID";
$query=mysqli_query($conn,$sql);

if(!$query)
{
	echo "Unsuccessful";
	//echo $ProductID;
}
else
{
	header("Location: ProductList.php");
}	
	

	
?>