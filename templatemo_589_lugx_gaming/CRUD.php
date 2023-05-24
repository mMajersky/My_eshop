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
<table style="width: 100%;margin-top: 5%">
    <tr>
        <td style="width: 50%; text-align: center;">
            <div class="left-div">
                <form action="delete.php" method="post">
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
                    <p>1=action | 2=strategy | 3=simulator</p>
                    <input type="text" id="gGenre" name="gGenre">
                    <br>
                    <label>obrazok(aj s formatom)</label><br>
                    <input type="text" id="gPic" name="gPic" value="work_in_p.jpg">
                    <br>
                    <label>Pospis (max 300 znakov)</label><br>
                    <input type="text" id="gDesc" name="gDesc">
                    <br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </td>
        <?php
        include_once "delete.php";
        include_once "scripts.php";
        $gamesOBJ = new games();
        $games = $gamesOBJ->getTable();
        ?>
        <td style="width: 50%; text-align: center;">
            <div class="right-div">
                <table style="border: 1px solid black;">
                    <thead>
                    <tr>
                        <th style="border: 1px solid black;">ID</th>
                        <th style="border: 1px solid black;">Name</th>
                        <th style="border: 1px solid black;">Price</th>
                        <th style="border: 1px solid black;">Genre</th>
                        <th style="border: 1px solid black;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($games as $game): ?>
                        <tr>
                            <td style="border: 1px solid black;"><?php echo $game['id']; ?></td>
                            <td style="border: 1px solid black;"><?php echo $game['Name']; ?></td>
                            <td style="border: 1px solid black;"><?php echo $game['Price']; ?></td>
                            <td style="border: 1px solid black;"><?php echo $game['Genre']; ?></td>
                            <td style="border: 1px solid black;">
                                <form action="delete.php" method="get">
                                    <input type="hidden" id="id" name="id" value="<?php echo $game['id']; ?>">
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </td>
    </tr>
</table>


</body>



</html>