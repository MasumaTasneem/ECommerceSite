<?php
session_start();


   	
    $query = "SELECT buyerinfo.UserID, CONCAT_WS(' ', FirstName, LastName) AS name,EmailAddress, PhoneNumber, UserAddress FROM userinfo,buyerinfo where userinfo.UserID=buyerinfo.UserID";
    $search_result = filterTable($query);

    


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
                background-image: url('pic3.jpg');
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
		<meta charset="UTF-8">
		<title>
			Sunrise Electronics Industries
		</title>
		<link rel="stylesheet"  type="text/css" href="style.css">
	
</head>
<body style="background-color:white" >
	
        
			<ul style="font-family:Comic Sans MS">
			<h3 style="color:white; font-family:Comic Sans MS; font-size:20px">ADMIN 

PANEL</h3>
			  <li><a class="active" href="sunrise.html">Home</a></li>
			  <li><a href="profileSunrise.html">Profile</a></li>
			  <li><a href="allProducts.php">Discussion</a></li>
			  <li><a href="showcart.php">MyCart</a></li>
			  <li><a href="#contact">Contact</a></li>
			  <li><a href="PurchaseList.php">Purchase List</a></li>
			 <li><a href="ShowConfirmPurchase.php">Purchase Confirmed</a></li>
			  <li><a href="BuyerList.php">Buyer List</a></li>
			  <li><a href="ProductList.php">Product List</a></li>
              <li><a href="logoutSunrise.php">Log Out</a></li>
  
			</ul>
		<nav>
			<ul>
					<li><a href="#PABX">PABX</a></li>
					<li><a href="#ipphone">IP Phone</a></li>
					<li><a href="#intercom">Intercom</a></li>
					<li><a href="#FAX">FAX</a></li>
					<li><a href="#telephoneset">Telephone Set</a></li>
					<li><a href="#cccamera">CC Camera</a></li>
					
					
			</ul>
		</nav>
    <section>
		<form action="SearchProduct.php"  method="post">
			<input type="text"  name="search" placeholder="Search..">
		</form>
	</section>
	<div class="list">
        <form action="SearchBook.php" method="post">
           <table>
                <tr>
                    <th>CustomerName</th>
                    <th>Mailing Address</th>
					<th>Phone Number</th>
                    <th>Email Address</th>
					<th>Add to list</th>
					
                    
                </tr>
	</div>	

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                   
				    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['UserAddress'];?></td>
                    <td><?php echo $row['PhoneNumber'];?></td>
					<td><?php echo $row['EmailAddress'];?></td>
					
					<td><a href="addBuyer.php?UserID=<?php echo $row['UserID']?>" >Add</a></td>
					<!----button>Add</button-->
                </tr>
                <?php endwhile;?>
            </table>
        </form>
	</body>
</html>