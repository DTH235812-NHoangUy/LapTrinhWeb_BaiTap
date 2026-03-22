<?php
header("Content-type: text/html; charset=utf-8");

$servername = "127.0.0.1";
$username   = "root";
$password   = "";
$dbname     = "qlkhtt";
$port       = 3307;

$connect = new mysqli($servername, $username, $password, $dbname, $port);
$connect->set_charset("utf8");

if ($connect->connect_error) {
    die("Không kết nối: " . $connect->connect_error);
    exit();
}
?>