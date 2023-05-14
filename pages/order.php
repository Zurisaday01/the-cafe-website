<?php
	require('header.php'); 
?>

<?php

session_start();



// Check if the form is sent
if(isset($_POST['SubmitOrder'])){

	$conn = new mysqli('localhost', 'root', 'root' ,'coffee_shop');

	// Check connection
	if($conn){

        $id_user = $_POST['id_user'];
		$full_name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$address = $_POST['address'];


        $sql = "INSERT INTO orders (id_user, full_name, email, phone, city, state, address) VALUES ($id_user, '$full_name', '$email', '$phone', '$city', '$state', '$address')";

    
 
        
        
		if(mysqli_query($conn, $sql)){
            // delete items from cart
            mysqli_query($conn, "DELETE FROM cart");
            // feedback
            echo "<script type='text/javascript'>alert('Order submitted, the store will contact you, thanks!');</script>";
			header( "Refresh:0; url=index.php" );
		} else{
            echo "<script type='text/javascript'>alert('Something went wrong');</script>";

		}


		// Close connection
		mysqli_close($conn);
			
		
	}
}
?>	
		<section class="register register--register">
			<div class="container register__container">

				<h2 class="heading heading--secondary u-align-start m-b-small">
					Registration
				</h2>
				<form class="form" action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="id_user" name="id_user" class="form__input" value=<?php echo $_SESSION["id"] ?> required/>

					<div class="form__group">
						<label for="name">Full Name</label>
						<input type="text" id="name" name="name" class="form__input" value=<?php echo $_SESSION["username"] ?> required/>
					</div>
					<div class="form__group">
						<label for="email">Email Address</label>
						<input type="email" id="email" name="email" class="form__input" value=<?php echo$_SESSION["email"] ?> required/>
					</div>
					<div class="form__group">
						<label for="phone">Phone Number</label>
						<input type="text" id="phone" name="phone" class="form__input" value=<?php echo $_SESSION["phone"] ?> required/>
					</div>
                    <div class="form__group">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" class="form__input" required/>
                    </div>
					<div class="form__group">
						<label for="state">State</label>
						<input type="text" id="state" name="state" class="form__input" required/>
					</div>
					<div class="form__group">
                        <label for="address">Address</label>
						<input type="text" id="address" name="address" class="form__input" required/>
					</div>

					<input type="submit" class="btn form__btn" value="Submit" name='SubmitOrder'  />
				</form>
			</div>
		</section>

		<footer class="footer">&copy; Zury Espadas. All rights reserved</footer>
	</body>
</html>
