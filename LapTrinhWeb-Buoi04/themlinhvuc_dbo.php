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

try {
    $connect = new PDO(
        "mysql:host=$servername;port=$port;dbname=$dbname;charset=utf8",
        $username,
        $password
    );
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO linhvuc (MaLinhVuc, TenLinhVuc) VALUES (:malv, :tenlv)";
    $stmt = $connect->prepare($sql);

    $stmt->bindParam(':malv', $malv);
    $stmt->bindParam(':tenlv', $tenlv);

    if ($stmt->execute()) {
        header("Location: hienthi_pdo.php");
        exit();
    } else {
        echo "Thêm dữ liệu thất bại.";
        echo '<p><a href="frmlinhvuc.php">Nhập mới</a></p>';
    }

    unset($stmt);
    unset($connect);
} catch (PDOException $e) {
    die("ERROR: Không thể kết nối hoặc thêm dữ liệu. " . $e->getMessage());
}
?>