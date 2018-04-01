<?php

session_start();

	$UserName=$_SESSION['UserName'];
	$UserID=$_SESSION['UserID'];
	$ProductID=$_SESSION['ProductID'];
	$PurchaseQuantity=$_SESSION['PurchaseQuantity'];
	
	
	
    $query = "SELECT Product.ProductName,Product.ProductID, CategoryName, sum(UnitPrice) as TotalPrice ,sum(PurchaseQuantity) as NumberOfProducts from product,category,advertisement,cart where Product.CategoryID= category.CategoryID and Product.ProductID=cart.ProductID and advertisement.ProductID= cart.ProductID  and cart.UserID = (SELECT UserID from userinfo where UserName='$UserName') GROUP BY ProductID";
    $search_result = filterTable($query);

    


// function to connect and execute the query
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
        <title></title>
        <style>
          	header{
		   color: white;
		   text-align:left;
		   font-family:Comic Sans MS;
		   font-size:30px;
			}
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
            table {
             border-collapse: collapse;
              width: 100%;
                 }

			th, td {
				text-align: left;
				padding: 8px;
			}

			tr:nth-child(even){background-color: #f2f2f2}
			tr:nth-child(odd){background-color: white}

			th {
				background-color: black;
				color: white;
			}
			body
			{ 
                background-image: url('Product4.jpg');
				background-repeat: no-repeat;
				background-attachment: fixed;
				background-position: center; 
				background-height:50%;
				text-align:center;
				text-bottom:500px;
			}
			section
			{
	
				width: 400px;
			}
			button[type=submit] {
			width: 60%;
			background-color: white;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}
			input[type=text], select 
			{
				width: 100%;
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
            }
			.topright 
			{
                position: absolute;
				top: 160px;
				right: 30px;
				font-size: 18px;
            }

        </style>
    </head>
    <body>
        
        <form action="SearchProduct.php" method="post">
           
            <table>
                <tr>
                    
                    <th> Product Name</th>
                    <th>Category</th>
					<th> Total Price</th>
                    <th>Number of Products</th>
					<th>Remove</th>
					<!--?php echo $UserName ?-->
					
                    
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                   
                    <td><?php echo $row['ProductName'];?></td>
                    <td><?php echo $row['CategoryName'];?></td>
					<td><?php echo $row['TotalPrice'];?></td>
					<td><?php echo $row['NumberOfProducts'];?></td>
					<td><button type="submit" action="remove.php"><a href="remove.php?ProductID=<?php echo $ProductID ?>">Remove</button></td>
					
					
                </tr>
                <?php endwhile;?>
				
				
            </table>
        </form>
		<section>
			<button type="submit" action="Purchase.php"><a href="UserInfo.html?UserName=<?php echo $UserName ?>">Purchase Now</a></button>
			<button type="submit" action="allProducts.php"><a href="allProducts.php">Buy More</button>
		</section>
        
    </body>
</html>