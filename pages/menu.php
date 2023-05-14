<?php
	require('header.php'); 
?>
		<section class="catalog u-p-top-bottom-section-menu" id="menu">
			<div class="container">
				<h2 class="heading heading--secondary">Our variety of flavors</h2>
				<div class="catalog__content">
				<?php

					$conn = new mysqli('localhost', 'root', 'root' ,'coffee_shop');


					if($conn){ 

						$sql = "SELECT id, name, price, qty, photo, is_active, is_featured FROM product";
						$result = $conn->query($sql);

						
						
						if ($result->num_rows > 0) {

							while($row = $result->fetch_assoc()) {
								$id = $row['id'];
								$name = $row['name'];
								$price = $row['price'];
								$qty = $row['qty'];
								$photo = $row['photo'];
								$is_active = $row['is_active'];
								$is_featured = $row['is_featured'];
							

								if($is_featured == "1" && $is_active === "1") {
									echo "<div class='productCard'>";
										echo "<div class='productCard__img'>";
											echo "<img src='../img/$photo' alt='coffee product' />";
										echo "</div>";
										echo "<div class='productCard__content'>";
											echo "<h3 class='heading heading--third'>$name</h3>";
											echo "<span class='productCard__price'>$$price</span>";
											echo "<a href='product.php?id=$id' class='btn'>See details</a>";
										echo "</div>";
									echo "</div>";


								} else {
									echo "<span> No coffees </span>";
								}
							
							}

							$result->close();
						}


					}

					?>				
				</div>
			</div>
		</section>

		<footer class="footer">&copy; Zury Espadas. All rights reserved</footer>
	</body>
</html>
