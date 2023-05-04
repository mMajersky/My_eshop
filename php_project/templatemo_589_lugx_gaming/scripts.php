<?php
class Menu
{

    public function getMenuItems(): array
    {
        $menu = [];
        try {
            //$menuJsonFile = file_get_contents($this->sourceFileName);
            //$menu = json_decode($menuJsonFile, true);
            $pdo = new PDO("mysql:host=localhost;dbname=project_sql;port3306",
            "root","");
            $sql = $pdo->query("SELECT * FROM menu");
//            $sql->execute();
            $menuData = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach ($menuData as $menuItem) {
                $menu[$menuItem['id_item']] = [
                    'name' => $menuItem['item_text'],
                    'path' => $menuItem['item_link']
                ];
            }
        } catch (\Exception $exception) {
            //echo $exception->getMessage();
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
?>