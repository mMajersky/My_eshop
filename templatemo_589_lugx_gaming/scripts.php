<?php
class Menu
{

    public function getMenuItems(): array
    {
        $menu = [];
        try {

            $pdo = new PDO("mysql:host=localhost;dbname=project_sql;port3306",
                "root", "");
            $sql = $pdo->query("SELECT * FROM menu");
            $sql->execute();
            $menuData = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach ($menuData as $menuItem) {
                $menu[$menuItem['id_item']] = [
                    'name' => $menuItem['item_text'],
                    'path' => $menuItem['item_link']
                ];
            }
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }


        return $menu;
    }

    public function printMenu(array $menu)
    {
        foreach ($menu as $menuName => $menuData) {
            echo '<li><a href="' . $menuData['path'] . '">' . $menuData['name'] . '</a></li>';
        }
    }
}
class games
{
    public function getGames(): array
    {
        $games = [];
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=project_sql;port3306",
                "root", "");
            $sql = $pdo->query("SELECT * FROM games");
            $sql->execute();
            $gamesData = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach ($gamesData as $gamesItem) {
                $games[$gamesItem['id']] = [
                    'name' => $gamesItem['Name'],
                    'price' => $gamesItem['Price'],
                    'price_a' => $gamesItem['Price_after'],
                    'picture' => $gamesItem['Picture'],
                    'genre' => $gamesItem['Genre'],
                    'desc' => $gamesItem['Description']
                ];
            }
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
        return $games;
    }

    public function getGenreName(String $id): String
    {
        $genreName = '';
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=project_sql;port3306",
                "root", "");
            $sql = $pdo->query("SELECT genre_name FROM genres WHERE id_genre = " . $id);
            $sql->execute();
            $genreNameData = $sql->fetch(PDO::FETCH_ASSOC);



            $genreName = $genreNameData['genre_name'];

        }catch (\Exception $exception) {
            echo $exception->getMessage();
        }
        return $genreName;
    }

    public function printGames(array $games)
    {
        foreach ($games as $gamesName => $gamesData) {
            echo '<div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 ' . $gamesData['genre'] . '">
              <div class="item">
                  <div class="thumb">
                      <a href="product-details.php"><img src="assets/images/' . $gamesData['picture'] . '" alt=""></a>
                      <span class="price"><em>' . $gamesData['price'] . '$</em>' . $gamesData['price_a'] . '$</span>
                  </div>
                  <div class="down-content">
                      <span class="category">' . $this->getGenreName($gamesData['genre']) . '</span>
                      <h4>' . $gamesData['name'] . '</h4>
                      
                  </div>
              </div>
          </div>';

        }
    }

    public function getGenre(): array
    {
        $genres = [];
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=project_sql;port3306",
                "root", "");
            $sql = $pdo->query("SELECT * FROM genres");
//            $sql->execute();
            $genresData = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach ($genresData as $genresItem) {
                $genres[$genresItem['id_genre']] = [
                    'id' => $genresItem['id_genre'],
                    'name' => $genresItem['genre_name']
                ];
            }
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
        return $genres;
    }

    public function printGenre_name(array $genres)
    {
        foreach ($genres as $genreName => $genresData) {
            echo '<li><a href="#!" data-filter=".'.$genresData['id'].'">'.$genresData['name'].'</a></li>';
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["gName"];
    $id = $_POST["gId"];
    $price = floatval($_POST["gPrice"]);
    $priceA = floatval($_POST["gPrice_A"]);
    $genre = intval($_POST['gGenre']);
    $newData = new Crud();
    $newData->submitData($name,$id,$price,$priceA,$genre);
        }
    class Crud
    {

        public function submitData(String $name,String $id,float $price,float $priceA,int $genre)
        {
            echo "trying";

            try {
                $pdo = new PDO("mysql:host=localhost;dbname=project_sql;port3306",
                    "root", "");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Connected successfully";
                try {
                    $stmt = $pdo->prepare("INSERT INTO games (id, Name, Price, Price_After, Genre) 
                                       VALUES (:id, :name, :price, :priceA, :genre)");
                    $stmt->bindParam(':id', $id);
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':price', $price);
                    $stmt->bindParam(':priceA', $priceA);
                    $stmt->bindParam(':genre', $genre);
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

?>