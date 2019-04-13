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


$file = fopen('verbs.php', 'r');

while (!feof($file)) {
    $get = fgets($file);
    $verb = explode(',', $get);

    $query = 'INSERT INTO `verbs`(`infinitive`, `tense`, `participle`, `polish`) VALUES (:a, :b, :c, :d)';
    $query = $conn->prepare($query);
    var_dump($query);
    $query->execute(array(
        ':a' => $verb[0],
        ':b' => $verb[1],
        ':c' => $verb[2],
        ':d' => $verb[3]
    ));

}
