<?php

$servername = 'localhost';
$dbname = 'verbs';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$servername;dbname=" . $dbname, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CHARACTER SET utf8");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


$verb = rand_verb($conn);

function rand_verb($conn) {
    $id = rand(1, 3);
    $verb = select_verb($conn, $id);
    return $verb;
}


function select_verb($conn, $id)
{
    $sql = 'SELECT * FROM verbs WHERE id = :id';
    $query = $conn->prepare($sql);
    $query->execute(array(':id' => $id));
    $row = $query->fetch(PDO::FETCH_NUM);
    return $row;
}
