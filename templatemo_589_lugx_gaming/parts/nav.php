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

        <?php echo $menuOBJ->printMenu($menu); ?>
    </ul>
    <a class='menu-trigger'>
        <span>Menu</span>
    </a>
    <!-- ***** Menu End ***** -->
</nav>