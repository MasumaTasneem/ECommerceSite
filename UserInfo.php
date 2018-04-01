<?php

include 'dbh2.php';

SESSION_START();
//$PaymentId =  $_GET['PaymentId'];
$UserAddress =  $_POST['UserAddress'];
$PhoneNumber = $_POST['PhoneNumber'];
$EmailAddress =$_POST['EmailAddress'];
$UserName=$_SESSION['UserName'];
$sql_ID="SELECT UserID FROM userinfo WHERE UserName='$UserName'";
	$result=mysqli_query($conn,$sql_ID);
	$rowID=mysqli_fetch_array($result);
	$UserID=$rowID['UserID'];
	//$PaymentID=$_SESSION['PaymentID'];
 

echo  $UserAddress;
echo  $PhoneNumber;
echo  $EmailAddress;
echo $UserID;
//echo $PaymentId;

if(empty($UserAddress) || empty($PhoneNumber)|| empty($EmailAddress))
{
	

	 
	 header("Location: UserInfo.html?error=empty_field");
	 exit();
}


else{
	$sql1="SELECT UserID FROM buyerinfo WHERE UserID= $UserID";
	$query1=mysqli_query($conn,$sql1);
	$numrows=mysqli_num_rows($query1);
	echo $numrows;
	
	if($numrows != 0)	{
		
	$sql_update="UPDATE buyerinfo SET UserAddress='$UserAddress',PhoneNumber='$PhoneNumber',EmailAddress='$EmailAddress' WHERE UserID= $UserID";
	$result=mysqli_query($conn,$sql_update);	
		
	}
	else
	{$sql = "INSERT INTO buyerinfo (UserID,UserAddress, PhoneNumber, EmailAddress) VALUES ($UserID,'$UserAddress', '$PhoneNumber', '$EmailAddress')";
	$result=mysqli_query($conn,$sql);}
if($result)
{
	echo 'inserted';
}
			
 
header("Location: Purchase.html");
}
 ?>