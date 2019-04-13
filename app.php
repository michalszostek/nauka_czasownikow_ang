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


function rand_verb($conn)
{
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



$maxID = 3;
$ile_wylosowac = 2;
$ile_juz_wylosowano = 0;

for ($i = 1; $i <= $ile_wylosowac; $i++) {
    do {
        $liczba = rand(1, $maxID);
        $losowanie_ok = true;

        for ($j = 1; $j <= $ile_juz_wylosowano; $j++) {
            //czy liczba nie zostala juz wczesniej wylosowana?
            if ($liczba == $wylosowane[$j]) $losowanie_ok = false;
        }

        if ($losowanie_ok == true) {
            //mamy unikatowa liczbe, zapiszmy ja do tablicy
            $ile_juz_wylosowano++;
            $wylosowane[$ile_juz_wylosowano] = $liczba;
        }
    } while ($losowanie_ok != true);
}

// ZOBACZ REZULTATY LOSOWANIA
echo "Wylosowane numery: ";
for ($i = 1; $i <= $ile_wylosowac; $i++) {
    echo $wylosowane[$i] . " ";
}
