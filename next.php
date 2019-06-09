<?php
include_once('verbs.php');

$given_verb[$_SESSION['round']]['infinitive'] = $_GET['infinitive'];
$given_verb[$_SESSION['round']]['tense'] = $_GET['tense'];
$given_verb[$_SESSION['round']]['participle'] = $_GET['participle'];



// var_dump($given_verb[$_SESSION['round']]);
header("Location: index.php");
