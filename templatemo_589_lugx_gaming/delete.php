<?php
include_once "scripts.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["gName"];
    $id = $_POST["gId"];
    $price = floatval($_POST["gPrice"]);
    $priceA = floatval($_POST["gPrice_A"]);
    $genre = intval($_POST['gGenre']);
    $pic = $_POST['gPic'];
    $desc = $_POST['gDesc'];
    $newData = new Crud();
    $newData->submitData($name,$id,$price,$priceA,$genre,$pic,$desc);
}

class Crud
{
    //data insert
    public function submitData(String $name,String $id,float $price,float $priceA,int $genre,String $pic,String $desc)
    {

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=project_sql;port3306",
                "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
            try {
                $stmt = $pdo->prepare("INSERT INTO games (id, Name, Price, Price_After, Genre,Picture,Description) 
                                       VALUES (:id, :name, :price, :priceA, :genre,:pic,:desc)");
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':price', $price);
                $stmt->bindParam(':priceA', $priceA);
                $stmt->bindParam(':genre', $genre);
                $stmt->bindParam(':pic',$pic);
                $stmt->bindParam(':desc',$desc);
                $stmt->execute();
                echo "Data inserted successfully";
                echo '<form action="CRUD.php" method="get">';
                echo '<input type="submit" value="Go Back">';
                echo '</form>';
            } catch (PDOException $e) {
                echo "Query failed: " . $e->getMessage();
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

try{
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $id = $_GET["id"];
        $delData = new delete();
        $delData->del($id);

    }
}catch (Exception $e){echo $e;}

class delete
{
    //data delete
    public function del(String $id)
    {

            try {
                $pdo = new PDO("mysql:host=localhost;dbname=project_sql;port3306",
                    "root", "");

                $stmt = $pdo->prepare("DELETE FROM games WHERE id = :id");

                $stmt->bindParam(':id', $id);


                $stmt->execute();

                echo "Row ".$id."deleted successfully.";
                echo '<form action="CRUD.php" method="get">';
                echo '<input type="submit" value="Go Back">';
                echo '</form>';
            } catch (PDOException $e) {
                echo "Delete operation failed: " . $e->getMessage();
            }

    }
}
?>
