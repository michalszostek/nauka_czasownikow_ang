<?php
session_start();
require_once 'db_conn.php';
$GLOBALS['NUMBER_OF_ROUNDS'] = 3;

$round = array();

for ($i=1; $i <= $GLOBALS['NUMBER_OF_ROUNDS']; $i++) { 
    $sql = 'SELECT * FROM round WHERE id = :id';
    $query = $conn->prepare($sql);
    $query->execute(array(':id' => $i));
    $verb = $query->fetch(PDO::FETCH_NUM);
    array_push($round, $verb);
}
