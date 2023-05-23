<!DOCTYPE html>
<html lang="en">
<html>
<?php
include_once "parts/head.php";
include_once "scripts.php";



?>
<body style="background-color: #0a53be">

<?php
include_once "parts/header.php";
?>
<form action="scripts.php" method="post">
    <div style="margin: 5%">
        <br>
        <br>
        <br>
        <br>
        <br>
        <label>nazov hry</label>
        <br>
        <input type="text" id="gName" name="gName">
        <br>
        <label>id</label>
        <br>
        <input type="text" id="gId" name="gId">
        <br>
        <label>Povodna cena</label>
        <br>
        <input type="text" id="gPrice" name="gPrice">
        <br>
        <label>nasa cena</label>
        <br>
        <input type="text" id="gPrice_A" name="gPrice_A">
        <br>
        <label>zaner</label>
        <br>
        <input type="text" id="gGenre" name="gGenre">
        <br>
        <input type="submit" value="Submit">
    </div>
</form>
</body>



</html>