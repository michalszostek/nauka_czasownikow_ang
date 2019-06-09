<?php
require_once('db_conn.php');
require_once('verbs.php');


$sql = 'SELECT max(id) FROM verbs';
$query = $conn->prepare($sql);
$query->execute();
$max_ID = $query->fetch(PDO::FETCH_NUM);

$max_ID = (int)$max_ID[0];
$numbers = array();
$count = 0;

for ($i = 1; $i <= $GLOBALS['NUMBER_OF_ROUNDS']; $i++) {
    do {
        $numb = rand(1, $max_ID);
        $flag = true;

        for ($j = 1; $j <= $count; $j++) {
            if ($numb == $numbers[$j]) $flag = false;
        }

        if ($flag == true) {
            $count++;
            $numbers[$count] = $numb;
        }
    } while ($flag != true);
}

$id = 1;


foreach ($numbers as $numb) {

    $sql = 'SELECT * FROM verbs WHERE id = :id';
    $query = $conn->prepare($sql);
    $query->execute(array(':id' => $numb));
    $verb = $query->fetch(PDO::FETCH_NUM);

    var_dump($verb);

    $query = 'INSERT INTO `round`(`id`, `id_in_verbs`, `polish`) VALUES (:a, :b, :c)';
    $query = $conn->prepare($query);
    $query->execute(array(
        ':a' => $id,
        ':b' => $numb,
        ':c' => $verb[4],
    ));
    $id += 1;
}


