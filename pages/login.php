<?php
	require('header.php'); 
?>

<?php

// Check if the form is sent
if(isset($_POST['SubmitLogin'])){
	
	
	
	$conn = new mysqli('localhost', 'root', 'root' ,'coffee_shop');
	
	// Check connection
	if($conn){
		
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$sql = "SELECT * FROM users WHERE email='$email' && password='$password'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			
			session_start();
			$_SESSION["loggedin"] = true;
			
			while($row = $result->fetch_assoc()) {
				$_SESSION["id"] = $row['id'];
				$_SESSION["username"] = $row['full_name'];
				$_SESSION["email"] = $row['email'];
				$_SESSION["phone"] = $row['phone'];

			}
			
			header("Location: index.php");

			// $current_user = $row['full_name']
			// echo "<script> alert($current_user); </script>";



			if($password !== $row['password']){
				echo "<script> alert('Wrong Password'); </script>";
			}
		}  else{
			echo "<script> alert('User Not Registered'); </script>";
		}
			
		
	}
}
?>
		<section class="login">
			<div class="container login__container">
				<h2 class="heading heading--secondary u-align-start m-b-small">
					Customer Login
				</h2>
				<form class="form" action="" method="post">
					<div class="form__group">
						<label for="email">Email Address</label>
						<input type="email" id="email" name="email" class="form__input" />
					</div>
					<div class="form__group">
						<label for="password">Password</label>
						<input
							type="password"
							id="password"
							name="password"
							class="form__input" />
					</div>

					<input type="submit" class="btn form__btn" value="Submit" name='SubmitLogin' />
				</form>
				
			</div>
		</section>

		<footer class="footer">&copy; Zury Espadas. All rights reserved</footer>
	</body>
</html>
