<?php require_once('header.php'); ?>

<?php

// ID
$id = $_GET['id'];
$conn = new mysqli('localhost', 'root', 'root' ,'coffee_shop');

$sql = "SELECT * FROM product";
$result = $conn->query($sql);


while($row = $result->fetch_assoc()) {
	$name = $row['name'];
	$price = $row['price'];
	$qty = $row['qty'];
	$photo = $row['photo'];
	$description = $row['description'];
	$is_active = $row['is_active'];
	$is_featured = $row['is_featured'];
}

// Check if the form is sent
if($_SERVER['REQUEST_METHOD'] == 'POST'){


	$name = $_POST['name'];
	$price = $_POST['price'];
	$qty = $_POST['qty'];
	$description = $_POST['description'];
	$is_active = $_POST['is_active'];
	$is_featured = $_POST['is_featured'];
	if(empty($_FILES['photo']["name"])) {
		
		while($row = $result->fetch_assoc()) {
			$photo = $row['photo'];
		}
	} else {
		$photo = $_FILES['photo']["name"];
	}


	$valid = 1;

	if(empty($name)) {
		$valid = 0;
		$error_message .= "Name can not be empty<br>";
	}

	if(empty($price)) {
		$valid = 0;
		$error_message .= "Price can not be empty<br>";
	}

	if(empty($qty)) {
		$valid = 0;
		$error_message .= "Quantity can not be empty<br>";
	}


	if($valid == 1) {

		$sql = "UPDATE product SET name='$name', price=$price, qty=$qty, photo='$photo', description='$description', is_active=$is_active, is_featured=$is_featured WHERE id=$id";

		if(mysqli_query($conn, $sql)){
			header( "Refresh:0; url=product.php" );
		} else{
			echo "ERROR: Sorry $sql. ".mysqli_error($conn);
		
		}

		// Close connection
		mysqli_close($conn);
		
	}

}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Product</h1>
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

			<form class="form-horizontal" action=""  method='POST' enctype="multipart/form-data">

				<div class="box box-info">
					<div class="box-body">
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Product Name <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
							</div>
						</div>	
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Price <br><span style="font-size:10px;font-weight:normal;">(In USD)</span></label>
							<div class="col-sm-4">
								<input type="text" name="price" class="form-control" value="<?php echo $price; ?>">
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Quantity <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="qty" class="form-control" value="<?php echo $qty; ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Existing  Photo</label>
							<div class="col-sm-4" style="padding-top:4px;">
								<img src="../img/<?php echo $photo; ?>" alt="" style="width:150px;">
								<input type="hidden" name="current_photo" value="<?php echo $photo; ?>">
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Change Photo <span>*</span></label>
							<div class="col-sm-4" style="padding-top:4px;">
								<input type="file" name="photo" value="<?php echo $photo; ?>"/>
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Description</label>
							<div class="col-sm-8">
								<textarea name="description" class="form-control" cols="30" rows="10" id="editor1"><?php echo $description; ?></textarea>
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Is Featured?</label>
							<div class="col-sm-8">
								<select name="is_featured" class="form-control" style="width:auto;">
									<option value="0" <?php if($is_featured == '0'){echo 'selected';} ?>>No</option>
									<option value="1" <?php if($is_featured == '1'){echo 'selected';} ?>>Yes</option>
								</select> 
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Is Active?</label>
							<div class="col-sm-8">
								<select name="is_active" class="form-control" style="width:auto;">
									<option value="0" <?php if($is_active == '0'){echo 'selected';} ?>>No</option>
									<option value="1" <?php if($is_active == '1'){echo 'selected';} ?>>Yes</option>
								</select> 
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="SubmitButton">Update</button>
							</div>
						</div>
					</div>
				</div>

			</form>


		</div>
	</div>

</section>

<?php require_once('footer.php'); ?>