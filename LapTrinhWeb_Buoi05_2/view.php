<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        table {
            border-collapse: collapse;
            width: 700px;
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
        tr:hover {
            background-color: #FFFACD;
        }
        a {
            text-decoration: none;
            color: black;
        }
        a:hover {
            color: red;
        }
    </style>
</head>
<body>

<table>
    <tr>
        <th>Tên Thuốc</th>
        <th>Đơn giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
    </tr>

<?php
$conn = mysqli_connect("127.0.0.1", "root", "vertrigo", "hdthuoc", 3307);

if (!$conn) {
    die("<tr><td colspan='4'>Lỗi kết nối: " . mysqli_connect_error() . "</td></tr>");
}

mysqli_set_charset($conn, "utf8");

$sql = "SELECT * FROM thuoc";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $thanhtien = $row["dongia"] * $row["soluong"];

        echo "<tr>";
        echo "<td><a href='view_thuoc.php?id=" . $row["mathuoc"] . "'>" . $row["tenthuoc"] . "</a></td>";
        echo "<td>" . number_format($row["dongia"], 0, ',', '.') . "</td>";
        echo "<td>" . $row["soluong"] . "</td>";
        echo "<td>" . number_format($thanhtien, 0, ',', '.') . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>Không tìm thấy dữ liệu trong bảng thuoc</td></tr>";
}

mysqli_close($conn);
?>

</table>

</body>
</html>