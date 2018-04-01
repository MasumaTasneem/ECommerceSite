
<?php

include 'dbh2.php';

$ProductName= $_POST['ProductName'];
$CategoryName= $_POST['CategoryName'];
$Specification=$_POST['Specification'];
$Quantity= $_POST['Quantity'];
$UnitPrice= $_POST['UnitPrice']; 
$Options=$_POST['Options'];






$sql2="SELECT * FROM category WHERE CategoryName='$CategoryName'";
$query2=mysqli_query($conn,$sql2);
$numrows2=mysqli_num_rows($query2);
if($numrows2 == 0)
{
	$sql_category="INSERT INTO category (CategoryName) VALUES ('$CategoryName')";
	$query_category=mysqli_query($conn,$sql_category);
}

$sql_product="INSERT INTO product(ProductName, CategoryID, Specification, UnitPrice, Quantity) VALUES ('$ProductName',(SELECT CategoryId FROM category WHERE CategoryName='$CategoryName'),'$Specification',$UnitPrice,$Quantity)";
$query_product=mysqli_query($conn,$sql_product);

$sql="INSERT INTO advertisement (ProductID, Options) VALUES ((SELECT product.ProductID FROM product WHERE ProductName='$ProductName'),'$Options')";
$query=mysqli_query($conn,$sql);
if(!$query)
{
	echo 'Not inserted';
}
else{

header("Location:admin.html");


}

 ?>

