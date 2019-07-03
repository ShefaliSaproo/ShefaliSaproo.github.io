<?php 
	$error = array();

	if(isset($_GET['pid'])) {
       
		$pid = '';
        $pname = '';
        $pprice = '';
        $pimg = '';
		
		$pid = $_GET['pid'];

		$conn = mysqli_connect("localhost", "root", "", "Storecreator");

		$db_form_query = mysqli_query($conn, "SELECT * FROM insertinventory WHERE ID = $pid");
		$db_form_query_results = mysqli_fetch_array($db_form_query);

		$pname = $db_form_query_results['product_name'];
		$pprice = $db_form_query_results['price'];
		$pimg = $db_form_query_results['image']; 
	}

    if(isset($_POST['submit']))
    {
    	$firstname = $_POST['firstname'];
    	$lastname = $_POST['lastname'];
    	$address = $_POST['address'];
    	$payment = $_POST['payment'];

		if(empty($firstname) || strlen($firstname) == 0) {
 			array_push($error, "Please enter your firstname<br>");
    	} else {
        	$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
   		}
		if(empty($lastname) || strlen($lastname) == 0) {
 			array_push($error, "Please enter your lastname<br>");
    	} else {
        	$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
   		}
		if(empty($address) || strlen($address) == 0) {
 			array_push($error, "Please enter your address<br>"); 
   		} else {
       		$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    	}
		if(empty($payment) || strlen($payment) == 0) {
			array_push($error, "Please choose a payment method <br>");
		} else {
			$payment = filter_var($_POST['payment'], FILTER_SANITIZE_STRING);
		}
		$productID = $_POST['id'];
	 
	 	if(empty($error))
	 	{
	 		$conn = mysqli_connect("localhost", "root", "", "Storecreator");
	 		$insert = mysqli_query($conn,"INSERT INTO users VALUES ('','$firstname','$lastname','$address','$payment')");

	 		$query = mysqli_query($conn, "SELECT * FROM insertinventory WHERE id = $productID");
	 		$details = mysqli_fetch_array($query);
	 		$quantity = $details['quantity'];

	 		$newQuantity = $quantity - 1;

	 		$update = mysqli_query($conn,"UPDATE insertinventory SET quantity = '$newQuantity' WHERE id='$productID'");

	 		header("Location: success.php");
	 	}else{
	 		foreach ($error as $key => $value) {
	 			echo $value;
	 		}
	 		
	 	}
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Confirmation</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 <div class='confirmation col-sm-12'>
 	<div class='form'>
 		<form class="form-horizontal" action='confirmation.php' method='post'>

 			<div class="form-group text-center" ><br><br>
				<div class='img_disp' style=" height: 20%; width: 100%; ">
	 				<img src="<?php echo $pimg; ?>" style=" height: 20%; width: 20%;">
	 			</div><br><br>
			    <label class="control-label col-sm-2">Product Name:</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" value="<?php echo $pname; ?>" disabled="disabled">
			    </div>
			 </div>

 			<div class="form-group">
			    <label class="control-label col-sm-2">Product Price:</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" value="<?php echo $pprice; ?>" disabled="disabled">
			    </div>
			 </div>

			 <div class="form-group">
			    <label class="control-label col-sm-2">First Name:</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname']?>" name="firstname">
			    </div>
			 </div>
			 
			 <div class="form-group">
			    <label class="control-label col-sm-2">Last Name:</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" value="" name="lastname">
			    </div>
			 </div>
			 
			 <div class="form-group">
			    <label class="control-label col-sm-2">Address:</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" value="" name="address">
			    </div>
			 </div>
 			
 			<div class="form-group">
 				<label class="control-label col-sm-2">Payment:</label>
 				 <div class="col-sm-6">
			      <select name="payment" style="color: black">
					<option value="Credit Card">Credit Card</option>
					<option value="Debit Card">Debit Card</option>
					<option value="Cash on Delivery">Cash On Delivery</option>
				  </select>
				 </div> 
			</div>
			<input type="hidden" name="id" value="<?php echo $pid; ?>">
			<div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-6">
			      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
			    </div>
			</div>
 		</form>
 	</div>
 </div>
</body>
</html>