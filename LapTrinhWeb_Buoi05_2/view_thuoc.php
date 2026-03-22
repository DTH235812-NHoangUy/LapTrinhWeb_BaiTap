<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        table {
            border-collapse: collapse;
            width: 600px;
            margin: auto;
            border: 1px solid darkgreen;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid darkgreen;
        }
        th {
            color: white;
            background-color: blue;
            font-size: 20px;
        }
    </style>
</head>
<body>

<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "hdthuoc", 3307);

if (!$conn) {
    die("Lỗi kết nối: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

$id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;

$sql = "SELECT * FROM thuoc WHERE mathuoc = $id";
$result = mysqli_query($conn, $sql);
?>

<table>
    <tr>
        <th colspan="2">Thông tin mua thuốc</th>
    </tr>

<?php
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    echo "<tr><td>Tên thuốc</td><td>" . $row["tenthuoc"] . "</td></tr>";
    echo "<tr><td>Hoạt chất</td><td>" . $row["hoatchat"] . "</td></tr>";
    echo "<tr><td>Đơn giá</td><td>" . number_format($row["dongia"], 0, ',', '.') . "</td></tr>";
    echo "<tr><td>Số lượng</td><td>" . $row["soluong"] . "</td></tr>";
} else {
    echo "<tr><td colspan='2'>Không tìm thấy thuốc</td></tr>";
}

mysqli_close($conn);
?>

</table>

</body>
</html>