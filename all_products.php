<!DOCTYPE html>
<?php 
include("functions/functions.php"); ?>
<html>
<head>
	<title>My Online Shop</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	
</head>
<body>
	<div class="main_wrapper"> <!-- main body -->
		<!-- heaader section -->	
		<div class="header_wrapper"> 
		<?php include("header.php"); ?>
		</div>
		
		<!--navigation bar section -->	
 		 <div id="menubar">
    		<?php include("nav.php"); ?>
	 	 </div>

			<!-- body section is here -->
		<div class="content_wrapper">
			<!--side bar categories section -->
			<div id="sidebar">
				<div id="sidebar_title"> <strong>Categories</strong> </div>
					<!-- gettin catagory list from the database -->
				<ul id="cats">
					<?php 
					getCats();
					 ?>
				</ul>
				<br>
				<div id="sidebar_title"> <strong>Types of products</strong> </div>
				<ul id="type">
					<?php 
					getTyp(); ?>
				</ul>

			</div>


			<div id="content_area">
				<?php cart(); ?>
				<div id="shopping_cart">
					<span style="float: left; font-size: 18px;
					padding: 5px;
					line-height: 40px;
					color: white;"> Welcome Guest!
					<b style="color:black;">Shopping Cart--></b> Total Items: <?php total_items(); ?>
					 Total Price: <?php total_price(); ?>
					<a href="cart.php" style="color:yellow;">Go to cart</a>
					</span>
				</div>

				<div id="products_box">
					<?php
					$get_pro = "select * from products";

	$run_pro = mysqli_query($con, $get_pro);

	while($row_pro = mysqli_fetch_array($run_pro)){
		$pro_id=$row_pro['product_id'];
		$pro_title=$row_pro['product_title'];
		$pro_category=$row_pro['product_category'];
		$pro_price=$row_pro['product_price'];
		$pro_image=$row_pro['product_image'];
		
		//'?pro_id=$pro_id' =this is used for passing the id of the product to the next page
		echo"
		<div id='single_product'>
		<h3>$pro_title</h3>
		
		
		<br>
		<a href='details.php?pro_id=$pro_id'> 
												<img src='admin_area/product_images/$pro_image' width='200' height='200'/></a> 


<br>
		<p><i>TK: $pro_price</i></p>


		<button style='background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 5px 3px;
    float:center;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin: 5px 2px;
    cursor: pointer;'>Available</button>
		</div>
		";
	}
					?>
				</div>
			</div>

		</div>
			<!-- footer section is here -->
		<div id="footer"><?php 
		include("footer.php"); ?></div>
	</div>

</body>
</html>