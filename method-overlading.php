<?php
namespace Database;

class DBController {

    public $database_name;

    function __construct() {
        $this->database_name = "db_namespace";
    }

}

function print_database_name($objDBController) {
    echo $objDBController->database_name;
}



/*
$objDBController = new DBController();
print_database_name($objDBController);
*/
$objDBController = new \Database\DBController();
\Database\print_database_name($objDBController);
?>
