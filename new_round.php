<?php
session_start();
require_once 'db_conn.php';

$query = 'TRUNCATE `round`';
$query = $conn->prepare($query);
$query->execute();

require_once 'functions/rand_numbers.php';

$_SESSION['round'] = 0;

header("Location: index.php");
