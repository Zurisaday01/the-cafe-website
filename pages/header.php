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