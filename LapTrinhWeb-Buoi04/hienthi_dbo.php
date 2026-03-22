<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "127.0.0.1";
$username   = "root";
$password   = "";
$dbname     = "quanly_tin";
$port       = 3307;

try {
    $connect = new PDO(
        "mysql:host=$servername;port=$port;dbname=$dbname;charset=utf8",
        $username,
        $password
    );
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM linhvuc ORDER BY MaLinhVuc ASC";
    $danhsach = $connect->prepare($sql);
    $danhsach->execute();
    $danhsach->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("ERROR: Không thể kết nối. " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hiển thị lĩnh vực PDO</title>
</head>
<body>

<p><a href="frmlinhvuc.php">Nhập mới</a></p>

<table border="1" cellspacing="0" cellpadding="5">
    <caption><h3>Danh sách lĩnh vực</h3></caption>
    <tr>
        <th>STT</th>
        <th>Mã Lĩnh Vực</th>
        <th>Tên Lĩnh Vực</th>
    </tr>

    <?php
    $stt = 1;
    while ($row = $danhsach->fetch()) {
        echo "<tr>";
        echo "<td>" . $stt . "</td>";
        echo "<td>" . htmlspecialchars($row['MaLinhVuc']) . "</td>";
        echo "<td>" . htmlspecialchars($row['TenLinhVuc']) . "</td>";
        echo "</tr>";
        $stt++;
    }

    if ($stt == 1) {
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
unset($connect);
?>