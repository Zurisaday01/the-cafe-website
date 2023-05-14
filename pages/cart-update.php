
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

		<script src="../js/app.js" defer></script>

		<title>The Cafe | Coffee Shop</title>
	</head>
	<body>
		<header class="header header--pages" id="navbar">
			<div class="logo">
				<span class="logo__brand">TheCafe</span>
			</div>

			<nav class="nav">
				<ul class="nav__list">
					<li class="nav__item">
						<a class="nav__link" href="./index.php">Home</a>
					</li>
					<li class="nav__item">
						<a class="nav__link" href="./about.php">About</a>
					</li>
					<li class="nav__item">
						<a class="nav__link" href="./menu.php">Menu</a>
					</li>
					<li class="nav__item">
						<a class="nav__link" href="./contact.php">Contact</a>
					</li>
				</ul>
			</nav>
			<div class="header__options">
				<button class="header__option">
					<a class="header__links" href="./login.php">
						<ion-icon name="log-in-outline"></ion-icon>
					</a>
				</button>
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
						<a class="nav-mobile__link" href="./index.php">Home</a>
					</li>
					<li class="nav-mobile__item">
						<a class="nav-mobile__link" href="./about.php">About</a>
					</li>
					<li class="nav-mobile__item">
						<a class="nav-mobile__link" href="./menu.php">Menu</a>
					</li>
					<li class="nav-mobile__item">
						<a class="nav-mobile__link" href="./contact.php">Contact</a>
					</li>
				</ul>
			</nav>
		</header>

			

		<section class="product container">
        <?php 

            // ID
            $id = $_GET['id'];
            $conn = new mysqli('localhost', 'root', 'root' ,'coffee_shop');
         
            
            // $sql = "SELECT * FROM cart WHERE id=$id";
            // $result = $conn->query($sql);

            // if ($result->num_rows > 0) {
            //     foreach ($result as $value) {
            //         echo '<pre>'; print_r($value); echo '</pre>';
            //     }
            // }

            echo "This feature is in contruction";


            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                echo "Inside Post";
                $qty = $_POST['qty'];

                $sql = "UPDATE cart SET qty=$qty WHERE id=$id";
                
                
                
                if(mysqli_query($conn, $sql)){
                    echo "<script type='text/javascript'>alert('Updating');</script>";
                    header( "Refresh:0; url=cart.php" );
                } else{
                    echo "$sql";
                }
            } 
        ?>

		</section>

		<footer class="footer">&copy; Zury Espadas. All rights reserved</footer>
	</body>
</html>


















