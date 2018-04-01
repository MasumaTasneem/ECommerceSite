<?php

session_start();
include'dbh2.php';

$ProductID=$_GET['ProductID'];
$_SESSION['ProductID']=$ProductID;
$UserName=$_SESSION['UserName'];
$sql_ID="SELECT product.ProductID,ProductName,CategoryName,Specification,Quantity,Options,UnitPrice FROM product,category,advertisement WHERE product.ProductID=advertisement.ProductID AND category.CategoryID=Product.CategoryID'";
$result=mysqli_query($conn,$sql_ID);
$rowID=mysqli_fetch_array($result);
$UserID=$rowID['UserID'];





if($ProductID)

{
	$sql="SELECT Review from Review WHERE ReviewID=$ReviewID ";
	if(!$result=mysqli_query($conn,$sql))
{
	echo 'Not inserted';
}
else
{echo 'Edit post';
}

}


else{
	echo 'Sorry '.$UserName.' you cannot edit this post';

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
    overflow: hidden;
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
    width: 400px;
   
	
   
    font-size: 14px;
    
    border-radius: 4px;
   
   
    resize: none;
}
table {
             border-collapse: collapse;
              width: 100%;
                 }

			p {
				text-align: left;
				padding: 8px;
                background-color: white;
				border-radius: 4px;
				
			
			}

			tr:nth-child(even){background-color: #f2f2f2}
			tr:nth-child(odd){background-color: white}

			th {
				background-color: black;
				color: white;
			}
	
input[type=text], select {
   
    width: 100%;
	height:100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
button[type=submit] {
    width: 100px;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
.textarea1{
    width: 1000px;
    height: 150px;
    
   
    font-size: 18px;
    border-radius: 4px;
    
    font-size: 16px;
    resize: none;
}
.textarea2{
    width: 400px;
    height: 40px;
  
   
    font-size: 18px;
    border-radius: 4px;
   
    font-size: 16px;
    resize: none;
}


  


body { 
    background-color: #d2b29b;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center; 
	background-height:50%;
	
	
}
   
}

</style>
</head>
<body>




       
			
		

</body>
<section>
			<form action="saveEditproduct.php" method="POST">
			 <?php while($row = mysqli_fetch_array($result)):?>
			  
			  <div class="textarea2">
			  <input  type="text" name="ProductName" value="<?php echo $row['ProductName'];?>"><br><br>
			  </div>
			   <div class="textarea2">
			  <input  type="text" name="CategoryName" value="<?php echo $row['CategoryName'];?>"><br><br>
			  </div>
			   <div class="textarea2">
			  <input  type="text" name="Specifications" value="<?php echo $row['Specifications'];?>"><br><br>
			  </div>
			   <div class="textarea2">
			  <input  type="text" name="Options" value="<?php echo $row['Options'];?>"><br><br>
			  </div>
			   <div class="textarea2">
			  <input  type="text" name="Quantity" value="<?php echo $row['Quantity'];?>"><br><br>
			  </div>
			   <div class="textarea2">
			  <input  type="text" name="UnitPrice" value="<?php echo $row['UnitPrice'];?>"><br><br>
			  </div>
			 <button type="submit" name="Save">Save Change</button>
			 <?php endwhile ?>
			 </form>
		
						
	</section>
	 

</html>

	
	