<?php
	require('header.php'); 
?>

			<?php

				// ID
				$id = $_GET['id'];
				$conn = new mysqli('localhost', 'root', 'root' ,'coffee_shop');

				$sql = "SELECT * FROM product WHERE id=$id";
				$result = $conn->query($sql);


				while($row = $result->fetch_assoc()) {

		
					$name = $row['name'];
					$price = $row['price'];
					$qty = $row['qty'];
					$photo = $row['photo'];
					$description = $row['description'];
				}

			?>


		<?php

		// Check if the form is sent
		if(isset($_POST['add-to-cart'])){

			$conn = new mysqli('localhost', 'root', 'root' ,'coffee_shop');

			// Check connection
			if($conn){

				$name = $_POST['name'];
				$price = $_POST['price'];
				$quantity = $_POST['quantity'];

				$duplicate = mysqli_query($conn, "SELECT * FROM cart WHERE name = '$name'");

				if(mysqli_num_rows($duplicate) > 0){
						echo "<script type='text/javascript'> alert('You have already added this item'); </script>";
				} else {

					$sql = "INSERT INTO cart (name, price, qty) VALUES ('$name', $price, $quantity)";
					
					if(mysqli_query($conn, $sql)){
						echo "<script type='text/javascript'>alert('Item added to cart');</script>";
						header( "refresh:0;url=cart.php" );
					} else{
						echo "<script type='text/javascript'>alert('Sorry, something went wrong');</script>";
					}
					
				}

				// Close connection
				mysqli_close($conn);
				
			}
		}
		?>

		<section class="product">
			<div class="container product__container">
				<div class="product__img animate__animated animate__slideInLeft">
					<img src="../img/<?php echo $photo?>" />
				</div>
				<div class="product__info">
					<form action="" method="post" enctype="multipart/form-data">
						<h2 class="heading heading--secondary u-align-start m-b-small">
							<?php echo $name?>
						</h2>
						<p>
							<?php echo $description?>
						</p>
						<div class="product__group">
							<span>Price</span>
							<span class="product__price">$<?php echo number_format($price, 2)?></span>
						</div>
							<div class="product__group">
								<label>Quantity</label>
								<input
									type="number"
									name="quantity"
									min="1"
									max=<?php echo $qty?> />

								<input type="hidden" name="name" value=<?php echo $name?> />
								<input type="hidden"name="price" value=<?php echo $price?> />
								</div>
								
								<input type="submit" class="btn form__btn animate__animated animate__slideInUp" name="add-to-cart" value="Add to cart" />
							
					</form>
				</div>
			</div>
		</section>

		<footer class="footer">&copy; Zury Espadas. All rights reserved</footer>
	</body>
</html>
<!-- foreach ($result as $value) {
						echo '<pre>'; print_r($value); echo '</pre>';
					} -->