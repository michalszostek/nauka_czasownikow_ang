<?php 
session_start();

$_SESSION['round'] = 0;
header("Location: index.php");
