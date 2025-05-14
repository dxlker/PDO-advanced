<?php
require_once "db.php";
$db = new DB();
if ($db->pdo){
    echo "Databaseverbinding gelukt";
} else {
    echo"Error";
}
?>