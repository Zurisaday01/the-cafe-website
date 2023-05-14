<?php
	require('header.php'); 
?>


<?php

// Check if the form is sent
if(isset($_POST['SubmitButton'])){

	$conn = new mysqli('localhost', 'root', 'root' ,'coffee_shop');

	// Check connection
	if($conn){

		// Taking all 4 values from the form data(input)
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];

	
		$sql = "INSERT INTO message (full_name, email, message) VALUES ('$name', '$email', '$message')";

		if(mysqli_query($conn, $sql)){
			header( "Refresh:0; url=index.php" );
		} else{
			echo "ERROR: Sorry $sql. ".mysqli_error($conn);

		}

		// Close connection
		mysqli_close($conn);
			
		
	}
}
?>
		<section class="contact u-p-top-section-contact" id="contact">
			<div class="contact__container">
				<form class="form" action="" method="post" enctype="multipart/form-data">
					<div class="form__group">
						<h2 class="heading heading--secondary u-align-start m-b-small">
							Contact Us
						</h2>
						<label for="name">Full Name</label>
						<input
							type="text"
							id="name"
							name="name"
							class="form__input"
							placeholder="Your full name.." required/>
					</div>
					<div class="form__group">
						<label for="email">Email Address</label>
						<input
							type="email"
							id="email"
							name="email"
							class="form__input" required/>
					</div>
					<div class="form__group">
						<label for="message">Your Message</label>
						<textarea
							id="message"
							name="message"
							class="form__input"
							rows="4"
							cols="50" required></textarea>
					</div>

					<input type="submit" class="btn form__btn" name='SubmitButton' value="Submit" />
				</form>
			</div>
		</section>

		<footer class="footer">&copy; Zury Espadas. All rights reserved</footer>
	</body>
</html>
