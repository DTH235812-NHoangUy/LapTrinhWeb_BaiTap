<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "127.0.0.1";
$username   = "root";
$password   = "";
$dbname     = "quanly_tin";
$port       = 3307;

echo "PHP version: " . phpversion() . "<br>";

$connect = new mysqli($servername, $username, $password, $dbname, $port);

if ($connect->connect_error) {
    die("Lỗi kết nối: " . $connect->connect_error);
}

echo "Kết nối thành công tới MySQL port 3307!";
$connect->set_charset("utf8");
$connect->close();
?>