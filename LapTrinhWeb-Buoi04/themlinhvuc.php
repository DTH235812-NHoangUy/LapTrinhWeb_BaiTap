<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "127.0.0.1";
$username   = "root";
$password   = "";
$dbname     = "quanly_tin";
$port       = 3307;

$malv  = isset($_POST['txtMaLinhVuc']) ? trim($_POST['txtMaLinhVuc']) : "";
$tenlv = isset($_POST['txtTenLinhVuc']) ? trim($_POST['txtTenLinhVuc']) : "";

if ($malv == "" || $tenlv == "") {
    echo "Phải nhập đầy đủ mã lĩnh vực và tên lĩnh vực.<br>";
    echo '<p><a href="frmlinhvuc.php">Quay lại</a></p>';
    exit();
}

$connect = new mysqli($servername, $username, $password, $dbname, $port);

if ($connect->connect_error) {
    die("Không kết nối được CSDL: " . $connect->connect_error);
}

$connect->set_charset("utf8");

$stmt = $connect->prepare("INSERT INTO linhvuc (MaLinhVuc, TenLinhVuc) VALUES (?, ?)");

if (!$stmt) {
    die("Lỗi prepare: " . $connect->error);
}

$stmt->bind_param("ss", $malv, $tenlv);

if ($stmt->execute()) {
    header("Location: hienthi.php");
    exit();
} else {
    echo "Lỗi thêm dữ liệu: " . $stmt->error . "<br>";
    echo '<p><a href="frmlinhvuc.php">Quay lại</a></p>';
}

$stmt->close();
$connect->close();
?>