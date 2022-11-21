<a href="index.php" class="logo"> <i class="fas fa-hiking"></i> DahaTravel </a>

<nav class="navbar">
    <div id="nav-close" class="fas fa-times"></div>
    <a href="#home" class="header_link">Home</a>
    <a href="#about" class="header_link">About</a>
    <a href="#shop" class="header_link">Shop</a>
    <a href="#packages" class="header_link">Packages</a>
    <a href="#reviews" class="header_link">Reviews</a>
    <a href="#blogs" class="header_link">Blogs</a>
</nav>

<?php


if (empty($_SESSION['login_active'])) {
    $_SESSION['login_active'] = 0;
}

if ($_SESSION['login_active'] == 1) { ?>

    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        
        <div id="search-btn" class="fas fa-search"></div>
        <div id="cart-btn" class="fa-solid fa-cart-shopping"></div>
        <div id="icon-user" class="fa-solid fa-user"></div>
        <ul class="icon_user-ul">
            <li class="icon_user-li"> My infomation</li>
            <li class="icon_user-li"> My cart</li>
            <li class="icon_user-li"> <a href="myorder.php">My orders</a></li>
            <li class="icon_user-li"> <a href="logout.php" id="cart">Log out</a></li>
        </ul>
    </div>
<?php } else {
?>
    <div class="login-register">
        <div id="menu-btn" class="fas fa-bars"></div>
        <a href="login.php" class="login">Login</a>
        <a href="register.php" class="register">Register</a>
    </div>
    <!-- None -->
    <div style="display: none;" class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        
        <div id="search-btn" class="fas fa-search"></div>
        <div id="cart-btn" class="fa-solid fa-cart-shopping"></div>
        <div id="icon-user" class="fa-solid fa-user"></div>
        <ul class="icon_user-ul">
            <li class="icon_user-li"> My infomation </li>
            <li class="icon_user-li"> My cart</li>
            <li class="icon_user-li"> <a href="logout.php" id="cart">Log out</a></li>
        </ul>
    </div>

<?php }
?>