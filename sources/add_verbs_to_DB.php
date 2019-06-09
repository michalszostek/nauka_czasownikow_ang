<?php

require_once('../db_conn.php');


$file = fopen('verbs.txt', 'r');

while (!feof($file)) {
    $get = fgets($file);
    $verb = explode(',', $get);

    $query = 'INSERT INTO `verbs`(`id` ,`infinitive`, `tense`, `participle`, `polish`) VALUES (null, :a, :b, :c, :d)';
    $query = $conn->prepare($query);
    $query->execute(array(
        ':a' => $verb[0],
        ':b' => $verb[1],
        ':c' => $verb[2],
        ':d' => $verb[3]
    ));
}
