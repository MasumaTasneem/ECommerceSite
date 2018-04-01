<?php

include 'dbh2.php';

$FirstName = mysqli_real_escape_string($conn, $_POST['FirstName']);
$LastName = mysqli_real_escape_string($conn, $_POST['LastName']);
$UserName = mysqli_real_escape_string($conn, $_POST['UserName']);
$Password = mysqli_real_escape_string($conn, $_POST['Password']);
 $FirstName = strip_tags( $FirstName );
 $LastName = strip_tags( $LastName );
 $UserName = strip_tags( $UserName );
 $Password = strip_tags( $Password );
 

if(empty($FirstName))
{
	 header("Location: profileSunrise.html?error=empty_field");
	 exit();
}
if(empty($LastName))
{
	 header("Location: profileSunrise.html?error=empty_field");
	 exit();
}
if(empty($UserName))
{
	 header("Location: profileSunrise.html?error=empty_field");
	 exit();
}
if(empty($Password))
{
	 header("Location: profileSunrise.html?error=empty_field");
	 exit();
}
else{

$sql = "INSERT INTO userinfo (FirstName, LastName, UserName, Password)
 VALUES ('$FirstName', '$LastName', '$UserName', '$Password')";
 $result = $conn->query($sql);
 session_start();
			$_SESSION['UserId'] = $UserId;
			$_SESSION['UserName'] = $UserName;
			
 
 header("Location: profileSunrise.html");
}
 ?>