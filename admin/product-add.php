<?php require_once('header.php'); ?>

<?php

// Check if the form is sent
if(isset($_POST['SubmitButton'])){

	$conn = new mysqli('localhost', 'root', 'root' ,'coffee_shop');

	// Check connection
	if($conn){

		// Taking all 4 values from the form data(input)
		$name = $_POST['name'];
		$price = $_POST['price'];
		$qty = $_POST['qty'];
		$photo = $_FILES['photo']["name"];
		$description = $_POST['description'];
		$is_active = $_POST['is_active'];
		$is_featured = $_POST['is_featured'];


		$valid = 1;

		if(empty($_POST['name'])) {
			$valid = 0;
			$error_message .= "Name can not be empty<br>";
		}

		if(empty($_POST['price'])) {
			$valid = 0;
			$error_message .= "Price can not be empty<br>";
		}

		if(empty($_POST['qty'])) {
			$valid = 0;
			$error_message .= "Quantity can not be empty<br>";
		}


		if($valid == 1) {

			$sql = "INSERT INTO product (name, price, qty, photo, description, is_active, is_featured) VALUES ('$name', '$price', '$qty', '$photo','$description', '$is_active', '$is_featured')";

			if(mysqli_query($conn, $sql)){
				header( "Refresh:0; url=product.php" );
			} else{
				echo "ERROR: Sorry $sql. ".mysqli_error($conn);
			}

			// Close connection
			mysqli_close($conn);
			
		}
	}
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Product</h1>
	</div>
	<div class="content-header-right">
		<a href="product.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>


<section class="content">

	<div class="row">
		<div class="col-md-12">

			<?php if($error_message): ?>
			<div class="callout callout-danger">
			
			<p>
			<?php echo $error_message; ?>
			</p>
			</div>
			<?php endif; ?>

			<?php if($success_message): ?>
			<div class="callout callout-success">
			
			<p><?php echo $success_message; ?></p>
			</div>
			<?php endif; ?>

			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

				<div class="box box-info">
					<div class="box-body">
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Product Name <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="name" class="form-control">
							</div>
						</div>	
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Price <br><span style="font-size:10px;font-weight:normal;">(In USD)</span></label>
							<div class="col-sm-4">
								<input type="text" name="price" class="form-control">
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Quantity <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="qty" class="form-control">
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Photo <span>*</span></label>
							<div class="col-sm-4" style="padding-top:4px;">
								<input type="file" name="photo" />
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Description</label>
							<div class="col-sm-8">
								<textarea name="description" class="form-control" cols="30" rows="10" id="editor1"></textarea>
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Is Featured?</label>
							<div class="col-sm-8">
								<select name="is_featured" class="form-control" style="width:auto;">
									<option value="0">No</option>
									<option value="1">Yes</option>
								</select> 
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Is Active?</label>
							<div class="col-sm-8">
								<select name="is_active" class="form-control" style="width:auto;">
									<option value="0">No</option>
									<option value="1">Yes</option>
								</select> 
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="SubmitButton">Add Product</button>
							</div>
						</div>
					</div>
				</div>

			</form>


		</div>
	</div>

</section>

<?php require_once('footer.php'); ?>