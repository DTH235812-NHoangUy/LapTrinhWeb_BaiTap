<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username   = "root";
$password   = "vertrigo";
$dbname     = "quanly_tin";
$port       = 3307;

$malv  = isset($_POST['txtMaLinhVuc']) ? trim($_POST['txtMaLinhVuc']) : "";
$tenlv = isset($_POST['txtTenLinhVuc']) ? trim($_POST['txtTenLinhVuc']) : "";

if ($malv == "" || $tenlv == "") {
    echo "Phải nhập tên lĩnh vực và mã lĩnh vực";
    echo '<p><a href="frmlinhvuc.php">Nhập mới</a></p>';
    exit();
} else {
    if (isset($malv) && isset($tenlv)) {
        try {
            $connect = new PDO(
                "mysql:host=$servername;port=$port;dbname=$dbname;charset=utf8",
                $username,
                $password
            );
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Kết nối thành công. Host: "
                . $connect->getAttribute(PDO::ATTR_CONNECTION_STATUS);

            $sql = "INSERT INTO linhvuc(MaLinhVuc, TenLinhVuc)
                    VALUES('$malv', '$tenlv')";

            if ($connect->exec($sql)) {
                header("Location: hienthi_pdo.php");
                exit();
            }

            unset($connect);
        } catch (PDOException $e) {
            die("ERROR: Không thể kết nối. " . $e->getMessage());
        }
    }
}
?>

<p><a href="frmlinhvuc.php">Nhập mới</a></p>