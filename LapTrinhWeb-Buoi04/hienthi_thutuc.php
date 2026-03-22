<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "127.0.0.1";
$username   = "root";
$password   = "";
$dbname     = "quanly_tin";
$port       = 3307;

$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

if (!$conn) {
    die("Lỗi: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

$sql = "SELECT * FROM linhvuc ORDER BY MaLinhVuc ASC";
$danhsach = mysqli_query($conn, $sql);

if (!$danhsach) {
    die("Lỗi truy vấn: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hiển thị lĩnh vực - mysqli thủ tục</title>
</head>
<body>

<p><a href="frmlinhvuc.php">Nhập mới</a></p>

<table border="1" cellspacing="0" cellpadding="5">
    <caption>Danh sách lĩnh vực</caption>
    <tr>
        <th>STT</th>
        <th>Mã Lĩnh Vực</th>
        <th>Tên Lĩnh Vực</th>
    </tr>

    <?php
    if (mysqli_num_rows($danhsach) > 0) {
        $stt = 1;
        while ($dong = mysqli_fetch_assoc($danhsach)) {
            echo "<tr>";
            echo "<td>{$stt}</td>";
            echo "<td>" . htmlspecialchars($dong['MaLinhVuc']) . "</td>";
            echo "<td>" . htmlspecialchars($dong['TenLinhVuc']) . "</td>";
            echo "</tr>";
            $stt++;
        }
    } else {
        echo '<tr><td colspan="3" align="center">Chưa có dữ liệu lĩnh vực</td></tr>';
    }
    ?>

    <tr>
        <td colspan="3" align="center">
            <a href="frmlinhvuc.php">Thêm lĩnh vực</a>
        </td>
    </tr>
</table>

</body>
</html>

<?php
mysqli_close($conn);
?>