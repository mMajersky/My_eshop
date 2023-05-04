<?php
include_once "scripts.php";
$menuOBJ = new menu();
$menu = $menuOBJ->getMenuItems()
?>
<nav class="main-nav">
    <!-- ***** Logo Start ***** -->
    <a href="index.php" class="logo">
        <img src="assets/images/logo.png" alt="" style="width: 158px;">
    </a>
    <!-- ***** Logo End ***** -->
    <!-- ***** Menu Start ***** -->
    <ul class="nav">
<!--        <li><a href="index.php" class="active">Home</a></li>-->
<!--        <li><a href="shop.php">Our Shop</a></li>-->
<!--        <li><a href="product-details.php">Product Details</a></li>-->
<!--        <li><a href="contact.php">Contact Us</a></li>-->
<!--        <li><a href="#">Sign In</a></li>-->
        <?php echo $menuOBJ->printMenu($menu); ?>
    </ul>
    <a class='menu-trigger'>
        <span>Menu</span>
    </a>
    <!-- ***** Menu End ***** -->
</nav>