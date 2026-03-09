<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username   = "root";
$password   = "vertrigo";
$dbname     = "quanly_tin";
$port       = 3307;

$connect = new mysqli($servername, $username, $password, $dbname, $port);

if ($connect->connect_error) {
    die("Không kết nối được CSDL: " . $connect->connect_error);
}

$connect->set_charset("utf8");

$sql = "SELECT * FROM linhvuc";
$danhsach = $connect->query($sql);

if (!$danhsach) {
    die("Không thể thực hiện câu lệnh SQL: " . $connect->error);
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển thị lĩnh vực</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            padding: 30px;
            background: linear-gradient(135deg, #dbeafe, #f0f9ff);
            min-height: 100vh;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
            padding: 25px;
        }

        h2 {
            margin-top: 0;
            text-align: center;
            color: #1d4ed8;
            margin-bottom: 20px;
        }

        .top-actions {
            text-align: right;
            margin-bottom: 18px;
        }

        .btn-add {
            display: inline-block;
            background: #2563eb;
            color: white;
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 8px;
            transition: 0.3s;
            font-weight: bold;
        }

        .btn-add:hover {
            background: #1d4ed8;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 12px;
        }

        thead {
            background: #2563eb;
            color: white;
        }

        th, td {
            padding: 12px 14px;
            text-align: center;
            border-bottom: 1px solid #e5e7eb;
        }

        tbody tr:nth-child(even) {
            background: #f8fafc;
        }

        tbody tr:hover {
            background: #e0f2fe;
            transition: 0.2s;
        }

        .empty {
            text-align: center;
            color: #6b7280;
            padding: 20px 0;
        }

        .bottom-link {
            margin-top: 20px;
            text-align: center;
        }

        .bottom-link a {
            display: inline-block;
            background: #10b981;
            color: white;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }

        .bottom-link a:hover {
            background: #059669;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Danh sách lĩnh vực</h2>

    <div class="top-actions">
        <a href="frmlinhvuc.php" class="btn-add">+ Nhập mới</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã lĩnh vực</th>
                <th>Tên lĩnh vực</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stt = 1;
            if ($danhsach->num_rows > 0) {
                while ($row = $danhsach->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $stt . "</td>";
                    echo "<td>" . htmlspecialchars($row['MaLinhVuc']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['TenLinhVuc']) . "</td>";
                    echo "</tr>";
                    $stt++;
                }
            } else {
                echo '<tr><td colspan="3" class="empty">Chưa có dữ liệu lĩnh vực</td></tr>';
            }
            ?>
        </tbody>
    </table>

    <div class="bottom-link">
        <a href="frmlinhvuc.php">Thêm lĩnh vực</a>
    </div>
</div>

</body>
</html>
<?php
$connect->close();
?>