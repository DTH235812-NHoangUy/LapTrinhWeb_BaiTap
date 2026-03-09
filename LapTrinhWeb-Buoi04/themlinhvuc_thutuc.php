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

if ((trim($malv) == "") || (trim($tenlv) == "")) {
    echo "Phải nhập tên lĩnh vực và mã lĩnh vực";
} else {
    if (isset($malv) && isset($tenlv)) {
        $conn = mysqli_connect($servername, $username, $password, $dbname, $port);

        if (!$conn) {
            die("Lỗi: " . mysqli_connect_error());
        }

        mysqli_set_charset($conn, "utf8");

        $sql = "INSERT INTO linhvuc(MaLinhVuc, TenLinhVuc)
                VALUES('$malv', '$tenlv')";

        if (mysqli_query($conn, $sql)) {
            header("Location: hienthi_thutuc.php");
            exit();
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}
?>

<p><a href="frmlinhvuc.php">Nhập mới</a></p>