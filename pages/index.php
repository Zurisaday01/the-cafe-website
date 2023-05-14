<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link
			href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600&family=Poppins:wght@400;500;600&display=swap"
			rel="stylesheet" />

		<link
			href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap"
			rel="stylesheet" />
		<link href="../css/styles.css" rel="stylesheet" />
		<script
			type="module"
			src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
		<script
			nomodule
			src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
		
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
		/>

		<script src="../js/app.js" defer></script>

		<title>The Cafe | Coffee Shop</title>
	</head>
	<body>
		<header class="header" id="navbar">
			<div class="logo">
				<span class="logo__brand">TheCafe</span>
			</div>

			<nav class="nav">
				<ul class="nav__list">
					<li class="nav__item">
						<a class="nav__link" href="#">Home</a>
					</li>
					<li class="nav__item">
						<a class="nav__link" href="#about">About</a>
					</li>
					<li class="nav__item">
						<a class="nav__link" href="#menu">Menu</a>
					</li>
					<li class="nav__item">
						<a class="nav__link" href="#contact">Contact</a>
					</li>
				</ul>
			</nav>
			<div class="header__options">
				<?php
					session_start();

					if (isset($_SESSION['loggedin'])) {

						echo "<a class='u-font-size-small' href='./logout.php'>".$_SESSION['username']."</a>";
					} else {
						echo  '<a class="header__links" href="./login.php">
						<ion-icon name="log-in-outline"></ion-icon>
						</a>';
					}
				?>
				<button class="header__option">
					<a class="header__links" href="./register.php">
						<ion-icon name="person"></ion-icon>
					</a>
				</button>
				<button class="header__option">
					<a class="header__links" href="./cart.php">
						<ion-icon name="cart-outline"></ion-icon>
					</a>
				</button>
				<button class="header__option header__option--menu" id="open-btn">
					<ion-icon name="menu-outline"></ion-icon>
				</button>
			</div>
			<!-- NAV MOBILE -->
			<nav class="nav-mobile">
				<button class="header__option header__option--close" id="close-btn">
					<ion-icon name="close-outline"></ion-icon>
				</button>
				<ul class="nav-mobile__list">
					<li class="nav-mobile__item">
						<a class="nav-mobile__link" href="#">Home</a>
					</li>
					<li class="nav-mobile__item">
						<a class="nav-mobile__link" href="#about">About</a>
					</li>
					<li class="nav-mobile__item">
						<a class="nav-mobile__link" href="#menu">Menu</a>
					</li>
					<li class="nav-mobile__item">
						<a class="nav-mobile__link" href="#contact">Contact</a>
					</li>
				</ul>
			</nav>
		</header>
		<div class="hero">
			<div class="hero__container">
				<div class="hero__content animate__animated animate__fadeInLeft">
					<h1 class="heading heading--primary">
						Enjoy our delicious coffees with the best taste
					</h1>
					<p class="hero__description">
						Life without coffee is like something without something…sorry, I
						haven’t had any coffee yet.
					</p>

					<a class="btn" href="#menu">Start shoping</a>
				</div>
				<div class="hero__img animate__animated animate__fadeIn animate__delay-0.3s">
					<img src="../img/hero.png" />
				</div>
			</div>
		</div>
		<section class="about" id="about">
			<div class="container about__container animate__animated animate__fadeInTopLeft">
				<div class="about__collage">
					<div class="about__box about__box--1">
						<img class="about__photo" src="../img/photo-1.jpg" />
					</div>
					<div class="about__box about__box--2">
						<img class="about__photo" src="../img/photo-2.jpg" />
					</div>
					<div class="about__box about__box--3">
						<img class="about__photo" src="../img/photo-3.jpg" />
					</div>
				</div>
				<div class="about__info">
					<h2 class="heading heading--secondary u-align-start m-b-small">
						About Us
					</h2>
					<p>
						Our company was founded based on a passion to deliver you fresh
						roasted premium coffees that taste the way coffee was meant to
						taste, and we think a great cup of coffee inspires great
						conversation. In some small way, we hope to impact this world
						through great tasting coffee shared in community with others.
					</p>
					<p>
						We are committed to crafting you excellent roasted whole bean coffee
						delivered fresh. We roast our coffees in a fluid bed roaster in
						small batches using traditional sight, smell, sound, & a bit of
						technology to craft flavor.
					</p>

					<div class="about__stadistics">
						<span class="about__num"> 20 </span>
						<p>
							<span>Popular</span>
							<span>Flavors</span>
						</p>
					</div>
				</div>
			</div>
		</section>
		<section class="catalog" id="menu">
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

		<section class="contact" id="contact">
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

