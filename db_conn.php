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