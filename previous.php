<?php
session_start();

if($_SESSION['round'] <= 1) {
    $_SESSION['round'] = 0;
} else {
    $_SESSION['round'] = $_SESSION['round']-2;
}
header("Location: index.php");
