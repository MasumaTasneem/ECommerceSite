<?php


include 'dbh2.php';


$UserID=$_GET['UserID'];
	
	
$sql="UPDATE buyerinfo SET addClient =1 WHERE UserID=$UserID";
$query=mysqli_query($conn,$sql);

if(!$query)
{
	echo "Unsuccessful";
	//echo $ProductID;
}
else
{
	header("Location: BuyerList.php");
}	
	

	
?>