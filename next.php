<?php
include_once('verbs.php');
include_once('db_conn.php');

$id = $_SESSION['round'];

if ($_GET['infinitive'] !== '' && $_GET['tense'] !== '' && $_GET['participle'] !== '') {
    $query = 'UPDATE `round` SET `infinitive`= :a,`tense`=:b,`participle`=:c WHERE id = :d';
    $query = $conn->prepare($query);
    $query->execute(array(
        ':a' => trim($_GET['infinitive']),
        ':b' => trim($_GET['tense']),
        ':c' => trim($_GET['participle']),
        ':d' => $id
    ));

}

header("Location: index.php");
