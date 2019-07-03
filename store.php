<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Store</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="products">
		<div class="container">
			<div class="products-grids">
				<div class="col-md-8 products-grid-left">
					<div class="products-grid-lft">
						<u><h1 style="text-align: center; font-family: Times; font-size: 4em">PRODUCTS LIST </h1></u><br><br>
						<?php
						$conn = mysqli_connect("localhost", "root", "", "Storecreator");
						$sql = mysqli_query($conn, "SELECT * FROM insertinventory");
                        
						$id = 'ID';
						$name = 'product_name';
						$desc = 'prod_desc';
						$price = 'price';
						$quantity = 'quantity';
						$image = 'image';

						$form = "";
						
						if(mysqli_num_rows($sql) > 0) {

						while($row = mysqli_fetch_array($sql)) {
								$id = $row['ID'];
								$name = $row['product_name'];
								$desc = $row['prod_desc'];
								$quantity = $row['quantity'];
								$price = $row['price'];
								$image = $row['image'];

									$form .= "<div class='products'>
												<div class='pname' style='text-align:center;'>
													<u><em><h4>$name</h4></em></u><br>
												</div>
												<div class='ppic' style='text-align:center;'>
													<img src=$image class='Img' style='height:50%; width:50%'>
												</div><br>
												<div class='pdesc' style='text-align:center;'>
													<p>$desc</p>
												</div><br>
												<div class='pquantity' style='text-align:center;'>
													<p>Remaining Stock: $quantity</p>
												</div><br>
												<div class='pprice' style='text-align:center;'>
													<p>Price: $price</p><br>
												</div>
												<div class='buyform' style='text-align:center;'>
													<a href='confirmation.php?pid=$id'>
														<input type='submit' name='submit' value='Order'>
													</a>
												</div><br>
											</div>
											<hr>";
										}
						echo $form;
					}
						?>
						<div class='posts_area'></div>
</div>
            </div>
</div>
</div>
	</div>
</body>
</html>