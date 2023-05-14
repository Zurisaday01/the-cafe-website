<?php

session_start();


if(isset($_POST['submitForm'])) {
    $conn = new mysqli('localhost', 'root', 'root' ,'coffee_shop');
	
	// Check connection
	if($conn){
		
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$sql = "SELECT * FROM users WHERE full_name='Administrator' && email='$email' && password='$password'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			
			session_start();
			$_SESSION["loggedin"] = true;
			
			header("Location: index.php");

			if($password !== $row['password']){
				echo "<script> alert('Wrong Password'); </script>";
			}
		}  else{
			echo "<script> alert('You are not the admin'); </script>";
		}
			
		
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<style>


		body {
			display: flex;
			jusfity-content: center;
			align-items: center;
			min-height: 100vh;
			background-color: #8c4b00;
		}

		.form-box {
			max-width: 500px;
			margin: auto;
			padding: 50px;
			background: #ffffff;
			box-shadow: 0px 10px 15px -3px rgba(0,0,0,0.3);

			}
	</style>
</head>

<body>

<div class="form-box">
  <h1>Admin Access</h1>
  <form action="" method="post">
    <div class="form-group">
      <label for="email">Email</label>
      <input class="form-control" id="email" type="email" name="email">
    </div>
    <div class="form-group">
      <label for="email">Password</label>
      <input class="form-control" id="password" type="password" name="password">
    </div>
    <input class="btn btn-primary" name='submitForm' type="submit" value="Submit" />
    </div>
  </form>
</div>


</body>
</html>