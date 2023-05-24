<?php
include_once "product-script.php";
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
                    'id' => $gamesItem['id'],
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
            $id = $gamesData['id']; // Get the 'id' value from the $gamesData array
            echo '<div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 ' . $gamesData['genre'] . '">
    <div class="item">
        <div class="thumb">
            <a href="product-details.php?id=' . $id . '">
                <img src="assets/images/' . $gamesData['picture'] . '" alt="">
            </a>
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
            $sql->execute();
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
    public function getTable():array
    {
        $pdo = new PDO("mysql:host=localhost;dbname=project_sql;port3306",
            "root", "");
        $stmt = $pdo->query("SELECT * FROM games");
        $games = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $games;
    }
}
class ShowCase {
    public function getProduct(String $id = "r6") {
        try {
            if($id==''){$id="r6";}
            $gameDetails = [];
            try {
                $pdo = new PDO("mysql:host=localhost;dbname=project_sql;port3306", "root", "");
                $stmt = $pdo->prepare("SELECT * FROM games WHERE id = :id");
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $gameData = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($gameData) {
                    $gameDetails = [
                        'id' => $gameData['id'],
                        'name' => $gameData['Name'],
                        'price' => $gameData['Price'],
                        'price_a' => $gameData['Price_after'],
                        'picture' => $gameData['Picture'],
                        'genre' => $gameData['Genre'],
                        'desc' => $gameData['Description']
                    ];
                }
            } catch (\Exception $exception) {
                echo $exception->getMessage();
            }

            return $gameDetails;
        } catch (Exception $e) {
            echo $e;
        }
    }





}
?>