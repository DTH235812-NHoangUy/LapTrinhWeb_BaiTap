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
    echo "Phải nhập đầy đủ mã lĩnh vực và tên lĩnh vực.";
    echo '<p><a href="frmlinhvuc.php">Nhập mới</a></p>';
    exit();
}

$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

if (!$conn) {
    die("Lỗi kết nối: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

$sql = "INSERT INTO linhvuc (MaLinhVuc, TenLinhVuc) VALUES (?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("Lỗi prepare: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ss", $malv, $tenlv);

if (mysqli_stmt_execute($stmt)) {
    header("Location: hienthi_thutuc.php");
    exit();
} else {
    echo "Lỗi thêm dữ liệu: " . mysqli_stmt_error($stmt);
    echo '<p><a href="frmlinhvuc.php">Nhập mới</a></p>';
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>