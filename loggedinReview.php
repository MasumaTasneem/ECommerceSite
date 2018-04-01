<?php
session_start();
include'dbh2.php';
	
$ProductID=$_SESSION['ProductID'];
   $query = "SELECT  UserName, ReviewID, Review, Date_Time FROM userinfo , review, advertisement WHERE  userinfo.UserID= Review.UserID and Review.ProductID=advertisement.ProductID and Review.ProductID=$ProductID Order By Date_Time desc";
   $search_result = filterTable($query);
   $UserName=$_SESSION['UserName'];
   $_SESSION['UserName']=$UserName;
   $UserID=$_SESSION['UserID'];
   
   $_SESSION['UserID']=$UserID;
   $ProductID=$_SESSION['ProductID'];
   $_SESSION['ProductID']=$ProductID;
   //echo $ProductID;
   
  
   
	

		function filterTable($query)
		{
			$connect = mysqli_connect("localhost", "root", "");
			$connect_db=mysqli_select_db($connect,"sunrise");
			$filter_Result = mysqli_query($connect, $query);
			return $filter_Result;
		}


?>

<!DOCTYPE html>
<html>
<head>
<style>
		ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hIDden;
			background-color: #333;
		}

		li {
			float: left;
		}

		li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		li a:hover {
			background-color: #111;
		}
		.textarea3{
			wIDth: 400px;
			font-size: 14px;
			border-radius: 4px;
			resize: none;
		}
		table 
		{
            border-collapse: collapse;
            wIDth: 100%;
        }

		p 
		{
			text-align: left;
			padding: 8px;
            background-color: #d2b29b;
			border-radius: 4px;
		}


			th {
				background-color: black;
				color: white;
			}
	
		input[type=text], select {
		   
			wIDth: 100%;
			height:100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solID #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}
		button[type=submit] {
			wIDth: 100px;
			background-color: black;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}


		 input{
			background:white;
			color:black;
			border:0px;
			padding:10px;
			margin:5px 0px;
		}

		.textarea1{
			wIDth: 1000px;
			height: 150px;
			
		   
			font-size: 18px;
			border-radius: 4px;
			
			font-size: 16px;
			resize: none;
		}
		.textarea2{
			wIDth: 400px;
			font-size: 18px;
			border-radius: 4px;
			font-size: 16px;
			resize: none;
		}
		body
		{ 
			background:#d2b29b;
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-position: center; 
			background-height:50%;
			font-family:tahoma;
			
		}
		</style>
	</head>
<body>

<ul style="font-family:Comic Sans MS">
			  <li><a class="active" href="sunrise.html">Home</a></li>
			  <li><a href="profileSunrise.html">Profile</a></li>
			  <li><a href="allProducts.php">Products</a></li>
			  <li><a href="allProducts.php">Review</a></li>
			  
			  <li><a href="#contact">Contact</a></li>
              <li><a href="logoutSunrise.php">Log Out</a></li>
  
			</ul>
		<nav>
			<ul>
					<li><a href="Category.php?CategoryID=3" >PABX</a></li>
					<li><a href="Category.php?CategoryID=4" >IP Phone</a></li>
					<li><a href="Category.php?CategoryID=5" >Intercom</a></li>
					<li><a href="Category.php?CategoryID=6" >FAX</a></li>
					<li><a href="Category.php?CategoryID=7" >Telephone Set</a></li>
					<li><a href="Category.php?CategoryID=8" >CC Camera</a></li>
					
					
			</ul>
		</nav>


       
			
						<form action="SearchProduct.php"  method="post">
						<div class="textarea3">
						<input type="text"  name="search" placeholder="Search.."><br><br>
						</div>
					</form>
					
					
		

</body>
<section>
			<form action="insertReview.php" method="POST">
			
				 
				 
				  <div class="textarea1">
				  <input  type="text" name="Review" placeholder="Write your Review here......"><br><br>
				  <input type="hIDden" name="ID" value="<?php echo $ProductID; ?>"/>
				  </div>
				 <button type="submit" >Review</a></button>
				 
			 </form>
			 
		
						
	</section>
	
	 <form action="loggedinReview.php" method="post">
           
            <div class="tableshow">
               

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <!--tr-->
                   
                    <p style="font-family:tahoma;; font-size:20px;color:black;wIDth:1000px">User Name: <?php echo $row['UserName'];?><br>
					 <?php echo $row['Review'];?></p>
					
					 Date and Time : <?php echo $row['Date_Time'];?></br>
					 

					<button type="submit" class="btn" name="EditReview"><a href="edit.php?ReviewID=<?php echo $row['ReviewID'] ?>">Edit</a></button>
					<button type="submit" class="btn" name="DeleteReview"><a href="delete.php?ReviewID=<?php echo $row['ReviewID'] ?>">Delete</a></button>
					<hr>
                <!--/tr-->
                <?php endwhile;?>
            <!--/table-->
			</div>
			</form>
        
	

</html>
