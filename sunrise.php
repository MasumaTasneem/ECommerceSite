<?php
session_start();
include 'dbh2.php';


$UserName = mysqli_real_escape_string($conn, $_POST['UserName']);
$Password = mysqli_real_escape_string($conn, $_POST['Password']);
$UserName = strip_tags( $UserName );
$Password = strip_tags( $Password );
if(empty($UserName))
{
	 header("Location: sunrise.html?error=empty_field");
	 exit();
}
if(empty($Password))
{
	 header("Location: sunrise.html?error=empty_field");
	 exit();
}
if(empty($UserName) && empty($Password))
{
	$_SESSION['UserName']='';
}

else{
$sql = "SELECT * FROM userinfo WHERE UserName='$UserName' AND Password='$Password'";
 $result = $conn->query($sql);
 
 if(!$row = mysqli_fetch_assoc($result)){
	 echo "Your username or password is inccorect!";
 }
 else
 {
	        
			$_SESSION['UserName'] = $row['UserName'];
			$dbUsername= $row['UserName'];
			$dbPassword=$row['Password'];
		
		if($UserName==$dbUsername && $Password==$dbPassword)
		{
			if(($UserName=='Maisha' && $Password=='13594')||($UserName=='sarah'&&$Password=='1234'))
		{
			
			echo "Welcome Admin ".$UserName;
			session_start();
			$_SESSION['UserName'] = $UserName;
			$_SESSION['UserID'] = $UserID;
			header("Location: admin.html");
			
		}
		else 
		{
			session_start();
			$_SESSION['UserName'] = $UserName;
			$_SESSION['UserID'] = $UserID;
			header("Location: profileSunrise.html");
			echo "Welcome". $UserName;
		}
		}
		else
			echo"Incorrect Password";
 }
}