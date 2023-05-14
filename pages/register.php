<?php
	require('header.php'); 
?>

<?php

// Check if the form is sent
if(isset($_POST['SubmitUser'])){

	$conn = new mysqli('localhost', 'root', 'root' ,'coffee_shop');

	// Check connection
	if($conn){

		// Taking all 4 values from the form data(input)
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$password = $_POST['password'];
		$passwordRepeat = $_POST["repeat_password"];


		$duplicate = mysqli_query($conn, "SELECT * FROM users WHERE full_name = '$name' OR email = '$email'");

		if(mysqli_num_rows($duplicate) > 0){
			echo
			"<script type='text/javascript'> alert('Username or Email has already taken'); </script>";
		}

		

		if ($password !== $passwordRepeat) {
			echo "<script type='text/javascript'>alert('Password does not match');</script>";
        } else {
			$sql = "INSERT INTO users (full_name, email, phone, password) VALUES ('$name', '$email', '$phone', '$password')";
	
	
			if(mysqli_query($conn, $sql)){
				header( "Refresh:0; url=login.php" );
			} else{
				echo "ERROR: Sorry $sql. ".mysqli_error($conn);
	
			}

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
					<div class="form__group">
						<label for="name">Full Name</label>
						<input type="text" id="name" name="name" class="form__input" required/>
					</div>
					<div class="form__group">
						<label for="email">Email Address</label>
						<input type="email" id="email" name="email" class="form__input" required/>
					</div>
					<div class="form__group">
						<label for="phone">Phone Number</label>
						<input type="text" id="phone" name="phone" class="form__input" required/>
					</div>
					<div class="form__group">
						<label for="password">Password</label>
						<input
							type="password"
							id="password"
							name="password"
							class="form__input" required/>
					</div>
					<div class="form__group">
						<label for="repeat_password">Retype Password</label>
						<input
							type="password"
							id="repeat_password"
							name="repeat_password"
							class="form__input" required/>
					</div>

					<input type="submit" class="btn form__btn" value="Submit" name='SubmitUser'  />
				</form>
			</div>
		</section>

		<footer class="footer">&copy; Zury Espadas. All rights reserved</footer>
	</body>
</html>
