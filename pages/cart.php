<?php
	require('header.php'); 
?>


		<section class="cart">
			<div class="container cart__container">
				<h2 class="heading heading--secondary u-align-start m-b-small">Cart</h2>
				<table class="cart__table">
					<tr>
						<th>Product Name</th>
						<th>Price</th>
						<th>Qty</th>
						<th>Total</th>
						<th></th>
					</tr>
					<?php
						$conn = new mysqli('localhost', 'root', 'root' ,'coffee_shop');

						// Check connection
						if($conn){ 

							$sql = "SELECT *  FROM cart";
							$result = $conn->query($sql);

							
							if ($result->num_rows > 0) {

								
								$total_price = 0;

								while($row = $result->fetch_assoc()) {

									$id = $row['id'];
									$name = $row['name'];
									$price = number_format($row['price'], 2);
									$qty = $row['qty'];
									$total = number_format($qty * $price, 2);

									$total_price += $total;
									
				
									echo "<tr>";
										echo "<td>$name</td>";
										echo "<td>$$price</td>";
										echo "<td>";
										echo "<form method='POST' action=''>";
										echo "<input type='number' value=$qty id='quantity' name='quantity' name='qty' min='1' />";
										echo "<input type='submit' value='Update' name='submit-update' class='btn btn--update'/>";
										echo "</form>";
										echo "</td>";
										echo "<td>$$total</td>";
										echo "<td>";	
										echo "<a href='cart-delete.php?id=$id' class='cart__delete'><ion-icon name='trash-outline'></ion-icon></a>";
										echo "</td>";
									echo "</tr>";



									if(isset($_POST['submit-update'])){
										header( "Refresh:0; url=cart-update.php?id=$id" );
									}
								}

								$result->close();
							} else {
								echo '<tr>';
									echo "<td>No items in the cart</td>";
								echo '</tr>';
							}


						}

					?>
				
				</table>
				<div class="cart__total">
					<span>Total: $<?php echo number_format($total_price, 2) ?></span>
				</div>
				<div class="cart__options">
					<?php
						
						
						session_start();

						if (isset($_SESSION['loggedin'])) {
							echo "<a href='./order.php' class='btn'>Order</a>";
						} else {
							echo "<a href='./login.php' onClick='alert(\"You need to be logged in to create an order\")' class='btn'>Order</a>";
						}
					
					?>
				</div>
			</div>
		</section>

		<footer class="footer">&copy; Zury Espadas. All rights reserved</footer>

		
	
	</body>
</html>
<!-- foreach ($result as $value) {
echo '<pre>'; print_r($value); echo '</pre>';
} -->